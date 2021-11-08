<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Api\Data;

interface WeatherDataInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CITY = 'city';
    const WEATHER_MAIN = 'weather_main';
    const WEATHERDATA_ID = 'weatherdata_id';
    const MAIN_HUMIDITY = 'main_humidity';
    const MAIN_TEMP = 'main_temp';

    /**
     * Get city
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     * @param string $city
     * @return \Api\Data\WeatherDataInterface
     */
    public function setCity($city);

    /**
     * Get weatherdata_id
     * @return string|null
     */
    public function getWeatherdataId();

    /**
     * Set weatherdata_id
     * @param string $weatherdataId
     * @return \Api\Data\WeatherDataInterface
     */
    public function setWeatherdataId($weatherdataId);

    /**
     * Get weather_main
     * @return string|null
     */
    public function getWeatherMain();

    /**
     * Set weather_main
     * @param string $weatherMain
     * @return \Api\Data\WeatherDataInterface
     */
    public function setWeatherMain($weatherMain);

    /**
     * Get main_temp
     * @return string|null
     */
    public function getMainTemp();

    /**
     * Set main_temp
     * @param string $mainTemp
     * @return \Api\Data\WeatherDataInterface
     */
    public function setMainTemp($mainTemp);

    /**
     * Get main_humidity
     * @return string|null
     */
    public function getMainHumidity();

    /**
     * Set main_humidity
     * @param string $mainHumidity
     * @return \Api\Data\WeatherDataInterface
     */
    public function setMainHumidity($mainHumidity);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \TestTask\WeatherWidget\Api\Data\WeatherDataExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \TestTask\WeatherWidget\Api\Data\WeatherDataExtensionInterface $extensionAttributes
    );
}
