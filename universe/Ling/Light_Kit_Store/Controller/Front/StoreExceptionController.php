<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Vars\Service\LightVarsService;


/**
 * The StoreExceptionController class.
 */
class StoreExceptionController extends StoreBaseController
{


    /**
     * Renders the 404 page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {

        /**
         * @var $_lv LightVarsService
         */
        $_lv = $this->getContainer()->get("vars");
        $e = $_lv->getVar("kit_store.unhandledException");
        return $this->renderPage("Ling.Light_Kit_Store/exception", [
            "widgetVariables" => [
                "body.kitstore_exception" => [
                    "exception" => $e,
                ],
            ],
        ]);
    }

}

