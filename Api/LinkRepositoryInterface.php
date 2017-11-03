<?php
namespace PiotrJaworski\InternalLinking\Api;

/**
 * Link Entity CRUD interface.
 * @api
 *
 * @author Piotr Jaworski
 */
interface LinkRepositoryInterface
{
    
    /**
     * Save Link
     * 
     * @param \PiotrJaworski\InternalLinking\Api\Data\LinkInterface $link
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     * $throws \Magento\Framework\Exception\CouldNotSaveException 
     */
    public function save(Data\LinkInterface $link);
    
    
    /**
     * Get Link by Id
     * 
     * @param int $id
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     * $throws \Magento\Framework\Exception\LocalizedException 
     */
    public function getById($id);
    
    
    /**
     * Retrieve links matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */    
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    
    /**
     * Delete Link by id
     * 
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
    
    
    /**
     * Delete Link 
     * 
     * @param \PiotrJaworski\InternalLinking\Api\Data\LinkInterface $link
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\LinkInterface $link);    
    
}
