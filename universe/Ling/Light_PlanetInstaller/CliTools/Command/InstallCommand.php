<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit1HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;
use Ling\Light_PlanetInstaller\Util\InstallInitUtil;
use Ling\UniverseTools\AssetsMapTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The InstallCommand class.
 *
 */
class InstallCommand extends ImportCommand
{


    /**
     * Builds the InstallCommand instance.
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
        $appDir = $input->getOption("app", getcwd());

        //--------------------------------------------
        // PHASE IMPORT
        //--------------------------------------------
        $this->phaseTitle($output, "import phase");
        $sessionDir = $this->doTheImport($input, $output);


        if (false !== $sessionDir) {
            $util = new InstallInitUtil();
            $planetDotName = $input->getParameter(2);
            $retCode = $util->installInit($output, $appDir, $sessionDir, $planetDotName);
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
 <$co>Installs</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#install-algorithm</$url>) a planet in your application.
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
            "planetDotName" => [
                " the <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to install.",
                true,
            ],
            "version" => [
                " the version of the planet to install. If null (by default), the planet will be installed in its latest version (this is called <$co>uni style mode</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#uni-style-vs-versioned-style</$url>))
 ",
                false,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getOptions(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "app" => [
                'desc' => " string. The path to the app in which to install the planet. By default, the current working directory (pwd) is assumed.",
                'values' => [
                ],
            ],
            "crm" => [
                'desc' => " string=latest. The <$co>application conflict resolution mode</$co>(<$url>application-conflict-resolution-mode</$url>). The possible values are:
 - ask
 - abort
 - keep
 - replace
 - latest
 - earliest",
                'values' => [
                ],
            ],
            "tim" => [
                'desc' => " string. The path to a file containing the <$co>theoretical import map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map</$url>) to use. If set, this will bypass the planetDotName argument passed to this command,
 and the planets imported will be the ones defined in the <b>theoretical import map</b>. 
 ",
                'values' => [
                ],
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "d" => " if set, enables the debug mode, in which output is a bit more verbose",
            "no-symlinks" => " if set, the install command will not try to use symlinks to import your planet. See the <$co>symlinks workflow discussion</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#alternate-universe-and-symlink-speed-up-your-workflow</$url>) for more information. ",
            "no-deps" => " if set, the install command will only install the given planet, and will not try to install its dependencies (if any). ",
            "test" => " if set, the install command will stop after creating and displaying the <$co>concrete import map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map</$url>). In other words, nothing will be actually imported, but you will see the list of 
 what would have been imported if you didn't add the test flag. ",
            "f" => " if set, forces the reimporting of the planet, even if it's already in your app",
            "test-build-dir" => " if set, the install command will stop after creating the build dir. In other words, nothing will be actually imported, but you will not only have the <$co>concrete import map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map</$url>) created,
 but also the <b>build dir</b>. See the <$co>import algorithm</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-algorithm</$url>) section for more info about the <b>build dir</b>.",
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
            "install" => "lpi install",
        ];
    }




    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Writes a phase title to the output.
     *
     * @param OutputInterface $output
     * @param string $msg
     */
    protected function phaseTitle(OutputInterface $output, string $msg)
    {
        $output->write(PHP_EOL . "<b:blue>----- " . strtoupper($msg) . "----- </b:blue>" . PHP_EOL);
    }


    /**
     * Standard structure for calling an init phase.
     *
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param int $initNumber
     * @return int
     */
    protected function processInitPhase(InputInterface $input, OutputInterface $output, int $initNumber): int
    {

        $returnCode = 0;

        $sessionDir = $input->getParameter(2);
        $appDir = $input->getOption("app", getcwd());
        $debug = $input->hasFlag("d");
        $methodName = "init" . $initNumber;


        try {

            //--------------------------------------------
            // PHASE INIT X
            //--------------------------------------------
            $this->phaseTitle($output, "init $initNumber");
            $output->write("The session dir is <b>$sessionDir</b>." . PHP_EOL);
            $cim = $sessionDir . "/cim.byml";
            $concreteImportMap = null;
            if (true === is_file($cim)) {
                $concreteImportMap = BabyYamlUtil::readFile($cim);
            }
            if (null === $concreteImportMap) {
                $output->write("No concrete import map found. Nothing to do. Bye." . PHP_EOL);
            } else {
                foreach ($concreteImportMap as $planetDotName => $version) {


                    list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
                    $tightPlanet = PlanetTool::getTightPlanetName($planet);


                    $planetDir = PlanetTool::getPlanetDirByPlanetDotName($planetDotName, $appDir);


                    $sentenceBegin = "- Processing <blue>$planetDotName:$version</blue>...";
                    $somethingHappened = false;
                    $assetsHappened = false;

                    if (true === $debug) {
                        $output->write($sentenceBegin);
                    }


                    if (1 === $initNumber) {
                        //--------------------------------------------
                        // ASSETS/MAP
                        //--------------------------------------------
                        $assetsMapDir = $planetDir . "/assets/map";
                        if (true === is_dir($assetsMapDir)) {
                            $somethingHappened = true;
                            $assetsHappened = true;
                            AssetsMapTool::copyAssets($assetsMapDir, $appDir);
                            if (false === $debug) {
                                $output->write($sentenceBegin);
                            }
                            $output->write("copying assets/map...");
                        } else {
                            if (true === $debug) {
                                $output->write("no assets/map...");
                            }
                        }
                    }


                    //--------------------------------------------
                    // INIT X HOOK
                    //--------------------------------------------
                    $hookFound = false;
                    $instance = LpiHelper::getPlanetInstallerInstance($planetDotName);

                    if (false !== $instance) {


                        if ($initNumber > 1 && $instance instanceof LightServiceContainerAwareInterface) {
                            $instance->setContainer($this->container);
                        }

                        if (
                            (1 === $initNumber && $instance instanceof LightPlanetInstallerInit1HookInterface) ||
                            (2 === $initNumber && $instance instanceof LightPlanetInstallerInit2HookInterface) ||
                            (3 === $initNumber && $instance instanceof LightPlanetInstallerInit3HookInterface)
                        ) {
                            $somethingHappened = true;
                            if (false === $debug && false === $assetsHappened) {
                                $output->write($sentenceBegin);
                            }
                            $output->write("<b>executing init $initNumber hook</b>...");
//                            $output->write(PHP_EOL); // assuming installer will output some message, makes the display cleaner
                            $instance->$methodName($appDir, $output);
                            $hookFound = true;
                        }
                    }
                    if (false === $hookFound) {
                        if (true === $debug) {
                            $output->write("no <b>init $initNumber</b> hook found...");
                        }
                    }

                    if (
                        true === $somethingHappened ||
                        true === $debug
                    ) {
                        $output->write(PHP_EOL);
                    }
                }
            }


        } catch (\Exception $e) {
            /**
             * init1: 33
             * init2: 34
             * init3: 35
             */
            $returnCode = 32 + $initNumber;

            $file = $sessionDir . "/init${initNumber}.error.txt";
            $data = (string)$e;
            FileSystemTool::mkfile($file, $data);
        }

        return $returnCode;
    }


}