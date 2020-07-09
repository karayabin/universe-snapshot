<?php


namespace Ling\Light_ControllerHub\ControllerHubHandler;


use Ling\Bat\FileSystemTool;
use Ling\Light\Helper\ControllerHelper;
use Ling\Light\Helper\LightClassHelper;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;

/**
 * The LightBaseControllerHubHandler class.
 */
abstract class LightBaseControllerHubHandler implements LightControllerHubHandlerInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the LightKitAdminControllerHubHandler instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.
     *
     * The controller dir is the absolute path to the directory where to find the controller (the name of this directory is usually "Controller").
     * The controller identifier is a string representing the controller, it has the following notation:
     *
     * - $controllerPath  (->$method)?
     *
     *
     * For instance:
     *
     * - Generated/TestController
     * - Generated/TestController->render
     * - ControllerABC->myMethod
     *
     * If the method is not specified, the "render" method will be assumed.
     *
     *
     *
     *
     * @param string $controllerDir
     * @param string $controllerIdentifier
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     * @throws \Exception
     */
    protected function doHandle(string $controllerDir, string $controllerIdentifier, HttpRequestInterface $request): HttpResponseInterface
    {
        $p = explode('->', $controllerIdentifier, 2);
        $method = 'render';
        $controllerRelativeClass = array_shift($p);
        if (1 === count($p)) {
            $method = array_shift($p);
        }

        $controllerDir = realpath($controllerDir);
        $controllerFile = $controllerDir . "/" . $controllerRelativeClass . '.php';

        if (true === FileSystemTool::isDirectoryTraversalSafe($controllerFile, $controllerDir)) {


            $class = LightClassHelper::getLightClassNameByFile($controllerFile);
            $controller = $class . '->' . $method;


            $light = $this->container->getLight();
            $r = ControllerHelper::executeController($controller, $light);
            return $r;
        } else {
            throw new LightKitAdminException("Wrong controllerIdentifier $controllerIdentifier.");
        }
    }
}