<?php
namespace MageSchool\PayInStore\Model;

/**
 * Pay in store payment method model
 *
 * @method \Magento\Quote\Api\Data\PaymentMethodExtensionInterface getExtensionAttributes()
 */
class Payinstore extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_PAYINSTORE_CODE = 'payinstore';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_PAYINSTORE_CODE;

    /**
     * Payment in store payment block paths
     *
     * @var string
     */
    protected $_formBlockType = 'MageSchool\PayInStore\Block\Form\Payinstore';

    /**
     * Info instructions block path
     *
     * @var string
     */
    protected $_infoBlockType = 'Magento\Payment\Block\Info\Instructions';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Get instructions text from config
     *
     * @return string
     */
    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }
}
