<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Input\WritableCommandLineInput;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\Util\TimConflictsReader;
use Ling\UniverseTools\MetaInfoTool;


/**
 * The DebugSessionDirCommand class.
 *
 */
class DebugSessionDirCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the DebugSessionDirCommand instance.
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

        ConsoleTool::reset();


        $sessionDir = $input->getParameter(2);

        if (null === $sessionDir) {
            $path = LpiHelper::getSessionDirsPath();
            $sessionDirs = YorgDirScannerTool::getDirs($path);
            if ($sessionDirs) {
                asort($sessionDirs);
                $sessionDir = array_pop($sessionDirs);
            }
        }


        if (null === $sessionDir) {
            $output->write("No session dir to explore. Bye." . PHP_EOL);
            return 0;
        }


        //--------------------------------------------
        // GATHERING INFO
        //--------------------------------------------
        $conflictsPath = $sessionDir . "/conflicts.byml";
        $timPath = $sessionDir . "/tim.byml";
        $cimPath = $sessionDir . "/cim.byml";
        $buildDirPath = $sessionDir . "/build_dir";


        $nbConflicts = 0;
        $tim = [];
        $cim = [];


        if (true === file_exists($conflictsPath)) {
            $r = new TimConflictsReader();
            $r->init($conflictsPath);
            $nbConflicts = $r->countConflicts();
        }


        if (true === file_exists($timPath)) {
            $tim = BabyYamlUtil::readFile($timPath);
        }

        if (true === file_exists($cimPath)) {
            $cim = BabyYamlUtil::readFile($cimPath);
        }


        //--------------------------------------------
        // EXPOSING INFO
        //--------------------------------------------
        $output->write("Parsing info from session dir: <b:red>$sessionDir</b:red>" . PHP_EOL);
        $output->write("Number of conflicts: <b>$nbConflicts</b>" . PHP_EOL);
        if ($tim) {
            $s = '';
            foreach ($tim as $_planetDotName => $_version) {
                $s .= "- <blue>" . $_planetDotName . ":$_version</blue>" . PHP_EOL;
            }
            $output->write("The <b>theoretical import map</b> is the following: " . PHP_EOL . $s . PHP_EOL);
        } else {
            $output->write("The <b>theoretical import map</b> was not found, or was empty." . PHP_EOL);
        }

        if ($cim) {
            $s = '';
            foreach ($cim as $_planetDotName => $_version) {
                $s .= "- <blue>" . $_planetDotName . ":$_version</blue>" . PHP_EOL;
            }
            $output->write("The <b>concrete import map</b> is the following: " . PHP_EOL . $s . PHP_EOL);
        } else {
            $output->write("The <b>concrete import map</b> was not found, or was empty." . PHP_EOL);
        }


        $output->write("Build dir contents:" . PHP_EOL);
        $s = '';
        $uniDir = $buildDirPath . "/universe";
        if (is_dir($uniDir)) {
            $galaxyDirs = YorgDirScannerTool::getDirs($uniDir);
            foreach ($galaxyDirs as $galaxyDir) {
                $planetDirs = YorgDirScannerTool::getDirs($galaxyDir);
                $galaxy = basename($galaxyDir);
                foreach ($planetDirs as $planetDir) {
                    $planetDotName = $galaxy . "." . basename($planetDir);
                    $version = MetaInfoTool::getVersion($planetDir);
                    if (null === $version) {
                        $version = "(No version found)";
                    }
                    $s .= "- <blue>$planetDotName:$version</blue>" . PHP_EOL;
                }
            }
        }
        if ($s) {
            $output->write($s);
        } else {
            $output->write("Nothing in the build dir." . PHP_EOL);
        }


        $answer = QuestionHelper::ask($output, "Press <b>c</b> to launch the conflicts explorer, <b>o</b> to open the session dir (mac only), or any other key to quit:", function () {

        });

        if ('c' === $answer) {
            ConsoleTool::reset();
            $myInput = new WritableCommandLineInput();
            $myInput->setParameters([
                "explore_conflicts",
                addcslashes($conflictsPath, '"'),

            ]);
            $this->application->run($myInput, $output);
        } elseif ('o' === $answer) {
            passthru("open \"$sessionDir\"");
        } else {
            $output->write("Bye." . PHP_EOL);
        }


        return 0;
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
 This command launches an interactive gui which helps you investigate a <$co>session dir</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#session-dir</$url>).
 ";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "sessionDir" => [
                " the path of the session dir to debug. By default, the latest session dir is chosen.",
                false,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "debug " => "lpi debug_session_dir",
        ];
    }

}