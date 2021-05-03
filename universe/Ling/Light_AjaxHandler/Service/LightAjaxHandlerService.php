<?php


namespace Ling\Light_AjaxHandler\Service;


use Ling\Bat\ClassTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxHandler\Exception\ClientErrorException;
use Ling\Light_AjaxHandler\Exception\LightAjaxHandlerException;
use Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;

/**
 * The LightAjaxHandlerService class.
 */
class LightAjaxHandlerService
{

    /**
     * This property holds the handlers for this instance.
     * It's an array of handlerId => LightAjaxHandlerInterface.
     *
     * @var LightAjaxHandlerInterface[]
     */
    protected array $handlers;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * Builds the LightAjaxHandlerService instance.
     */
    public function __construct()
    {
        $this->handlers = [];
        $this->container = null;
    }


    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Registers a handler.
     * Note: the identifier is usually a plugin name.
     *
     *
     * @param string $identifier
     * @param LightAjaxHandlerInterface $handler
     */
    public function registerHandler(string $identifier, LightAjaxHandlerInterface $handler)
    {
        $this->handlers[$identifier] = $handler;
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
    }


    /**
     * Returns the handler identified by the given identifier.
     *
     * @param string $identifier
     * @return LightAjaxHandlerInterface
     * @throws \Exception
     */
    public function getHandler(string $identifier): LightAjaxHandlerInterface
    {
        if (array_key_exists($identifier, $this->handlers)) {
            return $this->handlers[$identifier];
        }
        throw new LightAjaxHandlerException("Handler not found with identifier $identifier.");
    }


    /**
     * Returns the base url for the ajax handler service controller.
     *
     * @return string
     * @throws \Exception
     */
    public function getServiceUrl(): string
    {
        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get("reverse_router");
        return $rr->getUrl($this->getRouteName());
    }


    /**
     * Returns the name of the route used by this service.
     *
     * @return string
     */
    public function getRouteName(): string
    {
        /**
         * ...or at least it's the intent.
         * Since as for now, the value is hardcoded in the configuration
         * ($app/config/data/Ling.Light_AjaxHandler/Light_EasyRoute/lah_routes.byml by default).
         * So for now the synchronization has to be done manually.
         *
         */
        return "lah_route-ajax_handler";
    }


    /**
     * Handles the request and returns an @page(alcp response).
     *
     * @param HttpRequestInterface $request
     * @return array
     */
    public function handleViaRegisteredHandlers(HttpRequestInterface $request): array
    {


        $handler = $request->getPostValue("handler", false);
        if (null === $handler) {
            $handler = $request->getGetValue("handler");
        }

        $action = $request->getPostValue("action", false);
        if (null === $action) {
            $action = $request->getGetValue("action");
        }

        $handler = $this->getHandler($handler);
        return $handler->handle($action, $request);
    }


    /**
     *
     * Handles the given callable and returns an http response.
     *
     * About the given callable:
     *
     * - by default we assume that it returns a successful alcp response array (the type: success key/value pair is not required)
     * - if it throws an exception, then the exception will be turned into an alcp response array of type error (and the exception
     * will be dispatched as an event to allow further investigation).
     * - if you want to, you can return the alcp response array manually by setting the first argument (which is passed as reference)
     *          of the callable. You generally don't want to do that, unless you need to return a particular form of the alcp response,
     *          such as the "print" type for instance.
     * - to make the callable return an alcp error response, you can throw a ClientErrorException exception from the callable.
     *
     *
     * See the [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/alcp-response.md) document for more information.
     *
     *
     * @param callable $callable
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function handleViaCallable(callable $callable): HttpResponseInterface
    {
        try {

            $customAlcpResponse = null;
            $alcpResponse = call_user_func_array($callable, [&$customAlcpResponse]);
            if (null !== $customAlcpResponse) {
                $alcpResponse = $customAlcpResponse;
            } else {
                $alcpResponse['type'] = "success";
            }


            //--------------------------------------------
            // CONVERTING ALCP RESPONSE TO HTTP RESPONSE
            //--------------------------------------------
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


            if ($e instanceof ClientErrorException) {
                // regular alcp error response for the client
                $response = new HttpJsonResponse([
                    "type" => "error",
                    "error" => $e->getMessage(),
                ]);
            } else {


                // regular alcp error response for our system (we log it)
                $response = new HttpJsonResponse([
                    "type" => "error",
                    "error" => $e->getMessage(),
                    "exception" => ClassTool::getShortName($e),
                ]);


                // dispatch the exception (to allow deeper investigation)
                /**
                 * @var $events LightEventsService
                 */
                $events = $this->container->get("events");
                $data = LightEvent::createByContainer($this->container);
                $data->setVar('exception', $e);
                $events->dispatch("Ling.Light_AjaxHandler.on_handle_exception_caught", $data);
            }

        }
        return $response;
    }

}
