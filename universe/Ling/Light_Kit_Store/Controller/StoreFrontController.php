<?php


namespace Ling\Light_Kit_Store\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;


/**
 * The StoreFrontController class.
 */
class StoreFrontController extends LightController
{


    /**
     * Renders the store front page.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function index(HttpRequestInterface $request): HttpResponseInterface
    {
        return new HttpResponse("This is kitstore.");
    }

}

