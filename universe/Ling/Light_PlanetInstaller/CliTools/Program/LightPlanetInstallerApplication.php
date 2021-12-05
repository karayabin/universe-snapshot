<?php


namespace Ling\Light_PlanetInstaller\CliTools\Program;

use Ling\CliTools\Command\CommandInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\CliTools\Program\LightCliBaseApplication;
use Ling\Light_PlanetInstaller\CliTools\Command\LightPlanetInstallerBaseCommand;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;

/**
 * The LightPlanetInstallerApplication class.
 *
 *
 * Nomenclature
 * ----------------
 *
 * ### planetInfo
 * The planetInfo array is an array with the following structure:
 *
 * - 0: planet path     (string)
 * - 1: galaxy name     (string)
 * - 2: planet name     (string)
 * - 3: real version number  (string)
 *
 *
 *
 */
class LightPlanetInstallerApplication extends LightCliBaseApplication
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();

        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\CleanSessionDirsCommand", "clean_session_dirs");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\CreateMapCommand", "create_map");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\DebugSessionDirCommand", "debug_session_dir");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ExploreConflictsCommand", "explore_conflicts");


        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\HelpCommand", "help");

        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ImportCommand", "import");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ImportLingUniverseCommand", "import_ling_universe");

        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\InstallCommand", "install");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\InstallInit1Command", "install_init1");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\InstallInit2Command", "install_init2");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\InstallInit3Command", "install_init3");

        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\RestoreMapCommand", "restore_map");


        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ToDirCommand", "todir");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ToLinkCommand", "tolink");


        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\UninstallCommand", "uninstall");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\UpgradeCommand", "upgrade");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\UpgradeUniverseCommand", "upgrade_universe");
    }



    //--------------------------------------------
    // LightCliBaseApplication
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getAppId(): string
    {
        return LpiHelper::getAppId();
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof LightServiceContainerAwareInterface) {
            $command->setContainer($this->container);
        }
        if ($command instanceof LightPlanetInstallerBaseCommand) {
            $command->setApplication($this);
        } else {
            throw new LightPlanetInstallerException("All commands must inherit LightPlanetInstallerBaseCommand.");
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException($msg, $code);
    }


}