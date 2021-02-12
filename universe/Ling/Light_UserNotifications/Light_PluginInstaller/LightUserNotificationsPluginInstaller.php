<?php


namespace Ling\Light_UserNotifications\Light_PluginInstaller;


use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;


/**
 * The LightUserNotificationsPluginInstaller class.
 */
class LightUserNotificationsPluginInstaller extends LightUserDatabaseBasePluginInstaller
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



    //--------------------------------------------
    // TableScopeAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getTableScope(): array
    {
        return [
            "lun_user_notification",
        ];
    }




}