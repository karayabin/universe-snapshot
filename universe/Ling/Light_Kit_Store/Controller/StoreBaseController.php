<?php


namespace Ling\Light_Kit_Store\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_ControllerHub\Helper\LightControllerHubHelper;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;
use Ling\Light_Kit_Store\Helper\LightKitStoreCartHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreProductHelper;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightOpenUser;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_Vars\Service\LightVarsService;


/**
 * The StoreBaseController class.
 *
 */
abstract class StoreBaseController extends LightController
{


    /**
     * Renders the given page using the @page(kit service).
     * Options are directly forwarded to @page(the LightKitPageRenderer->renderPage method).
     *
     * @param string $page
     * @param array $options
     * @return HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderPage(string $page, array $options = []): HttpResponseInterface
    {
        $this->setControllerGlobalVar("controller", $this);

        $cartInfo = $this->getCartItemsInfo();
        $this->setControllerGlobalVar("cartInfo", $cartInfo);

        $websiteId = "Ling.Light_Kit_Store.front"; // should this be hardcoded?


        /**
         * @var $_ke LightKitEditorService
         */
        $_ke = $this->getContainer()->get("kit_editor");


        $widgetVariables = $options['widgetVariables'] ?? [];


        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();
        $widgetVariables["header.kitstore_header"]["user"] = $user;


        // --
        $options['widgetVariables'] = $widgetVariables;


        return $_ke->renderPage($websiteId, $page, $options);

//        $kit = $this->getKitPageRendererInstance();
//        return new HttpResponse($kit->renderPage($page, $options));
    }


    /**
     * Proxy to the reverse router's getUrl method.
     * This method is designed to be used inside (kit) templates.
     *
     *
     * @param string $routeName
     * @param array $urlParams
     * @param bool $useAbsolute
     * @return string
     * @throws \Exception
     */
    public function getLink(string $routeName, array $urlParams = [], bool $useAbsolute = false): string
    {

        /**
         * @var $_rr LightReverseRouterService
         */
        $_rr = $this->getContainer()->get("reverse_router");
        return $_rr->getUrl($routeName, $urlParams, $useAbsolute);
    }


    /**
     * Returns the product link format.
     *
     * Note: this is designed to be used across the whole application for consistency purpose (i.e. use this any
     * time you need to link to a product).
     * Then use the LightKitStoreProductHelper::getUrlItemByFormatAndItem method to convert to a link.
     *
     * @return string
     * @throws \Exception
     */
    public function getItemUrlFormat(): string
    {
        return LightKitStoreProductHelper::getProductLinkFormat($this->getContainer());
    }

    /**
     * Returns a link to our StoreApiController's method identified by the given action.
     * Available options are:
     * - escapeSlashes: bool=true, whether to escape the backslashes of the controller name.
     *      We do this to create a js ready string.
     *
     *
     *
     * @param string $action
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function getAlcpLink(string $action, array $options = []): string
    {

        $escapeSlashes = $options['escapeSlashes'] ?? true;

        /**
         * @var $_rr LightReverseRouterService
         */
        $_rr = $this->getContainer()->get("reverse_router");
        $controller = "Ling\Light_Kit_Store\Controller\StoreApiController";
        if (true === $escapeSlashes) {
            $controller = str_replace('\\', '\\\\', $controller);
        }


        $urlParams = [
            "execute" => $controller . "->execute",
            "action" => $action,
        ];
        return $_rr->getUrl(LightControllerHubHelper::getRouteName(), $urlParams, false);
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets a variable globally, with the "controller" namespace.
     *
     * This is part of the global controller vars convention.
     * https://github.com/lingtalfi/TheBar/blob/master/discussions/global-controller-vars.md
     *
     *
     *
     * @param string $key
     * @param $value
     * @throws \Exception
     */
    protected function setControllerGlobalVar(string $key, $value)
    {
        /**
         * @var $_va LightVarsService
         */
        $_va = $this->getContainer()->get("vars");
        $_va->setVar("controller.$key", $value);
    }


    /**
     * Returns the kit store service instance.
     *
     * @return LightKitStoreService
     * @throws \Exception
     */
    protected function getKitStoreService(): LightKitStoreService
    {
        return $this->getContainer()->get("kit_store");
    }

    /**
     * Returns a redirect response based on the given type.
     * Available types are:
     * - 404
     * - 404_product
     *
     *
     *
     * @param string $type
     * @return HttpResponseInterface
     */
    protected function getRedirectResponse(string $type): HttpResponseInterface
    {
        /**
         * @var $_rr LightReverseRouterService
         */
        $_rr = $this->getContainer()->get("reverse_router");
        $url = $_rr->getUrl("lks_route-$type", [], true);
        return HttpRedirectResponse::create($url);
    }


    /**
     * Returns the cart items info.
     * See the LightKitStoreCartHelper::getCartInfo method for more info.
     *
     * @return array
     */
    protected function getCartItemsInfo(): array
    {
        return LightKitStoreCartHelper::getCartInfo($this->getContainer());
    }


    /**
     * Returns an open user.
     * The user is created if necessary.
     *
     *
     * @return LightOpenUser
     * @throws \Exception
     */
    protected function getUser(): LightOpenUser
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        return $_um->getOpenUser();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * Returns the LightKitPageRenderer instance to use to render the pages.
     *
     * @return LightKitPageRenderer
     * @throws \Exception
     */
//    private function getKitPageRendererInstance(): LightKitPageRenderer
//    {
//        /**
//         * @var $va LightVarsService
//         */
//        $va = $this->getContainer()->get("vars");
//        $theme = $va->getVar("kit_store_vars.front_theme", null, true);
//        $root = LightKitStoreHelper::getLightKitEditorFrontRelativeRootPath();
//
//        return LightKitEditorHelper::getBasicPageRenderer($this->getContainer(), [
//            "type" => "babyYaml",
//            "theme" => $theme,
//            "root" => $root,
//        ]);
//    }


}

