<?php


namespace Ling\Light_Kit_Admin\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_Kit_Admin\Helper\LightKitAdminHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;


/**
 * The LightKitAdminPlanetInstaller class.
 */
class LightKitAdminPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface, LightPlanetInstallerInit3HookInterface
{


    /**
     * This property holds the _output for this instance.
     * @var OutputInterface
     */
    private OutputInterface $_output;


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Admin";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: copying Ling.Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("$planetDotName: registering menu items...");
        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("root", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        $output->write("$planetDotName: registering micro-permissions...");
        $mpFile = $appDir . "/config/data/Ling.Light_Kit_Admin/Ling.Light_MicroPermission/kit_admin.profile.byml";
        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->registerMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // kit editor
        //--------------------------------------------
        $sRootDir = LightKitAdminHelper::getLightKitEditorRootPath('${app_dir}');
        /**
         * @var $ke LightKitEditorService
         */
        $ke = $this->container->get("kit_editor");
        $output->write("$planetDotName: registering websites...");
        $ke->registerWebsite([
            "identifier" => "Ling.Light_Kit_Admin",
            "provider" => "Ling.Light_Kit_Admin",
            "engine" => "babyYaml",
            "rootDir" => $sRootDir,
            "label" => "Ling.Light_Kit_Admin",
        ]);
        $output->write("<success>ok.</success>" . PHP_EOL);

    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Admin";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: removing Ling.Light_EasyRoute routes from master...");
        LightEasyRouteHelper::removeRoutesFromMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("$planetDotName: registering menu items...");
        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);

        $util->removeItemsFromMainMenuSection("root", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: unregistering open events...");
        LightEventsHelper::unregisterOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        $output->write("$planetDotName: unregistering micro-permissions...");
        $mpFile = $appDir . "/config/data/Ling.Light_Kit_Admin/Ling.Light_MicroPermission/kit_admin.profile.byml";
        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->unregisterMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);

        //--------------------------------------------
        // kit editor
        //--------------------------------------------
        /**
         * @var $ke LightKitEditorService
         */
        $ke = $this->container->get("kit_editor");
        $output->write("$planetDotName: unregistering websites...");
        $ke->unregisterWebsite("Ling.Light_Kit_Admin");
        $output->write("<success>ok.</success>" . PHP_EOL);

    }


    /**
     * @implementation
     */
    public function init3(string $appDir, OutputInterface $output, array $options = []): void
    {


        $this->_output = $output;
        //--------------------------------------------
        // DB TABLES INSTALL
        //--------------------------------------------
        /**
         * The peculiarity of lka plugin is that it doesn't own any tables.
         * Instead, it uses the tables provided by the Light_UserDatabase plugin.
         *
         */

        //--------------------------------------------
        //
        //--------------------------------------------
        /**
         * @var $db LightDatabaseService
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

        $this->message("adding tables content." . PHP_EOL);


        $res = $db->transaction(function () use ($userDb, $output) {


            /**
             * Here we will do the following:
             *
             * - create "lka_admin" user in the "default" user group
             * - create a "lka_dude" user in the "default" user group
             *
             * - create a "Ling.Light_Kit_Admin.admin" permission group
             * - create a "Ling.Light_Kit_Admin.user" permission group
             *
             * - create a "Ling.Light_Kit_Admin.admin" permission
             * - create a "Ling.Light_Kit_Admin.user" permission
             *
             * - bind the "Ling.Light_Kit_Admin.admin" permission to the "Ling.Light_Kit_Admin.admin" permission group
             * - bind the "Ling.Light_Kit_Admin.user" permission to the "Ling.Light_Kit_Admin.admin" permission group
             * - bind the "Ling.Light_Kit_Admin.user" permission to the "Ling.Light_Kit_Admin.user" permission group
             *
             * - bind the "lka_admin" user to the "Ling.Light_Kit_Admin.admin" permission group
             * - bind the "lka_dude" user to the "Ling.Light_Kit_Admin.user" permission group
             *
             */

            $factory = $userDb->getFactory();
            $defaultGroupId = $factory->getUserGroupApi()->getUserGroupIdByName('default');


            $userAdmin = "lka_admin";
            $adminInfo = $userDb->getUserInfoByIdentifier($userAdmin);
            if (false === $adminInfo) {
                $this->message("adding <b>$userAdmin</b> in <b>lud_user</b>." . PHP_EOL);
                $adminId = $userDb->addUser([
                    'user_group_id' => $defaultGroupId,
                    'identifier' => $userAdmin,
                    'pseudo' => "Boss",
                    'password' => "boss",
                    'avatar_url' => "/libs/universe/Ling/Light_Kit_Admin/img/avatars/lka_admin.png",
                    'extra' => [],
                ]);
            } else {
                $this->message("user <b>$userAdmin</b> already found in <b>lud_user</b>, skipping." . PHP_EOL);
                $adminId = $adminInfo['id'];
            }


            $userDude = "lka_dude";
            $userInfo = $userDb->getUserInfoByIdentifier($userDude);
            if (false === $userInfo) {
                $this->message("adding <b>$userDude</b> in <b>lud_user</b>." . PHP_EOL);
                $userId = $userDb->addUser([
                    'user_group_id' => $defaultGroupId,
                    'identifier' => $userDude,
                    'pseudo' => "Dude",
                    'password' => "dude",
                    'avatar_url' => "/libs/universe/Ling/Light_Kit_Admin/img/avatars/user_avatar.png",
                    'extra' => [],
                ]);
            } else {
                $userId = $userInfo['id'];
                $this->message("user <b>$userDude</b> already found in <b>lud_user</b>, skipping." . PHP_EOL);
            }


            $permissionGroupAdmin = "Ling.Light_Kit_Admin.admin";
            $this->message("adding <b>$permissionGroupAdmin</b> in <b>lud_permission_group</b> if it doesn't exist." . PHP_EOL);
            $groupAdminId = $factory->getPermissionGroupApi()->insertPermissionGroup([
                "name" => $permissionGroupAdmin,
            ]);


            $permissionGroupUser = "Ling.Light_Kit_Admin.user";
            $this->message("adding <b>$permissionGroupUser</b> <b>lud_permission_group</b> if it doesn't exist." . PHP_EOL);
            $groupUserId = $factory->getPermissionGroupApi()->insertPermissionGroup([
                "name" => $permissionGroupUser,
            ]);


            $permissionAdmin = "Ling.Light_Kit_Admin.admin";
            $this->message("adding <b>$permissionAdmin</b> <b>lud_permission</b> if it doesn't exist." . PHP_EOL);
            $permissionAdminId = $factory->getPermissionApi()->insertPermission([
                "name" => $permissionAdmin,
            ]);


            $permissionUser = "Ling.Light_Kit_Admin.user";
            $this->message("adding <b>$permissionUser</b> in <b>lud_permission</b> if it doesn't exist." . PHP_EOL);
            $permissionUserId = $factory->getPermissionApi()->insertPermission([
                "name" => $permissionUser,
            ]);


            $this->message("adding <b>$permissionGroupAdmin/$permissionAdmin</b> in <b>lud_permission_group_has_permission</b> if it doesn't exist." . PHP_EOL);
            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permissionAdminId,
            ]);


            $this->message("adding <b>$permissionGroupAdmin/$permissionUser</b> in <b>lud_permission_group_has_permission</b> if it doesn't exist." . PHP_EOL);
            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permissionUserId,
            ]);

            $this->message("adding <b>$permissionGroupUser/$permissionUser</b> in <b>lud_permission_group_has_permission</b> if it doesn't exist." . PHP_EOL);
            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupUserId,
                "permission_id" => $permissionUserId,
            ]);


            //--------------------------------------------
            // USERS
            //--------------------------------------------
            $this->message("adding $userAdmin/$permissionGroupAdmin in <b>lud_user_has_permission_group</b> if it doesn't exist." . PHP_EOL);
            $factory->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $adminId,
                "permission_group_id" => $groupAdminId,
            ]);


            $this->message("adding $userDude/$permissionGroupUser in <b>lud_user_has_permission_group</b> if it doesn't exist." . PHP_EOL);
            $factory->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $userId,
                "permission_group_id" => $groupUserId,
            ]);


        }, $exception);

        if (false === $res) {
            throw $exception;
        }
    }

    /**
     * @implementation
     */
    public function undoInit3(string $appDir, OutputInterface $output, array $options = []): void
    {


        $this->_output = $output;
        //--------------------------------------------
        // DB TABLES INSTALL
        //--------------------------------------------
        /**
         * The peculiarity of lka plugin is that it doesn't own any tables.
         * Instead, it uses the tables provided by the Light_UserDatabase plugin.
         *
         */

        //--------------------------------------------
        //
        //--------------------------------------------
        /**
         * @var $db LightDatabaseService
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

        $this->message("removing tables content." . PHP_EOL);


        $res = $db->transaction(function () use ($userDb, $output) {


            $factory = $userDb->getFactory();
            $defaultGroupId = $factory->getUserGroupApi()->getUserGroupIdByName('default');


            $userAdmin = "lka_admin";
            $adminInfo = $userDb->getUserInfoByIdentifier($userAdmin);
            if (false !== $adminInfo) {
                $this->message("removing <b>$userAdmin</b> from <b>lud_user</b>." . PHP_EOL);
                $userDb->deleteUser($userAdmin);
                $adminId = $adminInfo['id'];
            } else {
                $this->message("user <b>$userAdmin</b> not found in <b>lud_user</b>, skipping." . PHP_EOL);
            }


            $userDude = "lka_dude";
            $userInfo = $userDb->getUserInfoByIdentifier($userDude);
            if (false !== $userInfo) {
                $this->message("removing <b>$userDude</b> from <b>lud_user</b>." . PHP_EOL);
                $userDb->deleteUser($userDude);
                $userId = $userInfo['id'];
            } else {
                $this->message("user <b>$userDude</b> not found in <b>lud_user</b>, skipping." . PHP_EOL);
            }


            $permissionGroupAdmin = "Ling.Light_Kit_Admin.admin";
            $this->message("removing <b>$permissionGroupAdmin</b> from <b>lud_permission_group</b> if it exists." . PHP_EOL);
            $factory->getPermissionGroupApi()->deletePermissionGroupByName($permissionGroupAdmin);


            $permissionGroupUser = "Ling.Light_Kit_Admin.user";
            $this->message("removing <b>$permissionGroupUser</b> <b>lud_permission_group</b> if it exists." . PHP_EOL);
            $factory->getPermissionGroupApi()->deletePermissionGroupByName($permissionGroupUser);


            $permissionAdmin = "Ling.Light_Kit_Admin.admin";
            $this->message("removing <b>$permissionAdmin</b> <b>lud_permission</b> if it exists." . PHP_EOL);
            $factory->getPermissionApi()->deletePermissionByName($permissionAdmin);


            $permissionUser = "Ling.Light_Kit_Admin.user";
            $this->message("removing <b>$permissionUser</b> <b>lud_permission</b> if it exists." . PHP_EOL);
            $factory->getPermissionApi()->deletePermissionByName($permissionUser);


        }, $exception);

        if (false === $res) {
            throw $exception;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the output, assuming it's set.
     * @param string $message
     */
    private function message(string $message)
    {
        $this->_output->write("Ling.Light_Kit_Admin: " . $message);
    }
}