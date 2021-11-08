<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TestTask\WeatherWidget\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;

/**
 * Weather section
 */
class Weather implements SectionSourceInterface
{
    /**
     * @var \Magento\Framework\Session\Generic
     */
    protected $weatherSession;

    /**
     * @var \TestTask\WeatherWidget\Model\ResourceModel\WeatherData\Collection
     */
    private $collection;

    /**
     * @param \Magento\Framework\Session\Generic $weatherSession
     * @param \TestTask\WeatherWidget\Model\ResourceModel\WeatherData\Collection $collection
     */
    public function __construct(
        \Magento\Framework\Session\Generic $weatherSession,
        \TestTask\WeatherWidget\Model\ResourceModel\WeatherData\Collection $collection
    ) {
        $this->weatherSession = $weatherSession;
        $this->collection = $collection;
    }

    /**
     * {@inheritdoc}
     */
    public function getSectionData()
    {
        /** @var \TestTask\WeatherWidget\Model\WeatherData $item */
        $collection = $this->collection->addOrder('created_at', 'desc')
            ->setPageSize(1)
            ->load();

        $items = $collection->getItems();
        if (is_array($items)) {
            $item = array_shift($items);
            return $item->getData();
        }

        return [];
    }
}
