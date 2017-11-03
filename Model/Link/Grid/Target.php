<?php
namespace PiotrJaworski\InternalLinking\Model\Link\Grid;

/**
 * Target options array
 *
 * @author Piotr Jaworski
 */
class Target implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Converts target options to array
     * 
     * @return array
     */
    public function toOptionArray()
    {
        return \PiotrJaworski\InternalLinking\Model\Link::getTargetsToArray();
    }
}