<?php


namespace Ling\Light_Kit_Admin_UserPreferences\Light_PlanetInstaller;



use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;

/**
 * The LightKitAdminUserPreferencesPlanetInstaller class.
 */
class LightKitAdminUserPreferencesPlanetInstaller extends LightKitAdminBasePlanetInstaller
{


    /**
     * Builds the LightKitAdminUserPreferencesPlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->microPermissionProfile = "Ling.Light_Kit_Admin_UserPreferences/Ling.Light_MicroPermission/kit_admin_user_preferences.profile.generated.byml";
    }

}