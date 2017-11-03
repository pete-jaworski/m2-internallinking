<?php
namespace PiotrJaworski\InternalLinking\Block\Adminhtml;

/**
 * Adminhtml Link block
 *
 * @author Piotr Jaworski
 */
class Link extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'PiotrJaworski_InternalLinking';
        $this->_controller = 'adminhtml_link';
        $this->_addButtonLabel = __('Add New Link');
        parent::_construct();
    }
}
