<?php

namespace Adam\Deliverydate\Plugin\Model\Sales;

use Adam\Deliverydate\Api\Data\DeliverydateInterface;
use Klarna\Core\Api\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Api\Data\OrderSearchResultInterface;

class OrderRepositoryPlugin
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

    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterface $order
    )
    {
        $deliverydate = $this->deliverydateRepository->getByQuoteId($order->getQuoteId());
        $orderExtension = $this->orderExtensionFactory->create();
        $orderExtension->setDeliveryDate($deliverydate->getDeliveryDate());
        $order->setExtensionAttributes($orderExtension);

//        $extensionAttributes = $order->getExtensionAttributes();
//        $extensionAttributes->setDeliveryDate($deliverydate->getDeliveryDate());
//        $order->setExtensionAttributes($extensionAttributes);

    return $order;
    }
}
