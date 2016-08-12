define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';

        rendererList.push(
            {
                type: 'payinstore',
                component: 'MageSchool_PayInStore/js/view/payment/method-renderer/payinstore-method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
