<?php


namespace Ling\Light_MicroPermission\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
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
     * This property holds the map for this instance.
     * It's an array of micro-permission => (array of) permissions.
     *
     * @var array
     */
    protected $map;


    /**
     * Builds the LightMicroPermissionService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->map = [];
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
     *
     * Registers the micro-permissions profile using our open system.
     *
     * See more details in the @page(micro-permission conception notes).
     *
     * @param string $file
     * @throws \Exception
     */
    public function registerMicroPermissionsToOpenSystemByProfile(string $file)
    {


        $rootDir = $this->container->getApplicationDir() . "/config/open/Ling.Light_MicroPermission";
        $toCreate = [];

        if (true === file_exists($file)) {

            $profile = BabyYamlUtil::readFile($file);
            foreach ($profile as $permission => $microPerms) {
                foreach ($microPerms as $mp) {


                    $p = explode(".", $mp);
                    $firstComponent = array_shift($p);
                    $dstFile = $rootDir . "/$firstComponent.byml";

                    $arr = array_key_exists($dstFile, $toCreate) ? $toCreate[$dstFile] : [];


                    if (true === empty($p)) {
                        $arr["*"] = [$permission];
                    } else {
                        $path = "";
                        while (false === empty($p)) {
                            $nextComponent = array_shift($p);
                            if ('' !== $path) {
                                $path .= ".";
                            }
                            $path .= $nextComponent;

                            $val = BDotTool::getDotValue($path . ".*", $arr, []);
                            $val[] = $permission;
                            $val = array_unique($val);
                            BDotTool::setDotValue($path . ".*", $val, $arr);


                        }
                    }


                    $toCreate[$dstFile] = $arr;


                }
            }


            if ($toCreate) {
                foreach ($toCreate as $dstFile => $arr) {
                    if (true === file_exists($dstFile)) {
                        $_arr = BabyYamlUtil::readFile($dstFile);
                        $arr = array_replace_recursive($_arr, $arr);
                    }
                    BabyYamlUtil::writeFile($arr, $dstFile);
                }
            }


        } else {
            throw new LightMicroPermissionException("LightMicroPermissionService: file not found: $file.");
        }
    }


    /**
     *
     * Unregisters the micro-permissions profile from our open system.
     *
     * See more details in the @page(micro-permission conception notes).
     *
     * @param string $file
     * @throws \Exception
     */
    public function unregisterMicroPermissionsToOpenSystemByProfile(string $file)
    {


        $rootDir = $this->container->getApplicationDir() . "/config/open/Ling.Light_MicroPermission";


        if (true === file_exists($file)) {


            $profile = BabyYamlUtil::readFile($file);
            foreach ($profile as $permission => $microPerms) {
                foreach ($microPerms as $mp) {
                    $p = explode(".", $mp);
                    $firstComponent = array_shift($p);
                    $dstFile = $rootDir . "/$firstComponent.byml";
                    $arr = BabyYamlUtil::readFile($dstFile);
                    $hasChanged = false;


                    if (true === empty($p)) {
                        $arr = ArrayTool::filterRecursive($arr, function ($v) use ($permission, &$hasChanged) {
                            if ($permission === $v) {
                                $hasChanged = true;
                                return false;
                            }
                            return true;
                        });
                    } else {

                        $path = "";
                        while (false === empty($p)) {
                            $nextComponent = array_shift($p);
                            if ('' !== $path) {
                                $path .= ".";
                            }
                            $path .= $nextComponent;
                        }


                        $val = BDotTool::getDotValue($path, $arr, []);
                        $val = ArrayTool::filterRecursive($val, function ($v) use ($permission, &$hasChanged) {
                            if ($permission === $v) {
                                $hasChanged = true;
                                return false;
                            }
                            return true;
                        });


                        // resetting indexes
                        if(true === is_array($val) && true === array_key_exists("*", $val)){
                            $val['*'] = array_merge($val['*']);
                        }
                        BDotTool::setDotValue($path, $val, $arr);
                    }


                    if (true === $hasChanged) {

                        $this->cleanUpAsterisks($arr);
                        $this->cleanUpEmptyArrays($arr, $arr);
                        BabyYamlUtil::writeFile($arr, $dstFile);
                    }
                }
            }
        } else {
            throw new LightMicroPermissionException("LightMicroPermissionService: file not found: $file.");
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
        $this->map = array_merge_recursive($this->map, BabyYamlUtil::readFile($file));
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
                if (false === array_key_exists($mp, $this->map)) {
                    $this->map[$mp] = [];
                } elseif (false === is_array($this->map[$mp])) {
                    $this->map[$mp] = [$this->map[$mp]];
                }
                $this->map[$mp][] = $permission;
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


        //--------------------------------------------
        // MAP SYSTEM
        //--------------------------------------------
        $permissions = [];
        if (false === empty($this->map)) {
            if (array_key_exists($microPermission, $this->map)) {
                $permissions = $this->map[$microPermission];
            } else {
                $p = explode(".", $microPermission);
                $perm = '';
                $c = false;
                while (true) {
                    if (true === $c) {
                        $perm .= '.';
                    }
                    $perm .= array_shift($p);
                    if (array_key_exists($perm, $this->map)) {
                        $permissions = $this->map[$perm];
                        break;
                    }


                    if (empty($p)) {
                        break;
                    }
                    $c = true;
                }
            }
        }


        //--------------------------------------------
        // OPEN SYSTEM
        //--------------------------------------------
        if (true === empty($permissions)) {
            $p = explode(".", $microPermission);
            $firstComponent = array_shift($p);
            $openFile = $this->container->getApplicationDir() . "/config/open/Ling.Light_MicroPermission/$firstComponent.byml";
            if (true === file_exists($openFile)) {
                $arr = BabyYamlUtil::readFile($openFile);
                $grantedPermissions = $arr["*"] ?? [];
                foreach ($grantedPermissions as $permission) {
                    if (true === $user->hasRight($permission)) {
                        return true;
                    }
                }

                do {
                    if (empty($p)) {
                        break;
                    }
                    $nextComponent = array_shift($p);
                    if (true === array_key_exists($nextComponent, $arr)) {
                        $arr = $arr[$nextComponent];
                        $grantedPermissions = $arr["*"] ?? [];
                        foreach ($grantedPermissions as $permission) {
                            if (true === $user->hasRight($permission)) {
                                return true;
                            }
                        }
                    }
                } while (true);
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




    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Cleans up asterisks recursively in the given array.
     * @param array $arr
     */
    private function cleanUpAsterisks(array &$arr)
    {
        foreach ($arr as $k => &$v) {
            if ('*' === $k && true === empty($arr[$k])) {
                unset($arr[$k]);
            } else {
                if (true === is_array($v)) {
                    $this->cleanUpAsterisks($v);
                }
            }
        }
    }

    /**
     * Cleans up empty arrays recursively in the given array.
     * @param array $arr
     * @param array $testedArray
     * @param string $path
     */
    private function cleanUpEmptyArrays(array &$arr, array $testedArray = [], string $path = "")
    {
        foreach ($testedArray as $k => &$v) {
            if (true === is_array($v)) {
                if ('' !== $path) {
                    $path .= ".";
                }
                $path .= $k;

                if (true === empty($v)) {
                    BDotTool::unsetDotValue($path, $arr);


                    do {

                        $p = BDotTool::getPathComponents($path);
                        array_pop($p);
                        $path = implode(".", $p);
                        $val = BDotTool::getDotValue($path, $arr);
                        if (true === empty($val)) {
                            BDotTool::unsetDotValue($path, $arr);
                        }
                    } while (false === empty($p));


                } else {


                    $this->cleanUpEmptyArrays($arr, $v, $path);
                }


                $p = explode(".", $path);
                array_pop($p);
                $path = implode(".", $p);


            }
        }
    }
}