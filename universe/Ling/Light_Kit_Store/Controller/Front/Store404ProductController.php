<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;


/**
 * The Store404ProductController class.
 */
class Store404ProductController extends StoreBaseController
{


    /**
     * Renders the 404 page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->renderPage("Ling.Light_Kit_Store/404-product");
    }

}

