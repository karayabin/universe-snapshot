<?php

namespace Ling\Light\ServiceContainer;


use Ling\Light\Core\Light;
use Ling\Octopus\ServiceContainer\BlueOctopusServiceContainer;

/**
 * The LightBlueServiceContainer class.
 */
class LightBlueServiceContainer extends BlueOctopusServiceContainer implements LightServiceContainerInterface
{
    /**
     * This property holds the appDir for this instance.
     * @var string
     */
    protected $appDir;

    /**
     * This property holds the light for this instance.
     * @var Light
     */
    protected $light;


    /**
     * Builds the LightRedServiceContainer instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->appDir = null;
        $this->light = null;
    }

    /**
     * @implementation
     */
    public function getApplicationDir(): string
    {
        return $this->appDir;
    }

    /**
     * @implementation
     */
    public function getLight(): Light
    {
        return $this->light;
    }

    /**
     * @implementation
     */
    public function setLight(Light $light)
    {
        $this->light = $light;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the application directory.
     * @param string $appDir
     */
    public function setApplicationDir(string $appDir)
    {
        $this->appDir = $appDir;
    }


}