<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use TestTask\WeatherWidget\Api\Data\WeatherDataInterfaceFactory;
use TestTask\WeatherWidget\Api\Data\WeatherDataSearchResultsInterfaceFactory;
use TestTask\WeatherWidget\Api\WeatherDataRepositoryInterface;
use TestTask\WeatherWidget\Model\ResourceModel\WeatherData as ResourceWeatherData;
use TestTask\WeatherWidget\Model\ResourceModel\WeatherData\CollectionFactory as WeatherDataCollectionFactory;

class WeatherDataRepository implements WeatherDataRepositoryInterface
{

    protected $dataObjectHelper;

    protected $weatherDataFactory;

    protected $extensionAttributesJoinProcessor;

    protected $extensibleDataObjectConverter;
    protected $weatherDataCollectionFactory;

    protected $resource;

    protected $dataWeatherDataFactory;

    protected $dataObjectProcessor;

    private $collectionProcessor;

    private $storeManager;

    protected $searchResultsFactory;

    /**
     * @param ResourceWeatherData $resource
     * @param WeatherDataFactory $weatherDataFactory
     * @param WeatherDataInterfaceFactory $dataWeatherDataFactory
     * @param WeatherDataCollectionFactory $weatherDataCollectionFactory
     * @param WeatherDataSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceWeatherData $resource,
        WeatherDataFactory $weatherDataFactory,
        WeatherDataInterfaceFactory $dataWeatherDataFactory,
        WeatherDataCollectionFactory $weatherDataCollectionFactory,
        WeatherDataSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->weatherDataFactory = $weatherDataFactory;
        $this->weatherDataCollectionFactory = $weatherDataCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataWeatherDataFactory = $dataWeatherDataFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherData
    ) {
        /* if (empty($weatherData->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $weatherData->setStoreId($storeId);
        } */

        $weatherDataData = $this->extensibleDataObjectConverter->toNestedArray(
            $weatherData,
            [],
            \TestTask\WeatherWidget\Api\Data\WeatherDataInterface::class
        );

        $weatherDataModel = $this->weatherDataFactory->create()->setData($weatherDataData);

        try {
            $this->resource->save($weatherDataModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the weatherData: %1',
                $exception->getMessage()
            ));
        }
        return $weatherDataModel;
    }

    /**
     * {@inheritdoc}
     */
    public function get($weatherDataId)
    {
        $weatherData = $this->weatherDataFactory->create();
        $this->resource->load($weatherData, $weatherDataId);
        if (!$weatherData->getId()) {
            throw new NoSuchEntityException(__('WeatherData with id "%1" does not exist.', $weatherDataId));
        }
        return $weatherData;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->weatherDataCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \TestTask\WeatherWidget\Api\Data\WeatherDataInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \TestTask\WeatherWidget\Api\Data\WeatherDataInterface $weatherData
    ) {
        try {
            $weatherDataModel = $this->weatherDataFactory->create();
            $this->resource->load($weatherDataModel, $weatherData->getWeatherdataId());
            $this->resource->delete($weatherDataModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the WeatherData: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($weatherDataId)
    {
        return $this->delete($this->get($weatherDataId));
    }
}
