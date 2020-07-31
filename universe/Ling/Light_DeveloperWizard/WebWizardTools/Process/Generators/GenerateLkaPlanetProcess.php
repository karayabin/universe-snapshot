<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators;


use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\ClassCooker\FryingPan\Ingredient\ParentIngredient;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;
use Ling\Light_LingStandardService\Helper\LightLingStandardServiceHelper;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SqlWizard\Util\MysqlStructureReader;
use Ling\UniverseTools\PlanetTool;


/**
 * The GenerateLkaPlanetProcess class.
 */
class GenerateLkaPlanetProcess extends LightDeveloperWizardCommonProcess
{



    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("generate-lka-planet");
        $this->setLabel("Generates the Light_Kit_Admin planet plugin, to use your plugin in Light_Kit_Admin");
    }

    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $createFileExists = $this->getContextVar("createFileExists");
        if (false === $createFileExists) {
            return 'Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a>';
        }

    }

    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {


        /**
         * set this to false, unless you know what you're doing...
         */
        $recreateEverything = false;

        $createFileExists = $this->getContextVar("createFileExists");
        $createFile = $this->getContextVar("createFile");
//        $preferencesExist = $this->getContextVar("preferencesExist");
//        $preferences = $this->getContextVar("preferences");
        $planetDir = $this->getContextVar("planetDir");
        $planet = $this->getContextVar("planet");
        $galaxy = $this->getContextVar("galaxy");
        /**
         * @var $container LightServiceContainerInterface
         */
        $container = $this->getContextVar("container");
        $appDir = $container->getApplicationDir();


        if (false !== strpos($planet, "Light_Kit_Admin")) {
            $this->errorMessage("Your planet ($planet) is already a Light_Kit_Admin plugin, aborting.");
            return;
        }


        if (true === $createFileExists) {
            if (0 === strpos($planet, 'Light_')) {


                $planetId = substr($planet, 6);
                $tightPlanetId = str_replace('_', '', $planetId);
                $newPlanetName = "Light_Kit_Admin_" . $planetId;
                $serviceName = "kit_admin_" . CaseTool::toSnake(substr($planet, 6), true);
                $newPlanetDir = $appDir . "/universe/$galaxy/$newPlanetName";
                $tightNewPlanetName = PlanetTool::getTightPlanetName($newPlanetName);


                $reader = new MysqlStructureReader();
                $infos = $reader->readFile($createFile);
                $tables = array_keys($infos);


                //--------------------------------------------
                // PLANET DIRECTORY
                //--------------------------------------------
                if (false === $recreateEverything && is_dir($newPlanetDir)) {
                    $this->infoMessage("Planet dir already found in " . $this->getSymbolicPath($newPlanetDir));
                } else {
                    $this->infoMessage("Create planet $galaxy/$planet, in " . $this->getSymbolicPath($newPlanetDir));
                    FileSystemTool::mkdir($newPlanetDir);
                }

                //--------------------------------------------
                // LKA GENERATOR CONFIG
                //--------------------------------------------
                $tablePrefix = $this->getTablePrefix($planetDir, $createFile);
                $lkaGenConfigPath = $appDir . "/config/data/$newPlanetName/Light_Kit_Admin_Generator/$serviceName.generated.byml";
                if (false === $recreateEverything && file_exists($lkaGenConfigPath)) {
                    $this->infoMessage("Light_Kit_Admin_Generator config file already found in " . $this->getSymbolicPath($lkaGenConfigPath));
                } else {
                    $this->infoMessage("Creating Light_Kit_Admin_Generator config file in " . $this->getSymbolicPath($lkaGenConfigPath));
                    $tpl = __DIR__ . "/../../../assets/conf-template/lka-gen-config.byml";
                    $humanMenuName = ucwords(CaseTool::toHumanFlatCase(substr($planet, 6)));


                    $sTables = '';
                    foreach ($tables as $table) {
                        $sTables .= '            - ' . $table . PHP_EOL;
                    }


                    $tplContent = file_get_contents($tpl);
                    $tplContent = str_replace([
                        'Light_Kit_Admin_TaskScheduler',
                        'Task scheduler',
                        'galaxyName: Ling',
                        'kit_admin_task_scheduler',
                        'prefix: lts',
                        '            - lts_task_schedule',
                        'createFile: {app_dir}/universe/Ling/Light_TaskScheduler/assets/fixtures/create-structure.sql',
                    ], [
                        $newPlanetName,
                        $humanMenuName,
                        'galaxyName: ' . $galaxy,
                        $serviceName,
                        'prefix: ' . $tablePrefix,
                        $sTables,
                        "createFile: {app_dir}/universe/$galaxy/$planet/assets/fixtures/create-structure.sql",
                    ], $tplContent);

                    FileSystemTool::mkfile($lkaGenConfigPath, $tplContent);
                }


                //--------------------------------------------
                // USING LKA GENERATOR TO GENERATE FILES...
                //--------------------------------------------
                $this->infoMessage("Launching Light_Kit_Admin_Generator with config file " . $this->getSymbolicPath($lkaGenConfigPath));
                $container->get("kit_admin_generator")->generate($lkaGenConfigPath); // assuming identifier=main


                //--------------------------------------------
                // GENERATING CONTROLLER HUB CLASS
                //--------------------------------------------
                $controllerHubClassPath = $newPlanetDir . "/ControllerHub/Generated/$tightNewPlanetName" . "ControllerHubHandler.php";

                if (false === $recreateEverything && true === file_exists($controllerHubClassPath)) {
                    $this->infoMessage("ControllerHub class already found in " . $this->getSymbolicPath($controllerHubClassPath));
                } else {
                    $this->infoMessage("Creating ControllerHub class in " . $this->getSymbolicPath($controllerHubClassPath));

                    $tpl = __DIR__ . "/../../../assets/class-templates/ControllerHub/LightKitAdminTaskSchedulerControllerHubHandler.php";
                    $tplContent = file_get_contents($tpl);
                    $tplContent = str_replace([
                        'namespace Ling\Light_Kit_Admin_TaskScheduler\ControllerHub;',
                        'LightKitAdminTaskSchedulerControllerHubHandler',
                    ], [
                        "namespace $galaxy\\$newPlanetName\ControllerHub\Generated;",
                        $tightNewPlanetName . 'ControllerHubHandler',
                    ], $tplContent);
                    FileSystemTool::mkfile($controllerHubClassPath, $tplContent);
                }


                //--------------------------------------------
                // GENERATING LKA PLUGIN CLASS
                //--------------------------------------------
                $lkaPluginClassPath = $newPlanetDir . "/LightKitAdminPlugin/Generated/$tightNewPlanetName" . "LkaPlugin.php";

                if (false === $recreateEverything && true === file_exists($lkaPluginClassPath)) {
                    $this->infoMessage("LkaPlugin class already found in " . $this->getSymbolicPath($lkaPluginClassPath));
                } else {
                    $this->infoMessage("Creating LkaPlugin class in " . $this->getSymbolicPath($lkaPluginClassPath));

                    $tpl = __DIR__ . "/../../../assets/class-templates/LightKitAdminPlugin/LightKitAdminTaskSchedulerLkaPlugin.php";
                    $tplContent = file_get_contents($tpl);
                    $tplContent = str_replace([
                        'namespace Ling\Light_Kit_Admin_TaskScheduler\LightKitAdminPlugin;',
                        'LightKitAdminTaskSchedulerLkaPlugin',
                    ], [
                        "namespace $galaxy\\$newPlanetName\LightKitAdminPlugin\Generated;",
                        $tightNewPlanetName . 'LkaPlugin',
                    ], $tplContent);
                    FileSystemTool::mkfile($lkaPluginClassPath, $tplContent);
                }


                //--------------------------------------------
                // GENERATING LKA PLUGIN CONFIG DATA
                //--------------------------------------------
                $path = $appDir . "/config/data/$newPlanetName/Light_Kit_Admin/lka-options.generated.byml";

                if (false === $recreateEverything && true === file_exists($path)) {
                    $this->infoMessage("LkaPlugin config data already found in " . $this->getSymbolicPath($path));
                } else {
                    $this->infoMessage("Creating LkaPlugin config data in " . $this->getSymbolicPath($path));

                    $tpl = __DIR__ . "/../../../assets/conf-template/data/Light_Kit_Admin/lka-options.byml";
                    $tplContent = file_get_contents($tpl);
                    $tplContent = str_replace([
                        'lts',
                        'Light_Kit_Admin_TaskScheduler',
                    ], [
                        $tablePrefix,
                        $newPlanetName,
                    ], $tplContent);
                    FileSystemTool::mkfile($path, $tplContent);
                }

                //--------------------------------------------
                // GENERATING MICRO-PERMISSION CONFIG DATA
                //--------------------------------------------
                $path = $appDir . "/config/data/$newPlanetName/Light_MicroPermission/$serviceName.profile.generated.byml";
                if (false === $recreateEverything && true === file_exists($path)) {
                    $this->infoMessage("MicroPermission config data already found in " . $this->getSymbolicPath($path));
                } else {
                    $this->infoMessage("Creating MicroPermission config data in " . $this->getSymbolicPath($path));

                    $tpl = __DIR__ . "/../../../assets/conf-template/data/Light_MicroPermission/lka_task_scheduler.profile.byml";
                    $tplContent = file_get_contents($tpl);
                    $sTables = '';
                    foreach ($tables as $table) {
                        $sTables .= "    - tables.$table.create" . PHP_EOL;
                        $sTables .= "    - tables.$table.read" . PHP_EOL;
                        $sTables .= "    - tables.$table.update" . PHP_EOL;
                        $sTables .= "    - tables.$table.delete" . PHP_EOL;
                    }


                    $tplContent = str_replace([
                        'Light_TaskScheduler',
                        '    - tables.lts_task_schedule.create',
                    ], [
                        $planet,
                        $sTables,
                    ], $tplContent);
                    FileSystemTool::mkfile($path, $tplContent);
                }


                //--------------------------------------------
                // HOOK PERMISSIONS ONLY IF THE TABLE(S) EXIST
                //--------------------------------------------
                if ($tables) {
                    reset($tables);
                    $firstTable = current($tables);


                    /**
                     * @var $dbInfo LightDatabaseInfoService
                     */
                    $dbInfo = $container->get("database_info");
                    if (true === $dbInfo->hasTable($firstTable)) {
                        if (true === $dbInfo->hasTable("lud_permission_group_has_permission")) {


                            $this->infoMessage("Adding $planet permissions to the Light_Kit_Admin.admin and Light_Kit_Admin.user permission groups.");

                            /**
                             * @var $lud LightUserDatabaseService
                             */
                            $userDb = $container->get("user_database");
                            LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups($userDb, $planet);


                        } else {
                            $this->errorMessage("The lud_permission_group_has_permission table was not found. Please install the \"Light_UserDatabase\" plugin first.");
                        }

                    } else {
                        $this->importantMessage("The $firstTable table was not found in the database. We recommend that you create it first, then generate the \"standard permissions\", then re-execute this process again to complete the \"hook permissions\" task. 
                        Tip: you can generate the tables easily using the \"Synchronize db task\" on the $planet planet. Then we also have a process to generate the \"standard permissions\".");
                    }


                } else {
                    $this->infoMessage("No tables detected, skip hooking permissions.");
                }


                //--------------------------------------------
                // SERVICE CONFIG FILE
                //--------------------------------------------
                $configServicePath = $appDir . "/config/services/$newPlanetName.byml";
                if (false === $recreateEverything && file_exists($configServicePath)) {
                    /**
                     * Note: we could also parse the file and add only missing features,
                     * but that would require more time, and I believe most of the time, the user starts
                     * fresh and just want to create the whole planet from a new plugin that he is working on...
                     */
                    $this->infoMessage("Service file found already, skipping.");
                } else {
                    $this->infoMessage("Creating service config file at \"" . $this->getSymbolicPath($configServicePath) . "\", with service name \"$serviceName\"");
                    $tpl = __DIR__ . "/../../../assets/conf-template/configService.byml";
                    $tplContent = file_get_contents($tpl);
                    $tplContent = str_replace([
                        'Ling\Light_Kit_Admin_XXX',
                        'kit_admin_xxx',
                        'Light_Kit_Admin_XXX',
                        'LightKitAdminXXX',
                    ], [
                        $galaxy . "\\" . $newPlanetName,
                        $serviceName,
                        $newPlanetName,
                        $tightNewPlanetName,
                    ], $tplContent);


                    FileSystemTool::mkfile($configServicePath, $tplContent);
                }


                //--------------------------------------------
                // SERVICE CLASS FILE
                //--------------------------------------------
                $serviceClassName = $tightNewPlanetName . "Service.php";
                $serviceClassPath = $newPlanetDir . "/Service/$serviceClassName";
                if (file_exists($serviceClassPath)) {

                    $this->infoMessage("The service class for planet $newPlanetName was already created.");



                    $pan = $this->getFryingPanForService($serviceClassPath);

                    $useStatementClass = "Ling\Light_LingStandardService\Service\LightLingStandardServiceKitAdminPlugin";
                    $pan->addIngredient(ParentIngredient::create()->setValue('LightLingStandardServiceKitAdminPlugin', [
                        'useStatement' => $useStatementClass,
                    ]));


                    $this->addServiceContainer($pan);


                    $pan->cook();


                } else {
                    $this->infoMessage("Creating service class file at \"" . $this->getSymbolicPath($serviceClassPath) . "\".");
                    $tpl = __DIR__ . "/../../../assets/class-templates/Service/LkaPluginLss.phptpl";
                    $tplContent = file_get_contents($tpl);
                    $tplContent = str_replace([
                        'XXX',
                    ], [
                        $tightPlanetId,
                    ], $tplContent);
                    FileSystemTool::mkfile($serviceClassPath, $tplContent);
                }


                //--------------------------------------------
                // END MESSAGE
                //--------------------------------------------
                $this->infoMessage("The new planet is ready in: " . $this->getSymbolicPath($newPlanetDir));


            } else {
                $this->errorMessage("Your planet name must start with \"Light_\" (yours is $planet).");
            }

        } else {
            $this->errorMessage("Create file not found, cannot create the lka planet.");
        }

    }

}