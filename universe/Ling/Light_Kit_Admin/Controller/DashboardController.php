<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;

/**
 * The DashboardController class.
 */
class DashboardController extends AdminPageController
{


    /**
     * Renders the dashboard page and returns the result.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/zeroadmin_home');
    }
}