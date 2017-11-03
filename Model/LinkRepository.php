<?php
namespace PiotrJaworski\InternalLinking\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

/**
 * Link Repository class for Link entity
 *
 * @author Piotr Jaworski
 */
class LinkRepository implements \PiotrJaworski\InternalLinking\Api\LinkRepositoryInterface
{
     
    /**
     * @var \PiotrJaworski\InternalLinking\Model\ResourceModel\Link
     */
    private $link;
   
    /**
     * @var \PiotrJaworski\InternalLinking\Model\LinkFactory
     */
    private $linkFactory;    

    /**
     * @var \PiotrJaworski\InternalLinking\Api\Data\LinkSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;    
    
    /**
     * @var \PiotrJaworski\InternalLinking\Model\ResourceModel\Link
     */
    protected $linkCollectionFactory;  
    
    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;
    /**
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;    

    /**
     * @param \PiotrJaworski\InternalLinking\Model\ResourceModel\Link $storeManager
     * @param \PiotrJaworski\InternalLinking\Api\Data\LinkSearchResultsInterfaceFactory $searchResultsFactory
     * @param \PiotrJaworski\InternalLinking\Model\LinkFactory $storeManager     * 
     */    
    public function __construct(
        \PiotrJaworski\InternalLinking\Model\ResourceModel\Link $link,
        \PiotrJaworski\InternalLinking\Api\Data\LinkSearchResultsInterfaceFactory $searchResultsFactory,   
        \PiotrJaworski\InternalLinking\Model\ResourceModel\Link\CollectionFactory $linkCollectionFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \PiotrJaworski\InternalLinking\Model\LinkFactory $linkFactory           
    )
    {
        $this->link = $link;
        $this->linkFactory = $linkFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->linkCollectionFactory = $linkCollectionFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        
    }
    
    
    /**
     * Save Link
     * 
     * @param \PiotrJaworski\InternalLinking\Api\Data\LinkInterface $link
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     * $throws \Magento\Framework\Exception\CouldNotSaveException 
     */
    public function save(\PiotrJaworski\InternalLinking\Api\Data\LinkInterface $link)
    {
        try {
            $this->link->save($link);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $link;
    }
    
    
    /**
     * Get Link by Id
     * 
     * @param int $id
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     * $throws \Magento\Framework\Exception\NoSuchEntityException 
     */
    public function getById($id)
    {
        $link = $this->linkFactory->create();
        $this->link->load($link, $id); 
        
        if(!$link->getId()){
            throw new NoSuchEntityException(__('Link with id "%1" does not exist.', $id));
        }
        return $link;
    }
    
    
    /**
     * Retrieve links matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */    
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        
        $collection = $this->linkCollectionFactory->create();
        
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        
        $links = [];
        
        foreach ($collection as $linkModel) {
            $linkData = $this->linkFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $linkData,
                $linkModel->getData(),
                'PiotrJaworski\InternalLinking\Api\Data\LinkInterface'
            );
            $links[] = $this->dataObjectProcessor->buildOutputDataArray(
                $linkData,
                'PiotrJaworski\InternalLinking\Api\Data\LinkInterface'
            );
        }
        $searchResults->setItems($links);
        return $searchResults;        
    }

    
    /**
     * Delete Link by id
     * 
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }
    
    
    /**
     * Delete Link 
     * 
     * @param \PiotrJaworski\InternalLinking\Api\Data\LinkInterface $link
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\PiotrJaworski\InternalLinking\Api\Data\LinkInterface $link)
    {
        try {
            $this->link->delete($link);
        } catch (\Exception $ex) {
            throw new \Magento\Framework\Exception\CouldNotDeleteException(__($ex->getMessage()));
        }
    }
}
