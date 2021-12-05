<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_Kit_Admin_UserDatabase\Exception\LightKitAdminUserDatabaseException;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_Realform\Helper\LightRealformConfigurationFileRegistrationHelper;
use Ling\Light_Realist\Helper\RequestDeclarationHelper;


/**
 * The LightKitAdminUserDatabasePlanetInstaller class.
 */
class LightKitAdminUserDatabasePlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {


        $planetDotName = "Ling.Light_Kit_Admin_UserDatabase";


        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_Kit_Admin_UserDatabase");
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // menu
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserDatabase/Ling.Light_BMenu/admin_main_menu.custom.byml";
//        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserDatabase/Ling.Light_BMenu/generated/admin_main_menu.byml";
        $items = BabyYamlUtil::readFile($f);
        $adminItems = $items['admin'];
        $userItems = $items['user'];

        $output->write("$planetDotName: registering menu items in lka admin section...");
        $util->writeItemsToMainMenuSection("admin", $adminItems);
        $output->write("<success>ok.</success>" . PHP_EOL);


        $output->write("$planetDotName: registering menu items in lka user section...");
        $util->writeItemsToMainMenuSection("user", $userItems);
        $output->write("<success>ok.</success>" . PHP_EOL);



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
        $mpProfile = "Ling.Light_Kit_Admin_UserDatabase/Ling.Light_MicroPermission/kit_admin_user_database.profile.generated.byml";
        $output->write("$planetDotName: registering micro-permissions...");

        $mpFile = $appDir . "/config/data/" . $mpProfile;
        if (false === file_exists($mpFile)) {
            throw new LightKitAdminUserDatabaseException("Plugin configuration error: micro-permission file doesn't exist at: $mpFile.");
        }

        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->registerMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);


    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Kit_Admin_UserDatabase";


        //--------------------------------------------
        // routes
        //--------------------------------------------
        $output->write("$planetDotName: removing Light_EasyRoute routes from master...");
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

        $output->write("$planetDotName: unregistering menu items from lka admin section...");
        $util->removeItemsFromMainMenuSection("admin", $adminItems);
        $output->write("<success>ok.</success>" . PHP_EOL);


        $output->write("$planetDotName: unregistering menu items from lka user section...");
        $util->removeItemsFromMainMenuSection("user", $userItems);
        $output->write("<success>ok.</success>" . PHP_EOL);


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
        $mpProfile = "Ling.Light_Kit_Admin_UserDatabase/Ling.Light_MicroPermission/kit_admin_user_database.profile.generated.byml";
        $output->write("$planetDotName: unregistering micro-permissions...");

        $mpFile = $appDir . "/config/data/" . $mpProfile;
        if (false === file_exists($mpFile)) {
            throw new LightKitAdminUserDatabaseException("Plugin configuration error: micro-permission file doesn't exist at: $mpFile.");
        }

        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->unregisterMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);


    }


}