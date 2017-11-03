<?php
namespace PiotrJaworski\InternalLinking\Model;

/**
 * Cache for Internal Linking
 *
 * @author Piotr Jaworski
 */
class Cache extends \Magento\Framework\Cache\Frontend\Decorator\TagScope
{
    /**
     * Cache Identifier
     */
    const TYPE_IDNETIFIER = 'internallinking_cache';
    
    /**
     * Cache Tag
     */
    const CACHE_TAG = 'INTERNAL_LINKING';

    /**
     * Cache Tag
     */
    const CACHE_NAME = 'internal_links';
    
    /**
     * Constructor
     * 
     * @param \Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool
     */
    public function __construct(
            \Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool        
    )
    {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDNETIFIER), self::CACHE_TAG);
    }
   
}

