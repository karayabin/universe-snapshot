<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Command\CommandInterface;
use Ling\Deploy\Application\DeployApplication;



/**
 * The DeployGenericCommand class.
 * This class is the parent of all deploy commands.
 *
 * It provides access to the DeployApplication instance.
 *
 *
 */
abstract class DeployGenericCommand implements CommandInterface
{


    /**
     * This property holds the DeployApplication instance.
     * @var DeployApplication
     */
    protected $application;


    /**
     * Builds the DeployGenericCommand instance.
     */
    public function __construct()
    {
        $this->application = null;
    }


    /**
     * Sets the application.
     *
     * @param DeployApplication $application
     */
    public function setApplication(DeployApplication $application)
    {
        $this->application = $application;
    }
}