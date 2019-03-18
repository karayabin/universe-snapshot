<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\CliTools\Command\CommandInterface;
use Ling\LingTalfi\Kaos\Application\KaosApplication;



/**
 * The KaosGenericCommand class.
 * This class is the parent of kaos commands.
 *
 * It provides access to the KaosApplication instance.
 *
 *
 */
abstract class KaosGenericCommand implements CommandInterface
{


    /**
     * This property holds the KaosApplication instance.
     * @var KaosApplication
     */
    protected $application;


    /**
     * Builds the KaosGenericCommand instance.
     */
    public function __construct()
    {
        $this->application = null;
    }


    /**
     * Sets the application.
     *
     * @param KaosApplication $application
     */
    public function setApplication(KaosApplication $application)
    {
        $this->application = $application;
    }
}