<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Light\Controller\LightController;
use Ling\Light\Controller\RouteAwareControllerInterface;
use Ling\Light\Exception\LightRedirectException;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light_Flasher\Service\LightFlasher;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;
use Ling\Light_Kit_Admin\Service\LightKitAdminService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_User\WebsiteLightUser;


/**
 * The LightKitAdminController class.
 */
class LightKitAdminController extends LightController implements RouteAwareControllerInterface
{

    /**
     * This property holds the route for this instance.
     * See @page(the route page) for more information.
     * @var array
     */
    protected $route;

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->route = [];
    }

    /**
     * @implementation
     */
    public function setRoute(array $route)
    {
        $this->route = $route;
    }


    /**
     * Returns the kit admin service instance.
     *
     * @return LightKitAdminService
     * @throws \Exception
     */
    protected function getKitAdmin(): LightKitAdminService
    {
        return $this->getContainer()->get('kit_admin');
    }


    /**
     * Returns a flasher instance.
     * For more information, check out @page(the flasher service).
     *
     *
     * @return LightFlasher
     * @throws \Exception
     */
    protected function getFlasher(): LightFlasher
    {
        return $this->getContainer()->get('flasher');
    }


    /**
     * Returns the current user.
     * Note: in light kit admin, we use the WebsiteLightUser
     *
     * @return WebsiteLightUser
     * @throws \Exception
     */
    protected function getUser(): WebsiteLightUser
    {
        return $this->getContainer()->get("user_manager")->getUser();
    }

    /**
     * Renders the given page using the @page(kit service).
     *
     * @param string $page
     * @param array $dynamicVariables
     * @param PageConfUpdator $updator
     *
     * @return HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderPage(string $page, array $dynamicVariables = [], PageConfUpdator $updator = null): HttpResponseInterface
    {
        /**
         * @var $copilot HtmlPageCopilot
         */
        $copilot = $this->getContainer()->get("html_page_copilot");
        $copilot->registerLibrary("lka_environment", [
            "/plugins/Light_Kit_Admin/js/light-kit-admin-environment.js",
        ]);


        /**
         * @var $kit LightKitPageRenderer
         */
        $kit = $this->getContainer()->get("kit");
        return new HttpResponse($kit->renderPage($page, $dynamicVariables, $updator));
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a http response that redirects to the given route.
     *
     * @param string $redirectRoute
     * @return HttpResponseInterface
     * @throws \Exception
     */
    protected function redirectByRoute(string $redirectRoute): HttpResponseInterface
    {
        /**
         * @var $revRouter LightReverseRouterInterface
         */
        $revRouter = $this->getContainer()->get('reverse_router');
        $url = $revRouter->getUrl($redirectRoute, [], true);

        return HttpRedirectResponse::create($url);
    }


    protected function checkRight(string $right)
    {

        $user = $this->getUser();


        //--------------------------------------------
        // HANDLING RIGHTS
        //--------------------------------------------
        // non connected users are redirected to the login page
        if (false === $user->isValid()) {
            $redirectRoute = $this->getKitAdmin()->getOption("login.login_route");
            throw LightRedirectException::create()->setRedirectRoute($redirectRoute);
        } else {
            // users without the appropriate access right are redirected
            if (is_string($right) && false === $user->hasRight($right)) {
                $this->getFlasher()->addFlash("AdminPageControllerForbidden", "You don't have the right to access this page (you miss the \"$right\" right).", "w");
                $redirectRoute = $this->getKitAdmin()->getOption("access_denied.access_denied_route");
                throw LightRedirectException::create()->setRedirectRoute($redirectRoute);
            }
        }
    }


    /**
     * Checks whether the current user has the given microPermission, and if not, throws a redirect exception which
     * redirects to the access_denied page.
     *
     * @param string $microPermission
     * @throws \Exception
     */
    protected function checkMicroPermission(string $microPermission)
    {
        /**
         * @var $microService LightMicroPermissionService
         */
        $microService = $this->getContainer()->get("micro_permission");
        if (false === $microService->hasMicroPermission($microPermission)) {
            $this->getFlasher()->addFlash("AdminPageControllerForbidden", "You don't have the permission to access this page (you miss the \"$microPermission\" microPermission).", "w");
            $redirectRoute = $this->getKitAdmin()->getOption("access_denied.access_denied_route");
            throw LightRedirectException::create()->setRedirectRoute($redirectRoute);
        }
    }
}