<?php
namespace Dheeraj\Manufacturer\Controller\Adminhtml\Manufacturer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        if (!$this->_formKeyValidator->validate($this->getRequest())) {
            $this->messageManager->addErrorMessage(__('Invalid form key. Please refresh the page.'));
            return $this->_redirect('*/*/index');
        }

        // Continue with form submission logic here

        // Example: Saving manufacturer data
        $postData = $this->getRequest()->getPostValue();
        if ($postData) {
            try {
                // Your saving logic here
                $this->messageManager->addSuccessMessage(__('Manufacturer saved successfully.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }

        return $this->_redirect('*/*/index');
    }
}
