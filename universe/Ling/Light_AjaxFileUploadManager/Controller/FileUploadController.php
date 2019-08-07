<?php


namespace Ling\Light_AjaxFileUploadManager\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService;
use Ling\Light_Logger\LightLoggerService;

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
            if (array_key_exists("item", $_FILES)) {
                /**
                 * @var $ajaxService LightAjaxFileUploadManagerService
                 */
                $ajaxService = $this->getContainer()->get('ajax_file_upload_manager');
                $params = $_POST;
                $ret = $ajaxService->uploadItem($id, $_FILES['item'], $params);

            } else {
                $ret = [
                    "type" => 'error',
                    "error" => "Bad configuration error: the \"item\" key was not found in \$_FILES."
                ];
            }


        } else {
            $ret = [
                "type" => 'error',
                "error" => "Bad configuration error: the \"id\" key was not found in \$_POST."
            ];
        }
        return json_encode($ret);

    }
}