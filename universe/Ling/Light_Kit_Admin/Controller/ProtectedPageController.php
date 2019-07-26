<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\ArrayTool;
use Ling\Light\Http\HttpResponseInterface;

/**
 * The ProtectedPageController class.
 */
class ProtectedPageController extends LightKitAdminController
{


    /**
     * Renders the given page using the @page(kit service), or redirects the user to the login page
     * if she is not connected yet.
     *
     *
     *
     *
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderProtectedPage(string $page)
    {

        $container = $this->getContainer();


        //--------------------------------------------
        // HANDLING USER LOGIN
        //--------------------------------------------
        $params = [];
        $user = $this->getUser();
        if (false === $user->isValid()) {
            $redirectRoute = $this->getKitAdmin()->getOption("login.login_route");
            return $this->redirectByRoute($redirectRoute);
        }

        $user = ArrayTool::objectToArray($user);
        $params = array_merge($params, $user);


        return $container->get("kit")->renderPage($page, $params);
    }
}