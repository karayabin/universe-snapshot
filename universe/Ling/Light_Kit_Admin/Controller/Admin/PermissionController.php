<?php


namespace Ling\Light_Kit_Admin\Controller\Admin;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Admin\Controller\AdminPageController;

/**
 * The PermissionController class.
 */
class PermissionController extends AdminPageController
{

    /**
     * Renders the admin's permission list.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        /**
         * Todo: I want to inject default values to the list...
         */
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/admin/permission_list');
    }
}