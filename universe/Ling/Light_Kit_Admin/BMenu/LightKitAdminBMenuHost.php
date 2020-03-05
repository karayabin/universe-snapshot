<?php


namespace Ling\Light_Kit_Admin\BMenu;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BMenu\Host\LightBMenuAbstractHost;
use Ling\Light_BMenu\Menu\LightBMenu;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\WebsiteLightUser;
use Ling\Light_UserManager\UserManager\LightUserManagerInterface;


/**
 * The LightKitAdminBMenuHost class.
 */
class LightKitAdminBMenuHost extends LightBMenuAbstractHost
{


    /**
     * This property holds the base directory for this instance.
     * @var string
     */
    protected $baseDir;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightKitAdminBMenuHost instance.
     */
    public function __construct()
    {
        $this->baseDir = null;
        $this->container = null;
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function prepareBaseMenu(LightBMenu $menu)
    {

        if (null === $this->baseDir) {
            throw new LightKitAdminException("Undefined baseDir directory.");
        }


        $menuStructureFile = $this->baseDir . "/$this->menuType/$this->menuStructureId.byml";

        if (false === file_exists($menuStructureFile)) {
            throw new LightKitAdminException("Menu configuration file not found in $menuStructureFile.");
        }

        $menuItems = BabyYamlUtil::readFile($menuStructureFile);
        $menu->setItems($menuItems);

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    public function onMenuCompiled(array &$menu)
    {
        //--------------------------------------------
        // RIGHTS MANAGEMENT
        //--------------------------------------------
        /**
         * @var $userManager LightUserManagerInterface
         */
        $userManager = $this->container->get("user_manager");

        /**
         * @var $user WebsiteLightUser
         */
        $user = $userManager->getUser();
        $menu = ArrayTool::filterRecursive($menu, function ($v) use ($user) {
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
        ArrayTool::updateNodeRecursive($menu, function (array &$row) use ($router) {
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



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Sets the baseDir.
     *
     * @param string $baseDir
     */
    public function setBaseDir(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }


    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}