<?php

namespace Adam\Deliverydate\Model\Observer;

use Adam\Deliverydate\Api\DeliverydateRepositoryInterface;
use Adam\Deliverydate\Model\ResourceModel\Deliverydate;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class SaveDeliveryDateToOrderObserver implements ObserverInterface
{

    private DeliverydateRepositoryInterface $deliverydateRepository;

    public function __construct(
        DeliverydateRepositoryInterface $deliverydateRepository
    )
    {
        $this->deliverydateRepository = $deliverydateRepository;
    }

    public function execute(EventObserver $observer)
    {
        /**
         * @var $order \Magento\Sales\Model\Order;
         */
        $order = $observer->getOrder();
        $quote = $observer->getQuote();

        try {
            $deliverydate = $this->deliverydateRepository->getByQuoteId($quote->getEntityId());
            $deliverydate->setOrderId($order->getEntityId());
            $this->deliverydateRepository->save($deliverydate);
        } catch (\Exception $exception) {

        }

        return $this;
    }
}
