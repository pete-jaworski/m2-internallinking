<?php
namespace PiotrJaworski\InternalLinking\Api\Data;

/**
 * Interface for Link search.
 * @api
 *
 * @author Piotr Jaworski
 */
interface LinkSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface[]
     */
    public function getItems();
    
    /**
     * Set blocks list.
     *
     * @param \PiotrJaworski\InternalLinking\Api\Data\LinkInterface[] $items
     * @return $this
     */
    public function setItems(array $items);     
}
