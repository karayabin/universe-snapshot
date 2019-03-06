<?php

namespace Ling\Octopus\ServiceContainer;


use Ling\Octopus\Exception\OctopusServiceErrorException;
use Ling\SicTools\HotServiceResolver;
use Ling\SicTools\SicTool;

/**
 * The RedOctopusServiceContainer class is a hot service container based on the sic notation.
 *
 * @see https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/NotationFan/sic.md
 *
 *
 * Hot means that the sic notation is resolved on the fly when the service is actually called for the first time.
 *
 */
class RedOctopusServiceContainer extends HotServiceResolver implements OctopusServiceContainerInterface
{

    /**
     * This property holds all the sic blocks.
     * It's an array of service name => sic block.
     *
     * @var array
     */
    private $sicBlocks;

    /**
     * This property holds the cached instances (services).
     * So that services are instantiated only once (which is good for performances).
     *
     * It's an array of service name => instance
     *
     * @var array
     */
    private $cachedInstances;


    /**
     * Builds the red octopus instance.
     */
    public function __construct()
    {
        $this->sicBlocks = [];
        $this->cachedInstances = [];
    }

    /**
     * Registers the services (attaches the service name to a corresponding sic block)
     * found in the given (sic) config.
     *
     *
     * Note: services passed as arguments of other services (aka nested services)
     * are not registered, only the main services are registered.
     *
     *
     * See sic notation for more details about nested services.
     * @link https://github.com/lingtalfi/SicTools/blob/master/doc/HotServiceResolver.md#example-7-recursion-using-a-service-in-a-service
     *
     *
     *
     * @param array $config
     */
    public function build(array $config)
    {
        $breadcrumb = [];
        $this->registerServices($config, $breadcrumb);
    }

    /**
     * Returns the service (class instance) which name is given.
     * Note: the service will be instantiated once only, any subsequent call
     * to this method with the same service name will returned a cached instance.
     *
     * The service names is composed of all the parent keys (in case the service is nested
     * in the array), followed by the service key, all separated with dots.
     *
     * For instance, the following array:
     *
     * [
     *     "my_company" => [
     *          "service1" => [
     *              "instance" => "Animal",
     *          ],
     *      ],
     * ]
     *
     * will register a service with the name my_company.service1.
     *
     *
     *
     *
     *
     * @implementation
     */
    public function get($service)
    {

        // cache available?
        if (array_key_exists($service, $this->cachedInstances)) {
            return $this->cachedInstances[$service];
        }


        // instantiate on the fly, and cache for the next time
        if (array_key_exists($service, $this->sicBlocks)) {
            try {
                $instance = $this->getService($this->sicBlocks[$service]);
                $this->cachedInstances[$service] = $instance;
                return $instance;
            } catch (\Exception $e) {
                throw new OctopusServiceErrorException($e->getMessage(), 0, $e);
            }
        } else {
            throw new OctopusServiceErrorException("Service not found: $service");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function resolveCustomNotation($value, &$isCustomNotation = false)
    {
        if (is_string($value)) { // value could be anything
            if (
                0 === strpos($value, '@s')
                && preg_match('!@service\(([a-zA-Z._0-9]*)\)!', $value, $match)
            ) {
                $isCustomNotation = true;
                $service = $match[1];
                return $this->get($service);
            }
        }
        return null;
    }


    /**
     * Parses the given $conf array and registers the services.
     * This is the working arm of the get method.
     *
     * @seeMethod get
     *
     *
     * @param array $conf
     * @param array $breadcrumb
     */
    protected function registerServices(array $conf, array &$breadcrumb)
    {
        foreach ($conf as $k => $v) {
            if (true === SicTool::isSicBlock($v)) {

                // registering service
                $serviceName = $this->getServiceName($k, $breadcrumb);
                $this->sicBlocks[$serviceName] = $v;

            } else {
                if (is_array($v)) {
                    $breadcrumb[] = $k;
                    $this->registerServices($v, $breadcrumb);
                    array_pop($breadcrumb);
                }
            }
        }
    }


    /**
     * Returns the service name based on its position in the configuration array.
     *
     *
     * @param $key
     * @param array $breadcrumb
     * @return string
     */
    protected function getServiceName($key, array $breadcrumb)
    {
        if ($breadcrumb) {
            return implode('.', $breadcrumb) . "." . $key;
        }
        return $key;
    }

}