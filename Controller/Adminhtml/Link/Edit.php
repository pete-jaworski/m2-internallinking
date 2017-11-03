<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * Edit Class for Link Controllers
 *
 * @author Piotr Jaworski
 */
class Edit extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
{
    

    /**
     * Initialize Controller
     * @return $this
     */
    protected function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('PiotrJaworski_InternalLinking::links_manage')
            ->addBreadcrumb(__('Internal Linking'), __('Internal Linking'))
            ->addBreadcrumb(__('Edit Link'), __('Edit Link'));
        return $resultPage;
    }    
    
    
    
    /**
     * @inheritdoc
     * @throws LocalizedException
     */
    public function execute()
    {
        $linkId = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('PiotrJaworski\InternalLinking\Model\Link');
        
        if($linkId){
            $model->load($linkId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Link no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }            
        }
        
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        
        if (!empty($data)) {
            $model->setData($data);
        }        
        
        $this->registry->register('internal_link', $model);
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Link'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Link') : __('New Link'));
        return $resultPage;        
    }
}
