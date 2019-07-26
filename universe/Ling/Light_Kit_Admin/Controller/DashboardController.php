<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;

/**
 * The DashboardController class.
 */
class DashboardController extends ProtectedPageController
{


    /**
     * Renders the dashboard page and returns the result.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        return $this->renderProtectedPage('Light_Kit_Admin/zeroadmin/zeroadmin_home');
    }
}