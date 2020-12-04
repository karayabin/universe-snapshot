<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin;


use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\ClassCooker\FryingPan\Ingredient\ParentIngredient;
use Ling\Light\Helper\LightNamesAndPathHelper;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_DeveloperWizard\Helper\CreateFileHelper;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardLkaHelper;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;
use Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService;
use Ling\Light_LingStandardService\Helper\LightLingStandardServiceHelper;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\UniverseTools\PlanetTool;


/**
 * The LightKitAdminBaseProcess class.
 */
abstract class LightKitAdminBaseProcess extends LightDeveloperWizardCommonProcess
{

    /**
     * This property holds the checkCreateFileExists for this instance.
     * @var bool = true
     */
    protected $checkCreateFileExists;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->checkCreateFileExists = true;
        $this->setName("generate-lka-plugin");
        $this->setLabel("Generates lka plugin.");
        $this->setLearnMoreByHash('generate-light_kit_admin-plugin');
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
    }


    /**
     * This method should be called inside the prepare method call.
     * It checks that the target planet is a lka planet starting with Light_Kit_Admin_ prefix, and will add a prepare error message if that's not the case.
     *
     *
     */
    protected function mustBeLkaPlanet()
    {
        if (true === empty($this->getDisabledReason())) {
            $planet = $this->getContextVar("planet");
            if (0 !== strpos($planet, "Light_Kit_Admin_")) {
                $this->setDisabledReason("The planet name must start with Light_Kit_Admin_");
            }
        }
    }


    /**
     * Checks that the create file exists for the host planet (see nomenclature document for more details),
     * and adds a disabled reason error if that's not the case.
     *
     * Unfortunately for now this method only works if the host planet comes from the same galaxy as the current planet.
     *
     */
    protected function hostPlanetHasCreateFile()
    {
        $this->mustBeLkaPlanet();
        if (true === empty($this->getDisabledReason())) {
            $galaxy = $this->getContextVar("galaxy");
            $planet = $this->getContextVar("planet");
            $container = $this->getContextVar("container");
            $hostPlanet = DeveloperWizardLkaHelper::getLkaOriginPlanet($planet);
            $createFile = CreateFileHelper::getCreateFilePath($galaxy, $hostPlanet, $container);
            if (false === file_exists($createFile)) {
                $this->setDisabledReason('Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file for the host planet (' . $hostPlanet . ').</a>');
            }

        }
    }


    /**
     * Checks that the create file exists for the current planet, and adds a disabled reason error if that's not the case.
     */
    protected function hasCreateFile()
    {
        if (true === empty($this->getDisabledReason())) {
            if (true === $this->checkCreateFileExists) {
                $createFileExists = $this->getContextVar("createFileExists");
                if (false === $createFileExists) {
                    $this->setDisabledReason('Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a>');
                }
            }
        }
    }


    /**
     * Generate the Lka planet from the given params.
     *
     * The params are:
     *
     * - galaxy: the name of the galaxy to create
     * - planet: the name of the planet to create
     *
     *
     * Available options are:
     * - recreateEverything: bool=false, whether to force re-creating things even if they already exist
     *
     *
     * @param array $params
     * @param array $options
     */
    protected function generateLkaPlanet(array $params, array $options = [])
    {

        $galaxy = $params['galaxy'];
        $planet = $params['planet'];

        $recreateEverything = $options['recreateEverything'] ?? false;
        $generateConfigFile = true; // might become an option at some point


        $serviceName = LightNamesAndPathHelper::getServiceName($planet);
        $tightPlanetName = PlanetTool::getTightPlanetName($planet);
        $appDir = $this->container->getApplicationDir();
        $planetDir = $appDir . "/universe/$galaxy/$planet";


        //--------------------------------------------
        // SERVICE CONFIG FILE
        //--------------------------------------------
        $configServicePath = $appDir . "/config/services/$planet.byml";


        if (false === $recreateEverything && file_exists($configServicePath)) {
            /**
             * Note: we could also parse the file and add only missing features,
             * but that would require more time, and I believe most of the time, the user starts
             * fresh and just want to create the whole planet from a new plugin that he is working on...
             */
            $this->infoMessage("Service file found already, skipping.");
        } else {
            $this->infoMessage("Creating service config file at \"" . DeveloperWizardGenericHelper::getSymbolicPath($configServicePath, $appDir) . "\", with service name \"$serviceName\"");
//            $tpl = __DIR__ . "/../../../assets/conf-template/configService.byml";
            $tpl = __DIR__ . "/../../../assets/conf-template/configServiceBasic.byml";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Ling\Light_Kit_Admin_XXX',
                'kit_admin_xxx',
                'Light_Kit_Admin_XXX',
                'LightKitAdminXXX',
            ], [
                $galaxy . "\\" . $planet,
                $serviceName,
                $planet,
                $tightPlanetName,
            ], $tplContent);


            FileSystemTool::mkfile($configServicePath, $tplContent);
        }


        //--------------------------------------------
        // SERVICE CLASS FILE
        //--------------------------------------------
        $serviceClassName = $tightPlanetName . "Service.php";
        $serviceClassPath = $planetDir . "/Service/$serviceClassName";
        if (file_exists($serviceClassPath)) {

            $this->infoMessage("The service class for planet $planet was already created.");


            $pan = $this->getFryingPanByFile($serviceClassPath);

            $useStatementClass = "Ling\Light_LingStandardService\Service\LightLingStandardServiceKitAdminPlugin";
            $pan->addIngredient(ParentIngredient::create()->setValue('LightLingStandardServiceKitAdminPlugin', [
                'useStatement' => $useStatementClass,
            ]));


            $this->addServiceContainer($pan);


            $pan->cook();


        } else {
            $this->infoMessage("Creating service class file at \"" . DeveloperWizardGenericHelper::getSymbolicPath($serviceClassPath, $appDir) . "\".");
            $tpl = __DIR__ . "/../../../assets/class-templates/Service/LkaPluginLss.phptpl";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Light_Kit_Admin_XXX',
                'LightKitAdminXXX',
            ], [
                $planet,
                $tightPlanetName,
            ], $tplContent);
            FileSystemTool::mkfile($serviceClassPath, $tplContent);
        }


        //--------------------------------------------
        // LKA GENERATOR CONFIG FILE
        //--------------------------------------------
        if (true === $generateConfigFile) {
            $this->createLkaGeneratorConfigFile([
                'galaxy' => $galaxy,
                'planet' => $planet,
            ], [
                'recreateEverything' => $recreateEverything,
            ]);
        }

    }


    /**
     * Creates the lka generator config file, and returns its path.
     *
     * Params are:
     * - galaxy: string, the name of the galaxy to create the config file for
     * - planet: string, the name of the planet to create the config file for
     *
     *
     * Available options are:
     * - recreateEverything: bool=false, whether to force re-creating things even if they already exist
     *
     *
     * @param array $params
     * @param array $options
     *
     * @throws \Exception
     */
    protected function createLkaGeneratorConfigFile(array $params, array $options = []): string
    {


        $planet = $params['planet'];
        $serviceName = LightNamesAndPathHelper::getServiceName($planet);
        $appDir = $this->container->getApplicationDir();
        $lkaGenConfigPath = $appDir . "/config/data/$planet/Light_Kit_Admin_Generator/$serviceName.generated.byml";


        return DeveloperWizardLkaHelper::createLkaGeneratorConfigFile([
            "galaxy" => $params['galaxy'],
            "planet" => $planet,
            "path" => $lkaGenConfigPath,
            "container" => $this->container,
            "onAlreadyExists" => function ($lkaGenConfigPath) {
                $this->infoMessage("Light_Kit_Admin_Generator config file already found in " . $this->getSymbolicPath($lkaGenConfigPath));
            },
            "onCreateBefore" => function ($lkaGenConfigPath) {
                $this->infoMessage("Creating Light_Kit_Admin_Generator config file in " . $this->getSymbolicPath($lkaGenConfigPath));
            },
        ], $options);
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the lka service name corresponding to the given planet name.
     *
     * @param string $planet
     * @return string
     */
    protected function getLkaServiceNameByPlanet(string $planet): string
    {
        return "kit_admin_" . CaseTool::toSnake(substr($planet, 6), true);
    }


    /**
     * Executes the given generator config file path, using the @page(Light_Kit_Admin_Generator) plugin.
     *
     * Available options are:
     *
     * - recreateEverything: bool = false, whether to recreate things even if they exist already
     *
     *
     * @param string $path
     * @param array $options
     */
    protected function executeGeneratorConfigFile(string $path, array $options = [])
    {
        $recreateEverything = $options['recreateEverything'] ?? false;
        $appDir = $this->container->getApplicationDir();

        $this->infoMessage("Launching Light_Kit_Admin_Generator with config file " . $this->getSymbolicPath($path));
        /**
         * @var $lkaGenerator LightKitAdminGeneratorService
         */
        $lkaGenerator = $this->container->get("kit_admin_generator");
        $config = $lkaGenerator->generate($path);

        if (false === array_key_exists('create_file', $config)) {
            // if no create file, our work is done
            $sPath = $this->getSymbolicPath($path);
            $this->importantMessage("Note that the create file was not defined in the configuration (in $sPath), therefore only the lka generator was executed, but no extra work. Check the task details for more info.");
            return;
        }


        $createFile = $config['create_file'];

        $useForm = $config['use_form'] ?? false;
        $useMenu = $config['use_menu'] ?? false;
        $useController = $config['use_controller'] ?? false;


        $planet = $config['plugin_name'];
        $variables = $config['variables'] ?? [];
        $tables = $variables['tables'] ?? [];
        if (false === array_key_exists('galaxyName', $variables)) {
            $this->error("Sorry, we expected the variables.galaxyName entry in the lka generator config file, but it was not found, aborting.");
        }


        $galaxy = $variables['galaxyName'];


        $serviceName = LightNamesAndPathHelper::getServiceName($planet);
        $createFile = str_replace('{app_dir}', $appDir, $createFile);

        $tightName = PlanetTool::getTightPlanetName($planet);
        $planetDir = $appDir . "/universe/$galaxy/$planet";
        $originPlanet = DeveloperWizardLkaHelper::getLkaOriginPlanet($planet);
        $originPlanetDir = $appDir . "/universe/$galaxy/$originPlanet";


        //--------------------------------------------
        // GENERATING CONTROLLER HUB CLASS
        //--------------------------------------------
        if (true === $useController) {
            $controllerHubClassPath = $planetDir . "/Light_ControllerHub/Generated/$tightName" . "ControllerHubHandler.php";

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
                    "namespace $galaxy\\$planet\Light_ControllerHub\Generated;",
                    $tightName . 'ControllerHubHandler',
                ], $tplContent);
                FileSystemTool::mkfile($controllerHubClassPath, $tplContent);
            }
        }


        //--------------------------------------------
        // GENERATING LKA PLUGIN CLASS
        //--------------------------------------------
        $lkaPluginClassPath = $planetDir . "/LightKitAdminPlugin/Generated/$tightName" . "LkaPlugin.php";

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
                "namespace $galaxy\\$planet\LightKitAdminPlugin\Generated;",
                $tightName . 'LkaPlugin',
            ], $tplContent);
            FileSystemTool::mkfile($lkaPluginClassPath, $tplContent);
        }


        //--------------------------------------------
        // GENERATING LKA PLUGIN CONFIG DATA
        //--------------------------------------------
        if (true === $useForm) {

            $path = $appDir . "/config/data/$planet/Light_Kit_Admin/lka-options.generated.byml";
            $tablePrefix = DeveloperWizardGenericHelper::getTablePrefix($originPlanetDir, $createFile);


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
                    $planet,
                ], $tplContent);
                FileSystemTool::mkfile($path, $tplContent);
            }
        }

        //--------------------------------------------
        // GENERATING MICRO-PERMISSION CONFIG DATA
        //--------------------------------------------
        $path = $appDir . "/config/data/$planet/Light_MicroPermission/$serviceName.profile.generated.byml";
        if (false === $recreateEverything && true === file_exists($path)) {
            $this->infoMessage("MicroPermission config data already found in " . $this->getSymbolicPath($path));
        } else {
            $this->infoMessage("Creating MicroPermission config data in " . $this->getSymbolicPath($path));

            $tpl = __DIR__ . "/../../../assets/conf-template/data/Light_MicroPermission/lka_task_scheduler.profile.byml";
            $tplContent = file_get_contents($tpl);
            $sTables = '';
            foreach ($tables as $table) {
                $sTables .= "    - store.$table" . PHP_EOL;
            }


            $tplContent = str_replace([
                'Light_TaskScheduler',
                '    - tables.lts_task_schedule.create',
            ], [
                $originPlanet,
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
            $dbInfo = $this->container->get("database_info");
            if (true === $dbInfo->hasTable($firstTable)) {
                if (true === $dbInfo->hasTable("lud_permission_group_has_permission")) {


                    $this->infoMessage("Adding $originPlanet permissions to the Light_Kit_Admin.admin and Light_Kit_Admin.user permission groups.");

                    /**
                     * @var $lud LightUserDatabaseService
                     */
                    $userDb = $this->container->get("user_database");
                    LightLingStandardServiceHelper::bindStandardLightPermissionsToLkaPermissionGroups($userDb, $originPlanet);


                } else {
                    $this->errorMessage("The lud_permission_group_has_permission table was not found. Please install the \"Light_UserDatabase\" plugin first.");
                }

            } else {
                $this->importantMessage("The $firstTable table was not found in the database. We recommend that you create it first, then generate the \"standard permissions\", then re-execute this process again to complete the \"hook permissions\" task. 
                        Tip: you can generate the tables easily using the \"Synchronize db task\" on the $originPlanet planet. Then we also have a process to generate the \"standard permissions\".");
            }


        } else {
            $this->infoMessage("No tables detected, skip hooking permissions.");
        }


        //--------------------------------------------
        // ADDING SERVICE CONFIG FILE HOOKS
        //--------------------------------------------
        if (true === $useMenu) {
            if (false === $this->util->configHasHook("bmenu", [
                    'with' => [
                        'method' => 'addDirectInjector',
                    ]
                ])) {
                $this->addServiceConfigHook('bmenu', [
                    'method' => 'addDirectItemsByFileAndParentPath',
                    'args' => [
                        'menu_type' => 'admin_main_menu',
                        'file' => "\${app_dir}/config/data/$planet/bmenu/generated/$serviceName.admin_mainmenu_1.byml",
                        'path' => "lka-admin",
                    ],
                ], [
                    'menu_type' => 'admin_main_menu',
                ]);
            } else {
                $this->infoMessage("The service config file already has a hook to the \"$serviceName\" service (for planet \"$planet\").");
            }
        }


        if (true === $useController) {
            /**
             * We now rely on dynamic registration rather, so the commented code below should be removed in the future
             */
//            $this->addServiceConfigHook('controller_hub', [
//                'method' => 'registerHandler',
//                'args' => [
//                    'plugin' => $planet,
//                    'handler' => [
//                        'instance' => "Ling\\$planet\ControllerHub\Generated\\${tightName}ControllerHubHandler",
//                        'methods' => [
//                            'setContainer' => [
//                                'container' => '@container()',
//                            ],
//                        ],
//                    ],
//                ],
//            ], [
//                'plugin' => $planet,
//            ]);
        }


        if (true === $useForm) {

//
//            $this->addServiceConfigHook('crud', [
//                'method' => 'registerHandler',
//                'args' => [
//                    'pluginId' => $planet,
//                    'handler' => [
//                        'instance' => "Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler",
//                    ],
//                ],
//            ], [
//                'pluginId' => $planet,
//            ]);


            $this->addServiceConfigHook('kit_admin', [
                'method' => 'registerPlugin',
                'args' => [
                    'pluginName' => $planet,
                    'plugin' => [
                        'instance' => "Ling\\$planet\\LightKitAdminPlugin\\Generated\\${tightName}LkaPlugin",
                        'methods' => [
                            'setOptionsFile' => [
                                'file' => "\${app_dir}/config/data/$planet/Light_Kit_Admin/lka-options.generated.byml",
                            ],
                        ],
                    ],
                ],
            ], [
                'pluginName' => $planet,
            ]);

        }


        $this->addServiceConfigHook('micro_permission', [
            'method' => 'registerMicroPermissionsByProfile',
            'args' => [
                'file' => "\${app_dir}/config/data/$planet/Light_MicroPermission/$serviceName.profile.generated.byml",
            ],
        ], [
            'file' => "\${app_dir}/config/data/$planet/Light_MicroPermission/$serviceName.profile.generated.byml",
        ]);


    }
}