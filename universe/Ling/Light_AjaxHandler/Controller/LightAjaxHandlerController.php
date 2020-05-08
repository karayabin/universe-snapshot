<?php


namespace Ling\Light_AjaxHandler\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_AjaxHandler\Service\LightAjaxHandlerService;
use Ling\Light_Events\Service\LightEventsService;


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
        try {

            /**
             * @var $ajaxService LightAjaxHandlerService
             */
            $ajaxService = $this->getContainer()->get('ajax_handler');
            $alcpResponse = $ajaxService->handle($request);


            if (
                array_key_exists("type", $alcpResponse) &&
                'print' === $alcpResponse['type'] &&
                array_key_exists("content", $alcpResponse)
            ) {
                // special case of the alcp response
                $response = new HttpResponse($alcpResponse['content']);
            } else {
                // regular alcp success response
                $response = new HttpJsonResponse($alcpResponse);
            }
        } catch (\Exception $e) {
            // regular alcp error response
            $response = new HttpJsonResponse([
                "type" => "error",
                "error" => $e->getMessage(),
            ]);


            // dispatch the exception (to allow deeper investigation)
            /**
             * @var $events LightEventsService
             */
            $events = $this->getContainer()->get("events");
            $data = LightEvent::createByContainer($this->getContainer());
            $data->setVar('exception', $e);
            $events->dispatch("Light_AjaxHandler.on_handle_exception_caught", $data);

        }
        return $response;
    }

}