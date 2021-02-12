<?php


namespace Ling\Light_Train\Light_PluginInstaller;



use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;


/**
 * The LightTrainPluginInstaller class.
 */
class LightTrainPluginInstaller extends LightUserDatabaseBasePluginInstaller
{
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
            "tes_table1",
        ];
    }


}