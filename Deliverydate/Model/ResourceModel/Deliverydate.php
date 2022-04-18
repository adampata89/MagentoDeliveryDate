<?php

namespace Adam\Deliverydate\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Deliverydate extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('delivery_date', 'entity_id');
    }
}
