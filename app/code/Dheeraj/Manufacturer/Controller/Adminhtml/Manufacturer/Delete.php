<?php
namespace Dheeraj\Manufacturer\Controller\Adminhtml\Manufacturer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Dheeraj\Manufacturer\Model\ManufacturerFactory;

class Delete extends Action
{
    protected $manufacturerFactory;

    public function __construct(Context $context, ManufacturerFactory $manufacturerFactory)
    {
        parent::__construct($context);
        $this->manufacturerFactory = $manufacturerFactory;
    }

    public function execute()
    {
        $manufacturerId = $this->getRequest()->getParam('id');
        if ($manufacturerId) {
            try {
                $manufacturer = $this->manufacturerFactory->create()->load($manufacturerId);
                $manufacturer->delete();
                $this->messageManager->addSuccessMessage(__('Manufacturer has been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error occurred while deleting manufacturer.'));
            }
        }
        $this->_redirect('*/*/index');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dheeraj_Manufacturer::manufacturer_manage');
    }
}
