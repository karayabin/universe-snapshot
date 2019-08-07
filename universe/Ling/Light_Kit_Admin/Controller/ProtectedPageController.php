<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\ArrayTool;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;

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
     * @param string $page
     * @param array $params
     * @param PageConfUpdator|null $updator
     *
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderProtectedPage(string $page, $params = [], PageConfUpdator $updator = null)
    {

        $container = $this->getContainer();


        //--------------------------------------------
        // HANDLING USER LOGIN
        //--------------------------------------------
        $user = $this->getUser();
        if (false === $user->isValid()) {
            $redirectRoute = $this->getKitAdmin()->getOption("login.login_route");
            return $this->redirectByRoute($redirectRoute);
        }

        $user = ArrayTool::objectToArray($user);
        $params = array_merge($params, $user);


        /**
         * @var $kit LightKitPageRenderer
         */
        $kit = $container->get("kit");
        return $kit->renderPage($page, $params, $updator);
    }
}