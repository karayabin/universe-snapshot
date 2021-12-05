<?php

namespace Ling\Light_PaymentMethods\Handler;

use Ling\Light\Http\HttpRequestInterface;

/**
 * The LightPaymentMethodHandlerInterface interface.
 *
 */
interface LightPaymentMethodHandlerInterface
{


    /**
     * Returns an array describing a **payment method list item**.
     * See the @page(Ling.Light_PaymentMethods conception notes) for more details.
     *
     * The returned structure is the following:
     *
     * - label: the label to display
     * - description: a short description to display
     * - fa_icon: font awesome icon css class
     *
     *
     *
     * Note: the integrator of the gui will decide which element to use, depending on his/her design (i.e., he/she might not use all
     * the information provided by this array).
     *
     *
     * @return array
     */
    public function getListItem(): array;


    /**
     * Place the order or returns information do to so.
     *
     *
     * For handlers that work server side only, this method places the order and returns a response.
     * For handlers which work client side, returns a signal to the client side.
     *
     *
     *
     * This method returns an @page(alcp response).
     *
     * In case of success, the following properties are added:
     *
     * - behaviour: string = openGui, indicates which behaviour should be adopted by the client.
     *
     *
     * The behaviour choices are:
     *
     * - openGui: the client should open the solution provider's dedicated gui.
     *
     *
     *
     * The payment info array contains the following:
     * - amount: float, the order amount to pay
     * - ?currency: string=USD, the currency in iso4217 format (https://en.wikipedia.org/wiki/ISO_4217#Active_codes)
     *
     *
     *
     *
     * @param array $paymentInfo
     * @return array|null
     */
    public function placeOrder(array $paymentInfo): array|null;


    /**
     * This callback is triggered when the customer clicks the pay button.
     *
     *
     * This is an @page(alcp request) if the handler uses this hook.
     * Otherwise, null is returned.
     *
     * In case of success, the response contains the following extra properties:
     *
     * - data: array, an array of data which might be processed by the js code client side.
     *
     *
     * The params array can contain one of the following sets:
     *
     * - paymentInfo: array:
     *      - amount: float, the total amount to pay
     *      - currency: string=USD, an iso 4217 currency code
     *
     *
     *
     *
     * @param array $params
     * @return array|null
     */
//    public function preparePayment(array $params=[]): array|null;


    /**
     * For handlers that provides a client side gui.
     * Handlers not in that case return null.
     *
     * The returned array has the following structure:
     *
     * - html: string, the html code of the gui. Usually, this html code will be injected in some kind of modal.
     * - ?css: array, array of css assets to include
     * - ?js: array, array of js assets to include
     * - ?jsScripts: array of a js script to include to prepare the gui. Each script should include its own script tags.
     *
     *
     *
     *
     *
     * @return array|null
     */
    public function getGuiInfo(): array|null;


}