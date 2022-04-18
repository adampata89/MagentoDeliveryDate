<?php
namespace Adam\Deliverydate\Model\ResourceModel\Deliverydate;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Adam\Deliverydate\Model\Car as Model;
use Adam\Deliverydate\Model\ResourceModel\Deliverydate as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
