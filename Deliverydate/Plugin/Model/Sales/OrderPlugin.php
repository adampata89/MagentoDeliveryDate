<?php

namespace Adam\Deliverydate\Plugin\Model\Sales;

use Magento\Sales\Model\Order;

class OrderPlugin
{
    private \Adam\Deliverydate\Api\DeliverydateRepositoryInterface $deliverydateRepository;
    private \Magento\Sales\Api\Data\OrderExtensionFactory $orderExtensionFactory;

    public function __construct(
        \Adam\Deliverydate\Api\DeliverydateRepositoryInterface $deliverydateRepository,
        \Magento\Sales\Api\Data\OrderExtensionFactory $orderExtensionFactory
    )
    {
        $this->deliverydateRepository = $deliverydateRepository;
        $this->orderExtensionFactory = $orderExtensionFactory;
    }

    public function afterLoad(Order $order, $result){

        $deliverydate = $this->deliverydateRepository->getByQuoteId($order->getQuoteId());
        $orderExtension = $this->orderExtensionFactory->create();
        $orderExtension->setDeliveryDate(explode(' ', $deliverydate->getDeliveryDate())[0]);
        $result->setExtensionAttributes($orderExtension);
        return $result;
    }

}
