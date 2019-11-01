<?php

namespace Ling\Light\ServiceContainer;


use Ling\Octopus\ServiceContainer\RedOctopusServiceContainer;


/**
 * The LightRedServiceContainer class.
 */
class LightRedServiceContainer extends RedOctopusServiceContainer implements LightServiceContainerInterface
{

    /**
     * This property holds the appDir for this instance.
     * @var string
     */
    protected $appDir;


    /**
     * Builds the LightRedServiceContainer instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->appDir = null;
    }

    /**
     * @implementation
     */
    public function getApplicationDir(): string
    {
        return $this->appDir;
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