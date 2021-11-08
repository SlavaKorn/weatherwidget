<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Model\Data;

use TestTask\WeatherWidget\Api\Data\WeatherDataInterface;

class WeatherData extends \Magento\Framework\Api\AbstractExtensibleObject implements WeatherDataInterface
{
    /**
     * Get weatherdata_id
     * @return string|null
     */
    public function getWeatherdataId()
    {
        return $this->_get(self::WEATHERDATA_ID);
    }

    /**
     * Set weatherdata_id
     * @param string $weatherdataId
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     */
    public function setWeatherdataId($weatherdataId)
    {
        return $this->setData(self::WEATHERDATA_ID, $weatherdataId);
    }

    /**
     * Get city
     * @return string|null
     */
    public function getCity()
    {
        return $this->_get(self::CITY);
    }

    /**
     * Set city
     * @param string $city
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get weather_main
     * @return string|null
     */
    public function getWeatherMain()
    {
        return $this->_get(self::WEATHER_MAIN);
    }

    /**
     * Set weather_main
     * @param string $weatherMain
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     */
    public function setWeatherMain($weatherMain)
    {
        return $this->setData(self::WEATHER_MAIN, $weatherMain);
    }

    /**
     * Get main_temp
     * @return string|null
     */
    public function getMainTemp()
    {
        return $this->_get(self::MAIN_TEMP);
    }

    /**
     * Set main_temp
     * @param string $mainTemp
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     */
    public function setMainTemp($mainTemp)
    {
        return $this->setData(self::MAIN_TEMP, $mainTemp);
    }

    /**
     * Get main_humidity
     * @return string|null
     */
    public function getMainHumidity()
    {
        return $this->_get(self::MAIN_HUMIDITY);
    }

    /**
     * Set main_humidity
     * @param string $mainHumidity
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     */
    public function setMainHumidity($mainHumidity)
    {
        return $this->setData(self::MAIN_HUMIDITY, $mainHumidity);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \TestTask\WeatherWidget\Api\Data\WeatherDataExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \TestTask\WeatherWidget\Api\Data\WeatherDataExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
