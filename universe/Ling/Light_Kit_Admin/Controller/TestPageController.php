<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;

/**
 * The TestPageController class.
 */
class TestPageController extends AdminPageController
{


    /**
     * Renders a test page.
     * Only admin should be able to access it.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {


        /**
         * @var $microService LightMicroPermissionService
         */
        $microService = $this->getContainer()->get("micro_permission");
        $microService->disableNamespace("tables");

        /**
         * @var $userDb LightUserDatabaseService
         */

        $userDb = $this->getContainer()->get("user_database");
        $userDb->addUser([
            "user_group_id" => $userDb->getUserGroupApi()->getUserGroupIdByName("default"),
            "identifier" => "reynolds",
            "pseudo" => "reynolds",
            "password" => "maurice",
            "avatar_url" => "",
            "extra" => [],

        ]);


        $microService->restoreNamespaces();

        return "ok";
    }
}