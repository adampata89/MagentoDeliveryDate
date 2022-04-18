<?php

namespace Adam\Deliverydate\Api\Data;

interface DeliverydateInterface
{
    const ID = 'entity_id';
    const QUOTE_ID = 'quote_id';
    const ORDER_ID = 'order_id';
    const DELIVERY_DATE = 'delivery_date';
    const COMMENT = 'comment';

    /**
     * @return int
     */
    public function getQuoteId(): int;

    /**
     * @param int $quoteId
     * @return void
     */
    public function setQuoteId(int $quoteId): void;
    /**
     * @return int
     */
    public function getOrderId();

    /**
     * @param int $orderId
     * @return void
     */
    public function setOrderId(int $orderId): void;
    /**
     * @return string
     */
    public function getDeliveryDate();

    /**
     * @param string $deliveryDate
     * @return void
     */
    public function setDeliveryDate(string $deliveryDate): void;

    /**
     * @return string
     */
    public function getComment();

    /**
     * @param string $comment
     * @return void
     */
    public function setComment(string $comment): void;
}
