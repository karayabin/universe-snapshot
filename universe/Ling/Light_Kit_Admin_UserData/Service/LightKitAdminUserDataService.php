<?php


namespace Ling\Light_Kit_Admin_UserData\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BMenu\DirectInjection\BMenuDirectInjectorInterface;
use Ling\Light_BMenu\Menu\LightBMenu;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightKitAdminUserDataService class.
 */
class LightKitAdminUserDataService implements PluginInstallerInterface, BMenuDirectInjectorInterface
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
    // PLUGIN INSTALLER
    //--------------------------------------------
    /**
     * @implementation
     */
    public function install()
    {

        /**
         * Here we will:
         *
         * - bind the Light_UserData permission to the Light_Kit_Admin.admin permission group
         * - bind the Light_UserData permission to the Light_Kit_Admin.user permission group
         *
         */


        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get("plugin_installer");


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");


        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get("user_database");


        /**
         * @var $exception \Exception
         */
        $exception = null;
        $pi->debugLog("kit_admin_user_data: adding tables content.");
        $res = $db->transaction(function () use ($pi, $userDb) {

            $groupAdminId = $pi->fetchRowColumn("lud_permission_group", "id", [
                "name" => "Light_Kit_Admin.admin",
            ], true);

            $groupId = $pi->fetchRowColumn("lud_permission_group", "id", [
                "name" => "Light_Kit_Admin.user",
            ], true);

            $permAdminId = $pi->fetchRowColumn("lud_permission", "id", [
                "name" => "Light_UserData.admin",
            ], true);

            $permId = $pi->fetchRowColumn("lud_permission", "id", [
                "name" => "Light_UserData.user",
            ], true);


            $userDb->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permId,
            ]);


            $userDb->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permAdminId,
            ]);

            $userDb->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupId,
                "permission_id" => $permId,
            ]);


        }, $exception);

        if (false === $res) {
            throw $exception;
        }
    }

    /**
     * @implementation
     */
    public function uninstall()
    {
        /**
         * Here we will:
         *
         * - unbind the Light_UserData permission from the Light_Kit_Admin.user permission group
         *
         */


        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get("plugin_installer");


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");


        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get("user_database");


        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () use ($pi, $userDb) {
            $groupId = $pi->fetchRowColumn("lud_permission_group", "id", [
                "name" => "Light_Kit_Admin.user",
            ], true);

            $groupAdminId = $pi->fetchRowColumn("lud_permission_group", "id", [
                "name" => "Light_Kit_Admin.admin",
            ], true);


            $permId = $pi->fetchRowColumn("lud_permission", "id", [
                "name" => "Light_UserData.user",
            ], true);

            $permAdminId = $pi->fetchRowColumn("lud_permission", "id", [
                "name" => "Light_UserData.admin",
            ], true);


            $api = $userDb->getFactory()->getPermissionGroupHasPermissionApi();
            $api->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupId, $permId);

            $api->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupAdminId, $permId);
            $api->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupAdminId, $permAdminId);


        }, $exception);

        if (false === $res) {
            throw $exception;
        }
    }


    /**
     * @implementation
     */
    public function isInstalled(): bool
    {
        /**
         * @var $installer LightPluginInstallerService
         */
        $installer = $this->container->get("plugin_installer");
        if (
            true === $installer->hasTable("lud_permission_group") &&
            true === $installer->hasTable("lud_permission_group_has_permission")
        ) {


            if (false !== (
                $permAdminId = $installer->fetchRowColumn("lud_permission", "id", [
                    "name" => "Light_UserData.admin",
                ]))) {


                if (false !== ($groupAdminId = $installer->fetchRowColumn("lud_permission_group", "id", [
                        "name" => "Light_Kit_Admin.admin",
                    ]))) {

                    if (
                        false !== $installer->fetchRowColumn("lud_permission_group_has_permission", "permission_group_id", [
                            "permission_group_id" => $groupAdminId,
                            "permission_id" => $permAdminId,
                        ])
                    ) {
                        return true;
                    }
                }
            }
        }
        return false;
    }


    /**
     * @implementation
     */
    public function getDependencies(): array
    {
        return [
            "Light_Kit_Admin",
            "Light_UserData",
        ];
    }

    //--------------------------------------------
    // BMenuDirectInjectorInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function inject(string $menuStructureId, LightBMenu $menu)
    {

        $appDir = $this->container->getApplicationDir();
        $allItems = BabyYamlUtil::readFile($appDir . "/config/data/Light_Kit_Admin_UserData/bmenu/admin_main_menu-items.byml");
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