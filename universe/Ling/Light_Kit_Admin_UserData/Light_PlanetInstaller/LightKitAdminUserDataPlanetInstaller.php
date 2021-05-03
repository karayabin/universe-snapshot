<?php


namespace Ling\Light_Kit_Admin_UserData\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightKitAdminUserDataPlanetInstaller class.
 */
class LightKitAdminUserDataPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {



        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("Light_Kit_Admin_UserData: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_Kit_Admin_UserData");
        $output->write("<success>ok.</success>" . PHP_EOL);




        //--------------------------------------------
        // menu
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("Ling.Light_Kit_Admin_UserData: registering menu items in lka admin section...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserData/Ling.Light_BMenu/generated/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("admin", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);



        $output->write("Ling.Light_Kit_Admin_UserData: registering menu items in lka user section...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserData/Ling.Light_BMenu/admin_main_menu-user.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("user", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


    }


}