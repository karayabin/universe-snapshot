<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\WebWizard;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;
use Ling\WebWizardTools\WebWizard\WebWizardToolsDefaultWebWizard;
use Ling\WebWizardTools\WebWizard\WebWizardToolsWebWizard;


/**
 * The LightDeveloperWizardWebWizard class.
 */
class LightDeveloperWizardWebWizard extends WebWizardToolsDefaultWebWizard
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->container = null;
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
     * @overrides
     */
    public function setProcess(WebWizardToolsProcess $process): WebWizardToolsWebWizard
    {
        if ($process instanceof LightServiceContainerAwareInterface) {
            $process->setContainer($this->container);
        }
        return parent::setProcess($process);
    }


}