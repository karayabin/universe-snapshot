<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Util\ServiceManagerUtil;

/**
 * The LightDeveloperWizardCommonProcess class.
 */
abstract class LightDeveloperWizardCommonProcess extends LightDeveloperWizardBaseProcess implements LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the util for this instance.
     * @var ServiceManagerUtil
     */
    protected $util;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->container = null;
        $this->util = null;
    }


    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @overrides
     */
    public function prepare()
    {

        $util = $this->container->get("developer_wizard")->getServiceManagerUtil();
        $planetName = $this->getContextVar("planet");
        $galaxyName = $this->getContextVar("galaxy");
        $util->setPlanet($planetName, $galaxyName);
        $util->setContainer($this->container);
        $this->util = $util;


        if (false === $this->isLightPlanet($planetName)) {
            $this->setDisabledReason("The planet name doesn't start with the \"Light_\" prefix.");
        }
    }
}