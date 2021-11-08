<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface WeatherDataRepositoryInterface
{

    /**
     * Save WeatherData
     * @param \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherData
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherData
    );

    /**
     * Retrieve WeatherData
     * @param string $weatherdataId
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($weatherdataId);

    /**
     * Retrieve WeatherData matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete WeatherData
     * @param \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherData
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherData
    );

    /**
     * Delete WeatherData by ID
     * @param string $weatherdataId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($weatherdataId);
}
