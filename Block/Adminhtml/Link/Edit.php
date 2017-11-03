<?php
namespace PiotrJaworski\InternalLinking\Block\Adminhtml\Link;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     *
     * @var \Magento\Framework\Registry 
     */
    protected $registry; 

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize blog post edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'PiotrJaworski_InternalLinking';
        $this->_controller = 'adminhtml_link';

        parent::_construct();

        
        if ($this->_isAllowedAction('PiotrJaworski_InternalLinking::all')) {
            $this->buttonList->update('save', 'label', __('Save Link'));
            $this->buttonList->remove('reset');
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

    }

    
    
    /**
     * Retrieve text for header element depending on loaded post
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->registry->registry('internal_link')->getId()) {
            return __("Edit Link '%1'", $this->escapeHtml($this->registry->registry('internal_link')->getTitle()));
        } else {
            return __('New Link');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('internalLinking/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
