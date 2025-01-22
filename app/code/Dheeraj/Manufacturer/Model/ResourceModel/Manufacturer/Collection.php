<?php
namespace Dheeraj\Manufacturer\Model\ResourceModel\Manufacturer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Dheeraj\Manufacturer\Model\Manufacturer;
use Dheeraj\Manufacturer\Model\ResourceModel\Manufacturer as ManufacturerResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'manufacturer_id';
    protected $_eventPrefix = 'dheeraj_manufacturer_collection';
    protected $_eventObject = 'manufacturer_collection';

    protected function _construct()
    {
        $this->_init(Manufacturer::class, ManufacturerResource::class);
    }
}
