<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml\Link;

/**
 * Description of Grid
 *
 * @author Piotr Jaworski
 */
class Grid extends \PiotrJaworski\InternalLinking\Controller\Adminhtml\AbstractLink
{
    /**
     * @inheritdoc
     * @throws LocalizedException
     */    
    public function execute()
    {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
