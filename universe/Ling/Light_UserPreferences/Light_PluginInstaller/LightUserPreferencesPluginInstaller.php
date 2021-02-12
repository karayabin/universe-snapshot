<?php


namespace Ling\Light_UserPreferences\Light_PluginInstaller;



use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;


/**
 * The LightUserPreferencesPluginInstaller class.
 */
class LightUserPreferencesPluginInstaller extends LightUserDatabaseBasePluginInstaller
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
            "lup_user_preference",
        ];
    }




}