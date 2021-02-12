<?php


namespace Ling\Light_TaskScheduler\Light_PluginInstaller;


use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;


/**
 * The LightTaskSchedulerPluginInstaller class.
 */
class LightTaskSchedulerPluginInstaller extends LightUserDatabaseBasePluginInstaller
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
            "lts_task_schedule",
        ];
    }


}