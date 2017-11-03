<?php
namespace PiotrJaworski\InternalLinking\Plugin;

/**
 * Plugin for Category Repository
 *
 * @author Piotr Jaworski
 */
class CategoryPlugin
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
     * Implements links to Category description
     *
     * @param \Magento\Catalog\Model\CategoryRepository $subject
     * @param \Magento\Catalog\Model\Category $result 
     * @return \Magento\Catalog\Model\Category
     */    
    public function afterGetById(\Magento\Catalog\Model\CategoryRepository $subject, $result)
    {
        return $result->setDescription($this->replacer->implementLinks($result->getDescription()));
    }
    
    
    /**
     * Implements links to Category description
     *
     * @param \Magento\Catalog\Model\CategoryRepository $subject
     * @param \Magento\Catalog\Model\Category $result 
     * @return \Magento\Catalog\Model\Category
     */    
    public function afterGet(\Magento\Catalog\Model\CategoryRepository $subject, $result)
    {
        return $result->setDescription($this->replacer->implementLinks($result->getDescription()));
    }    
}
