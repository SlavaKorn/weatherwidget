<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Model\ResourceModel\WeatherData;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'weatherdata_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \TestTask\WeatherWidget\Model\WeatherData::class,
            \TestTask\WeatherWidget\Model\ResourceModel\WeatherData::class
        );
    }
}
