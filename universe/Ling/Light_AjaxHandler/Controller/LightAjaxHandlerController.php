<?php


namespace Ling\Light_AjaxHandler\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_AjaxHandler\Service\LightAjaxHandlerService;


/**
 * The LightAjaxHandlerController class.
 */
class LightAjaxHandlerController extends LightController
{

    /**
     * Handles the request and returns an @page(alcp response).
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function handle(HttpRequestInterface $request)
    {


        return $this->getContainer()->get("ajax_handler")->handleViaCallable(function (array &$alcpResponse = null) use ($request) {
            /**
             * @var $ajaxService LightAjaxHandlerService
             */
            $ajaxService = $this->getContainer()->get('ajax_handler');
            $alcpResponse = $ajaxService->handleViaRegisteredHandlers($request);
        });

    }

}