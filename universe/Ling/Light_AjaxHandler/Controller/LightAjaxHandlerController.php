<?php


namespace Ling\Light_AjaxHandler\Controller;


use Ling\Bat\ClassTool;
use Ling\Light\Controller\LightController;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_AjaxHandler\Exception\LightAjaxHandlerException;
use Ling\Light_AjaxHandler\Service\LightAjaxHandlerService;
use Ling\Light_Events\Service\LightEventsService;


/**
 * The LightAjaxHandlerController class.
 */
class LightAjaxHandlerController extends LightController
{


    /**
     * Calls the handler identified by the given ajax_handler_id, with and the given ajax_action_id params,
     * and returns its output as a HttpResponseInterface.
     *
     * We use the @page(ajax communication protocol), meaning the response is of type json.
     *
     *
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function handle(): HttpResponseInterface
    {

        try {


            if (
                array_key_exists("ajax_handler_id", $_POST) &&
                array_key_exists("ajax_action_id", $_POST)
            ) {
                $params = $_POST;
            } elseif (array_key_exists("ajax_handler_id", $_GET) &&
                array_key_exists("ajax_action_id", $_GET)) {
                $params = $_GET;
            } else {
                $this->error("Missing key: ajax_handler_id and/or ajax_action_id.");
            }


            $handlerId = $params['ajax_handler_id'];
            $actionId = $params['ajax_action_id'];
            unset($params['ajax_handler_id']);
            unset($params['ajax_action_id']);


            /**
             * @var $service LightAjaxHandlerService
             */
            $service = $this->getContainer()->get("ajax_handler");
            $handler = $service->getHandler($handlerId);
            $response = $handler->handle($actionId, $params);

        } catch (\Exception $e) {
            $response = [
                "type" => "error",
                "error" => $e->getMessage(),
                "exception" => ClassTool::getShortName($e),
            ];


            // dispatch the exception (to allow deeper investigation)
            /**
             * @var $events LightEventsService
             */
            $events = $this->getContainer()->get("events");
            $data = LightEvent::createByContainer($this->getContainer());
            $data->setVar('exception', $e);
            $events->dispatch("Light_AjaxHandler.on_controller_exception_caught", $data);

        }


        //--------------------------------------------
        // PRINT AS IS FEATURE
        //--------------------------------------------
        if (
            array_key_exists("type", $response) &&
            'print' === $response['type'] &&
            array_key_exists("content", $response)
        ) {
            $r = new HttpResponse($response['content']);
            return $r;
        }


        return HttpJsonResponse::create($response);

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception with the given error message.
     * @param string $message
     * @throws \Exception
     */
    protected function error(string $message)
    {
        throw new LightAjaxHandlerException($message);
    }
}