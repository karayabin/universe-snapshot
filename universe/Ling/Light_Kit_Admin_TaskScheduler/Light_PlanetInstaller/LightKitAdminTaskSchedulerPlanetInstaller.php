<?php


namespace Ling\Light_Kit_Admin_TaskScheduler\Light_PlanetInstaller;


use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;

/**
 * The LightKitAdminTaskSchedulerPlanetInstaller class.
 */
class LightKitAdminTaskSchedulerPlanetInstaller extends LightKitAdminBasePlanetInstaller
{


    /**
     * Builds the LightKitAdminTaskSchedulerPlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->microPermissionProfile = "Ling.Light_Kit_Admin_TaskScheduler/Ling.Light_MicroPermission/kit_admin_task_scheduler.profile.generated.byml";
    }
}