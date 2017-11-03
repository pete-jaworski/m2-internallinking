<?php
namespace PiotrJaworski\InternalLinking\Api\Data;

/**
 * Link interface
 * 
 * @api
 * @author Piotr Jaworski
 */
interface LinkInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const LINK_ID                  = 'link_id';
    const URL                      = 'url';
    const KEYWORD                  = 'keyword';
    const CSS_CLASS                = 'cssClass';
    const STYLE             = 'style';
    const TARGET                   = 'target';
    const CREATED                  = 'created_at';
    const STATUS                   = 'status';
    /**#@-*/    
    
    
    /**
     * Get Id
     * @return int|null 
     */
    public function getId();
    
    /**
     * Get Url
     * @return string 
     */    
    public function getUrl();
    
    /**
     * Get Keyword
     * @return string 
     */      
    public function getKeyword();
    
    /**
     * Get CSS Class
     * @return string 
     */      
    public function getCssClass();
    
    /**
     * Get Inline Styling
     * @return string 
     */      
    public function getStyle();
    
    /**
     * Get Target
     * @return int 
     */      
    public function getTarget();
    
    /**
     * Get Created Time
     * @return string|null
     */      
    public function getCreated();
    
    /**
     * Get Status
     * @return int
     */      
    public function getStatus();    
 
    /**
     * set Url
     * @param string $url
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */    
    public function setUrl($url);
    
    /**
     * set Keyword
     * @param string $keyword
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */       
    public function setKeyword($keyword);
    
    /**
     * set CSS Class
     * @param string $cssClass
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */     
    public function setCssClass($cssClass);
    
    /**
     * set Inline styling
     * @param string $style
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */      
    public function setStyle($style);
    
    /**
     * set Target
     * @param string $target
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */       
    public function setTarget($target);
    
    /**
     * set Status
     * @param string $status
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */       
    public function setStatus($status);   

    /**
     * Set Created Time
     * @param string $created
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */      
    public function setCreated($created);    
    
}
