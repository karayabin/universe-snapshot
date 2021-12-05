<?php


namespace Ling\Light_Kit_Admin\Controller\JimToolbox;


use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_JimToolbox\Controller\JimToolboxController;
use Ling\Light_Kit_Admin\Controller\AdminPageController;

/**
 * The LkaJimToolboxController class.
 */
class LkaJimToolboxController extends AdminPageController
{

    /**
     * Renders an @page(acp response) containing the pane body and title information.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {


        /**
         * Make sure the user is connected
         */
        $perm = 'Ling.Light_Kit_Admin.user';
        $response = $this->checkRight($perm);
        if (null !== $response) {
            return HttpJsonResponse::create([
                "type" => 'error',
                "error" => "You don't have the permission to access this content ($perm required).",
            ]);
        }


        $controller = new JimToolboxController();
        return $controller->render($request);


    }
}