<?php


namespace Ling\Light\Controller;


use Ling\Light\Core\Light;
use Ling\Light\Core\LightAwareInterface;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightController class.
 *
 * Note: a LightController provides two methods to access the Light application
 * and the service container (getLight, and getContainer),
 * which is an alternative to passing those objects as arguments of the controller method.
 *
 *
 */
class LightController implements LightControllerInterface, LightAwareInterface
{

    /**
     * This property holds the light for this instance.
     * @var Light
     */
    protected $light;


    /**
     * Builds the LightController instance.
     */
    public function __construct()
    {
        $this->light = null;
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
     * Returns the light application.
     *
     * @return Light
     */
    protected function getLight(): Light
    {
        return $this->light;
    }

    /**
     * Returns the service container.
     * @return LightServiceContainerInterface
     */
    protected function getContainer(): LightServiceContainerInterface
    {
        return $this->light->getContainer();
    }


    /**
     * Returns the http request bound to the light instance.
     * @return HttpRequestInterface
     */
    protected function getHttpRequest(): HttpRequestInterface
    {
        return $this->light->getHttpRequest();
    }


    /**
     * Returns whether the container contains the service which name is given.
     *
     * @param string $serviceName
     * @return bool
     */
    protected function hasService(string $serviceName): bool
    {
        return $this->getContainer()->has($serviceName);
    }


    /**
     *
     * Sends a log message to the logger service's error channel.
     *
     * See the @page(light philosophy page) for more details.
     *
     * @param $msg
     * @throws \Exception
     */
    protected function logError($msg)
    {
        $this->getLight()->logError($msg);
    }
}