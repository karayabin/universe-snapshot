<?php


namespace Ling\Light_DeveloperWizard\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Light\Helper\LightNamesAndPathHelper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;

/**
 * The DeveloperWizardLkaHelper class.
 */
class DeveloperWizardLkaHelper
{
    /**
     * Returns the name of the planet from which the given lka planet originates from.
     *
     * For instance, if you pass Light_Kit_Admin_XXX, it will return Light_XXX.
     *
     * @param string $lkaPlanetName
     * @return string
     */
    public static function getLkaOriginPlanet(string $lkaPlanetName): string
    {
        return 'Light_' . substr($lkaPlanetName, 16);
    }

    /**
     * Returns the lka planet name for the given planet.
     *
     * @param string $planet
     * @return string
     */
    public static function getLkaPlanetNameByPlanet(string $planet): string
    {
        $planetId = self::getPlanetId($planet);
        return "Light_Kit_Admin_" . $planetId;
    }


    /**
     * Creates a basic lka generator config file, and returns its path.
     *
     * Params are:
     * - galaxy: string, the name of the galaxy to create the config file for
     * - planet: string, the name of the planet to create the config file for
     * - path: string|null=null, if set, defines the location of the config file to create
     * - tplPath: string|null=null, if set, defines the location of the config file template to use
     * - onAlreadyExists: callable|null=null, is triggered only if the config file already exists (and is therefore not created)
     * - onCreateBefore: callable|null=null, is triggered only if the config file is actually (re)created
     *
     *
     * Available options are:
     * - recreateEverything: bool=false, whether to force re-creating the file even if it already exists
     *
     *
     * @param array $params
     * @param array $options
     *
     * @throws \Exception
     */
    public static function createLkaGeneratorConfigFile(array $params, array $options = []): string
    {
        $galaxy = $params['galaxy'];
        $planet = $params['planet'];

        if (0 !== strpos($planet, "Light_Kit_Admin_")) {
            throw new LightDeveloperWizardException("This method is only for planets which name starts with Light_Kit_Admin_");
        }

        $path = $params['path'] ?? null;
        $tplPath = $params['tplPath'] ?? null;
        $onAlreadyExists = $params['onAlreadyExists'] ?? null;
        $onCreateBefore = $params['onCreateBefore'] ?? null;

        /**
         * @var $container LightServiceContainerInterface
         */
        $container = $params['container'];
        $recreateEverything = $options['recreateEverything'] ?? false;

        $appDir = $container->getApplicationDir();
        $lkaOriginPlanet = DeveloperWizardLkaHelper::getLkaOriginPlanet($planet);
        $createFile = $appDir . "/universe/$galaxy/$lkaOriginPlanet/assets/fixtures/create-structure.sql";
        $planetDir = $appDir . "/universe/$galaxy/$lkaOriginPlanet";
        $tables = DeveloperWizardGenericHelper::getTablesByCreateFile($createFile);


        $serviceName = LightNamesAndPathHelper::getServiceName($planet);
        $tablePrefix = DeveloperWizardGenericHelper::getTablePrefix($planetDir, $createFile);


        if (null !== $path) {
            $lkaGenConfigPath = $path;
        } else {
            $lkaGenConfigPath = $appDir . "/config/data/$planet/Light_Kit_Admin_Generator/$serviceName.generated.byml";
        }


        if (false === $recreateEverything && file_exists($lkaGenConfigPath)) {
            if (is_callable($onAlreadyExists)) {
                call_user_func($onAlreadyExists, $lkaGenConfigPath);
            }
        } else {

            if (is_callable($onCreateBefore)) {
                call_user_func($onCreateBefore, $lkaGenConfigPath);
            }


            if (null !== $tplPath) {
                $tpl = $tplPath;
            } else {
                $tpl = __DIR__ . "/../assets/conf-template/lka-gen-config.byml";
            }


            $humanMenuName = ucwords(CaseTool::toHumanFlatCase(substr($lkaOriginPlanet, 6)));
            $sTables = '';
            foreach ($tables as $table) {
                $sTables .= '        - ' . $table . PHP_EOL;
            }


            $tplContent = file_get_contents($tpl);


            $tplContent = str_replace([
                'Light_Kit_Admin_TaskScheduler',
                'Task scheduler',
                'galaxyName: Ling',
                'kit_admin_task_scheduler',
                'prefix: lts',
                '        - lts_task_schedule',
                'createFile: {app_dir}/universe/Ling/Light_TaskScheduler/assets/fixtures/create-structure.sql',
            ], [
                $planet,
                $humanMenuName,
                'galaxyName: ' . $galaxy,
                $serviceName,
                'prefix: ' . $tablePrefix,
                $sTables,
                "createFile: {app_dir}/universe/$galaxy/$lkaOriginPlanet/assets/fixtures/create-structure.sql",
            ], $tplContent);

            FileSystemTool::mkfile($lkaGenConfigPath, $tplContent);
        }
        return $lkaGenConfigPath;
    }


    /**
     * Returns a basic lka configuration array.
     *
     * The root key is main.
     *
     * Notes: the variables (main.variables) aren't injected (as this is the job of the lka generator to do so).
     *
     *
     * @param LightServiceContainerInterface $container
     * @param string $galaxy
     * @param string $planet
     * @return array
     * @throws \Exception
     */
    public static function getBasicLkaGeneratorConfig(LightServiceContainerInterface $container, string $galaxy, string $planet): array
    {
        $path = "/tmp/universe/Ling/Light_DeveloperWizard/lka-helper-generator-config.byml";
        DeveloperWizardLkaHelper::createLkaGeneratorConfigFile([
            "container" => $container,
            "galaxy" => $galaxy,
            "planet" => $planet,
            "path" => $path,
        ], [
            'recreateEverything' => true,
        ]);

        return BabyYamlUtil::readFile($path);
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the planetId corresponding to the given planet name.
     *
     * @param $planet
     * @return string
     */
    private static function getPlanetId($planet): string
    {
        return substr($planet, 6);
    }
}