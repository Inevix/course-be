<?php

namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

use Exception;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\CouldNotSaveException;

class Save extends AbstractController
{
    public function execute()
    {
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $data = $this->getRequest()->getPostValue();

        $model = $data['id']
            ? $this->friendRepository->getById($data['id'])
            : $this->friendRepository->getEmptyModel();

        $model->setName($data['name'])
            ->setAge($data['age'])
            ->setComment($data['comment']);

        if ($data['id']) {
            $model->setId($data['id']);
        }

        try {
            $this->friendRepository->save($model);

            $this->messageManager->addSuccessMessage(__('Friend has been successfully saved'));
            $redirect->setPath(self::DEFAULT_ACTION_PATH . 'edit', ['id' => $model->getId()]);
        } catch (Exception | CouldNotSaveException $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
            $redirect->setPath(self::DEFAULT_ACTION_PATH . 'index');
        }

        return $redirect;
    }
}
