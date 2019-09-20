<?php


namespace Ling\Light_AjaxHandler\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_AjaxHandler\Exception\LightAjaxHandlerException;
use Ling\Light_AjaxHandler\Service\LightAjaxHandlerService;


/**
 * The LightAjaxHandlerController class.
 */
class LightAjaxHandlerController extends LightController
{


    /**
     * Calls the handler identified by the given handlerId, with the given actionId and params,
     * and returns its output as a HttpResponseInterface.
     *
     * We use the @page(ajax communication protocol), meaning the response is of type json.
     *
     *
     * @return HttpResponseInterface
     */
    public function handle(): HttpResponseInterface
    {

        try {


            if (false === array_key_exists("ajax_handler_id", $_POST)) {
                $this->error("Missing key: ajax_handler_id.");
            }
            if (false === array_key_exists("ajax_action_id", $_POST)) {
                $this->error("Missing key: ajax_action_id.");
            }

            $handlerId = $_POST['ajax_handler_id'];
            $actionId = $_POST['ajax_action_id'];
            $params = $_POST;
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
            ];
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