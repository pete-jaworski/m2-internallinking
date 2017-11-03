<?php
namespace PiotrJaworski\InternalLinking\Model;

/**
 * Model class for Link entity
 *
 * @author Piotr Jaworski
 */
class Link extends \Magento\Framework\Model\AbstractModel implements \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
{

    /**
     * Target option
     */    
    const TARGET_SELF = 1;

    /**
     * Target option
     */    
    const TARGET_BLANK = 2;    
    
    /**
     * Status option
     */    
    const STATUS_DISABLE = 0;

    /**
     * Status option
     */    
    const STATUS_ENABLE = 1;

    /**
     * Available Targets options
     */      
    public static $targetOptions = [
        self::TARGET_BLANK => '_blank',
        self::TARGET_SELF => '_self'
    ];
    
    /**
     * Available Statuses options
     */      
    public static $statusOptions = [
        self::STATUS_DISABLE => 'Disable',
        self::STATUS_ENABLE => 'Enable'
    ];
    

    /**
     * Initialize resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PiotrJaworski\InternalLinking\Model\ResourceModel\Link');
    }

    
    /**
     * Converts Targets to Array
     * @return array
     */    
    public static function getTargetsToArray()
    {
        $temp = array();
        foreach(self::$targetOptions as $value => $key){
            $temp[] = array('label' => $key, 'value' => $value);
        }
        return $temp;
    }

    /**
     * Converts Statuses to Array
     * @return array
     */  
    public static function getStatusesToArray()
    {
        $temp = array();
        foreach(self::$statusOptions as $value => $key){
            $temp[] = array('label' => $key, 'value' => $value);
        }
        return $temp;
    }
    
    
    /**
     * Gets Status label
     * @return string
     */      
    public function getStatusAsLabel()
    {
        return self::$statusOptions[$this->getStatus()];
    }
    
    
    /**
     * Gets Target label
     * @return string
     */    
    public function getTargetAsLabel()
    {
        return self::$targetOptions[$this->getTarget()];
    }    


    /**
     * Gets Target value By Id
     * @return string
     */    
    public static function getTargetValueById($id)
    {
        return self::$targetOptions[$id];
    }     
    

    /**
     * Get Id
     * @return int|null 
     */
    public function getId()
    {
        return $this->getData(self::LINK_ID);
    }
    
    /**
     * Get Url
     * @return string 
     */    
    public function getUrl()
    {
        return $this->getData(self::URL);
    }
    
    /**
     * Get Keyword
     * @return string 
     */      
    public function getKeyword()
    {
        return $this->getData(self::KEYWORD);
    }
    
    /**
     * Get CSS Class
     * @return string 
     */      
    public function getCssClass()
    {
        return $this->getData(self::CSS_CLASS);
    }
    
    /**
     * Get Inline Styling
     * @return string 
     */      
    public function getStyle()
    {
        return $this->getData(self::STYLE);        
    }
    
    /**
     * Get Target
     * @return int 
     */      
    public function getTarget()
    {
        return $this->getData(self::TARGET);    
    }
    
    /**
     * Get Created Time
     * @return string|null
     */      
    public function getCreated()
    {
        return $this->getData(self::CREATED); 
    }
    
    /**
     * Get Status
     * @return int
     */      
    public function getStatus()
    {
        return $this->getData(self::STATUS); 
    }
 
    /**
     * set Url
     * @param string $url
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */    
    public function setUrl($url)
    {
        return $this->setData(self::URL, $url);
    }
    
    /**
     * set Keyword
     * @param string $keyword
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */       
    public function setKeyword($keyword)
    {
        return $this->setData(self::KEYWORD, $keyword);
    }
    
    /**
     * set CSS Class
     * @param string $cssClass
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */     
    public function setCssClass($cssClass)
    {
        return $this->setData(self::CSS_CLASS, $cssClass);
    }
    
    /**
     * set Inline styling
     * @param string $style
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */      
    public function setStyle($style)
    {
        return $this->setData(self::STYLE, $style);
    }
    
    /**
     * set Target
     * @param string $target
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */       
    public function setTarget($target)
    {
        return $this->setData(self::TARGET, $target);
    }
    
    /**
     * set Status
     * @param string $status
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */       
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
    

    /**
     * Set Created Time
     * @param string $created
     * @return \PiotrJaworski\InternalLinking\Api\Data\LinkInterface
     */      
    public function setCreated($created)
    {
       return $this->setData(self::CREATED, $created);
    }
    
}

