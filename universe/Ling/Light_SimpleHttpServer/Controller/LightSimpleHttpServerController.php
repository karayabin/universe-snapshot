<?php


namespace Ling\Light_SimpleHttpServer\Controller;


use Ling\ExceptionCodes\ExceptionCode;
use Ling\Light\Controller\LightController;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_SimpleHttpServer\Exception\LightSimpleHttpServerException;
use Ling\Light_SimpleHttpServer\Service\LightSimpleHttpServerService;


/**
 * The LightSimpleHttpServerController class.
 */
abstract class LightSimpleHttpServerController extends LightController
{


    /**
     * Renders the page requested by the given request, and returns the appropriate response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    abstract protected function doRender(HttpRequestInterface $request): HttpResponseInterface;


    /**
     * Renders the page requested by the given request, and returns the appropriate response.
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {



        try {
            return $this->doRender($request);
        } catch (\Exception $e) {

            $httpStatusCode = 500; // internal server error
            if (true === $e instanceof LightSimpleHttpServerException) {
                $httpStatusCode = $e->getHttpStatusCode();
            } else {
                $code = $e->getCode();
                switch ($code) {
                    case ExceptionCode::FORBIDDEN:
                        $httpStatusCode = 403;
                        break;
                }
            }


            /**
             * @var $he LightSimpleHttpServerService
             */
            $he = $this->getContainer()->get("http_error");
            $noLogHttpStatusCodes = $he->getNotLoggedHttpStatusCodes();


            if (false === in_array($httpStatusCode, $noLogHttpStatusCodes, true)) {
                // dispatch the exception (to allow deeper investigation)
                /**
                 * @var $events LightEventsService
                 */
                $events = $this->getContainer()->get("events");
                $data = LightEvent::createByContainer($this->getContainer());
                $data->setVar('exception', $e);
                $events->dispatch("Ling.Light_SimpleHttpServer.on_controller_exception_caught", $data);
            }


            return new HttpResponse("", $httpStatusCode);
        }
    }

}