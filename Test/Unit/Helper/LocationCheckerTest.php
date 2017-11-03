<?php
namespace PiotrJaworski\InternalLinking\Test\Unit\Helper;

/**
 * LocationHelperTest Unit Test class
 *
 * @author Piotr Jaworski
 */
class LocationCheckerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Magento\Framework\View\Element\Template\Context|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $context;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;
    
    /**
     * @var ObjectManagerHelper
     */
    protected $objectManagerHelper;
    
    /**
     * @var \PiotrJaworski\InternalLinking\Helper\LocationChecker
     */
    protected $locationChecker;    

    /**
     * @var \PiotrJaworski\InternalLinking\Helper\LocationChecker
     */
    protected $helper;    



    protected function setUp() 
    {
        $this->context = $this->getMock('\Magento\Framework\App\Action\Context', [], [], '', false);
        $this->request = $this->getMock('\Magento\Framework\App\Request\Http', [], [], '', false); 
       
        $this->objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->helper = $this->objectManagerHelper->getObject(
            '\PiotrJaworski\InternalLinking\Helper\LocationChecker',
            [
                'context' => $this->context
            ]
        );       
    }



    public function testIsAllowedReturnsFalseIfEmptyArrayProvided()
    {
         $this->assertFalse($this->helper->isAllowed(array()));
    }


    /**
     * @dataProvider actionNames
     */
    public function testIsAllowedReturnAppriopriateBool($expected, $action) 
    {
        $this->context->expects($this->once())->method('getRequest')->willReturn($this->request);
        $this->request->expects($this->once())->method('getFullActionName')->willReturn('catalog_product_view');        
        $this->assertEquals($expected, $this->helper->isAllowed($action));
    }
    
    
    
    public function actionNames()
    {
        return [
            array(false,    array('catalog_catalog_view')),
            array(true,     array('catalog_product_view')),
            array(false,    array('cms_page_index')),
            array(true,     array('catalog_catalog_view', 'catalog_product_view', 'cms_page_index')),
            array(true,     array('catalog_catalog_view', 'catalog_product_view')),            
            array(false,    array('catalog_catalog_view', 'cms_page_index')),            
        ];
        
    }
    
    
    
}
