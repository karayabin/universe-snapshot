<?php


namespace Ling\Light_Kit_Admin_UserData\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightKitAdminUserDataPlanetInstaller class.
 */
class LightKitAdminUserDataPlanetInstaller extends LightKitAdminBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Admin_UserData";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_Kit_Admin_UserData");
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menu
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("$planetDotName: registering menu items in lka admin section...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserData/Ling.Light_BMenu/generated/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("admin", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        $output->write("$planetDotName: registering menu items in lka user section...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserData/Ling.Light_BMenu/admin_main_menu-user.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("user", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        $mpProfile = "Ling.Light_Kit_Admin_UserData/Ling.Light_MicroPermission/kit_admin_user_data.profile.generated.byml";
        $this->registerOpenMicroPermissionsByProfile($appDir, $output, $planetDotName, $mpProfile);

    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Admin_UserData";

        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: removing Light_EasyRoute routes from master...");
        LightEasyRouteHelper::removeRoutesFromMaster($appDir, "Light_Kit_Admin_UserData");
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menu
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);


        $output->write("$planetDotName: unregistering menu items from lka admin section...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserData/Ling.Light_BMenu/generated/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->removeItemsFromMainMenuSection("admin", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        $output->write("$planetDotName: unregistering menu items from lka user section...");
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserData/Ling.Light_BMenu/admin_main_menu-user.byml";
        $items = BabyYamlUtil::readFile($f);
        $util->removeItemsFromMainMenuSection("user", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        $mpProfile = "Ling.Light_Kit_Admin_UserData/Ling.Light_MicroPermission/kit_admin_user_data.profile.generated.byml";
        $this->unregisterOpenMicroPermissionsByProfile($appDir, $output, $planetDotName, $mpProfile);


    }


}