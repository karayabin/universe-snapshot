<?php


namespace Ling\Light_Kit_Admin\Service;


use Ling\BabyYaml\Helper\BdotTool;
use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\Light_Kit_Admin\Notification\LightKitAdminNotification;
use Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService;
use Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightKitAdminService class.
 * This is the main service of the Light_Kit_Admin plugin.
 *
 * It serves as the holder of all the configuration related to (light) kit admin,
 * and in general is the central point of many things related to the light kit admin plugin.
 *
 * For instance, this service holds the notifications.
 *
 *
 */
class LightKitAdminService implements LightInitializerInterface
{


    /**
     * This property holds the notifications for this instance.
     *
     * @var LightKitAdminNotification[]
     */
    protected $notifications;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the options for this instance.
     * This array is the configuration of the light kit admin plugin.
     * @var array
     */
    protected $options;


    /**
     * Builds the LightKitAdminService instance.
     */
    public function __construct()
    {
        $this->notifications = [];
        $this->options = [];
        $this->container = null;
    }


    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @throws \Exception
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Set the options for this light kit admin service instance.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Gets the option identified by the given key (@page(bdot path)),
     * or returns the given $default otherwise (if the key is not found in the options array).
     *
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getOption(string $key, $default = null)
    {
        return BdotTool::getDotValue($key, $this->options, $default);
    }


    /**
     * Returns the notifications of this instance.
     *
     * @return LightKitAdminNotification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }


    /**
     * Adds a notification to this instance.
     *
     * @param LightKitAdminNotification $notif
     * @return void
     */
    public function addNotification(LightKitAdminNotification $notif)
    {
        $this->notifications[] = $notif;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        /**
         * @var $pih LightPluginDatabaseInstallerService
         */
        $pih = $this->container->get("plugin_database_installer");
        if (false === $pih->isInstalled("Light_Kit_Admin")) {
            $pih->install("Light_Kit_Admin");
        }
    }

    /**
     * Installs the database part of this planet.
     *
     * @throws \Exception
     */
    public function installDatabase()
    {


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () {


            /**
             * @var $userDb LightWebsiteUserDatabaseInterface
             */
            $userDb = $this->container->get("user_database");


            $userId = $userDb->addUser([
                'identifier' => "lka_dude",
                'pseudo' => "Dude",
                'password' => "dude",
                'avatar_url' => "/plugins/Light_Kit_Admin/img/avatars/user_avatar.png",
                'extra' => [],
            ]);

            $adminId = $userDb->addUser([
                'identifier' => "lka_admin",
                'pseudo' => "Boss",
                'password' => "boss",
                'avatar_url' => "/plugins/Light_Kit_Admin/img/avatars/lka_admin.png",
                'extra' => [],
            ]);

            $groupAdminId = $userDb->getPermissionGroupApi()->insertPermissionGroup([
                "name" => "Light_Kit_Admin.admin",
            ]);

            $groupUserId = $userDb->getPermissionGroupApi()->insertPermissionGroup([
                "name" => "Light_Kit_Admin.user",
            ]);

            $permissionUserId = $userDb->getPermissionApi()->insertPermission([
                "name" => "Light_Kit_Admin.user",
            ]);

            $permissionAdminId = $userDb->getPermissionApi()->insertPermission([
                "name" => "Light_Kit_Admin.admin",
            ]);

            $userDb->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupAdminId,
                "permission_id" => $permissionAdminId,
            ]);
            $userDb->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $groupUserId,
                "permission_id" => $permissionUserId,
            ]);


            //--------------------------------------------
            // USERS
            //--------------------------------------------
            // user
            $userDb->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $userId,
                "permission_group_id" => $groupUserId,
            ]);


            // admin
            $userDb->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $adminId,
                "permission_group_id" => $groupAdminId,
            ]);

            $userDb->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $adminId,
                "permission_group_id" => $groupUserId,
            ]);


        }, $exception);

        if (false === $res) {
            throw $exception;
        }
    }


    /**
     * Uninstalls the database part of this planet.
     *
     * @throws \Exception
     */
    public function uninstallDatabase()
    {
        /**
         * @var $wrapper SimplePdoWrapperInterface
         */
        $wrapper = $this->container->get('database');
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $wrapper->transaction(function () use ($wrapper) {

            $wrapper->delete("lud_user", [
                "identifier" => "lka_dude",
            ]);

            $wrapper->delete("lud_user", [
                "identifier" => "lka_admin",
            ]);
            $wrapper->delete("lud_permission_group", [
                "name" => "Light_Kit_Admin.admin",
            ]);
            $wrapper->delete("lud_permission_group", [
                "name" => "Light_Kit_Admin.user",
            ]);

            $wrapper->delete("lud_permission", [
                "name" => "Light_Kit_Admin.admin",
            ]);

            $wrapper->delete("lud_permission", [
                "name" => "Light_Kit_Admin.user",
            ]);

        }, $exception);

        if (false === $res) {
            throw $exception;
        }






    }

}