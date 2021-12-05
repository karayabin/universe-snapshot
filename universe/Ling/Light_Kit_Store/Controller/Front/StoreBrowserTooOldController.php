<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;


/**
 * The StoreBrowserTooOldController class.
 */
class StoreBrowserTooOldController extends StoreBaseController
{


    /**
     * Renders the browserTooOld page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->renderPage("Ling.Light_Kit_Store/browser_too_old");
    }
}

