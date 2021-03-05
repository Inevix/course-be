<?php

namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Edit extends AbstractController
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $page->getConfig()->getTitle()->prepend(__('Friend form'));

        if ($id) {
            $model = $this->friendRepository->getById($id);
            if (!$model->getId()) {
                return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*');
            }
        }
        return $page;
    }
}
