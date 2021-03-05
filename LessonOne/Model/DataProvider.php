<?php

namespace Overdose\LessonOne\Model;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;
use Overdose\LessonOne\Model\ResourceModel\Collection\FriendsFactory as CollectionFactory;

class DataProvider extends ModifierPoolDataProvider
{


    protected $collection;
    protected $loadedData;
    protected $dataPersistor;

    /**
     * Initialize dependencies.
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     * @param DataPersistorInterface|null $dataPersistor
     * @param PoolInterface|null $pool
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = [],
        DataPersistorInterface $dataPersistor = null,
        PoolInterface $pool = null
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        /** @var \Overdose\LessonOne\Model\Friends $friend */
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
