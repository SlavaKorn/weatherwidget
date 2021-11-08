<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Cron;

use Magento\Setup\Exception;
use TestTask\WeatherWidget\Block\Widget\WeatherInfo;

class WeatherApiCall
{

    protected $logger;
    /**
     * @var \TestTask\WeatherWidget\Helper\Config
     */
    private $config;
    /**
     * @var \Magento\Framework\Http\Client\Curl
     */
    private $curl;
    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    private $jsonSerializerInterface;
    /**
     * @var \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     */
    private $weatherDataInterface;
    /**
     * @var \TestTask\WeatherWidget\Api\WeatherDataRepositoryInterface
     */
    private $weatherDataRepository;
    /**
     * @var \Magento\Framework\App\CacheInterface
     */
    private $cacheInterface;

    /**
     * Constructor
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \TestTask\WeatherWidget\Helper\Config $config,
        \Magento\Framework\Http\Client\Curl $curl,
        \Magento\Framework\Serialize\SerializerInterface $jsonSerializerInterface,
        \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherDataInterface,
        \TestTask\WeatherWidget\Api\WeatherDataRepositoryInterface $weatherDataRepository,
        \Magento\Framework\App\CacheInterface $cacheInterface
    ) {
        $this->logger = $logger;
        $this->config = $config;
        $this->curl = $curl;
        $this->jsonSerializerInterface = $jsonSerializerInterface;
        $this->weatherDataInterface = $weatherDataInterface;
        $this->weatherDataRepository = $weatherDataRepository;
        $this->cacheInterface = $cacheInterface;
    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {
        if ($this->config->getIsEnable()) {
            $this->curl->get($this->config->getApiEndpoint() . '?' .
                http_build_query([
                    'q' => $this->config->getCity(),
                    'appid' => $this->config->getApiKey(),
                    'units' => $this->config->getUnits()
                ]));

            $body = $this->curl->getBody();

            try {
                $response = $this->jsonSerializerInterface->unserialize($body);

                $weatherData = $this->weatherDataInterface;
                $weatherData->setCity($this->config->getCity());
                $weatherData->setWeatherMain($response['weather'][0]['main']);
                $weatherData->setMainTemp($response['main']['temp']);
                $weatherData->setMainHumidity($response['main']['humidity']);

                $this->weatherDataRepository->save($weatherData);
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
        }
    }
}
