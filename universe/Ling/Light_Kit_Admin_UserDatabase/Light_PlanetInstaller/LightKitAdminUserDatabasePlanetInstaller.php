<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightKitAdminUserDatabasePlanetInstaller class.
 */
class LightKitAdminUserDatabasePlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output): void
    {

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("Light_Kit_Admin_UserDatabase: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_Kit_Admin_UserDatabase");
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menu
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserDatabase/Ling.Light_BMenu/admin_main_menu.custom.byml";
        $items = BabyYamlUtil::readFile($f);
        $adminItems = $items['admin'];
        $userItems = $items['user'];

        $output->write("Ling.Light_Kit_Admin_UserDatabase: registering menu items in lka admin section...");
        $util->writeItemsToMainMenuSection("admin", $adminItems);
        $output->write("<success>ok.</success>" . PHP_EOL);


        $output->write("Ling.Light_Kit_Admin_UserDatabase: registering menu items in lka user section...");
        $util->writeItemsToMainMenuSection("user", $userItems);
        $output->write("<success>ok.</success>" . PHP_EOL);

    }



    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output): void
    {

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("Light_Kit_Admin_UserDatabase: removing Light_EasyRoute routes from master...");
        LightEasyRouteHelper::removeRoutesFromMaster($appDir, "Light_Kit_Admin_UserDatabase");
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menu
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserDatabase/Ling.Light_BMenu/admin_main_menu.custom.byml";
        $items = BabyYamlUtil::readFile($f);
        $adminItems = $items['admin'];
        $userItems = $items['user'];

        $output->write("Ling.Light_Kit_Admin_UserDatabase: unregistering menu items from lka admin section...");
        $util->removeItemsFromMainMenuSection("admin", $adminItems);
        $output->write("<success>ok.</success>" . PHP_EOL);


        $output->write("Ling.Light_Kit_Admin_UserDatabase: unregistering menu items from lka user section...");
        $util->removeItemsFromMainMenuSection("user", $userItems);
        $output->write("<success>ok.</success>" . PHP_EOL);

    }


}