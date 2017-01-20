<?php

namespace Dotdigitalgroup\Email\Block\Adminhtml\Config\Developer;

class Resetorders extends \Magento\Config\Block\System\Config\Form\Field
{

    /**
     * @var string
     */
    public $buttonLabel = 'Run Now';

    /**
     * @param $buttonLabel
     *
     * @return $this
     */
    public function setButtonLabel($buttonLabel)
    {
        $this->buttonLabel = $buttonLabel;

        return $this;
    }

    /**
     * Get the button and scripts contents.
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     * @codingStandardsIgnoreStart
     */
    public function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        //@codingStandardsIgnoreEnd
        $query = [
            '_query' => array(
                'refresh_data_from' => '',
                'refresh_data_to' => '',
                'tmp' => ''
            )
        ];
        $url = $this->_urlBuilder->getUrl('dotdigitalgroup_email/run/ordersreset', $query);

        return $this->getLayout()
            ->createBlock('Magento\Backend\Block\Widget\Button')
            ->setType('button')
            ->setId($element->getId())
            ->setLabel(__($this->buttonLabel))
            ->setOnClick("window.location.href='" . $url . "'")
            ->toHtml();
    }
}
