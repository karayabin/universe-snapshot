<?php


namespace Ling\Light_AjaxHandler\Service;


use Ling\Bat\ClassTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
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
    protected $handlers;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


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
         * ($app/config/data/Light_AjaxHandler/Light_EasyRoute/lah_routes.byml by default).
         * So for now the synchronization has to be done manually.
         *
         */
        return "lah_route-ajax_handler";
    }


    /**
     * Handles the request and returns an @page(alcp response).
     * @param HttpRequestInterface $request
     * @return array
     */
    public function handle(HttpRequestInterface $request): array
    {

        try {

            $handler = $request->getPostValue("handler");
            $action = $request->getPostValue("action");
            $handler = $this->getHandler($handler);
            $response = $handler->handle($action, $request);

        } catch (\Exception $e) {

            $response = [
                "type" => "error",
                "error" => $e->getMessage(),
                "exception" => ClassTool::getShortName($e),
            ];

            try {

                // dispatch the exception (to allow deeper investigation)
                /**
                 * @var $events LightEventsService
                 */
                $events = $this->container->get("events");
                $data = LightEvent::createByContainer($this->container);
                $data->setVar('exception', $e);
                $events->dispatch("Light_AjaxHandler.on_handle_exception_caught", $data);
            } catch (\Exception $e) {
                $response = [
                    "type" => "error",
                    "error" => $e->getMessage(),
                    "exception" => ClassTool::getShortName($e),
                ];
            }

        }

        return $response;
    }


}
