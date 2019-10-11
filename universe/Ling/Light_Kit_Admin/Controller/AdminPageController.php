<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\ArrayTool;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Flasher\Service\LightFlasher;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;

/**
 * The AdminPageController class.
 *
 *
 * This class provides the renderAdminPage which most controllers in Light_Kit_Admin use because it does multiple
 * things:
 *
 * - if the user is not connected at all, she is redirected to the login page
 * - it checks whether the user is allowed to access the page, and if not redirects her
 * - it the user is allowed to access the page, it renders the page
 *
 *
 *
 *
 */
class AdminPageController extends LightKitAdminController
{


    /**
     * Renders the given page using the @page(kit service), or redirects the user to the login page
     * if she is not connected yet.
     *
     *
     *
     * @param string $page
     * @param array $params
     * @param PageConfUpdator|null $updator
     *
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderAdminPage(string $page, $params = [], PageConfUpdator $updator = null)
    {

        $container = $this->getContainer();
        $user = $this->getUser();



        //--------------------------------------------
        // HANDLING RIGHTS
        //--------------------------------------------
         // non connected users are redirected to the login page
        if (false === $user->isValid()) {
            $redirectRoute = $this->getKitAdmin()->getOption("login.login_route");
            return $this->redirectByRoute($redirectRoute);
        } else {
            // users without the appropriate access right are redirected
            $right = $this->route['right'] ?? null;
            if (is_string($right) && false === $user->hasRight($right)) {
                $this->getFlasher()->addFlash("AdminPageControllerForbidden", "You don't have the right to access this page (you miss the \"$right\" right).", "w");
                $redirectRoute = $this->getKitAdmin()->getOption("access_denied.access_denied_route");
                return $this->redirectByRoute($redirectRoute);
            }
        }




        $user = ArrayTool::objectToArray($user);
        $params['user'] = $user;
        return $this->renderPage($page, $params, $updator);
    }
}