<?php


namespace Ling\Light_Kit_Admin\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightKitAdminPlanetInstaller class.
 */
class LightKitAdminPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {

        $planetDotName = "Ling.Light_Kit_Admin";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: copying Ling.Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("$planetDotName: registering menu items...");
        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("root", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // kit editor
        //--------------------------------------------
        /**
         * @var $ke LightKitEditorService
         */
        $ke = $this->container->get("kit_editor");
        $output->write("$planetDotName: registering websites...");
        $ke->registerWebsite([
            "identifier" => "Ling.Light_Kit_Admin",
            "provider" => "Ling.Light_Kit_Admin",
            "engine" => "babyYaml",
            "rootDir" => '${app_dir}/config/open/Ling.Light_Kit_Admin/lke',
            "label" => "Ling.Light_Kit_Admin",
        ]);
        $output->write("<success>ok.</success>" . PHP_EOL);

    }


}