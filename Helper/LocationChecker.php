<?php
namespace PiotrJaworski\InternalLinking\Helper;

/**
 * Checks valid location
 *
 * @author Piotr Jaworski
 */
class LocationChecker
{
    /**
     *
     * @var \Magento\Framework\App\Action\Context 
     */
    protected $context;
    
    /**
     * Initialize LocationChecker Helper
     * @param \Magento\Framework\App\Action\Context $context
     * @return void
     */    
    public function __construct(\Magento\Framework\App\Action\Context $context)
    {
        $this->context = $context;
    }

    
     /**
     * Check if it is valid location
     * @param array $locations
     * @return bool
     */    
    public function isAllowed(array $locations)
    {
        if(!$locations){
            return false;
        }
        return in_array($this->context->getRequest()->getFullActionName(), $locations);
    }
}
