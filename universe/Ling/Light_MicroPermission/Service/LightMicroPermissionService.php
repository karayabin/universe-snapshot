<?php


namespace Ling\Light_MicroPermission\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;
use Ling\Light_User\LightUserInterface;
use Ling\Light_UserManager\Service\LightUserManagerService;

/**
 * The LightMicroPermissionService class.
 */
class LightMicroPermissionService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the microPermissionsMap for this instance.
     * It's an array of micro-permission => (array of) permissions.
     *
     * @var array
     */
    protected $microPermissionsMap;


    /**
     * Builds the LightMicroPermissionService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->microPermissionsMap = [];
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Register the micro-permission bindings defined in the given file.
     * See more details in the @page(micro-permission conception notes).
     *
     * @param string $file
     */
    public function registerMicroPermissionsByFile(string $file)
    {
        $this->microPermissionsMap = array_merge_recursive($this->microPermissionsMap, BabyYamlUtil::readFile($file));
    }


    /**
     * Registers the micro-permissions profile.
     * See more details in the @page(micro-permission conception notes).
     *
     *
     * @param string $file
     */
    public function registerMicroPermissionsByProfile(string $file)
    {
        $profile = BabyYamlUtil::readFile($file);
        foreach ($profile as $permission => $microPerms) {
            foreach ($microPerms as $mp) {
                if (false === array_key_exists($mp, $this->microPermissionsMap)) {
                    $this->microPermissionsMap[$mp] = [];
                } elseif (false === is_array($this->microPermissionsMap[$mp])) {
                    $this->microPermissionsMap[$mp] = [$this->microPermissionsMap[$mp]];
                }
                $this->microPermissionsMap[$mp][] = $permission;
            }
        }
    }


    /**
     * Checks that the user has the given micro-permission, and throws an exception if that's not the case.
     * @param string $microPermission
     */
    public function checkMicroPermission(string $microPermission)
    {
        if (false === $this->hasMicroPermission($microPermission)) {
            throw new LightMicroPermissionException("Permission denied: the user doesn't have the micro-permission: \"$microPermission\".");
        }
    }


    /**
     * Returns whether the current user has the given micro-permission.
     *
     * @param string $microPermission
     * @return bool
     * @throws \Exception
     */
    public function hasMicroPermission(string $microPermission): bool
    {

        /**
         * @var $userManager LightUserManagerService
         */
        $userManager = $this->container->get("user_manager");
        /**
         * @var $user LightUserInterface
         */
        $user = $userManager->getUser();
        if (true === $user->hasRight("*")) {
            return true;
        }


        $permissions = [];
        if (array_key_exists($microPermission, $this->microPermissionsMap)) {
            $permissions = $this->microPermissionsMap[$microPermission];
        } else {
            $p = explode(".", $microPermission);
            $perm = '';
            $c = false;
            while (true) {
                if (true === $c) {
                    $perm .= '.';
                }
                $perm .= array_shift($p);
                if (array_key_exists($perm, $this->microPermissionsMap)) {
                    $permissions = $this->microPermissionsMap[$perm];
                    break;
                }


                if (empty($p)) {
                    break;
                }
                $c = true;
            }
        }


        if (empty($permissions)) {
            return false;
        }


        if (false === is_array($permissions)) {
            $permissions = [$permissions];
        }
        foreach ($permissions as $permission) {
            if (true === $user->hasRight($permission)) {
                return true;
            }
        }
        return false;
    }
}