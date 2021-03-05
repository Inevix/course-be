<?php
namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Overdose\LessonOne\Api\FriendRepositoryInterface;
use Overdose\LessonOne\Model\FriendRepository;
use Magento\Backend\App\Action\Context;

abstract class AbstractController extends Action
{
    const DEFAULT_ACTION_PATH = 'myadminroute/index/';


    /**
     * @var FriendRepositoryInterface|FriendRepository $friendRepository
     */
    protected $friendRepository;

    public function __construct(
        Context $context,
        FriendRepository $friendRepository
    ) {
        $this->friendRepository = $friendRepository;
        parent::__construct($context);
    }
}
