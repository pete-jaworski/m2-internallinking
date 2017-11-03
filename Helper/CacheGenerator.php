<?php
namespace PiotrJaworski\InternalLinking\Helper;

/**
 * CacheGenerator class
 *
 * @author Piotr Jaworski
 */
class CacheGenerator
{
    
    /**
     * @var \PiotrJaworski\InternalLinking\Api\Link RepositoryInterface
     */
    private $linkRepository;
    
    
    /**
     *
     * @var \PiotrJaworski\InternalLinking\Model\Cache 
     */
    protected $cache;      

    
    /**
     *
     * @var \Magento\Framework\Api\SearchCriteriaBuilder 
     */
    protected $searchCriteriaBuilder;
    
    

    /**
     * Constructor
     * 
     * @param \PiotrJaworski\InternalLinking\Api\LinkRepositoryInterface $linkRepository
     * @param \PiotrJaworski\InternalLinking\Model\Cache $cache
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \PiotrJaworski\InternalLinking\Api\LinkRepositoryInterface $linkRepository,
        \PiotrJaworski\InternalLinking\Model\Cache $cache,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder             
    )
    {
        $this->linkRepository = $linkRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->cache = $cache;
    }



    
    
    /**
     * Regenerate Internal Links Cache
     * 
     */
    public function generateCache() 
    {
        $temp = array();
        
        $this->searchCriteriaBuilder->addFilter('status', \PiotrJaworski\InternalLinking\Model\Link::STATUS_ENABLE, 'eq');
        $searchCriteria = $this->searchCriteriaBuilder->create();
        
        foreach($this->linkRepository->getList($searchCriteria)->getItems() as $link){
            $temp[$link['keyword']] = $link;
        }
        
        return $this->cache->save(json_encode($temp), \PiotrJaworski\InternalLinking\Model\Cache::CACHE_NAME);
    }
}
