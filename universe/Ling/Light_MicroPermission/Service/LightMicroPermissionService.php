<?php


namespace Ling\Light_MicroPermission\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
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
     * This property holds the disabledNamespaces for this instance.
     * @var array
     */
    protected $disabledNamespaces;


    /**
     * Builds the LightMicroPermissionService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->microPermissionsMap = [];
        $this->disabledNamespaces = [];
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
     * Disable the micro-permission system for the given namespace, so that the
     * hasMicroPermission method will always return true for all micro-permissions of that namespace.
     * This is mainly use for test purposes.
     *
     * @param string $namespace
     */
    public function disableNamespace(string $namespace)
    {
        if (false === in_array($namespace, $this->disabledNamespaces, true)) {
            $this->disabledNamespaces[] = $namespace;
        }
    }

    /**
     * Restores all the disabled namespaces by default, or only the ones specified in the arguments.
     * The namespace argument can be either a string or an array.
     *
     * @param null|array|string $namespace
     */
    public function restoreNamespaces($namespace = null)
    {
        if (null === $namespace) {
            $this->disabledNamespaces = [];
            return;
        }
        if (false === is_array($namespace)) {
            $namespace = [$namespace];
            foreach ($namespace as $ns) {
                $index = array_search($ns, $this->disabledNamespaces);
                if (false !== $index) {
                    unset($this->disabledNamespaces[$index]);
                }
            }
        }

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
     * Returns whether the current user has the given micro-permission.
     *
     * @param string $microPermission
     * @return bool
     * @throws \Exception
     */
    public function hasMicroPermission(string $microPermission): bool
    {
        if ($this->disabledNamespaces) {
            $p = explode(".", $microPermission);
            $namespace = array_shift($p);
            if (in_array($namespace, $this->disabledNamespaces, true)) {
                return true;
            }
        }

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

        if (array_key_exists($microPermission, $this->microPermissionsMap)) {
            $permissions = $this->microPermissionsMap[$microPermission];
            if (false === is_array($permissions)) {
                $permissions = [$permissions];
            }
            foreach ($permissions as $permission) {
                if (true === $user->hasRight($permission)) {
                    return true;
                }
            }
        }
        return false;
    }
}