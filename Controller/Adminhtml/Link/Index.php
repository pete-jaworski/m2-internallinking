<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * Index Class for Link Controllers
 *
 * @author Piotr Jaworski
 */
class Index extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
{
    
    /**
     * @inheritdoc
     * @throws LocalizedException
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $resultForward = $this->resultForwardFactory->create();
            $resultForward->forward('grid');
            return $resultForward;
        }
        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('PiotrJaworski_InternalLinking::links_manage');
        $resultPage->getConfig()->getTitle()->prepend(__('Links'));
        $resultPage->addBreadcrumb(__('Links'), __('Links'));
        $resultPage->addBreadcrumb(__('Manage Links'), __('Manage Links'));
        return $resultPage;
    }
}
