<?php


namespace Ling\Light_Kit_Admin_LoginNotifier\Light_PlanetInstaller;


use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;

/**
 * The LightKitAdminLoginNotifierPlanetInstaller class.
 */
class LightKitAdminLoginNotifierPlanetInstaller extends LightKitAdminBasePlanetInstaller
{


    /**
     * Builds the LightKitAdminLoginNotifierPlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->microPermissionProfile = "Ling.Light_Kit_Admin_LoginNotifier/Ling.Light_MicroPermission/kit_admin_login_notifier.profile.generated.byml";
    }
}