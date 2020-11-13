<?php

namespace Ling\Light\ServiceContainer;


use Ling\Light\Core\Light;
use Ling\Light\Exception\LightException;
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
     * @throws \Exception
     */
    public function setApplicationDir(string $appDir)
    {
        $realPath = realpath($appDir);
        if (false === $realPath) {
            throw new LightException("Application dir does not exist: \"$appDir\".");
        }
        $this->appDir = $realPath;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Defines which information to display when var_dump is called on this instance.
     *
     * @return string[]
     */
    public function __debugInfo()
    {
        /**
         * Too many properties, this is ridiculous, I generally don't want to debug the container itself,
         * but rather another instance which has a container instance. So we crop all the props, for readability purposes.
         * Feel free to comment this method out if you really need to debug the container...
         */
        return [
            'lots of properties' => '...',
        ];
    }
}