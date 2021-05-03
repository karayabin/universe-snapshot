<?php


namespace Ling\Light_Kit_Admin\Light_BMenu\MenuModifier;


use Ling\Bat\ArrayTool;
use Ling\CheapLogger\CheapLogger;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BMenu\MenuModifier\MenuModifierInterface;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserManager\UserManager\LightUserManagerInterface;

/**
 * The LightKitAdminBMenuModifier class.
 */
class LightKitAdminBMenuModifier implements MenuModifierInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    private ?LightServiceContainerInterface $container;


    /**
     * Builds the LightKitAdminBMenuHost instance.
     */
    public function __construct()
    {
        $this->container = null;
    }




    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }






    //--------------------------------------------
    // MenuModifierInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function updateItems(string $menuName, array &$items): void
    {
        if ('Ling.Light_Kit_Admin/admin_main_menu' === $menuName) {
            //--------------------------------------------
            // RIGHTS MANAGEMENT
            //--------------------------------------------
            /**
             * @var $userManager LightUserManagerInterface
             */
            $userManager = $this->container->get("user_manager");

            /**
             * @var $user LightWebsiteUser
             */
            $user = $userManager->getUser();
            $items = ArrayTool::filterRecursive($items, function ($v) use ($user) {
                if (
                    is_array($v) &&
                    array_key_exists('_right', $v)
                ) {
                    return $user->hasRight($v['_right']);
                }
                return true;
            });


            //--------------------------------------------
            // CONVERTING ROUTES TO URLS
            //--------------------------------------------
            /**
             * @var $router LightReverseRouterService
             */
            $router = $this->container->get("reverse_router");
            ArrayTool::updateNodeRecursive($items, function (array &$row) use ($router) {


                if (
                    array_key_exists("route", $row) &&
                    is_string($row['route']) &&
                    array_key_exists("id", $row) &&
                    array_key_exists("children", $row)
                ) {
                    $routeParams = $row['route_url_params'] ?? [];
                    $row["url"] = $router->getUrl($row['route'], $routeParams);
                }
            });
        }
    }

}