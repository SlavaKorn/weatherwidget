<?php

namespace TestTask\WeatherWidget\Helper;

use Magento\Store\Model\ScopeInterface;

class Config
{
    private const CONFIG_PATH_IS_ENABLE = 'weather/general/enable';
    private const CONFIG_PATH_API_KEY = 'weather/general/api_key';
    private const CONFIG_PATH_UNITS = 'weather/general/units';
    private const CONFIG_PATH_CITY = 'weather/general/city';
    private const API_ENDPOINT = 'api.openweathermap.org/data/2.5/weather';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getIsEnable($storeId = null)
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_IS_ENABLE, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getApiKey($storeId = null)
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_API_KEY, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getUnits($storeId = null)
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_UNITS, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getCity($storeId = null)
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_CITY, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * @return string
     */
    public function getApiEndpoint()
    {
        return self::API_ENDPOINT;
    }
}
