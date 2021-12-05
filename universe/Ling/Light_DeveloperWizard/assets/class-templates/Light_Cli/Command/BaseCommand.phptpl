<?php


namespace Ling\Light_PlanetInstallerXXX\CliTools\Command;


use Ling\Bat\CaseTool;
use Ling\Bat\ClassTool;
use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Cli\CliTools\Program\LightCliCommandInterface;
use Ling\Light_Logger\LightLoggerService;
use Ling\Light_PlanetInstallerXXX\CliTools\Program\LightPlanetInstallerApplication;
use Ling\Light_PlanetInstallerXXX\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstallerXXX\Helper\LpiHelper;

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
     * This property holds the output for this instance.
     * @var OutputInterface
     */
    private OutputInterface $output;


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
        $this->output = $output;
        try {
            $ret = $this->doRun($input, $output);
            if (null === $ret) {
                $ret = 0;
            }
            return $ret;


        } catch (\Exception $e) {

            $errorMsg = date("Y-m-d H:i:s") . " - " . $e;

            if ($this->container->has('logger')) {
                /**
                 * @var $lg LightLoggerService
                 */
                $lg = $this->container->get("logger");
                $lg->log($errorMsg, LpiHelper::getAppId() . "_error");
            }

            $output->write(PHP_EOL . '<error>' . $errorMsg . '</error>' . PHP_EOL);
            return 12;
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


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the output.
     * @param string $message
     */
    public function write(string $message)
    {
        $this->output->write($message);
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





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns whether the current working directory is a correct universe application (i.e. containing an universe dir).
     *
     * This is a security measure to prevent you to accidentally install/import things at wrong places.
     *
     * If false is returned, an error message is also written to the output.
     *
     *
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function checkInsideAppDir(InputInterface $input, OutputInterface $output): bool
    {
        $currentDirectory = getcwd();


        $byPassUniverse = $input->hasFlag("u");


        $uniDir = $currentDirectory . "/universe";
        if (false === $byPassUniverse && false === is_dir($uniDir)) {
            $output->write("<warning>Warning: no universe directory found, you're probably not inside a light app directory. Aborting (this is a safety measure).</warning>
<info>Tip: use the -u flag to override this warning.</info>" . PHP_EOL
            );
            return false;
        }
        return true;
    }


    /**
     * Writes an error message to the output.
     * @param string $message
     */
    protected function writeError(string $message)
    {
        $this->output->write('<error>' . $message . '</error>');
    }

    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    protected function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException(static::class . ": " . $msg, $code);
    }
}