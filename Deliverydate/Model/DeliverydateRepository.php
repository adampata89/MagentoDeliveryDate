<?php

namespace Adam\Deliverydate\Model;

use Adam\Deliverydate\Api\Data\DeliverydateInterface;
use Adam\Deliverydate\Api\DeliverydateRepositoryInterface;

class DeliverydateRepository implements DeliverydateRepositoryInterface
{
    private \Adam\Deliverydate\Model\DeliverydateFactory $deliverydateFactory;

    private \Adam\Deliverydate\Api\Data\DeliverydateInterfaceFactory $deliverydateInterfaceFactory;

    private \Adam\Deliverydate\Model\ResourceModel\Deliverydate $deliverydateResourceModel;

    /**
     * @param DeliverydateFactory $deliverydateFactory
     * @param \Adam\Deliverydate\Api\Data\DeliverydateInterfaceFactory $deliverydateInterfaceFactory
     * @param ResourceModel\Deliverydate $deliverydateResourceModel
     */
    public function __construct(
        \Adam\Deliverydate\Model\DeliverydateFactory $deliverydateFactory,
        \Adam\Deliverydate\Api\Data\DeliverydateInterfaceFactory $deliverydateInterfaceFactory,
        \Adam\Deliverydate\Model\ResourceModel\Deliverydate $deliverydateResourceModel
    )
    {

        $this->deliverydateFactory = $deliverydateFactory;
        $this->deliverydateInterfaceFactory = $deliverydateInterfaceFactory;
        $this->deliverydateResourceModel = $deliverydateResourceModel;
    }

    /**
     * @param DeliverydateInterface $deliverydate
     * @return DeliverydateInterface
     * @throws \Exception
     */
    public function save(DeliverydateInterface $deliverydate): DeliverydateInterface
    {
        try {
            $this->deliverydateResourceModel->save($deliverydate);
        } catch (\Exception $e) {
            Throw new \Exception($e->getMessage());
        }

        return $deliverydate;
    }

    public function getById(int $id): DeliverydateInterface
    {
        $deliveryDate = $this->deliverydateFactory->create();
        $this->deliverydateResourceModel->load($deliveryDate, $id);

        return $deliveryDate;
    }

    /**
     * @param int $quoteId
     * @return DeliverydateInterface
     */
    public function getByQuoteId(int $quoteId): DeliverydateInterface
    {
        $deliveryDate = $this->deliverydateFactory->create();

        $this->deliverydateResourceModel->load($deliveryDate, $quoteId, 'quote_id');

        return $deliveryDate;
    }
}
