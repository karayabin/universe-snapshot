<?php


namespace Ling\Light\Core;


use Ling\Light\Exception\LightException;
use Ling\Light\Http\HttpResponse;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The Light class.
 */
class Light
{


    /**
     * This property holds the applicationDir for this instance.
     * This is the root directory containing the application.
     *
     * @var string
     */
    protected $applicationDir;

    /**
     * This property holds the routes for this instance.
     * @var array
     */
    protected $routes;

    /**
     * This property holds the errorHandlers for this instance.
     * @var array
     */
    protected $errorHandlers;

    /**
     * This property holds the debug for this instance.
     * @var bool = false
     */
    protected $debug;

    /**
     * This property holds the service container for this instance.
     * @var LightServiceContainerInterface||null
     */
    protected $container;


    /**
     * Builds the Light instance.
     */
    public function __construct()
    {
        $this->applicationDir = null;
        $this->debug = false;
        $this->routes = [];
        $this->errorHandlers = [];
        $this->container = null;
    }

    /**
     * Sets the debug.
     *
     * @param bool $debug
     */
    public function setDebug(bool $debug)
    {
        $this->debug = $debug;
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
     * Runs the Light web application.
     */
    public function run()
    {
        try {
            if (null !== $this->applicationDir) {

            } else {
                throw new LightException("Application dir not set.");
            }
        } catch (\Exception $e) {


            $lightErrorCode = null;
            if ($e instanceof LightException) {
                $lightErrorCode = $e->getLightErrorCode();
            }


            $washHandled = false;
            foreach ($this->errorHandlers as $errorHandler) {

            }


            if (false === $washHandled) {
                if (false === $this->debug) {
                    $this->showInternalServerErrorPage();

                } else {
                    $this->showDebugPage($e);
                }
            }
        }

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Displays the debug page.
     * You should override this method if you need a more sophisticated/fancy display.
     *
     * @param \Exception $e
     * @overrideMe
     * @throws \Exception
     */
    protected function showDebugPage(\Exception $e)
    {
        if (null === $this->container) {
            echo '<h1>An error occurred -- debug mode</h1>';
            echo nl2br((string)$e);
        } else {
            if ($this->container->has("prettyDebugPage")) {
                $this->container->get("prettyDebugPage")->print($e);
            }
        }
    }


    /**
     * Displays the error page when an uncaught exception occurred and the debug mode is false:
     * it should display an internal server error page with code 500.
     *
     * You should override this method if you want a more fancy display.
     *
     * @overrideMe
     */
    protected function showInternalServerErrorPage()
    {
        $response = new HttpResponse("
            <h1>Internal server error</h1>
            <p>The server encountered an internal error misconfiguration and was unable to complete your request.</p>", 500);
        $response->send();
    }
}