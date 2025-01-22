<?php
namespace Dheeraj\Manufacturer\Controller\Adminhtml\Manufacturer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Dheeraj\Manufacturer\Model\ManufacturerFactory;

class Edit extends Action
{
    protected $resultPageFactory;
    protected $manufacturerFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory, ManufacturerFactory $manufacturerFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->manufacturerFactory = $manufacturerFactory;
    }

    public function execute()
    {
        $manufacturerId = $this->getRequest()->getParam('id');
        $manufacturer = $this->manufacturerFactory->create();

        if ($manufacturerId) {
            $manufacturer->load($manufacturerId);
            if (!$manufacturer->getId()) {
                $this->messageManager->addErrorMessage(__('Manufacturer not found.'));
                return $this->_redirect('*/*/index');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $manufacturer->setData($data);
        }

        $this->_coreRegistry->register('current_manufacturer', $manufacturer);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Manufacturer'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dheeraj_Manufacturer::manufacturer_manage');
    }
}
