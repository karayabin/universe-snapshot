<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Command\CommandInterface;
use Ling\Uni2\Application\UniToolApplication;


/**
 * The UniToolGenericCommand class.
 * This class is the parent of all uni tool commands.
 *
 * It provides access to the Uni2\Application\UniToolApplication instance.
 *
 *
 */
abstract class UniToolGenericCommand implements CommandInterface
{


    /**
     * This property holds the UniToolApplication instance.
     * @var UniToolApplication
     */
    protected $application;


    /**
     * Builds the UniToolGenericCommand instance.
     */
    public function __construct()
    {
        $this->application = null;
    }


    /**
     * Sets the application.
     *
     * @param UniToolApplication $application
     */
    public function setApplication(UniToolApplication $application)
    {
        $this->application = $application;
    }
}