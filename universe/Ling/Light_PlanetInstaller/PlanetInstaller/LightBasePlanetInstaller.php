<?php


namespace Ling\Light_PlanetInstaller\PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightBasePlanetInstaller interface.
 */
class LightBasePlanetInstaller implements LightPlanetInstallerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     * Builds the LightBasePlanetInstaller instance.
     */
    public function __construct()
    {

    }

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
    // LightPlanetInstallerInterface
    //--------------------------------------------
    /**
     * @implementation
     * @overrideMe
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {

    }
}