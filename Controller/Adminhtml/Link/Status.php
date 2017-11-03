<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * Description of ChangeStatus
 *
 * @author Piotr Jaworski
 */
class Status extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
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
                $message = '';
                
                if($model->getStatus() == \PiotrJaworski\InternalLinking\Model\Link::STATUS_ENABLE){
                    $model->setStatus(\PiotrJaworski\InternalLinking\Model\Link::STATUS_DISABLE);
                    $message = ' disabled';
                } else {
                    $model->setStatus(\PiotrJaworski\InternalLinking\Model\Link::STATUS_ENABLE);
                    $message = ' enabled';
                }
                
                $this->cache->generateCache();
                
                $model->save();
                $this->cache->generateCache();
                $this->messageManager->addSuccess(__('Link has been '.$message));
                
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            
        } catch (\Exception $ex) {
            
                $this->messageManager->addError($ex->getMessage());
                return $resultRedirect->setPath('*/*/', ['id' => $linkId]);
        }
    }
}
