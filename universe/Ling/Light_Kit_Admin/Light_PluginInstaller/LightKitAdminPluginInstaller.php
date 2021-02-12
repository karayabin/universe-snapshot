<?php


namespace Ling\Light_Kit_Admin\Light_PluginInstaller;


use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;


/**
 * The LightKitAdminPluginInstaller class.
 */
class LightKitAdminPluginInstaller extends LightUserDatabaseBasePluginInstaller
{


    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDependencies(): array
    {
        return [
            "Ling.Light_UserDatabase",
        ];
    }

    /**
     * @implementation
     */
    public function install()
    {


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

        $this->debugMsg("kit_admin: adding tables content." . PHP_EOL);
        $res = $db->transaction(function () use ($userDb) {


            /**
             * Here we will do the following:
             *
             * - create "lka_admin" user in the "default" user group
             * - create a "lka_dude" user in the "default" user group
             *
             * - create a "Light_Kit_Admin.admin" permission group
             * - create a "Light_Kit_Admin.user" permission group
             *
             * - create a "Light_Kit_Admin.admin" permission
             * - create a "Light_Kit_Admin.user" permission
             *
             * - bind the "Light_Kit_Admin.admin" permission to the "Light_Kit_Admin.admin" permission group
             * - bind the "Light_Kit_Admin.user" permission to the "Light_Kit_Admin.admin" permission group
             * - bind the "Light_Kit_Admin.user" permission to the "Light_Kit_Admin.user" permission group
             *
             * - bind the "lka_admin" user to the "Light_Kit_Admin.admin" permission group
             * - bind the "lka_dude" user to the "Light_Kit_Admin.user" permission group
             *
             */

            $factory = $userDb->getFactory();
            $defaultGroupId = $factory->getUserGroupApi()->getUserGroupIdByName('default');

            $adminId = $userDb->addUser([
                'user_group_id' => $defaultGroupId,
                'identifier' => "lka_admin",
                'pseudo' => "Boss",
                'password' => "boss",
                'avatar_url' => "/plugins/Light_Kit_Admin/img/avatars/lka_admin.png",
                'extra' => [],
            ]);

            $userId = $userDb->addUser([
                'user_group_id' => $defaultGroupId,
                'identifier' => "lka_dude",
                'pseudo' => "Dude",
                'password' => "dude",
                'avatar_url' => "/plugins/Light_Kit_Admin/img/avatars/user_avatar.png",
                'extra' => [],
            ]);


            $groupAdminId = $factory->getPermissionGroupApi()->insertPermissionGroup([
                "name" => "Light_Kit_Admin.admin",
            ]);

            $groupUserId = $factory->getPermissionGroupApi()->insertPermissionGroup([
                "name" => "Light_Kit_Admin.user",
            ]);

            $permissionUserId = $factory->getPermissionApi()->insertPermission([
                "name" => "Light_Kit_Admin.user",
            ]);

            $permissionAdminId = $factory->getPermissionApi()->insertPermission([
                "name" => "Light_Kit_Admin.admin",
            ]);

            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permissionAdminId,
            ]);

            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permissionUserId,
            ]);

            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupUserId,
                "permission_id" => $permissionUserId,
            ]);


            //--------------------------------------------
            // USERS
            //--------------------------------------------
            // admin
            $factory->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $adminId,
                "permission_group_id" => $groupAdminId,
            ]);

            // user
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
    public function uninstall()
    {

        $this->debugMsg("kit_admin: removing tables content." . PHP_EOL);

        /**
         * @var $wrapper SimplePdoWrapperInterface
         */
        $wrapper = $this->container->get('database');


        if (true === $this->hasTable("lud_user")) {


            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $wrapper->transaction(function () use ($wrapper) {

                $wrapper->delete("lud_user", [
                    "identifier" => "lka_dude",
                ]);

                $wrapper->delete("lud_user", [
                    "identifier" => "lka_admin",
                ]);
            }, $exception);

            if (false === $res) {
                throw $exception;
            }
        }

        if (true === $this->hasTable("lud_permission_group")) {


            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $wrapper->transaction(function () use ($wrapper) {

                $wrapper->delete("lud_permission_group", [
                    "name" => "Light_Kit_Admin.admin",
                ]);
                $wrapper->delete("lud_permission_group", [
                    "name" => "Light_Kit_Admin.user",
                ]);

            }, $exception);

            if (false === $res) {
                throw $exception;
            }
        }

        if (true === $this->hasTable("lud_permission")) {


            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $wrapper->transaction(function () use ($wrapper) {

                $wrapper->delete("lud_permission", [
                    "name" => "Light_Kit_Admin.admin",
                ]);

                $wrapper->delete("lud_permission", [
                    "name" => "Light_Kit_Admin.user",
                ]);

            }, $exception);

            if (false === $res) {
                throw $exception;
            }
        }
    }


}