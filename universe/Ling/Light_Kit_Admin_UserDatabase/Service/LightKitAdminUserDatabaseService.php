<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BMenu\DirectInjection\BMenuDirectInjectorInterface;
use Ling\Light_BMenu\Menu\LightBMenu;

/**
 * The LightKitAdminUserDatabaseService class.
 */
class LightKitAdminUserDatabaseService implements BMenuDirectInjectorInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightKitAdminUserDataService instance.
     */
    public function __construct()
    {
        $this->container = null;
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




    //--------------------------------------------
    // BMENU
    //--------------------------------------------
    /**
     * @implementation
     */
    public function inject(string $menuStructureId, LightBMenu $menu)
    {

        $appDir = $this->container->getApplicationDir();
        $allItems = BabyYamlUtil::readFile($appDir . "/config/data/Light_Kit_Admin_UserDatabase/bmenu/admin_main_menu-items.byml");
        $userItems = $allItems['user'];
        $adminItems = $allItems['admin'];

        $parentPath = "lka-user";
        foreach ($userItems as $item) {
            $menu->appendItem($item, $parentPath);
        }


        $parentPath = "lka-admin";
        foreach ($adminItems as $item) {
            $menu->appendItem($item, $parentPath);
        }
    }


}