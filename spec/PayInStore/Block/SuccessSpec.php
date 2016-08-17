<?php

namespace spec\MageSchool\PayInStore\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SuccessSpec extends ObjectBehavior
{

    function let(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession
    )
    {
        $this->beConstructedWith(
            $context,
            $checkoutSession,
            []);
    }

    function it_returns_the_assigned_pickup_code_from_lastest_payment(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\Order $lastOrder,
        \Magento\Sales\Model\Order\Payment $payment
    )
    {
        $checkoutSession->getLastRealOrder()->willReturn($lastOrder);
        $lastOrder->getPayment()->willReturn($payment);
        $payment->getAdditionalInformation()->willReturn(['store_pickup_code' => 'ABCDEFG']);

        $this->getStorePickupCodeFromLastPayment()->shouldBe("ABCDEFG");

        $checkoutSession->getLastRealOrder()->shouldHaveBeenCalled();
        $lastOrder->getPayment()->shouldHaveBeenCalled();
    }
}
