<?php


namespace Ling\Light_AjaxFileUploadManager\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Logger\Service\LightLoggerService;

/**
 * The FileUploadController class.
 *
 * This class is meant to be the entry point of all ajax uploaded files in an application.
 *
 * An ajax entry point for file upload being a good csrf attack target, this class handles csrf protection.
 *
 *
 * What's the main idea of this class?
 * -------------------
 * The idea of this class is to have one service to handle all ajax file uploads of your light application.
 * So this service waits for your ajax file uploads, and when your app sends one, it takes care of it.
 *
 * How?
 *
 * Well first there is a communication protocol defined by this service.
 * This communication protocol is called @page(AjaxFileUpload protocol) and must be implemented in order for this service
 * to work properly.
 * And this class, along with other classes from this plugin, help implement this protocol.
 *
 *
 *
 *
 * php settings
 * ------------
 * You should ensure that the following directives are set accordingly with your application need:
 *
 * - upload_max_filesize: the max file size (for an individual file)
 * - post_max_size: the max size of the data (all files weights combined)
 *
 *
 *
 *
 */
class FileUploadController extends LightController
{

    /**
     * Receives an upload item (see the description of the class for more info),
     * treats it, and returns the appropriate response (which is a json array),
     * according to the AjaxFileUpload protocol described in this class description.
     *
     */
    public function uploader()
    {
        /**
         * @var $logger LightLoggerService
         */
//        $logger = $this->getContainer()->get("logger");
//        $logger->debug("test");
//        az($_POST, $_GET, $_FILES);

        if (array_key_exists("id", $_POST)) {
            $id = $_POST['id'];
            $phpFileItem = $_FILES['item'] ?? null;


            try {

                /**
                 * @var $ajaxService LightAjaxFileUploadManagerService
                 */
                $ajaxService = $this->getContainer()->get('ajax_file_upload_manager');
                $params = $_POST;
                $ret = $ajaxService->processItem($id, $phpFileItem, $params);
            } catch (\Exception $e) {
                $ret = [
                    "type" => "error",
                    "error" => $e->getMessage(),
                ];


                // dispatch the exception (to allow deeper investigation)
                /**
                 * @var $events LightEventsService
                 */
                $events = $this->getContainer()->get("events");
                $data = LightEvent::createByContainer($this->getContainer());
                $data->setVar('exception', $e);
                $events->dispatch("Ling.Light_AjaxFileUploadManager.on_controller_exception_caught", $data);


            }


        } else {
            $ret = [
                "type" => 'error',
                "error" => "Bad configuration error: the \"id\" key was not found in \$_POST."
            ];
        }
        return HttpJsonResponse::create($ret);
    }
}