<?php


namespace Ling\Light_Kit_Admin\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Helper\LightKitAdminHelper;
use Ling\Light_Kit_Admin\Helper\LightKitAdminPermissionHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;
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
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output): void
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

    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output): void
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

    }


    /**
     * @implementation
     */
    public function init3(string $appDir, OutputInterface $output): void
    {


        /**
         * binding the **source planet** permissions to the lka permission groups, so that the admin/user of lka can access
         * source planet's functionality.
         *
         * Note: the source planet inserts its own permissions.
         */
        $this->prepareMessage($output);
        $sourcePlanetDotName = LightKitAdminHelper::getSourcePlanetDotNameByLkaPlanetDotName($this->_planetDotName);

        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $this->message("adding <blue>lka permissions</blue> in <b>lud_permission_group_has_permission</b> for source planet <b>$sourcePlanetDotName</b>, if they don't exist." . PHP_EOL);
        LightKitAdminPermissionHelper::bindStandardLightPermissionsToLkaPermissionGroups($userDb, $sourcePlanetDotName);
    }


    /**
     * @implementation
     */
    public function undoInit3(string $appDir, OutputInterface $output): void
    {


        /**
         * unbinding the **source planet** permissions from the lka permission groups, so that the admin/user of lka can not access
         * source planet's functionality anymore.
         *
         */
        $this->prepareMessage($output);
        $sourcePlanetDotName = LightKitAdminHelper::getSourcePlanetDotNameByLkaPlanetDotName($this->_planetDotName);

        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $this->message("removing <blue>lka permissions</blue> from <b>lud_permission_group_has_permission</b> for source planet <b>$sourcePlanetDotName</b>, if they exists." . PHP_EOL);
        LightKitAdminPermissionHelper::unbindStandardLightPermissionsToLkaPermissionGroups($userDb, $sourcePlanetDotName);
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
}