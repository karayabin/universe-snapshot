<?php


namespace Ling\Light_LoginNotifier\Light_PluginInstaller;


use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;


/**
 * The LightLoginNotifierPluginInstaller class.
 */
class LightLoginNotifierPluginInstaller extends LightUserDatabaseBasePluginInstaller
{


    //--------------------------------------------
    // TableScopeAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getTableScope(): array
    {
        return [
            "lln_connexion",
        ];
    }


}