<?php

namespace Adam\Deliverydate\Plugin\Model\Checkout;

use Adam\Deliverydate\Api\Data\DeliverydateInterface;

class ShippingInformationManagementPlugin
{

    protected \Magento\Quote\Model\QuoteRepository $quoteRepository;
    protected \Adam\Deliverydate\Api\DeliverydateRepositoryInterface $deliverydateRepository;
    private \Adam\Deliverydate\Api\Data\DeliverydateInterfaceFactory $deliverydateInterfaceFactory;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     */
    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Adam\Deliverydate\Api\DeliverydateRepositoryInterface $deliverydateRepository,
        \Adam\Deliverydate\Api\Data\DeliverydateInterfaceFactory $deliverydateInterfaceFactory
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->deliverydateRepository = $deliverydateRepository;
        $this->deliverydateInterfaceFactory = $deliverydateInterfaceFactory;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        try {
            $extAttributes = $addressInformation->getExtensionAttributes();
            $deliveryDate = $extAttributes->getDeliveryDate();
            $quote = $this->quoteRepository->getActive($cartId);


            /** @var DeliverydateInterface $deliverydateData */
            $deliverydateData = $this->deliverydateInterfaceFactory->create();
            $deliverydateData->setDeliveryDate($deliveryDate);
            $deliverydateData->setQuoteId($quote->getId());
            $this->deliverydateRepository->save($deliverydateData);
        } catch (\Exception $exception) {
            $a =1;
            return;
        }

    }
}
