<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * NewAction Controller class
 *
 * @author Piotr Jaworski
 */
class NewAction extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
{
    /**
     * Redirect to Edit form
     * 
     * @return \Magento\Backend\Model\View\Result\ForwardFactory
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
    
}
