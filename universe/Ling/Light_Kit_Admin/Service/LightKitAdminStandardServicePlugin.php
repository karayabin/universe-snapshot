<?php


namespace Ling\Light_Kit_Admin\Service;


use Ling\Bat\ClassTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler;
use Ling\Light_Kit_Admin\Realist\ActionHandler\LightKitAdminRealistActionHandler;
use Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler;
use Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler;
use Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListItemRenderer;
use Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer;
use Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistRowsRenderer;
use Ling\Light_LingStandardService\Exception\LightLingStandardServiceException;
use Ling\Light_LingStandardService\Helper\LightLingStandardServiceHelper;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_Realform\Service\LightRealformLateServiceRegistrationInterface;
use Ling\Light_Realist\Service\LightRealistCustomServiceInterface;
use Ling\Light_Realist\Service\LightRealistService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightKitAdminStandardServicePlugin class.
 */
abstract class LightKitAdminStandardServicePlugin implements
    PluginInstallerInterface,
    LightRealistCustomServiceInterface,
    LightRealformLateServiceRegistrationInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     * @var array
     */
    protected $options;


    /**
     * The concrete class name.
     * This is only available after a call to the prepareTheNames method.
     * @var string
     */
    private $_className;


    /**
     * The exception class name.
     * This is only available after a call to the prepareTheNames method.
     * @var string
     */
    private $_exceptionClassName;


    /**
     * This property holds the _basePluginName for this instance.
     * @var string
     */
    private $_basePluginName;


    /**
     * Builds the LightLingStandardService01 instance.
     */
    public function __construct()
    {
        $this->options = [];
        $this->container = null;
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
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function install()
    {
        if (true === $this->container->has("user_database")) {

            $this->prepareTheNames();
            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups($userDb, $this->_basePluginName);
        }
    }

    /**
     * @implementation
     */
    public function isInstalled(): bool
    {
        if (true === $this->container->has("user_database")) {
            $this->prepareTheNames();


            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
            $basePluginName = $this->_basePluginName;
            $permApi = $userDb->getFactory()->getPermissionApi();
            $groupAdminId = $permGroupApi->getPermissionGroupIdByName("Light_Kit_Admin.admin", null, true);
            $adminId = $permApi->getPermissionIdByName("$basePluginName.admin", null, true);
            $res = $userDb->getFactory()->getPermissionGroupHasPermissionApi()->getPermissionGroupHasPermission(Where::inst()
                ->key("permission_group_id")->equals($groupAdminId)
                ->and()->key("permission_id")->equals($adminId)
            );
            if (false !== $res) {
                return true;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function uninstall()
    {
        if (true === $this->container->has("user_database")) {

            $this->prepareTheNames();
            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $basePluginName = $this->_basePluginName;


            $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
            $permApi = $userDb->getFactory()->getPermissionApi();
            $groupAdminId = $permGroupApi->getPermissionGroupIdByName("Light_Kit_Admin.admin");
            $adminId = $permApi->getPermissionIdByName("$basePluginName.admin");
            $groupUserId = $permGroupApi->getPermissionGroupIdByName("Light_Kit_Admin.user");
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
        return [];
    }




    //--------------------------------------------
    // LightRealistCustomServiceInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function registerRealistByRequestId(string $requestId)
    {

        list($galaxy, $planet) = PlanetTool::getGalaxyPlanetByClassName(get_class($this));

        /**
         * @var $realist LightRealistService
         */


        $tight = PlanetTool::getTightPlanetName($planet);


        $realist = $this->container->get("realist");
        $realist->registerListRenderer($planet, new LightKitAdminRealistListRenderer());
        $realist->registerRealistRowsRenderer($planet, new LightKitAdminRealistListItemRenderer());
        $realist->registerActionHandler(new LightKitAdminRealistActionHandler());


        // list action handler
        $lah = $galaxy . "\\" . $planet . "\\Light_Realist\\ListActionHandler\\" . $tight . "ListActionHandler";
        if (true === ClassTool::isLoaded($lah)) {
            $lah = new $lah();
        } else {
            $lah = new LightKitAdminListActionHandler();
        }
        $realist->registerListActionHandler($planet, $lah);
    }



    //--------------------------------------------
    // LightRealformLateServiceRegistrationInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function registerRealformByIdentifier(string $identifier)
    {
        list($galaxy, $planet) = PlanetTool::getGalaxyPlanetByClassName(get_class($this));
        $realform = $this->container->get("realform");
        $o = new LightKitAdminRealformHandler();
        $app_dir = $this->container->getApplicationDir();
        $o->setConfDir("${app_dir}/config/data/$planet/Light_Realform");
        $realform->registerFormHandler($planet, $o);
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
        if (null === $this->_className) {
            $className = get_class($this);
            $this->_className = $className;
            $p = explode('\\', $className);
            $galaxy = array_shift($p);
            $planet = array_shift($p);

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
                $this->_basePluginName = 'Light_' . substr($planet, 16);

            } else {
                throw new LightLingStandardServiceException("The class that extends LightLingStandardServiceKitAdminPlugin must follow the \"Ling Standard Service Kit Admin Plugin\" naming convention, see more details here: https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/pages/conception-notes.md#ling-standard-service-kit-admin-plugin");
            }
        }
    }

}