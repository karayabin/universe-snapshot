<?php


namespace Ling\LingTalfi\Kaos\Application;


use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Program\Application;
use Ling\LingTalfi\Kaos\Command\KaosGenericCommand;
use Ling\LingTalfi\Kaos\Exception\KaosException;


/**
 * The KaosApplication class.
 *
 * Personal console helper for universe related tasks.
 *
 */
class KaosApplication extends Application
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
     * Builds the KaosApplication instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->currentDirectory = getcwd();
        $this->baseIndentLevel = 0;
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\HelpCommand", "help");
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\InitializePlanetCommand", "init");
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\PackAndPushUniToolCommand", "packpushuni");
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\PackLightPluginCommand", "packlightmap");
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\PushCommand", "push");
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\PushUniverseSnapshotCommand", "pushuni");
        $this->registerCommand("Ling\LingTalfi\Kaos\Command\UpdateSubscriberDependenciesCommand", "updsd");

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
        if ($command instanceof KaosGenericCommand) {
            $command->setApplication($this);
        } else {
            throw new KaosException("All commands must inherit from Ling\LingTalfi\Kaos\Command\KaosGenericCommand.");
        }
    }


}





