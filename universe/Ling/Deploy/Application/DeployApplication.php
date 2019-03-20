<?php


namespace Ling\Deploy\Application;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\Application;
use Ling\Deploy\Command\DeployGenericCommand;
use Ling\Deploy\Exception\DeployException;

/**
 * The DeployApplication class.
 *
 * The console program used to deploy your local website to production servers.
 *
 * General options (apply to all commands)
 * ------------
 *
 * - ?dir=$dir. Sets the project directory. If not set, the default is the current directory;
 *
 *
 *
 *
 *
 *
 */
class DeployApplication extends Application
{


    /**
     * This property holds the projectDirectory.
     * @var string
     */
    private $projectDirectory;

    /**
     * This property holds the base indent level for this instance.
     * @var int = 0
     */
    private $baseIndentLevel;

    /**
     * Builds the DeployApplication instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->projectDirectory = getcwd();
        $this->baseIndentLevel = 0;
        $this->registerCommand("Ling\Deploy\Command\DiffCommand", "diff");
        $this->registerCommand("Ling\Deploy\Command\HelpCommand", "help");
        $this->registerCommand("Ling\Deploy\Command\CreateMapCommand", "map");
        $this->registerCommand("Ling\Deploy\Command\PushCommand", "push");

    }

    /**
     * Returns the projectDirectory of this instance.
     *
     * @return string
     */
    public function getProjectDirectory(): string
    {
        return $this->projectDirectory;
    }


    /**
     * Returns the baseIndentLevel of this instance.
     *
     * @return int
     */
    public function getBaseIndentLevel(): int
    {
        return $this->baseIndentLevel;
    }


    /**
     * Returns the configuration for the current project.
     *
     * The configuration is stored in the **.deploy/conf.byml** file at the root of the application.
     * It it's incomplete, or if no such file exists, the default configuration will be used as a fallback.
     * The default configuration is the following (see the documentation for more details):
     *
     * ```txt
     * map-conf:
     *      ignoreHidden: true
     *      ignore: []
     * ```
     * TODO: continue the map...
     *
     *
     *
     * @return array
     */
    public function getConf(OutputInterface $output)
    {
        $confFile = $this->projectDirectory . "/.deploy/conf.byml";
        $ret = [];
        if (file_exists($confFile)) {
            $ret = BabyYamlUtil::readFile($confFile);
        } else {
            if (false === $this->hasConf()) {
                H::warning("Warning! Configuration file not found (<b>.deploy/conf.byml</b>). I will use default values instead." . PHP_EOL, $output);
            }
        }

        if (false === array_key_exists('map-conf', $ret)) {
            $ret['map-conf'] = [];
        }

        if (false === array_key_exists('ignore', $ret['map-conf'])) {
            $ret['map-conf']['ignore'] = [];
        }

        if (false === array_key_exists('ignoreHidden', $ret['map-conf'])) {
            $ret['map-conf']['ignoreHidden'] = true;
        }


        return $ret;
    }


    /**
     * Returns the path to the map file for this application.
     *
     * @return string
     */
    public function getMapPath()
    {
        return $this->projectDirectory . "/.deploy/map.txt";
    }


    /**
     * @overrides
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        if (null !== ($dir = $input->getOption("dir"))) {
            $this->projectDirectory = $dir;
        }


        if (null !== ($indent = $input->getOption("indent"))) {
            $this->baseIndentLevel = $indent;
        }
        //--------------------------------------------
        //
        //--------------------------------------------
        parent::run($input, $output);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof DeployGenericCommand) {
            $command->setApplication($this);
        } else {
            throw new DeployException("All commands must inherit from Ling\Deploy\Command\DeployGenericCommand.");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function hasConf()
    {
        $confFile = $this->projectDirectory . "/.deploy/conf.byml";
        return file_exists($confFile);
    }

}





