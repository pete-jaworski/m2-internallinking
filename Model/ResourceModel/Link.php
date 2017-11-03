<?php
namespace PiotrJaworski\InternalLinking\Model\ResourceModel;

/**
 * Resource Model class for Link
 *
 * @author Piotr Jaworski
 */
class Link extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     * Get table name from config
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('piotrjaworski_internallinking_links', 'link_id');
    }
}
