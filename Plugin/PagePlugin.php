<?php
namespace PiotrJaworski\InternalLinking\Plugin;

/**
 * Plugin for Page Repository
 *
 * @author Piotr Jaworski
 */
class PagePlugin
{
    
    /**
     * Replacer Helper
     *
     * @var \PiotrJaworski\InternalLinking\Helper\Replacer
     */    
    protected $replacer = null;
    
    
    /**
     * Initialize dependencies.
     *
     * @param \PiotrJaworski\InternalLinking\Helper\Replacer $replacer
     */    
    public function __construct(\PiotrJaworski\InternalLinking\Helper\Replacer $replacer)
    {
        $this->replacer = $replacer;
    }
    
    
    /**
     * Implements links to Page content
     *
     * @param \Magento\Cms\Model\PageRepository $subject
     * @param \Magento\Cms\Model $result 
     * @return \Magento\Cms\Model\Page
     */    
    public function afterGetContent(\Magento\Cms\Api\Data\PageInterface $page, $result)
    {
        return $this->replacer->implementLinks($result);
    }
 
}
