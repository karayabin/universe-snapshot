<?php

namespace Ling\Light_PaymentMethods_Stripe\Handler;


use Ling\HtmlPageTools\Helper\HtmlPageToolsHelper;
use Ling\Light_PaymentMethods\Handler\LightPaymentMethodHandlerBase;
use Ling\Light_PaymentMethods\Service\LightPaymentMethodsService;
use Ling\Light_PaymentMethods_Stripe\Service\LightPaymentMethodsStripeService;


/**
 * The LightPaymentMethodHandlerStripe class.
 */
class LightPaymentMethodHandlerStripe extends LightPaymentMethodHandlerBase
{


    //--------------------------------------------
    // LightPaymentMethodHandlerInterface
    //--------------------------------------------
    /**
     * @implementation
     * @inheritDoc
     */
    public function getListItem(): array
    {
        return [
            "label" => "Stripe",
            "description" => "",
            "fa_icon" => "fab fa-stripe",
        ];
    }


    /**
     * @implementation
     * @inheritDoc
     */
    public function placeOrder(array $paymentInfo): array|null
    {
        return [
            "type" => "success",
            "behaviour" => "openGui",
        ];
    }

    /**
     * @implementation
     * @inheritDoc
     */
    public function getGuiInfo(): array|null
    {
        $rand = rand(0, 1000000);
        return [
            "js" => [
                "https://js.stripe.com/v3/",
                "https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch",
            ],
            "jsScripts" => [
                $this->getClientJs(),
            ],
            'css' => [
                "/libs/universe/Ling/Light_PaymentMethods_Stripe/custom-payment-flow.min.css?rand=$rand",
            ],
            'html' => $this->getHtml(),
        ];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the html code of the stripe custom payment flow.
     * https://stripe.com/docs/payments/integration-builder
     *
     * @return string
     */
    private function getHtml(): string
    {
        ob_start();
        ?>
        <!-- Display a payment form -->

        <form id="stripe-payment-form" class="stripe-payment-form">

            <div id="stripe-card-element"><!--Stripe.js injects the Card Element--></div>

            <button id="submit" class="stripe-button">

                <div class="spinner hidden" id="spinner"></div>

                <span id="button-text">Pay now</span>

            </button>

            <p id="stripe-card-error" role="alert"></p>

            <p class="result-message hidden">

                Payment succeeded, see the result in your

                <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.

            </p>

        </form>
        <?php
        return ob_get_clean();
    }

    /**
     * Returns the js code to initialize the stripe custom payment flow.
     * https://stripe.com/docs/payments/integration-builder
     *
     * @return string
     * @throws \Exception
     */
    private function getClientJs(): string
    {
        /**
         * @var $_st LightPaymentMethodsStripeService
         */
        $_st = $this->container->get("payment_methods_stripe");

        /**
         * @var $_pm LightPaymentMethodsService
         */
        $_pm = $this->container->get("payment_methods");
        $cartInfo = $_pm->getCartInfo();
        $items = $cartInfo['items'];
        $_items = [];
        foreach ($items as $item) {
            $_items['id'] = $item['reference'];
        }


        $publicKey = $_st->getApiKey("public");
        $urlCreate = $_st->getAlcpLink("create");


        ob_start();
        ?>
        <script>
            // A reference to Stripe.js initialized with your real test publishable API key.
            var stripe = Stripe("<?php echo htmlspecialchars($publicKey); ?>");

            // The items the customer wants to buy
            var purchase = {
                items: <?php echo json_encode($_items); ?>,
            };


            if (true) {


                // Disable the button until we have Stripe set up on the page
                document.querySelector("button").disabled = true;
                fetch("<?php echo $urlCreate; ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(purchase)
                })
                    .then(function (result) {
                        return result.json();
                    })
                    .then(function (data) {
                        var elements = stripe.elements();

                        var style = {
                            base: {
                                color: "#32325d",
                                fontFamily: 'Arial, sans-serif',
                                fontSmoothing: "antialiased",
                                fontSize: "16px",
                                "::placeholder": {
                                    color: "#32325d"
                                }
                            },
                            invalid: {
                                fontFamily: 'Arial, sans-serif',
                                color: "#fa755a",
                                iconColor: "#fa755a"
                            }
                        };

                        var card = elements.create("card", {style: style});
                        // Stripe injects an iframe into the DOM
                        card.mount("#stripe-card-element");

                        card.on("change", function (event) {
                            // Disable the Pay button if there are no card details in the Element
                            document.querySelector("button").disabled = event.empty;
                            document.querySelector("#stripe-card-error").textContent = event.error ? event.error.message : "";
                        });

                        var form = document.getElementById("stripe-payment-form");
                        form.addEventListener("submit", function (event) {
                            event.preventDefault();
                            // Complete payment when the submit button is clicked
                            payWithCard(stripe, card, data.clientSecret);
                        });
                    });
            }

            // Calls stripe.confirmCardPayment
            // If the card requires authentication Stripe shows a pop-up modal to
            // prompt the user to enter authentication details without leaving your page.
            var payWithCard = function (stripe, card, clientSecret) {
                loading(true);
                stripe
                    .confirmCardPayment(clientSecret, {
                        payment_method: {
                            card: card
                        }
                    })
                    .then(function (result) {
                        if (result.error) {
                            // Show error to your customer
                            showError(result.error.message);
                        } else {
                            // The payment succeeded!
                            orderComplete(result.paymentIntent.id);
                        }
                    });
            };

            /* ------- UI helpers ------- */

            // Shows a success message when the payment is complete
            var orderComplete = function (paymentIntentId) {
                loading(false);
                document
                    .querySelector(".result-message a")
                    .setAttribute(
                        "href",
                        "https://dashboard.stripe.com/test/payments/" + paymentIntentId
                    );
                document.querySelector(".result-message").classList.remove("hidden");
                document.querySelector("button").disabled = true;
            };

            // Show the customer the error from Stripe if their card fails to charge
            var showError = function (errorMsgText) {
                loading(false);
                var errorMsg = document.querySelector("#stripe-card-error");
                errorMsg.textContent = errorMsgText;
                setTimeout(function () {
                    errorMsg.textContent = "";
                }, 4000);
            };

            // Show a spinner on payment submission
            var loading = function (isLoading) {
                if (isLoading) {
                    // Disable the button and show a spinner
                    document.querySelector("button").disabled = true;
                    document.querySelector("#spinner").classList.remove("hidden");
                    document.querySelector("#button-text").classList.add("hidden");
                } else {
                    document.querySelector("button").disabled = false;
                    document.querySelector("#spinner").classList.add("hidden");
                    document.querySelector("#button-text").classList.remove("hidden");
                }
            };

        </script>
        <?php

        return HtmlPageToolsHelper::stripJsTags(ob_get_clean());
    }
}