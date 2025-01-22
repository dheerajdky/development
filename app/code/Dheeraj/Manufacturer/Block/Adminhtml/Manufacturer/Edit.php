<?php
namespace Dheeraj\Manufacturer\Block\Adminhtml\Manufacturer;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Dheeraj_Manufacturer';
        $this->_controller = 'adminhtml_manufacturer';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Manufacturer'));
        $this->buttonList->update('delete', 'label', __('Delete Manufacturer'));
    }

    public function getHeaderText()
    {
        $manufacturerId = $this->getRequest()->getParam('id');
        if ($manufacturerId) {
            return __('Edit Manufacturer');
        } else {
            return __('New Manufacturer');
        }
    }
}
