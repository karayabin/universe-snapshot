<?php


namespace Ling\Light_EasyRoute\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\Events\LightEvent;
use Ling\Light_EasyRoute\Exception\LightEasyRouteException;

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
     * Builds the LightEasyRouteService instance.
     */
    public function __construct()
    {
        $this->bundleFiles = [];
    }



    /**
     * Listener for the @page(Light.initialize_1 event).
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




        foreach ($this->bundleFiles as $path) {
            $absolutePath = $appDir . "/" . $path;
            if (file_exists($absolutePath)) {
                $bundles = BabyYamlUtil::readFile($absolutePath);
                foreach ($bundles as $bundleName => $bundleInfo) {
                    if (array_key_exists("routes", $bundleInfo)) {
                        foreach ($bundleInfo['routes'] as $routeId => $route) {
                            $pattern = $route['pattern'];
                            $controller = $route['controller'];
                            $light->registerRoute($pattern, $controller, $routeId, $route);
                        }
                    }
                }
            } else {
                throw new LightEasyRouteException("File not found: $absolutePath.");
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


}