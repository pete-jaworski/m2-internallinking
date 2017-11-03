<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * Delete Class for Link
 *
 * @author Piotr Jaworski
 */
class Delete extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
{
    
    /**
     * @inheritdoc
     * @throws LocalizedException
     */
    public function execute()
    {
        $linkId = $this->getRequest()->getParam('id');
        
        try {
                $model = $this->_objectManager->create('PiotrJaworski\InternalLinking\Model\Link');
                $model->load($linkId);
                $model->delete();
                $this->cache->generateCache();
                $this->messageManager->addSuccess(__('Link has been deleted.'));
                
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            
        } catch (\Exception $ex) {
            
                $this->messageManager->addError($ex->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $linkId]);
        }
    }
}
