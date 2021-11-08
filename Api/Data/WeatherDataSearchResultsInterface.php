<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Api\Data;

interface WeatherDataSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get WeatherData list.
     * @return \TestTask\WeatherWidget\Api\Data\WeatherDataInterface[]
     */
    public function getItems();

    /**
     * Set weatherdata_id list.
     * @param \TestTask\WeatherWidget\Api\Data\WeatherDataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
