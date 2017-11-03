<?php
namespace PiotrJaworski\InternalLinking\Model\Config;

/**
 * Config for Target locations
 *
 * @author Piotr Jaworski
 */
class TargetLocation implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Target option
     */     
    const TARGET_PRODUCT_DESCRIPTION = 'catalog_product_view';

    /**
     * Target option
     */     
    const TARGET_CATEGORY_DESCRIPTION = 'catalog_category_view';
    
    /**
     * Target option
     */     
    const TARGET_PRODUCT_CMS = 'cms_page_view';    
    
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('label' => 'Product Description', 'value' => self::TARGET_PRODUCT_DESCRIPTION),
            array('label' => 'Category Description', 'value' => self::TARGET_CATEGORY_DESCRIPTION),
            array('label' => 'CMS Page', 'value' => self::TARGET_PRODUCT_CMS),            
        );
    }    
}
