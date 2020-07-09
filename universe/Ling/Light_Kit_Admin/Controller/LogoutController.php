<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_UserManager\Service\LightUserManagerService;

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
        /**
         * @var $userManager LightUserManagerService
         */
        $userManager = $this->getContainer()->get("user_manager");
        $userManager->destroyUser();
//        $this->getUser()->disconnect();
        $redirectRoute = $this->getKitAdmin()->getOption("login.login_route");
        return $this->getRedirectResponseByRoute($redirectRoute);
    }
}