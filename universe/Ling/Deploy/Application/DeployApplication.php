<?php


namespace Ling\Deploy\Application;


use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Program\Application;
use Ling\Deploy\Command\DeployGenericCommand;
use Ling\Deploy\Exception\DeployException;
use Ling\LingTalfi\Kaos\Command\KaosGenericCommand;
use Ling\LingTalfi\Kaos\Exception\KaosException;


/**
 * The DeployApplication class.
 *
 * The console program used to deploy your local website to production servers.
 *
 */
class DeployApplication extends Application
{


    /**
     * This property holds the currentDirectory when this instance was first instantiated.
     * @var string
     */
    private $currentDirectory;

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

        $this->currentDirectory = getcwd();
        $this->baseIndentLevel = 0;
        $this->registerCommand("Ling\Deploy\Command\CreateMapCommand", "map");

    }


    /**
     * Returns the current directory when this instance was first instantiated.
     * @return string
     */
    public function getCurrentDirectory()
    {
        return $this->currentDirectory;
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


}





