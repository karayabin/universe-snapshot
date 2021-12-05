<?php


namespace Ling\Light_Kit_Admin_MailStats\Light_PlanetInstaller;



use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;

/**
 * The LightKitAdminMailStatsPlanetInstaller class.
 */
class LightKitAdminMailStatsPlanetInstaller extends LightKitAdminBasePlanetInstaller
{

    /**
     * Builds the LightKitAdminMailStatsPlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->microPermissionProfile = "Ling.Light_Kit_Admin_MailStats/Ling.Light_MicroPermission/kit_admin_mail_stats.profile.generated.byml";
    }

}