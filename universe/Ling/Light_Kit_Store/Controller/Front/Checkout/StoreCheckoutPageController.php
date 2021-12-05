<?php


namespace Ling\Light_Kit_Store\Controller\Front\Checkout;


use Ling\IsoTools\IsoCountryTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;
use Ling\Light_Kit_Store\Helper\LightKitStoreCheckoutCartHelper;
use Ling\Light_PaymentMethods\Handler\LightPaymentMethodHandlerInterface;
use Ling\Light_PaymentMethods\Service\LightPaymentMethodsService;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The StoreCheckoutPageController class.
 */
class StoreCheckoutPageController extends StoreBaseController
{


    /**
     * Renders the checkout page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {


        /**
         * @var $_pm LightPaymentMethodsService
         */
        $_pm = $this->getContainer()->get("payment_methods");
        $paymentMethodsHandlers = $_pm->getHandlers();
        $defaultPaymentMethodHandlerIdentifier = $_pm->getDefaultHandlerIdentifier();


        $f = $this->getKitStoreService()->getFactory();



        $billingAddresses = [];
        $user = $this->getUser();
        if (true === $user->isValid()) {
            $billingAddresses = $f->getAddressApi()->fetchAll([
                Where::inst()->key("user_id")->equals($user->getProp("id"))
            ]);
        }

        $this->refreshCheckoutCart([
            "billingAddresses" => $billingAddresses,
            "paymentMethodHandlers" => $paymentMethodsHandlers,
            "defaultPaymentMethodHandlerIdentifier" => $defaultPaymentMethodHandlerIdentifier,
        ]);




        return $this->renderPage("Ling.Light_Kit_Store/checkout/checkout", [
            'widgetVariables' => [
                'body.kitstore_checkout_page' => [
                    "paymentMethodHandlers" => $paymentMethodsHandlers,
                    "billingAddresses" => $billingAddresses,
                    "checkoutCart" => LightKitStoreCheckoutCartHelper::getCart(),
                    "countryList" => IsoCountryTool::getCountryList(),
                ],
            ],
        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Refreshes the checkout cart in the php session.
     *
     * The params are:
     * - billingAddresses: array of the user's addresses if connected, or an empty array otherwise.
     * - paymentMethodHandlers: array of the registered payment method handlers.
     * - defaultPaymentMethodHandlerIdentifier: the default payment method handler identifier, if defined, or null otherwise.
     *
     *
     */
    private function refreshCheckoutCart(array $params)
    {

        $billingAddresses = $params['billingAddresses'];
        $paymentMethodHandlers = $params['paymentMethodHandlers'];
        $defaultPaymentMethodHandlerIdentifier = $params['defaultPaymentMethodHandlerIdentifier'];





        $cartItemsInfo = $this->getCartItemsInfo();
        $checkoutCart = LightKitStoreCheckoutCartHelper::getCart();
        if (null === $checkoutCart) {
            $checkoutCart = LightKitStoreCheckoutCartHelper::getDefaultCartByCartItemsInfo($cartItemsInfo);
        }



        /**
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         * todo: update this method (if user connected, then fill blank fields if possible, try not to request db for perfs), then handle light exception, create a special page for that
         */

        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();
        if (true === $user->isValid()) {
            //--------------------------------------------
            // HANDLING USER
            //--------------------------------------------

            if(
                null === $checkoutCart['billing_address'] ||
                null === $checkoutCart['payment_method']
            ){
                $userApi = $this->getKitStoreService()->getFactory()->getUserApi();
                $userCheckoutInfo = $userApi->getUserCheckoutInfo();
            }

            if(0 === count($checkoutCart['cartItemsInfo']['rows'])){
                // add items from the lks_cart_item table if any
            }


            azf("todo here, case with user connected");
            $checkoutCart = 0;
        }
        else{
            //--------------------------------------------
            // HANDLING VISITOR
            //--------------------------------------------
            if(null === $checkoutCart['payment_method']){
                if(null !== $defaultPaymentMethodHandlerIdentifier){
                    $checkoutCart['payment_method'] = [
                        "identifier" => $defaultPaymentMethodHandlerIdentifier,
                    ];
                }
            }


        }

        LightKitStoreCheckoutCartHelper::setCart($checkoutCart);

    }
}

