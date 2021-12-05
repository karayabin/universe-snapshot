<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Cli;


use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;
use Ling\UniverseTools\PlanetTool;

/**
 * The CreateCliAppProcess class.
 */
class CreateCliAppProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-cli-app");
        $this->setLabel("Creates a basic cli app.");
        $this->setLearnMoreByHash('create-cli-app');
    }

    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $planet = $this->getContextVar("planet");
        $galaxy = $this->getContextVar("galaxy");
        $planetDir = $this->getContextVar("planetDir");


        $tightPlanetName = PlanetTool::getTightPlanetName($planet);
        $alias = $this->getAlias($planet);


        //--------------------------------------------
        // HELPER
        //--------------------------------------------
        $helperFile = $planetDir . "/Helper/${tightPlanetName}Helper.php";

        if (false === file_exists($helperFile)) {
            $tpl = __DIR__ . "/../../../assets/class-templates/Light_Cli/Helper/HelperClass.phptpl";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Ling\Light_PlanetInstallerXXX',
                'LpiHelper',
                "return 'lpi';",
            ], [
                "$galaxy\\$planet",
                "${tightPlanetName}Helper",
                "return '$alias';",
            ], $tplContent);


            $this->infoMessage("Creating Helper file in: <b>$helperFile</b>.");
            FileSystemTool::mkfile($helperFile, $tplContent);
        } else {

            $cooker = $this->util->getCooker();
            $cooker->setFile($helperFile);


            if (true === $cooker->hasMethod("getAppId")) {
                $this->infoMessage("Helper file already exists, and getAppId method exists, nothing to do.");
            } else {
                $this->infoMessage("Adding getAppId method to the Helper class in <b>$helperFile</b>.");
                $methodContent = <<<EEE
    /**
     * Returns the app id used by this planet.
     *
     * @return string
     */
    public static function getAppId(): string
    {
        return '$alias';
    }
EEE;

                $cooker->addMethod("getAppId", $methodContent, []);
            }
        }


        //--------------------------------------------
        // EXCEPTION
        //--------------------------------------------
        $this->createExceptionClass();

        //--------------------------------------------
        // BASE COMMAND
        //--------------------------------------------
        $commandFile = $planetDir . "/CliTools/Command/${tightPlanetName}BaseCommand.php";
        if (true === file_exists($commandFile)) {
            $this->infoMessage("${tightPlanetName}BaseCommand file already exists, skipping (model=LightPlanetInstallerBaseCommand).");
        } else {
            $this->infoMessage("creating ${tightPlanetName}BaseCommand file in <b>$commandFile</b>.");
            $helperRef = "${tightPlanetName}Helper";

            $tpl = __DIR__ . "/../../../assets/class-templates/Light_Cli/Command/BaseCommand.phptpl";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Ling\Light_PlanetInstallerXXX',
                'LightPlanetInstaller',
                'LpiHelper',
            ], [
                "$galaxy\\$planet",
                $tightPlanetName,
                $helperRef,
            ], $tplContent);
            FileSystemTool::mkfile($commandFile, $tplContent);
        }


        //--------------------------------------------
        // DEMO COMMAND
        //--------------------------------------------
        $commandFile = $planetDir . "/CliTools/Command/DemoCommand.php";
        if (true === file_exists($commandFile)) {
            $this->infoMessage("DemoCommand file already exists, skipping.");
        } else {
            $this->infoMessage("creating DemoCommand file in <b>$commandFile</b>.");

            $tpl = __DIR__ . "/../../../assets/class-templates/Light_Cli/Command/DemoCommand.phptpl";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Ling\Light_PlanetInstallerXXX',
                'LightPlanetInstallerBaseCommand',
                'lpi create_map',
            ], [
                "$galaxy\\$planet",
                "${tightPlanetName}BaseCommand",
                "$alias create_map",
            ], $tplContent);
            FileSystemTool::mkfile($commandFile, $tplContent);
        }


        //--------------------------------------------
        // HELP COMMAND
        //--------------------------------------------
        $commandFile = $planetDir . "/CliTools/Command/HelpCommand.php";
        if (true === file_exists($commandFile)) {
            $this->infoMessage("HelpCommand file already exists, skipping.");
        } else {
            $this->infoMessage("creating HelpCommand file in <b>$commandFile</b>.");


            $humanPlanetName = str_replace('_', ' ', $planet);
            $tpl = __DIR__ . "/../../../assets/class-templates/Light_Cli/Command/HelpCommand.phptpl";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Ling\Light_PlanetInstallerXXX',
                'Ling.Light_PlanetInstallerXXX',
                'Light_PlanetInstallerXXX',
                'Light Planet Installer',
                'LightPlanetInstaller',
            ], [
                "$galaxy\\$planet",
                "$galaxy.$planet",
                $planet,
                $humanPlanetName,
                $tightPlanetName,

            ], $tplContent);
            FileSystemTool::mkfile($commandFile, $tplContent);
        }


        //--------------------------------------------
        // APPLICATION
        //--------------------------------------------
        $appFile = $planetDir . "/CliTools/Program/${tightPlanetName}Application.php";
        if (true === file_exists($appFile)) {
            $this->message("Application file already exists, skipping. Tip: if you don't have all the functionality you need, consider copying from:: Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication", "warning");
        } else {
            $this->infoMessage("creating Application file in <b>$appFile</b>.");
            $tpl = __DIR__ . "/../../../assets/class-templates/Light_Cli/Program/ApplicationClass.phptpl";
            $tplContent = file_get_contents($tpl);
            $tplContent = str_replace([
                'Ling\Light_PlanetInstallerXXX',
                'LightPlanetInstaller',
                'LpiHelper',
            ], [
                "$galaxy\\$planet",
                $tightPlanetName,
                "${tightPlanetName}Helper",
            ], $tplContent);
            FileSystemTool::mkfile($appFile, $tplContent);

        }


        //--------------------------------------------
        // SERVICE HOOK
        //--------------------------------------------
        $this->addServiceConfigHook('cli', [
            "method" => 'registerCliApp',
            "args" => [
                'appId' => $alias,
                'app' => [
                    'instance' => "$galaxy\\$planet\CliTools\Program\\${tightPlanetName}Application",
                ],
            ],
        ]);


    }


    /**
     * Returns an app alias from the given planet name.
     * @param string $planet
     * @return string
     */
    private function getAlias(string $planet): string
    {
        $p = explode("_", $planet);
        $lastComponent = array_pop($p);
        $nbCapitals = StringTool::countCapitals($lastComponent);

        $alias = "";
        if (1 == $nbCapitals) {
            $alias .= substr($lastComponent, 0, 1);
            while (false === empty($p)) {
                $lastComponent = array_pop($p);
                $alias .= substr($lastComponent, 0, 1);
            }
            $alias = strrev($alias);
        } else {
            $alias = preg_replace('![^A-Z]+!', '', $lastComponent);
        }

        return strtolower($alias);
    }
}