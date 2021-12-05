<?php


namespace Ling\Light_EasyRoute\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\Core\Light;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_EasyRoute\Exception\LightEasyRouteException;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_Vars\Service\LightVarsService;

/**
 * The LightEasyRouteService class.
 */
class LightEasyRouteService
{

    /**
     * This property holds the array of bundle file paths for this instance.
     *
     * Each bundle path is relative to the application directory.
     *
     * @var array
     */
    protected $bundleFiles;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * Builds the LightEasyRouteService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->bundleFiles = [];
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
     * Listener for the @page(Ling.Light.initialize_1 event).
     * It will register all the routes from the files registered by other plugins.
     *
     *
     * @param LightEvent $event
     * @throws LightEasyRouteException
     */
    public function initialize(LightEvent $event)
    {
        $light = $event->getLight();
        $appDir = $light->getContainer()->getApplicationDir();


        /**
         * @var $va LightVarsService
         */
        $va = $this->container->get("vars");


        //--------------------------------------------
        // CLOSE REGISTRATION
        //--------------------------------------------
        foreach ($this->bundleFiles as $path) {
            $absolutePath = $appDir . "/" . $path;
            if (file_exists($absolutePath)) {
                $bundles = BabyYamlUtil::readFile($absolutePath);
                foreach ($bundles as $bundleName => $bundle) {
                    $this->registerRouteByBundle($bundleName, $bundle, $light);
                }
            } else {
                throw new LightEasyRouteException("File not found: $absolutePath.");
            }
        }


        //--------------------------------------------
        // OPEN REGISTRATION
        //--------------------------------------------
        $masterPath = LightEasyRouteHelper::getMasterPath($appDir);
        if (true === file_exists($masterPath)) {
            $arr = BabyYamlUtil::readFile($masterPath);
            usort($arr, function ($arr1, $arr2) {
                $arr1['priority'] = $arr1['priority'] ?? 10;
                $arr2['priority'] = $arr2['priority'] ?? 10;
                return (int)($arr1["priority"] > $arr2['priority']);
            });
            foreach ($arr as $bundleName => $bundle) {

                if (array_key_exists("prefix", $bundle)) {
                    if (null !== $bundle['prefix']) {
                        $bundle['prefix'] = $va->resolveContainerNotation($bundle['prefix']);
                    }
                }
                $this->registerRouteByBundle($bundleName, $bundle, $light);
            }
        }


    }


    /**
     * Adds a bundle file.
     *
     * @param string $bundleFile
     */
    public function registerBundleFile(string $bundleFile)
    {
        $this->bundleFiles[] = $bundleFile;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Register the routes from the given bundle to the light instance.
     *
     * @param string $bundleName
     * @param array $bundle
     * @param Light $light
     */
    private function registerRouteByBundle(string $bundleName, array $bundle, Light $light)
    {

        $prefix = $bundle['prefix'] ?? null;
        $routes = $bundle['routes'];
        foreach ($routes as $routeId => $route) {

            $pattern = $route['pattern'];
            $controller = $route['controller'];

            if (null !== $prefix) {
                $pattern = $prefix . $pattern;
            }

            if ("/" !== $pattern) {
                $pattern = rtrim($pattern, "/");
            }
            $light->registerRoute($pattern, $controller, $routeId, $route);
        }
    }

}