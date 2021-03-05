<?php

namespace Overdose\AdminPanel\Block\Adminhtml\Index;

use Exception;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Overdose\LessonOne\Api\FriendRepositoryInterface;
use Overdose\LessonOne\Model\FriendRepository;

abstract class GenericButton
{
    protected $context;

    /**
     * @var FriendRepositoryInterface|FriendRepository
     */
    protected $friendsRepository;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param FriendRepositoryInterface $friendsRepository
     */
    public function __construct(
        Context $context,
        FriendRepositoryInterface $friendsRepository
    ) {
        $this->context = $context;
        $this->friendsRepository = $friendsRepository;
    }

    public function getFriendId()
    {
        $id = $this->context->getRequest()->getParam('id');

        if ($id) {
            try {
                return $this->friendsRepository->getById($id);
            } catch (Exception $e) {
                throw new NoSuchEntityException(__($e->getMessage()));
            }
        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
