<?php
namespace PiotrJaworski\InternalLinking\Plugin;

/**
 * Plugin for Product Repository
 *  
 * @author Piotr Jaworski
 */
class ProductPlugin
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
     * Implements links to Product description
     *
     * @param \Magento\Catalog\Model\ProductRepository $subject
     * @param \Magento\Catalog\Model\Product $result 
     * @return \Magento\Catalog\Model\Product
     */    
    public function afterGetById(\Magento\Catalog\Model\ProductRepository $subject, $result)
    {
        return $result->setDescription($this->replacer->implementLinks($result->getDescription()));
    }
    
    
    /**
     * Implements links to Product description
     *
     * @param \Magento\Catalog\Model\ProductRepository $subject
     * @param \Magento\Catalog\Model\Product $result 
     * @return \Magento\Catalog\Model\Product
     */    
    public function afterGet(\Magento\Catalog\Model\ProductRepository $subject, $result)
    {
        return $result->setDescription($this->replacer->implementLinks($result->getDescription()));
    }    
    
}
