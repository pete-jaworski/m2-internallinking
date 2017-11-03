<?php
namespace PiotrJaworski\InternalLinking\Model\ResourceModel\Link;

/**
 * Collection class for Link
 *
 * @author Piotr Jaworski
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Constructor
     * Configures collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PiotrJaworski\InternalLinking\Model\Link', 'PiotrJaworski\InternalLinking\Model\ResourceModel\Link');
    }
}
