<?php
namespace PiotrJaworski\InternalLinking\Controller\Adminhtml;

/**
 * Abstract Link Class for Link Controllers
 *
 * @author Piotr Jaworski
 */
abstract class AbstractLink extends \Magento\Backend\App\Action
{
    
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'PiotrJaworski_InternalLinking::all';

    /**
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    
    /**
     *
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;
    
    /**
     *
     * @var \Magento\Framework\Controller\Result\RedirectFactory 
     */
    protected $resultRedirectFactory;
    
    /**
     *
     * @var \Magento\Framework\Registry 
     */
    protected $registry;    

    /**
     *
     * @var \PiotrJaworski\InternalLinking\Model\Cache 
     */
    protected $cache;    
    
    /**
     * Constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Framework\Registry $registry
     * @param \PiotrJaworski\InternalLinking\Helper\CacheGenerator $cache
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\Registry $registry,
        \PiotrJaworski\InternalLinking\Helper\CacheGenerator $cache
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->registry = $registry;
        $this->resultRedirectFactory = $context->getResultRedirectFactory();
        $this->cache = $cache;
        parent::__construct($context, $this->registry );
    }
    
    
    /**
     * Check access permission
     * 
     * @return bool true|false
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
    
    
    /**
     * Initialize Controller
     * @return $this
     */
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'PiotrJaworski_InternalLinking::links_manage'
        )->_addBreadcrumb(
            __('Internal Linking'),
            __('Links')
        );
        return $this;
    }
    
}
