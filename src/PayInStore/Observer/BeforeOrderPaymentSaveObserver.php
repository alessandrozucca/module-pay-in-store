<?php
namespace MageSchool\PayInStore\Observer;

use Magento\Framework\Event\ObserverInterface;
use MageSchool\PayInStore\Model\Payinstore;

class BeforeOrderPaymentSaveObserver implements ObserverInterface
{
    /**
     * @var \Magento\Framework\Math\Random
     */
    private $random;

    public function __construct(
        \Magento\Framework\Math\Random $random
    )
    {
        $this->random = $random;
    }

    /**
     * Sets current instructions for bank transfer account
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order\Payment $payment */
        $payment = $observer->getEvent()->getPayment();
        if ($payment->getMethod() === Payinstore::PAYMENT_METHOD_PAYINSTORE_CODE) {
            $payment->setAdditionalInformation('store_pickup_code',
                $this->random->getRandomString(6, \Magento\Framework\Math\Random::CHARS_UPPERS));
        }
    }
}
