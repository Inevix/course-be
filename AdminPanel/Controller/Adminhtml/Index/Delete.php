<?php
namespace Overdose\AdminPanel\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Delete extends AbstractController
{
    /**
     * Figure out how to redirect an admin user to this controller with the id/*some_id_number_here*,
     * so that this controller can delete the 'friend' record by 'id' in the url.
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        $id = $this->getRequest()->getParam('id', null);

        if ($id) {
            try {
                // TODO: Implement deleting of existing record.
                // TODO: Huh, looks like all those repositories and/or resourceModels can come in handy here.
                // TODO: go see vendor/magento/module-cms/Controller/Adminhtml/Page/Delete.php::execute() for an example

                $this->messageManager->addSuccessMessage(__("Yay. You have deleted a friend!!"));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__("Was unable to delete your friend. =("));
            }
        }

        $redirect->setPath(self::DEFAULT_ACTION_PATH . 'index');
        return $redirect;
    }
}
