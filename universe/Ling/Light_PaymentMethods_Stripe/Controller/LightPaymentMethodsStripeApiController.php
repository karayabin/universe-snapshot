<?php


namespace Ling\Light_PaymentMethods_Stripe\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Logger\Service\LightLoggerService;
use Ling\Light_PaymentMethods\Service\LightPaymentMethodsService;
use Ling\Light_PaymentMethods_Stripe\Service\LightPaymentMethodsStripeService;
use Stripe\PaymentIntent;
use Stripe\Stripe;


/**
 * The LightPaymentMethodsStripeApiController class.
 *
 * All methods of this class are alcp ends for clients.
 *
 *
 */
class LightPaymentMethodsStripeApiController extends LightController
{


    /**
     * Executes the action given in the GET parameters and returns a response.
     *
     * The "action" parameter should be present in GET.
     *
     * This is designed as a hub/proxy for all the other methods of this class.
     *
     * It's basically the only method that we expose publicly.
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function execute(HttpRequestInterface $request): HttpResponseInterface
    {
        $action = $request->getGetValue("action", false) ?? "undefined";


        try {

            // alcp actions
            switch ($action) {
                case "create":
                    return $this->create($request);
            }
        } catch (\Exception $e) {

            /**
             * @var $_lo LightLoggerService
             */
            $_lo = $this->getContainer()->get("logger");
            $_lo->error($e);

            return HttpJsonResponse::create([
                "type" => "error",
                "error" => "Oops, an unexpected error occurred. We're working on it right now. Try again later, or contact us. Sorry for the inconvenience.",
            ]);
        }


        // other action types
        switch ($action) {
            default:
                return new HttpResponse("Unknown action: $action.", 404);
                break;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Test method.
     * You should probably remove me.
     * This is an @page(alcp service).
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    private function create(HttpRequestInterface $request): HttpJsonResponse
    {

        $error = null;
        $clientSecret = null;


        /**
         * @var $_st LightPaymentMethodsStripeService
         */
        $_st = $this->getContainer()->get("payment_methods_stripe");

        /**
         * @var $_pm LightPaymentMethodsService
         */
        $_pm = $this->getContainer()->get("payment_methods");
        $cartInfo = $_pm->getCartInfo();


        $items = $cartInfo['items'];
        $_items = [];
        foreach ($items as $item) {
            $_items['id'] = $item['reference'];
        }


        $secretKey = $_st->getApiKey("secret");


        // This is your real test secret API key.
        Stripe::setApiKey($secretKey);


        try {

            $paymentIntent = PaymentIntent::create([
                'amount' => (int)(100 * $cartInfo['amount']),
                'currency' => strtolower($cartInfo['currency']),
            ]);
            $clientSecret = $paymentIntent->client_secret;
        } catch (\Error $e) {
            $error = $e->getMessage();
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }


        if (null !== $error) {
            return HttpJsonResponse::create([
                "type" => "error",
                "error" => $error,
            ]);
        }
        return HttpJsonResponse::create([
            "type" => "success",
            "clientSecret" => $clientSecret,
        ]);

    }
}

