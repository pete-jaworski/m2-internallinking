<?php
namespace PiotrJaworski\InternalLinking\Helper;
 
/**
 * Manages links in description
 *
 * @author Piotr Jaworski
 */
class Replacer
{
    /**
     * Max number of links per page
     */    
    protected $linksCounter;    

    /**
     * Links allowed locations
     */    
    protected $linksLocations; 
    
    /**
     *
     * @var \PiotrJaworski\InternalLinking\Helper\LocationChecker 
     */
    protected $locationChecker;
    
    /**
     *
     * @var \PiotrJaworski\InternalLinking\Model\Cache 
     */
    protected $cache;     


    /**
     *
     * @var \PiotrJaworski\InternalLinking\Helper\LinkBuiderInterface 
     */
    protected $linkBuilder; 

    
    /**
     * Initialize Replacer Helper
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\App\Action\Context $context
     * @param \PiotrJaworski\InternalLinking\Model\Cache $cache
     * @param \PiotrJaworski\InternalLinking\Helper\LinkBuiderInterface $linkBuilder
     * @return void
     */    
    public function __construct(
            \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
            \PiotrJaworski\InternalLinking\Helper\LocationChecker $locationChecker,
            \PiotrJaworski\InternalLinking\Model\Cache $cache,
            \PiotrJaworski\InternalLinking\Helper\LinkBuilderInterface $linkBuilder
    )
    {
        $this->cache = $cache;
        $this->linkBuilder = $linkBuilder;
        $this->locationChecker = $locationChecker;
        $this->linksCounter = $scopeConfig->getValue('piotrjaworski_internallinking/general/link_counter', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) ?: 3;
        $this->linksLocations = $scopeConfig->getValue('piotrjaworski_internallinking/general/link_location', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) ?: 'catalog_product_view';
    }
    
    
    
    /**
     * Implements links to Product description
     *
     * @param string $description
     * @return string
     */     
    public function implementLinks($description)
    {
        
        if(!$this->locationChecker->isAllowed(explode(',', $this->linksLocations))){
            return $description;
        }
        
        if(!$description){
            return;
        }
        
        if(!$links = json_decode($this->cache->load(\PiotrJaworski\InternalLinking\Model\Cache::CACHE_NAME), true)){
            return $description;
        }  
        
        foreach($links as $link){
            
            if($this->linksCounter == 0){
                break;
            }
            
            if(strpos($description, $link['keyword']) > 0){
                $description = str_replace($link['keyword'], $this->linkBuilder->toHtml($link), $description);  
                $this->linksCounter--; 
                continue;
            }
        }
        
        return $description;
    }
}
