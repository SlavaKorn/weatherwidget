<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Model;

use Magento\Framework\Api\DataObjectHelper;
use TestTask\WeatherWidget\Api\Data\WeatherDataInterface;
use TestTask\WeatherWidget\Api\Data\WeatherDataInterfaceFactory;

class WeatherData extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'testtask_weatherwidget_wetherdata';
    protected $wetherdataDataFactory;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param WeatherDataInterfaceFactory $wetherdataDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \TestTask\WeatherWidget\Model\ResourceModel\WeatherData $resource
     * @param \TestTask\WeatherWidget\Model\ResourceModel\WeatherData\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        WeatherDataInterfaceFactory $weatherdataDataFactory,
        DataObjectHelper $dataObjectHelper,
        \TestTask\WeatherWidget\Model\ResourceModel\WeatherData $resource,
        \TestTask\WeatherWidget\Model\ResourceModel\WeatherData\Collection $resourceCollection,
        array $data = []
    ) {
        $this->wetherdataDataFactory = $weatherdataDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve weatherdata model with weatherdata data
     * @return WeatherDataInterface
     */
    public function getDataModel()
    {
        $wetherdataData = $this->getData();

        $wetherdataDataObject = $this->wetherdataDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $wetherdataDataObject,
            $wetherdataData,
            WeatherDataInterface::class
        );

        return $wetherdataDataObject;
    }
}
