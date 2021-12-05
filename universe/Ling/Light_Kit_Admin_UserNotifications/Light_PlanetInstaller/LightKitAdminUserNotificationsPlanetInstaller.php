<?php


namespace Ling\Light_Kit_Admin_UserNotifications\Light_PlanetInstaller;



use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;

/**
 * The LightKitAdminUserNotificationsPlanetInstaller class.
 */
class LightKitAdminUserNotificationsPlanetInstaller extends LightKitAdminBasePlanetInstaller
{

    /**
     * Builds the LightKitAdminUserNotificationsPlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->microPermissionProfile = "Ling.Light_Kit_Admin_UserNotifications/Ling.Light_MicroPermission/kit_admin_user_notifications.profile.generated.byml";
    }

}