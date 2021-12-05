<?php


namespace Ling\Light_Kit_Store\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Database\Light_PlanetInstaller\LightDatabaseBasePlanetInstaller;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;

/**
 * The LightKitStorePlanetInstaller class.
 */
class LightKitStorePlanetInstaller extends LightDatabaseBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Store";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: copying Ling.Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }

    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Store";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: removing Ling.Light_EasyRoute routes from master...");
        LightEasyRouteHelper::removeRoutesFromMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);

        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: unregistering open events...");
        LightEventsHelper::unregisterOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


    /**
     * @overrides
     */
    public function init3(string $appDir, OutputInterface $output, array $options = []): void
    {
        parent::init3($appDir, $output, $options);


        $planetDotName = "Ling.Light_Kit_Store";


        //--------------------------------------------
        // kit editor
        //--------------------------------------------
        $output->write("$planetDotName: registering the kit_front_store website...");
        $sourceDir = "config/data/Ling.Light_Kit_Store/Ling.Light_Kit_Editor/front";
        /**
         * @var $_ke LightKitEditorService
         */
        $_ke = $this->container->get("kit_editor");
        $_ke->registerWebsite([
            "identifier" => "Ling.Light_Kit_Store.front",
            "provider" => "Ling.Light_Kit_Store",
            "engine" => "babyYaml",
            "rootDir" => '${app_dir}/config/data/Ling.Light_Kit_Store/Ling.Light_Kit_Editor/front',
            "label" => "Ling.Light_Kit_Store front",
        ]);
        $output->write("<success>ok</success>" . PHP_EOL);


    }
}