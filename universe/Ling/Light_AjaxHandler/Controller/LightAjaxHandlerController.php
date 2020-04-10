<?php


namespace Ling\Light_AjaxHandler\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
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
        /**
         * @var $ajaxService LightAjaxHandlerService
         */
        $ajaxService = $this->getContainer()->get('ajax_handler');
        $jsonResponse = $ajaxService->handle($request);

        //--------------------------------------------
        //
        //--------------------------------------------
        if (
            array_key_exists("type", $jsonResponse) &&
            'print' === $jsonResponse['type'] &&
            array_key_exists("content", $jsonResponse)
        ) {
            $r = new HttpResponse($jsonResponse['content']);
            return $r;
        }


        return HttpJsonResponse::create($jsonResponse);
    }

}