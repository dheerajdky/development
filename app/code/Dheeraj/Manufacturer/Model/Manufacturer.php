<?php
namespace Dheeraj\Manufacturer\Model;

use Magento\Framework\Model\AbstractModel;
use Dheeraj\Manufacturer\Model\ResourceModel\Manufacturer as ManufacturerResource;

class Manufacturer extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ManufacturerResource::class);
    }
}
