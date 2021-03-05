<?php

namespace Overdose\LessonOne\Model;

use Magento\Framework\App\Request\DataPersistorInterface;
use Overdose\LessonOne\Model\ResourceModel\Collection\Friends;
use Overdose\LessonOne\Model\ResourceModel\Collection\FriendsFactory as CollectionFactory;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var \Overdose\LessonOne\Model\Friends $model
     */
    private $model;

    /**
     * @var Friends $resourceModel
     */
    private $resourceModel;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * @var \Magento\SalesRule\Model\Rule\Metadata\ValueProvider
     */
    protected $metadataValueProvider;

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Initialize dependencies.
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Framework\Registry $registry
     * @param array $meta
     * @param array $data
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = [],
        DataPersistorInterface $dataPersistor = null
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if(isset($this->loadData)){
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        /** @var \Overdose\LessonOne\Model\Friends $friends */
        foreach ($items as $friend) {
            $this->loadedData[$friend->getId()] = $friend->getData();
        }

        if (!empty($data)) {
            $block = $this->collection->getNewEmptyItem();
            $block->setData($data);
            $this->loadedData[$friend->getId()] = $friend->getData();
            $this->dataPersistor->clear('overdose_friends_form');
        }

        return $this->loadedData;
    }
}
