<?php


namespace Ling\Light_PlanetInstaller\Util;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit1HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;

/**
 * The UninstallUtil class.
 */
class UninstallUtil
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
     * Builds the UpgradeUtil instance.
     */
    public function __construct()
    {
        $this->output = null;
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
     * Uninstalls the given planet.
     *
     * Available options are:
     *
     * - app: string, the path to the app where the planet is located.
     * - isUpgrade: bool=false, whether the calling process comes from the upgrade command.
     *
     * @param string $planetDotName
     * @param array $options
     */
    public function uninstall(string $planetDotName, array $options)
    {


        $appDir = $options['app'] ?? null;
        $isUpgrade = $options['isUpgrade'] ?? false;
        $this->message("uninstalling $planetDotName.");


        $instance = LpiHelper::getPlanetInstallerInstance($planetDotName);


        if (false !== $instance) {
            if (
                $instance instanceof LightPlanetInstallerInit3HookInterface ||
                $instance instanceof LightPlanetInstallerInit2HookInterface
            ) {
                $instance->setContainer($this->container);
            }
            if ($instance instanceof LightPlanetInstallerInit3HookInterface) {
                $this->message("triggering <b:red>undoInit3</b:red> process.");
                $instance->undoInit3($appDir, $this->output, [
                    'isUpgrade' => $isUpgrade,
                ]);
            } else {
                $this->message("no <b:red>undoInit3</b:red> process found, skipping.");
            }
            if ($instance instanceof LightPlanetInstallerInit2HookInterface) {
                $this->message("triggering <b:red>undoInit2</b:red> process.");
                $instance->undoInit2($appDir, $this->output);
            } else {
                $this->message("no <b:red>undoInit2</b:red> process found, skipping.");
            }
            if ($instance instanceof LightPlanetInstallerInit1HookInterface) {
                $this->message("triggering <b:red>undoInit1</b:red> process.");
                $instance->undoInit1($appDir, $this->output);
            } else {
                $this->message("no <b:red>undoInit1</b:red> process found, skipping.");
            }
            $this->message("<green>Planet <b>$planetDotName</b> was uninstalled successfully.</green>");
        } else {
            $this->message("<warning>this planet doesn't have an uninstaller, skipping.</warning>");
        }
    }


    /**
     * Writes a message to the output.
     * @param string $msg
     * @param bool $br
     */
    private function message(string $msg, bool $br = true)
    {
        if (true === $br) {
            $msg = $msg . PHP_EOL;
        }
        $this->output->write("UninstallUtil: " . $msg);
    }
}