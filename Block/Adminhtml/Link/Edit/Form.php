<?php
namespace PiotrJaworski\InternalLinking\Block\Adminhtml\Link\Edit;

/**
 * Form class for Link
 *
 * @author Piotr Jaworski
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     *
     * @var \Magento\Framework\Registry 
     */
    protected $registry;     

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('link_form');
        $this->setTitle(__('Link Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $model = $this->registry->registry('internal_link');

        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('link_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField(
                    'link_id', 
                    'hidden', 
                    ['name' => 'link_id']
            );
        }

        $fieldset->addField(
            'url',
            'text',
            ['name' => 'url', 'label' => __('URL'), 'title' => __('URL'), 'required' => true]
        );

        $fieldset->addField(
            'keyword',
            'text',
            ['name' => 'keyword', 'label' => __('Keyword'), 'title' => __('Keyword'), 'required' => true]
        );        
        
        $fieldset->addField(
            'cssClass',
            'text',
            ['name' => 'cssClass', 'label' => __('CSS Class'), 'title' => __('CSS Class'), 'required' => false]
        );    
        
        $fieldset->addField(
            'style',
            'text',
            ['name' => 'style', 'label' => __('Inline Style'), 'title' => __('Inline Style'), 'required' => false]
        );           
        
        $fieldset->addField(
            'target',
            'select',
            ['name' => 'target', 'label' => __('Target'), 'title' => __('Target'), 'required' => true, 'options' => \PiotrJaworski\InternalLinking\Model\Link::$targetOptions]
        );         
        
        $fieldset->addField(
            'status',
            'select',
            ['name' => 'status', 'label' => __('Status'), 'title' => __('Status'), 'required' => true, 'options' => \PiotrJaworski\InternalLinking\Model\Link::$statusOptions]
        );   
        
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
