<?php


namespace Ling\Light_Kit_Admin\Controller\User;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\AdminPageController;

/**
 * The UserListController class.
 */
class UserListController extends AdminPageController
{

    /**
     * Renders the user list page, where the admin can administrate other users.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        /**
         * Todo: I want to inject default values to the list...
         */
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/user/user_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin:lud_user',
            ],
        ]));
    }
}