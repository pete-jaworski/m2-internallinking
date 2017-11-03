<?php
namespace PiotrJaworski\InternalLinking\Model\Link\Grid;

/**
 * Status options array
 *
 * @author Piotr Jaworski
 */
class Status implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Converts target options to array
     * 
     * @return array
     */
    public function toOptionArray()
    {
        return \PiotrJaworski\InternalLinking\Model\Link::getStatusesToArray();
    }
}
