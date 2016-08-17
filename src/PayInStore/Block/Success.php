<?php
namespace MageSchool\PayInStore\Block;

use Magento\Framework\View\Element\Template;
use \Magento\Checkout\Model\Session;

class Success extends Template
{

    /**
     * @var Session
     */
    private $checkoutSession;

    public function __construct(
        Template\Context $context,
        Session $checkoutSession,
        array $data)
    {
        $this->checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getStorePickupCodeFromLastPayment()
    {
        $lastPayment = $this->getLastPayment();
        if ($lastPayment) {
            return $this->getStorePickupCode($lastPayment);
        }
        return '';
    }


    private function getStorePickupCode(\Magento\Sales\Api\Data\OrderPaymentInterface $payment)
    {
        $additionalInformation =  $payment->getAdditionalInformation();
        return $additionalInformation['store_pickup_code'];
    }

    /**
     * @return \Magento\Sales\Api\Data\OrderPaymentInterface|null
     */
    private function getLastPayment()
    {
        /** @var \Magento\Sales\Api\Data\OrderInterface $order */
        $order = $this->checkoutSession->getLastRealOrder();
        return $order->getPayment();
    }
}
