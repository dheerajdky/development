<?php
namespace Dheeraj\Manufacturer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Manufacturer extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('dheeraj_manufacturer', 'manufacturer_id');
    }
}
