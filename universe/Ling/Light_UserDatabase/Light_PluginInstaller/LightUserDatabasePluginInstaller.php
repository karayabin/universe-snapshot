<?php


namespace Ling\Light_UserDatabase\Light_PluginInstaller;


use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;


/**
 * The LightUserDatabasePluginInstaller class.
 */
class LightUserDatabasePluginInstaller extends LightUserDatabaseBasePluginInstaller
{


    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function install()
    {


        /**
         * @var $ud LightUserDatabaseService
         */
        $ud = $this->container->get("user_database");
        $ud->setIsInstalling(true);


        parent::install();



        /**
         * @var $exception \Exception
         */
        $exception = null;
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');

        $res = $db->transaction(function () {
            /**
             * @var $ud LightUserDatabaseService
             */
            $ud = $this->container->get('user_database');
            $factory = $ud->getFactory();


            //--------------------------------------------
            // CREATING THE DEFAULT USER GROUP
            //--------------------------------------------
            // default user group
            $defaultUserGroupId = $factory->getUserGroupApi()->insertUserGroup([
                "name" => "default",
            ]);


            //--------------------------------------------
            // CREATING ROOT USER
            //--------------------------------------------
            // root user
            $userId = $ud->addUser([
                'user_group_id' => $defaultUserGroupId,
                'identifier' => 'root',
                'pseudo' => 'root',
                'email' => 'root@app.com',
                'password' => 'root',
                'avatar_url' => '',
                'extra' => [],
            ]);


            // root permission group
            $permGroupId = $factory->getPermissionGroupApi()->insertPermissionGroup([
                'name' => 'root',
            ]);


            // the * permission
            $permId = $factory->getPermissionApi()->insertPermission([
                'name' => '*',
            ]);

            // bind * permission to root permission group
            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $permGroupId,
                "permission_id" => $permId,
            ]);

            // bind root user to root permission group
            $factory->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                'user_id' => $userId,
                'permission_group_id' => $permGroupId,
            ]);
        }, $exception);


        if (false === $res) {
            throw $exception;
        }


        $ud->setIsInstalling(false);
    }


    /**
     * @overrides
     */
    public function uninstall()
    {
        /**
         * removing tables in the order that avoids constraint errors.
         */
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');

        $db->executeStatement("DROP table if exists lud_permission_group_has_permission");
        $db->executeStatement("DROP table if exists lud_user_has_permission_group");
        $db->executeStatement("DROP table if exists lud_permission_group");
        $db->executeStatement("DROP table if exists lud_permission");
        $db->executeStatement("DROP table if exists lud_user_group_has_plugin_option");
        $db->executeStatement("DROP table if exists lud_plugin_option");
        $db->executeStatement("DROP table if exists lud_user");
        $db->executeStatement("DROP table if exists lud_user_group");
    }


    /**
     * @overrides
     */
    public function getDependencies(): array
    {
        return [];
    }







    //--------------------------------------------
    // TableScopeAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getTableScope(): array
    {
        return [
            "lud_user_group",
            "lud_user",
            "lud_permission_group",
            "lud_permission",
            "lud_user_has_permission_group",
            "lud_permission_group_has_permission",
            "lud_plugin_option",
            "lud_user_group_has_plugin_option",
            "tes_table1",
        ];
    }


}