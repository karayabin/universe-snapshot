<?php


namespace Ling\Light_Kit_Admin\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\UniverseTools\PlanetTool;


/**
 * The LightKitAdminBasePlanetInstaller class.
 */
class LightKitAdminBasePlanetInstaller extends LightBasePlanetInstaller
{

    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
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
}