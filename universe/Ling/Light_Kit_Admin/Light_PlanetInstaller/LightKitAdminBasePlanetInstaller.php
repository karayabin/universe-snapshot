<?php


namespace Ling\Light_Kit_Admin\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Kit_Admin\Helper\LightKitAdminPermissionHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;
use Ling\Light_Realform\Helper\LightRealformConfigurationFileRegistrationHelper;
use Ling\Light_Realist\Helper\RequestDeclarationHelper;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\UniverseTools\PlanetTool;


/**
 * The LightKitAdminBasePlanetInstaller class.
 */
class LightKitAdminBasePlanetInstaller extends LightBasePlanetInstaller implements
    LightPlanetInstallerInit2HookInterface,
    LightPlanetInstallerInit3HookInterface
{


    /**
     * This property holds the _output for this instance.
     * @var OutputInterface
     */
    protected OutputInterface $_output;

    /**
     * This property holds the _planetDotName for this instance.
     * @var string
     */
    protected string $_planetDotName;


    /**
     * The relative path to the micro-permission profile.
     * This should be set by children classes who want to register their micro-permissions automatically.
     *
     * The relative path is from the $app/config/data directory.
     *
     * @var string
     */
    protected string $microPermissionProfile;


    /**
     * Builds the LightKitAdminBasePlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->microPermissionProfile = "";
    }


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = PlanetTool::getPlanetDotNameByClassName(static::class);

        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/generated/admin_main_menu.byml";
        if (true === file_exists($f)) {
            $output->write("$planetDotName: registering menu items...");
            $items = BabyYamlUtil::readFile($f);
            $util->writeItemsToMainMenuSection("admin", $items);
            $output->write("<success>ok.</success>" . PHP_EOL);
        }


        //--------------------------------------------
        // realist
        //--------------------------------------------
        $d = $appDir . "/config/data/$planetDotName/Ling.Light_Realist/list";
        if (true === is_dir($d)) {
            $output->write("$planetDotName: registering Ling.Light_Realist <b>request declarations</b> from <b>$d</b>." . PHP_EOL);
            RequestDeclarationHelper::registerRequestDeclarationsByDirectory($output, $appDir, $planetDotName, $d);
        }


        //--------------------------------------------
        // realform
        //--------------------------------------------
        $d = $appDir . "/config/data/$planetDotName/Ling.Light_Realform/form";
        if (true === is_dir($d)) {
            $output->write("$planetDotName: registering Ling.Light_Realform nuggets from <b>$d</b>." . PHP_EOL);
            LightRealformConfigurationFileRegistrationHelper::registerConfigurationFileByDirectory($output, $appDir, $planetDotName, $d);
        }


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        if ('' !== $this->microPermissionProfile) {
            $this->registerOpenMicroPermissionsByProfile($appDir, $output, $planetDotName, $this->microPermissionProfile);
        }

    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = PlanetTool::getPlanetDotNameByClassName(static::class);

        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/generated/admin_main_menu.byml";
        if (true === file_exists($f)) {
            $output->write("$planetDotName: unregistering menu items...");
            $items = BabyYamlUtil::readFile($f);
            $util->removeItemsFromMainMenuSection("admin", $items);
            $output->write("<success>ok.</success>" . PHP_EOL);
        }


        //--------------------------------------------
        // realist
        //--------------------------------------------
        $d = $appDir . "/config/data/$planetDotName/Ling.Light_Realist/list";
        if (true === is_dir($d)) {
            $output->write("$planetDotName: unregistering Ling.Light_Realist <b>request declarations</b> from <b>$d</b>." . PHP_EOL);
            RequestDeclarationHelper::unregisterRequestDeclarationsByDirectory($output, $appDir, $planetDotName, $d);
        }


        //--------------------------------------------
        // realform
        //--------------------------------------------
        $d = $appDir . "/config/data/$planetDotName/Ling.Light_Realform/form";
        if (true === is_dir($d)) {
            $output->write("$planetDotName: unregistering Ling.Light_Realform nuggets from <b>$d</b>." . PHP_EOL);
            LightRealformConfigurationFileRegistrationHelper::unregisterConfigurationFileByDirectory($output, $appDir, $planetDotName, $d);
        }


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        if ('' !== $this->microPermissionProfile) {
            $this->unregisterOpenMicroPermissionsByProfile($appDir, $output, $planetDotName, $this->microPermissionProfile);
        }


    }


    /**
     * @implementation
     */
    public function init3(string $appDir, OutputInterface $output, array $options = []): void
    {


        $this->prepareMessage($output);
        $planetDotName = $this->_planetDotName;


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $output->write("inserting <blue>light standard permissions</blue> (<b>$planetDotName.admin</b> and <b>$planetDotName.user</b>) if they don't exist." . PHP_EOL);

        $userDb->getFactory()->getPermissionApi()->insertPermissions([
            [
                'name' => $planetDotName . ".admin",
            ],
            [
                'name' => $planetDotName . ".user",
            ],
        ]);


        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $this->message("adding <blue>lka permissions</blue> in <b>lud_permission_group_has_permission</b> for source planet <b>$planetDotName</b>, if they don't exist." . PHP_EOL);
        LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups($userDb, $planetDotName);
    }


    /**
     * @implementation
     */
    public function undoInit3(string $appDir, OutputInterface $output, array $options = []): void
    {


        /**
         * unbinding the **source planet** permissions from the lka permission groups, so that the admin/user of lka can not access
         * source planet's functionality anymore.
         *
         */
        $this->prepareMessage($output);
        $planetDotName = $this->_planetDotName;

        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $this->message("removing <blue>lka permissions</blue> from <b>lud_permission_group_has_permission</b> for planet <b>$planetDotName</b>, if they exists." . PHP_EOL);
        LightKitAdminPermissionHelper::unbindStandardLightPermissionsToLkaPermissionGroups($userDb, $planetDotName);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the output, assuming it's set.
     * @param string $message
     */
    protected function message(string $message)
    {
        $this->_output->write($this->_planetDotName . ": " . $message);
    }


    /**
     * Prepares the instance so that it can use the message method properly.
     * @param OutputInterface $output
     */
    protected function prepareMessage(OutputInterface $output)
    {
        $p = explode('\\', static::class);
        list($galaxy, $planet) = $p;
        $this->_output = $output;
        $this->_planetDotName = $galaxy . "." . $planet;
    }


    /**
     * Registers micro-permissions using their open system, from a given profile relative path (from the config/data directory).
     *
     *
     * @param string $appDir
     * @param OutputInterface $output
     * @param string $planetDotName
     * @param string $relProfile
     * @throws \Exception
     */
    protected function registerOpenMicroPermissionsByProfile(string $appDir, OutputInterface $output, string $planetDotName, string $relProfile)
    {

        $output->write("$planetDotName: registering micro-permissions...");

        $mpFile = $appDir . "/config/data/" . $relProfile;
        if (false === file_exists($mpFile)) {
            throw new LightKitAdminException("Plugin configuration error: micro-permission file doesn't exist at: $mpFile.");
        }

        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->registerMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }

    /**
     * Unregisters micro-permissions using their open system, from a given profile relative path (from the config/data directory).
     *
     *
     * @param string $appDir
     * @param OutputInterface $output
     * @param string $planetDotName
     * @param string $relProfile
     * @throws \Exception
     */
    protected function unregisterOpenMicroPermissionsByProfile(string $appDir, OutputInterface $output, string $planetDotName, string $relProfile)
    {

        $output->write("$planetDotName: unregistering micro-permissions...");

        $mpFile = $appDir . "/config/data/" . $relProfile;
        if (false === file_exists($mpFile)) {
            throw new LightKitAdminException("Plugin configuration error: micro-permission file doesn't exist at: $mpFile.");
        }

        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->unregisterMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }
}