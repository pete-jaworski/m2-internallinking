<?php
namespace PiotrJaworski\InternalLinking\Test\Unit\Model;

/**
 * LinkTest Unit Test class
 *
 * @author Piotr Jaworski
 */
class LinkTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PiotrJaworski\InternalLinking\Model\Link
     */
    protected $link;     
    
    public function setUp()
    {
        $this->objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->link = $this->objectManagerHelper->getObject('\PiotrJaworski\InternalLinking\Model\Link',
                [
                    $this->getMock('PiotrJaworski\InternalLinking\Model\ResourceModel\Link', [], [], '', false)
                ]);
    }



    public function testGetTargetsToArray()
    {
        $this->assertNotEmpty($this->link->getTargetsToArray());
        $this->assertEquals(2, count($this->link->getTargetsToArray()));        
        $this->assertEquals('_blank', $this->link->getTargetsToArray()[0]['label']); 
    }

    
    public function testGetStatusesAsLabel()
    {
        $this->assertNotEmpty($this->link->getStatusesToArray());
        $this->assertEquals(2, count($this->link->getStatusesToArray()));        
        $this->assertEquals('Disable', $this->link->getStatusesToArray()[0]['label']);
    }      

}
