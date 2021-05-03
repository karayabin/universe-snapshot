<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;

use Exception;
use Ling\Bat\CaseTool;
use Ling\Bat\ClassTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Cli\CliTools\Program\LightCliCommandInterface;
use Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication;

/**
 * The LightPlanetInstallerBaseCommand class.
 */
abstract class LightPlanetInstallerBaseCommand implements CommandInterface, LightCliCommandInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the LightPlanetInstallerApplication instance.
     * @var LightPlanetInstallerApplication
     */
    protected LightPlanetInstallerApplication $application;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;


    /**
     * Builds the LightPlanetInstallerBaseCommand instance.
     */
    public function __construct()
    {
    }


    /**
     * Runs the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    abstract protected function doRun(InputInterface $input, OutputInterface $output);


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }




    //--------------------------------------------
    // CommandInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->application->setCurrentOutput($output);
        try {
            return $this->doRun($input, $output);
        } catch (\Exception $e) {
            $this->application->logError($e);
        }
    }


    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getName(): string
    {
        $className = substr(ClassTool::getShortName($this), 0, -7); // remove the Command suffix
        return CaseTool::toUnderscoreLow($className);
    }

    /**
     * @implementation
     */
    public function getDescription(): string
    {
        return "some description";
    }

    /**
     * @implementation
     */
    public function getAliases(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getFlags(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getOptions(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getParameters(): array
    {
        return [];
    }


    /**
     * Sets the application.
     *
     * @param LightPlanetInstallerApplication $application
     */
    public function setApplication(LightPlanetInstallerApplication $application)
    {
        $this->application = $application;
    }


    /**
     * Proxy to the application's logError method.
     * @param string|Exception $error
     *
     */
    public function logError(string|\Exception $error)
    {
        $this->application->logError($error);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns whether the current dir is an application dir (containing an universe dir).
     * @param OutputInterface $output
     * @return bool
     */
    protected function checkInsideAppDir(OutputInterface $output): bool
    {
        $uniDir = $this->application->getApplicationDirectory() . "/universe";
        if (false === is_dir($uniDir)) {
            $output->write("<warning>Warning: no universe directory found, you're probably not inside a light app directory. Aborting (this is a safety measure).</warning>." . PHP_EOL);
            return false;
        }
        $bigBang = $uniDir . '/bigbang.php';
        $bigBangUrl = "https://raw.githubusercontent.com/karayabin/universe-snapshot/master/universe/bigbang.php";
        if (false === is_file($bigBang)) {
            $content = file_get_contents($bigBangUrl);
            if (false !== $content) {
                FileSystemTool::mkfile($bigBang, $content);
            } else {
                $output->write("<warning>Warning: no bigbang.php script found in the universe directory. Aborting (this is a safety measure). Note: you can find the bigbang.php script in $bigBangUrl.</warning>." . PHP_EOL);
                return false;
            }
        }
        return true;
    }
}