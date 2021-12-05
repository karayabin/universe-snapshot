<?php


namespace Ling\Light_Kit_Store\Controller\Front\Checkout;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;


/**
 * The StoreProductPageController class.
 */
class StoreCartPageController extends StoreBaseController
{


    /**
     * Renders the user's cart page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->renderPage("Ling.Light_Kit_Store/checkout/cart", [
            "widgetVariables" => [
                "body.kitstore_cart_page" => [
                ],
            ],
        ]);
    }
}

