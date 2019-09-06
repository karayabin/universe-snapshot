<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;

/**
 * The LogoutController class.
 */
class LogoutController extends AdminPageController
{


    /**
     * Disconnects the logged in user, and redirects the user to the login form.
     *
     *
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        //--------------------------------------------
        // REDIRECTING THE CONNECTED USER
        //--------------------------------------------
        $this->getUser()->disconnect();
        $redirectRoute = $this->getKitAdmin()->getOption("login.login_route");
        return $this->redirectByRoute($redirectRoute);
    }
}