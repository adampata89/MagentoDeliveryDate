<?php

namespace Adam\Deliverydate\Model;

use Adam\Deliverydate\Api\Data\DeliverydateInterface;
use Magento\Framework\Model\AbstractModel;
use Adam\Deliverydate\Model\ResourceModel\Deliverydate as ResourceModel;

class Deliverydate extends AbstractModel implements DeliverydateInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getEntityId(): int
    {
        return $this->getData(self::ID);
    }

    public function getQuoteId(): int
    {
        return $this->getData(self::QUOTE_ID);
    }

    public function setQuoteId(int $quoteId): void
    {
        $this->setData(self::QUOTE_ID, $quoteId);
    }

    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    public function setOrderId(int $orderId): void
    {
        $this->setData(self::ORDER_ID, $orderId);
    }

    public function getDeliveryDate()
    {
        return $this->getData(self::DELIVERY_DATE);
    }

    public function setDeliveryDate(string $deliveryDate): void
    {
        $this->setData(self::DELIVERY_DATE, $deliveryDate);
    }

    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    public function setComment(string $comment): void
    {
        $this->setData(self::COMMENT, $comment);
    }
}
