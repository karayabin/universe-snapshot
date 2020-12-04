<?php


namespace Ling\Light_Kit_Admin_UserData\Controller\User;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Admin\Controller\AdminPageController;

/**
 * The UserFileManagerController class.
 */
class UserFileManagerController extends AdminPageController
{

    /**
     * Renders the user profile page, where the user can change her profile.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {

        $page = 'Light_Kit_Admin_UserData/kit/zeroadmin/file_manager';
        return $this->renderAdminPage($page, []);
    }

}