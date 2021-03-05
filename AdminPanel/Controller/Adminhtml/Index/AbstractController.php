<?php
namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Overdose\LessonOne\Model\FriendRepository;
use Overdose\LessonOne\Model\ResourceModel\Friends;

abstract class AbstractController extends \Magento\Backend\App\Action
{
    const DEFAULT_ACTION_PATH = 'myadminroute/index/';

    /**
     * @var \Overdose\LessonOne\Model\Friends $model
     */
    protected $model;

    /**
     * @var \Overdose\LessonOne\Model\FriendRepository $friendRepository
     */
    protected $friendRepository;

    /**
     * @var Friends $resourceModel
     */
    private $resourceModel;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    protected $dataPersistor;


    public function __construct(
        Action\Context $context,
        \Magento\Framework\Registry $registry,
        \Overdose\LessonOne\Model\Friends $friendsModel,
        Friends $friendsResourceModel,
        FriendRepository $friendRepository,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->_coreRegistry = $registry;
        $this->model = $friendsModel;
        $this->resourceModel = $friendsResourceModel;
        $this->friendRepository = $friendRepository;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
