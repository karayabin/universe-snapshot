<?php


namespace Ling\Light_DeveloperWizard\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\UniverseTools\MachineUniverseTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The CreateControllerCommand class.
 *
 */
class CreateControllerCommand extends LightDeveloperWizardBaseCommand
{

    /**
     * Builds the DemoCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $retCode = 0;
        $error = null;
        $currentDirectory = getcwd();


        //--------------------------------------------
        // CHOOSING THE PROJECT
        //--------------------------------------------
        $machineUniDir = MachineUniverseTool::getMachineUniversePath();
        $projectsFile = $machineUniDir . "/Ling/Light_DeveloperWizard/projects.byml";
        $projects = [];
        if (true === file_exists($projectsFile)) {
            $projects = BabyYamlUtil::readFile($projectsFile);
        }
        if (true === empty($projects)) {
            $this->write("No projects file found. Assuming a project root dir of: <blue>$currentDirectory</blue>." . PHP_EOL);
            $this->write("<info:bold>Tip</info:bold>: To define different projects, create the <green>$projectsFile</green> file." . PHP_EOL);
            $appDir = $currentDirectory;
        } else {
            $sProjects = "";
            foreach ($projects as $k => $v) {
                $sProjects .= "- <b>$k.</b> <blue>$v</blue>" . PHP_EOL;
            }

            $userChoice = QuestionHelper::askClear(
                $output,
                "Which project do you want to work on? (type a number):" . PHP_EOL . $sProjects,
                "Invalid answer, try again (type a number):",
                function ($res) use ($projects) {
                    return array_key_exists($res, $projects);
                });

            $appDir = $projects[$userChoice];
            $this->write("Working with project: <blue>$appDir</blue>." . PHP_EOL);
        }


        //--------------------------------------------
        // CHOOSING THE PLANET
        //--------------------------------------------
        $uniDir = $appDir . "/universe";
        if (true === is_dir($uniDir)) {
            $planetDotNames = PlanetTool::getPlanetDotNames($uniDir);
            $sPlanets = "";
            foreach ($planetDotNames as $k => $planetDotName) {
                $sPlanets .= "- <b>$k.</b> <blue>$planetDotName</blue>" . PHP_EOL;
            }

            $userChoice = QuestionHelper::askClear(
                $output,
                "Which planet do you want to work on? (type a number):" . PHP_EOL . $sPlanets,
                "Invalid answer, try again (type a number):",
                function ($res) use ($planetDotNames) {
                    return array_key_exists($res, $planetDotNames);
                });

            $planetDotName = $planetDotNames[$userChoice];
            $this->write("Working with planet: <blue>$planetDotName</blue>." . PHP_EOL);

        } else {
            $error = "No universe directory found for this project. Aborting...";
            goto end;
        }


        //--------------------------------------------
        // CHOOSING THE CONTROLLER
        //--------------------------------------------
        $controllerRootDir = __DIR__ . "/../../assets/class-templates/Controller/cli";
        $controllerFiles = YorgDirScannerTool::getFilesWithExtension($controllerRootDir, "phptpl", false, true, true);


        $sControllers = "";
        foreach ($controllerFiles as $k => $controllerFile) {
            $sControllers .= "- <b>$k.</b> <blue>$controllerFile</blue>" . PHP_EOL;
        }

        $userChoice = QuestionHelper::askClear(
            $output,
            "Which controller do you want to add? (type a number):" . PHP_EOL . $sControllers,
            "Invalid answer, try again (type a number):",
            function ($res) use ($controllerFiles) {
                return array_key_exists($res, $controllerFiles);
            });

        $controllerFile = $controllerFiles[$userChoice];

        $this->write("Using the controller model: <blue>$controllerFile</blue>." . PHP_EOL);


        //--------------------------------------------
        // DEFINING THE DESTINATION
        //--------------------------------------------
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
        $rPathRoot = "$galaxy\\$planet\\Controller";
        $relativePath = QuestionHelper::askClear(
            $output,
            "What relative className (from <blue>$rPathRoot</blue> should the controller have? (type the relative className):",
            "Invalid answer, try again (type the relative className from <blue>$rPathRoot</blue> ):",
            function ($res) {
                return (false === is_numeric(trim($res)));
            });

        $relativePath = str_replace('/', '\\', $relativePath); // just in case
        $controllerClassName = "$rPathRoot\\$relativePath";
        $dstPath = "$uniDir/" . str_replace("\\", "/", $controllerClassName) . ".php";


        $writeController = true;
        if (true === file_exists($dstPath)) {
            $userAnswer = QuestionHelper::askYesNo($output, "The controller already exists in <blue>$dstPath</blue>, do you want to overwrite it?");
            if (false === $userAnswer) {
                $this->write("Ok." . PHP_EOL);
                $writeController = false;
            }
        }

        //--------------------------------------------
        // WRITING THE CONTROLLER
        //--------------------------------------------
        $p = explode('\\', $relativePath);
        $dstClassName = array_pop($p);
        $srcClassName = FileSystemTool::getBasename($controllerFile);
        $dirRelPath = "Controller";
        if (false === empty($p)) {
            $dirRelPath = "Controller\\" . implode("\\", $p);
        }


        if (true === $writeController) {
            $this->write("Writing the controller to <b>$controllerClassName</b>...");
            $tpl = $controllerRootDir . "/" . $controllerFile;
            $c = file_get_contents($tpl);
            $c = str_replace([
                $srcClassName,
                "namespace Ling\Light_Kit_StoreXXX\Controller;",
            ], [
                $dstClassName,
                "namespace $galaxy\\$planet\\$dirRelPath;",
            ], $c);


            FileSystemTool::mkfile($dstPath, $c);
            $this->write("<success>ok.</success>" . PHP_EOL);
        }


        //--------------------------------------------
        // ROUTE
        //--------------------------------------------
        if (true === QuestionHelper::askYesNo($output, "Do you want to create a route for your controller ?")) {
            $routePrefix = LightEasyRouteHelper::guessRoutePrefix($appDir, $planetDotName);

            $classNameForRoute = $dstClassName;
            if (true === str_ends_with($classNameForRoute, "Controller")) {
                $classNameForRoute = substr($classNameForRoute, 0, -10);
            }


            $shortRouteName = CaseTool::toUnderscoreLow($classNameForRoute);
            $fullRouteName = $routePrefix . $shortRouteName;

            $userFullRouteName = QuestionHelper::askClear(
                $output,
                "What's the name of the route? (defaults to <b>$fullRouteName</b>):",
                "Invalid answer, type the route name (defaults to <b>$fullRouteName</b> ):",
                function ($res) {
                    return (false === is_numeric(trim($res)));
                });

            if ('' === trim($userFullRouteName)) {
                $userFullRouteName = $fullRouteName;
            }

            $p = explode("-", $userFullRouteName);
            $pattern = "/" . array_pop($p);


            $userPattern = QuestionHelper::askClear(
                $output,
                "What's the pattern of the route? (defaults to <b>$pattern</b>):",
                "Invalid answer, type the route pattern (defaults to <b>$pattern</b> ):",
                function ($res) {
                    return (false === is_numeric(trim($res)));
                });

            if ('' === trim($userPattern)) {
                $userPattern = $pattern;
            }

            /**
             * My idea here is that the controller method shall be defined in some meta info file with the same name as the template,
             * but with the ".info" or ".byml" file extension, so that the user doesn't have to type it...
             *
             * But this is just a shortcut to help the user getting things faster, it doesn't have to be complete and accurate,
             * so for now I'll just state render in hardcode, that should be fine.
             */
            $controllerMethod = "render";


            $fullClassName = "$galaxy\\$planet\\$dirRelPath\\$dstClassName";
            $controller = "$fullClassName->$controllerMethod";


            $this->write("Writing route to plugin file...");
            LightEasyRouteHelper::writeRouteToPluginFile($appDir, $planetDotName, $userFullRouteName, [
                "pattern" => $userPattern,
                "controller" => $controller,
            ]);
            $this->write("<success>ok.</success>" . PHP_EOL);


            $this->write("copying routes to master...");
            LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, $planetDotName);
            $output->write("<success>ok.</success>" . PHP_EOL);

        }


        end:
        if (null !== $error) {
            $this->write('<error>' . $error . '</error>' . PHP_EOL);
        }

        return $retCode;


    }

    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return "
 Creates a basic controller. This is an interactive command, just type it and follow the instructions.
 ";
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "create_controller" => "wiz create_controller",
        ];
    }


}