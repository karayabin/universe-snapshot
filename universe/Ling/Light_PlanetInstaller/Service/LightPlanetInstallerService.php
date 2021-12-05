<?php


namespace Ling\Light_PlanetInstaller\Service;


use Ling\Bat\ClassTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInterface;
use Ling\UniverseTools\PlanetTool;


/**
 * The LightPlanetInstallerService class.
 */
class LightPlanetInstallerService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;

    /**
     * The array of planetDotName => installer. It's a cache.
     *
     * @var LightPlanetInstallerInterface[]
     */
    protected $installers;


    /**
     * Builds the LightPlanetInstallerService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
        $this->installers = [];
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
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Returns the planet installer instance for the given planetDotName if defined, or null otherwise.
     *
     *
     * @param string $planetDotName
     * @return LightPlanetInstallerInterface|null
     */
    public function getInstallerInstance(string $planetDotName): ?LightPlanetInstallerInterface
    {
        if (false === array_key_exists($planetDotName, $this->installers)) {
            list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);

            $compressed = PlanetTool::getCompressedPlanetName($planet);
            $installerClass = "$galaxy\\$planet\\Light_PlanetInstaller\\${compressed}PlanetInstaller";
            if (true === ClassTool::isLoaded($installerClass)) {
                $instance = new $installerClass;
                if ($instance instanceof LightServiceContainerAwareInterface) {
                    $instance->setContainer($this->container);
                }
                $this->installers[$planetDotName] = $instance;
            } else {
                $this->installers[$planetDotName] = null;
            }
        }
        return $this->installers[$planetDotName];
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightPlanetInstallerException($msg);
    }

}