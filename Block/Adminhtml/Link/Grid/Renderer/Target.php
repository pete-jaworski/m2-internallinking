<?php
namespace PiotrJaworski\InternalLinking\Block\Adminhtml\Link\Grid\Renderer;

/**
 * Target Renderer class
 *
 * @author Piotr Jaworski
 */
class Target extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    
    /**
     *
     * @var \PiotrJaworski\InternalLinking\Api\LinkRepositoryInterface
     */
    protected $linkRepository;



    /**
     * Initializes
     * 
     * @param \Magento\Backend\Block\Context $context
     * @param \PiotrJaworski\InternalLinking\Api\LinkRepositoryInterface $linkRepository
     */
    public function __construct
    (
        \Magento\Backend\Block\Context $context,
        \PiotrJaworski\InternalLinking\Api\LinkRepositoryInterface $linkRepository,
        array $data = []            
    )
    {
        $this->linkRepository = $linkRepository;
        parent::__construct($context, $data);
        
    }
    
    /**
     * Renders Options
     * 
     * @param \Magento\Framework\DataObject $row
     * @return array
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $link = $this->linkRepository->getById($row->getId());
        if($link && $link->getId()){
            return $link->getTargetAsLabel();
        }
    }
    
}
