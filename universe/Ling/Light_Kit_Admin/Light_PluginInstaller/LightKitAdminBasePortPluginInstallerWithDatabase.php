<?php


namespace Ling\Light_Kit_Admin\Light_PluginInstaller;


use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Kit_Admin\Helper\LightKitAdminPermissionHelper;
use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightKitAdminBasePluginInstallerWithDatabase class.
 * This class was designed to help you if you create a port plugin from a plugin with database.
 *
 *
 */
abstract class LightKitAdminBasePortPluginInstallerWithDatabase extends LightUserDatabaseBasePluginInstaller
{


    /**
     * The exception class name.
     * This is only available after a call to the prepareTheNames method.
     * @var string
     */
    private $_exceptionClassName;


    /**
     * This property holds the _sourcePluginName for this instance.
     * @var string
     */
    private $_sourcePluginName;


    /**
     * This property holds the _galaxy for this instance.
     * We assume that both the port and source plugins come from the same galaxy.
     *
     * @var string
     */
    private $_galaxy;


    /**
     * Builds the LightKitAdminBasePluginInstallerWithDatabase instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_sourcePluginName = null;
        $this->_exceptionClassName = null;
        $this->_galaxy = null;
    }


    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function install()
    {
        $this->prepareTheNames();
        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $this->debugMsg("binding lka permissions for source plugin \"$this->_sourcePluginName\"." . PHP_EOL);
        LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups($userDb, $this->_sourcePluginName);

    }

    /**
     * @implementation
     */
    public function isInstalled(): bool
    {
        $this->prepareTheNames();

        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        if ($this->hasTable("lud_permission_group")) {

            $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
            $basePluginName = $this->_sourcePluginName;
            $permApi = $userDb->getFactory()->getPermissionApi();

            if (null !== ($groupAdminId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.admin"))) {

                if (null !== ($adminId = $permApi->getPermissionIdByName("$basePluginName.admin"))) {

                    $res = $userDb->getFactory()->getPermissionGroupHasPermissionApi()->getPermissionGroupHasPermission(Where::inst()
                        ->key("permission_group_id")->equals($groupAdminId)
                        ->and()->key("permission_id")->equals($adminId)
                    );

                    if (false === empty($res)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * @implementation
     */
    public function uninstall()
    {

        $this->prepareTheNames();
        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $basePluginName = $this->_sourcePluginName;

        if ($this->hasTable("lud_permission_group")) {


            $this->debugMsg("unbinding lka permissions for source plugin \"$basePluginName\"" . PHP_EOL);

            $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
            $permApi = $userDb->getFactory()->getPermissionApi();
            $groupAdminId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.admin");
            $adminId = $permApi->getPermissionIdByName("$basePluginName.admin");
            $groupUserId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.user");
            $userId = $permApi->getPermissionIdByName("$basePluginName.user");


            if (null !== $groupAdminId) {
                if (null !== $adminId) {
                    $userDb->getFactory()->getPermissionGroupHasPermissionApi()->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupAdminId, $adminId);
                }
                if (null !== $userId) {
                    $userDb->getFactory()->getPermissionGroupHasPermissionApi()->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupAdminId, $userId);
                }
            }

            if (null !== $groupUserId) {
                if (null !== $userId) {
                    $userDb->getFactory()->getPermissionGroupHasPermissionApi()->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupUserId, $userId);
                }
            }

        }

    }

    /**
     * @implementation
     */
    public function getDependencies(): array
    {
        $this->prepareTheNames();
        $res = [
            'Ling.Light_Kit_Admin',
            $this->_galaxy . '.' . $this->_sourcePluginName,
        ];
        return $res;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     */
    protected function error(string $msg)
    {
        $this->prepareTheNames();
        throw new $this->_exceptionClassName($msg);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * prepareTheNames names used by this class.
     */
    private function prepareTheNames()
    {
        if (null === $this->_galaxy) {
            $className = get_class($this);
            $p = explode('\\', $className);
            $galaxy = array_shift($p);
            $planet = array_shift($p);

            $this->_galaxy = $galaxy;

            $q = explode('_', $planet);

            if (
                count($q) > 3 &&
                'Light' === $q[0] &&
                'Kit' === $q[1] &&
                'Admin' === $q[2]
            ) {
                $tightPlanetName = PlanetTool::getTightPlanetName($planet);
                $this->_exceptionClassName = implode('\\', [
                    $galaxy,
                    $planet,
                    'Exception',
                    $tightPlanetName . "Exception",
                ]);
                $this->_sourcePluginName = 'Light_' . substr($planet, 16);

            } else {
                throw new LightKitAdminException("The class that extends LightKitAdminBasePluginInstallerWithDatabase must start with Light_Kit_Admin_. see https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/lka-plugins.md##light-kit-admin-source-and-port-plugin for more details.");
            }
        }
    }

}