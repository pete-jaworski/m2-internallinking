<?php
namespace PiotrJaworski\InternalLinking\Test\Unit\Helper;

/**
 * LinkBuilderTest Unit Test class
 *
 * @author Piotr Jaworski
 */
class LinkBuilderTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @var ObjectManagerHelper
     */
    protected $objectManagerHelper;

    
    /**
     * @var \PiotrJaworski\InternalLinking\Helper\LinkBuilder
     */
    protected $helper;     
    
    
    
    protected function setUp() 
    {
        $this->objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->helper = $this->objectManagerHelper->getObject('\PiotrJaworski\InternalLinking\Helper\LinkBuilder');       
    }
    
    
    
    
    public function testToHtmlReturnCorrectHTMLLink()
    {
        $link = array(
            'url' => 'http://www.magento.com',
            'keyword' => 'magento',
            'css_class' => '',
            'style' => 'border:1px solid red',
            'target' => 2,
            'status' => 1            
        );
        
        $this->assertEquals("<a href='http://www.magento.com'  style='border:1px solid red' target='_blank' title='magento'>magento</a>", $this->helper->toHtml($link));
    }


    public function testToHtmlReturnRawKeyword()
    {
        $link = array(
            'url' => '',
            'keyword' => 'magento',
            'css_class' => '',
            'style' => 'border:1px solid red',
            'target' => 2,
            'status' => 1            
        );
        
        $this->assertEquals("magento", $this->helper->toHtml($link));
    }    
    

    
    
    public function testToHtmlNotContainStyle()
    {
        $link = array(
            'url' => 'http://www.magento.com',
            'keyword' => 'magento',
            'css_class' => '',
            'style' => '',
            'target' => 2,
            'status' => 1            
        );
        
        $this->assertEquals("<a href='http://www.magento.com'   target='_blank' title='magento'>magento</a>", $this->helper->toHtml($link));
    }
    

}
