<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * Save Class for Link
 *
 * @author Piotr Jaworski
 */
class Save extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
{
     /**
     * @inheritdoc
     * @throws LocalizedException
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($data) {
            $model = $this->_objectManager->create('PiotrJaworski\InternalLinking\Model\Link');

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);
            $model->setCreated(date('Y-m-d H:i:s'));

            $this->_eventManager->dispatch(
                'link_prepare_save',
                ['link' => $model, 'request' => $this->getRequest()]
            );

            try {
                $model->save();
                $this->messageManager->addSuccess(__('Link has been saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                
                $this->cache->generateCache();
                
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Link.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['post_id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
        
    }
}
