<?php


namespace Ling\Light_EasyRoute\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_EasyRoute\Exception\LightEasyRouteException;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;

/**
 * The LightEasyRouteService class.
 */
class LightEasyRouteService implements LightInitializerInterface
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
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        $appDir = $light->getApplicationDir();
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