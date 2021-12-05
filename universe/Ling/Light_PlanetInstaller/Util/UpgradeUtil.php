<?php


namespace Ling\Light_PlanetInstaller\Util;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\Light_PlanetInstaller\Helper\LpiWebHelper;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The UpgradeUtil class.
 */
class UpgradeUtil
{

    /**
     * This property holds the output for this instance.
     * @var OutputInterface|null
     */
    private ?OutputInterface $output;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    private LightServiceContainerInterface $container;


    /**
     * This property holds the errorMessages for this instance.
     * It's an array of items, each of which:
     *
     * - 0: planetDotName
     * - 1: exception caught
     *
     * @var array
     */
    private array $errorMessages;


    /**
     * Builds the UpgradeUtil instance.
     */
    public function __construct()
    {
        $this->output = null;
        $this->errorMessages = [];
    }

    /**
     * Sets the output.
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Returns the errorMessages of this instance.
     *
     * @return array
     */
    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }


    /**
     * Try to upgrade the given planets located in the given working dir.
     *
     * The working dir can be either an app directory, or directly an universe directory.
     *
     * Available options are:
     *
     * - stopAtFirstError: bool=false. If false, when a problem occurs with a planet, we add it to the errorMessages list.
     *      If true, this method will interrupt the process after the first error.
     *
     *      In both cases the error(s) description(s) can be accessed via the errorMessages property.
     *
     * - useDebug: bool=false. Whether to pass the debug flag to the import util that we use internally.
     * - install: bool=false. Whether to also trigger the install procedure for each upgraded planet.
     *
     *
     *
     * @param string $appDir
     * @param array $planetDotNames
     * @param array $options
     * @throws \Exception
     */
    public function upgrade(string $appDir, array $planetDotNames, array $options = []): void
    {

        $stopAtFirstError = $options['stopAtFirstError'] ?? false;
        $useDebug = $options['useDebug'] ?? false;
        $doInstall = $options['install'] ?? false;
        $output = $this->output;


        $this->errorMessages = []; // init error messages
        foreach ($planetDotNames as $planetDotName) {


            list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);


            try {


                $planetDir = $appDir . "/universe/$galaxy/$planet";
                $appVersion = MetaInfoTool::getVersion($planetDir);
                $webVersion = LpiWebHelper::getPlanetCurrentVersion($planetDotName);

                $symbol = LpiVersionHelper::compare($webVersion, $appVersion);
                if ('>' === $symbol) {
                    $output->write("<blue>Upgrading</blue> planet <b>$planetDotName</b> from <red>$appVersion</red> to <red>$webVersion</red>." . PHP_EOL);


                    //--------------------------------------------
                    // (PRE)IMPORT
                    //--------------------------------------------
                    /**
                     * Since the upgrade algorithm involves the physical removal of the planet at some point,
                     * to play it safe for the user, we use the **build dir** technique to ensure that the planet
                     * can be imported before we actually delete it from the app.
                     *
                     * This means we start the import first...
                     */
                    $importUtil = new ImportUtil();
                    $importUtil->setOutput($output);

                    if (true === $useDebug) {
                        $importUtil->setDebug(true);
                    }

                    $sessionDir = $importUtil->import($planetDotName, [
                        "version" => null,
                        "app" => $appDir,
                        "deps" => false,
                        "testBuildDir" => true,
                        "force" => true,
                        "showEndTip" => false,
                    ]);

                    $buildDir = $sessionDir . "/build_dir";
                    if (false === is_dir($buildDir)) {
                        $this->error("Build dir not found: expected at <b>$buildDir</b>." . PHP_EOL);
                    }

                    //--------------------------------------------
                    // UNINSTALL
                    //--------------------------------------------
                    $uninstallUtil = new UninstallUtil();
                    $uninstallUtil->setOutput($output);
                    $uninstallUtil->setContainer($this->container);
                    $uninstallUtil->uninstall($planetDotName, [
                        'app' => $appDir,
                        'isUpgrade' => true,
                    ]);


                    //--------------------------------------------
                    // MOVE BUILD DIR TO APP (DESTRUCTIVE IMPORT => will replace planets in the app)
                    //--------------------------------------------
                    $output->write("Moving <b>build dir</b> to <b>target app</b> ( <red>$buildDir</red> -> <blue>$appDir</blue> )." . PHP_EOL);
                    $importUtil->moveBuildDirToTargetApp($buildDir, $appDir);


                    if (true === $doInstall) {
                        //--------------------------------------------
                        // INSTALL
                        //--------------------------------------------
                        $util = new InstallInitUtil();
                        $util->installInit($output, $appDir, $sessionDir, $planetDotName);

                    }


                    $output->write("<green:bold>Planet <b>$planetDotName</b> was successfully upgraded to version <red>$webVersion</red></green:bold>." . PHP_EOL);
                } else {
                    $output->write("Skipping upgrade for planet <b>$planetDotName</b> (<red>$appVersion</red> >= <red>$webVersion</red>)." . PHP_EOL);
                }
            } catch (\Exception $e) {
                if (true === $stopAtFirstError) {
                    throw $e;
                } else {
                    $this->errorMessages[] = [$planetDotName, $e];
                }
            }
        }
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException(static::class . ": " . $msg, $code);
    }
}