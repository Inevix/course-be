<?php
namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

class Save extends AbstractController
{
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Overdose\LessonOne\Model\Friends::class)->load($id);

        $model->setData($data);

        try {
            $model->save();
            $this->dataPersistor->clear('overdose_lesson_one');

            $this->messageManager->addSuccessMessage(__("Yay. Now you have a new friend! Successfully saved to the database!"));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Sorry, was unable to save a friend form. =("));
        }

        $redirect = $this->resultRedirectFactory->create();

        return $redirect->setPath('*/*/index');
    }
}
