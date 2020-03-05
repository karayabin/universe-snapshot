<?php


namespace Ling\Light\Events;

use Ling\Light\Core\Light;
use Ling\Light\Exception\LightException;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightEvent class.
 *
 * It stores data in the form of a variables array.
 *
 *
 */
class LightEvent
{

    /**
     * This property holds the light for this instance.
     * @var Light
     */
    protected $light;

    /**
     * This property holds the httpRequest for this instance.
     * @var HttpRequestInterface
     */
    protected $httpRequest;


    /**
     * This property holds the vars for this instance.
     * It's an array of key/value pairs.
     * @var array
     */
    protected $vars;


    /**
     * Builds the LightEvent instance.
     */
    public function __construct()
    {
        $this->light = null;
        $this->httpRequest = null;
        $this->vars = [];
    }


    /**
     * Returns a basic LightEvent instance with the light instance and the http request instance set.
     *
     * @param LightServiceContainerInterface $container
     * @return LightEvent
     * @throws \Exception
     */
    public static function createByContainer(LightServiceContainerInterface $container): LightEvent
    {
        $o = new self();
        $light = $container->getLight();
        $o->setLight($light);
        $o->setHttpRequest($light->getHttpRequest());
        return $o;
    }


    /**
     * Sets a variable.
     *
     * @param string $key
     * @param $value
     * @return self
     */
    public function setVar(string $key, $value): self
    {
        $this->vars[$key] = $value;
        return $this;
    }

    /**
     * Returns the variable value associated with the given variable key.
     * If the variable is not found, it returns the given default value by default,
     * or throws an exception if the throwEx flag is set to true.
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @return mixed
     * @throws \Exception
     */
    public function getVar(string $key, $default = null, bool $throwEx = false)
    {
        if (array_key_exists($key, $this->vars)) {
            return $this->vars[$key];
        }
        if (true === $throwEx) {
            throw new LightException("Variable not found: $key.");
        }
        return $default;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the light of this instance.
     *
     * @return Light
     */
    public function getLight(): Light
    {
        return $this->light;
    }

    /**
     * Sets the light.
     *
     * @param Light $light
     */
    public function setLight(Light $light)
    {
        $this->light = $light;
    }

    /**
     * Returns the httpRequest of this instance.
     *
     * @return HttpRequestInterface
     */
    public function getHttpRequest(): HttpRequestInterface
    {
        return $this->httpRequest;
    }

    /**
     * Sets the httpRequest.
     *
     * @param HttpRequestInterface $httpRequest
     */
    public function setHttpRequest(HttpRequestInterface $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * Returns the current service container instance.
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        return $this->light->getContainer();
    }


}