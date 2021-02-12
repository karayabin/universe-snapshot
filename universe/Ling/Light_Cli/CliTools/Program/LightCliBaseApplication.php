<?php


namespace Ling\Light_Cli\CliTools\Program;

use Ling\CliTools\Program\Application;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightCliBaseApplication class.
 *
 */
abstract class LightCliBaseApplication extends Application implements LightCliApplicationInterface, LightServiceContainerAwareInterface
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



    //--------------------------------------------
    // LightCliBaseApplication
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getCommands(): array
    {
        $ret = [];
        foreach ($this->commands as $alias => $className) {
            $inst = new $className();
            if ($inst instanceof LightCliCommandInterface) {
                $ret[$alias] = $inst;
            }
        }
        return $ret;
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


}