<?php

namespace Adam\Deliverydate\Api;

use Adam\Deliverydate\Api\Data\DeliverydateInterface;

interface DeliverydateRepositoryInterface
{
    public function save(DeliverydateInterface $deliverydate): DeliverydateInterface;

    public function getById(int $id): DeliverydateInterface;

    public function getByQuoteId(int $quoteId): DeliverydateInterface;

}
