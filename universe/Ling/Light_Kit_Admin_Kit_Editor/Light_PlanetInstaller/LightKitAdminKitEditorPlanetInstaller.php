<?php


namespace Ling\Light_Kit_Admin_Kit_Editor\Light_PlanetInstaller;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Kit_Admin\Light_BMenu\Util\LightKitAdminBMenuRegistrationUtil;
use Ling\Light_Kit_Admin\Light_PlanetInstaller\LightKitAdminBasePlanetInstaller;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightKitAdminKitEditorPlanetInstaller class.
 */
class LightKitAdminKitEditorPlanetInstaller extends LightKitAdminBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{

    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

//        parent::init2($appDir, $output);


        $planetDotName = PlanetTool::getPlanetDotNameByClassName(static::class);

        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/lke_editor_menu.byml";
        $output->write("$planetDotName: registering menu items...");
        $items = BabyYamlUtil::readFile($f);
        $util->writeItemsToMainMenuSection("admin", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);



        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        $output->write("$planetDotName: registering micro-permissions...");
        $mpFile = $appDir . "Ling.Light_Kit_Admin_Kit_Editor/Ling.Light_MicroPermission/kit_admin_kit_editor.profile.generated.byml";
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

        $planetDotName = PlanetTool::getPlanetDotNameByClassName(static::class);

        //--------------------------------------------
        // menus
        //--------------------------------------------
        $util = new LightKitAdminBMenuRegistrationUtil();
        $util->setContainer($this->container);

        $f = $appDir . "/config/data/$planetDotName/Ling.Light_BMenu/lke_editor_menu.byml";
        $output->write("$planetDotName: unregistering menu items...");
        $items = BabyYamlUtil::readFile($f);
        $util->removeItemsFromMainMenuSection("admin", $items);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // micro-permissions
        //--------------------------------------------
        $output->write("$planetDotName: unregistering micro-permissions...");
        $mpFile = $appDir . "Ling.Light_Kit_Admin_Kit_Editor/Ling.Light_MicroPermission/kit_admin_kit_editor.profile.generated.byml";
        /**
         * @var $_mp LightMicroPermissionService
         */
        $_mp = $this->container->get("micro_permission");
        $_mp->unregisterMicroPermissionsToOpenSystemByProfile($mpFile);
        $output->write("<success>ok.</success>" . PHP_EOL);

    }

}