<?php
namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

class Edit extends AbstractController
{
    public function execute()
    {
        $editPage = $this->resultFactory->create('page');

        $editPage->getConfig()->getTitle()->prepend(__('Friend form'));

        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->model;

        // 2. Initial checking
        if ($id) {
            $model->load($id)
            ->setData('name','age','comment');

            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('overdose_lesson_one', $model);

        return $editPage;
    }
}
