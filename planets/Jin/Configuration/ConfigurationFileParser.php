<?php


namespace Jin\Configuration;


use BabyYaml\BabyYamlUtil;
use Bat\ArrayTool;
use Bat\FileSystemTool;
use Jin\Registry\Access;

/**
 * @info The ConfigurationFileParser class is a utility class providing tools to parse and interpret configuration
 * files in a jin application.
 *
 */
class ConfigurationFileParser
{
    /**
     * @info This property holds the profile of the application (dev, prod, ...)
     * The default value is prod.
     */
    private $profile;


    /**
     * @info Constructs the ConfigurationFileParser instance with a default profile value.
     */
    public function __construct()
    {
        $this->profile = "prod";
    }


    /**
     * @info Sets the application profile.
     * @param $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }


    /**
     * @info Parses and resolves the configuration file (which path is given) according to the mechanism explained below.
     *
     * This method does actually the following things:
     *
     * - parsing the given configuration file according to the given profile (see parseFileRaw method)
     * - resolving the values using the Conf object under the hood.
     *          Note that if the Conf object is not ready, results might be unpredictable.
     * - optional: resolving the service instantiation code
     *
     *
     *
     * Note: if you want to parse the file without resolving its variable, use the parseFileRaw method instead.
     *
     *
     * @param $filePath
     * @param bool $interpretServiceInstantiationCode =true
     * @seeMethod parseFileRaw
     * @return array
     */
    public function parseFile($filePath, bool $interpretServiceInstantiationCode = true)
    {
        $conf = $this->parseFileRaw($filePath);
        $this->resolve($conf); // resolving calls to configuration variables


        // resolving sic? (service instantiation code)
        if (true === $interpretServiceInstantiationCode) {
            $this->resolveServiceInstantiationCode($conf);
        }


        return $conf;
    }


    /**
     * @info Resolve the given array using the Conf instance.
     * Warning: this method only works properly if the Conf instance is configured.
     *
     * Normally this happen in the middle of the Jin\ApplicationEnvironment\ApplicationEnvironment::boot method.
     * In other words if you haven't called the boot method yet and done nothing special, this method WILL NOT WORK
     * properly.
     *
     *
     * @param array $array
     */
    private function resolve(array & $array)
    {
        array_walk_recursive($array, function (&$v) {
            $v = preg_replace_callback('!\$\{([^}]*)\}!', function ($val) use ($v) {
                $key = $val[1];
                return Access::conf()->get($key, $key);
            }, $v);
        });
    }


    /**
     * @info Resolve the service instantiation code found in the given array.
     *
     * @param array $array
     */
    private function resolveServiceInstantiationCode(array & $array)
    {
        foreach ($array as $k => $v) {
            if (is_string($v) && "instance" === $k) {
                $o = new $v();
                if (array_key_exists("methods", $array)) {
                    $methods = $array['methods'];
                    foreach ($methods as $methodName => $args) {
                        call_user_func_array([$o, $methodName], $args);
                    }
                }

                // do we return a callable?
                if (array_key_exists("callable_method", $array)) {
                    // replacing the value of the "instance" key with the callable
                    $callableMethod = $array['callable_method'];
                    $array[$k] = [$o, $callableMethod];

                } else {
                    // replacing the value of the "instance" key with the actual (configured) instance
                    $array[$k] = $o;
                }

            } elseif (is_array($v)) {
                $this->resolveServiceInstantiationCode($array[$k]);
            }
        }
    }


    /**
     * @info Parses and the configuration file (which path is given) according to the mechanism explained below
     * and return the resulting configuration.
     * This method does not resolve configuration variable.
     * See parseFile method for resolving configuration variable.
     *
     *
     *
     * Parsing the configuration file
     * ----------------------------
     * About parsing a babyyaml (.yml) configuration file.
     *
     * In a jin app, a configuration file is always dependent on the application profile (dev, prod, ...).
     *
     * When you parse a configuration file, you also need to parse its profile variation if it exist.
     * The naming convention of the profile variation is the following:
     *
     * - $file-$profile.yml
     *
     * So for instance if you want to parse the logger.yml file, and your application profile is dev, then
     * you actually need to parse two files:
     *
     * - logger.yml
     * - logger-dev.yml
     *
     * Note that both files might not exist, which would result in an empty configuration (empty array).
     *
     * So this method handles this mechanism for you.
     *
     *
     *
     *
     *
     *
     *
     * @param $filePath
     * @seeMethod parseFile
     * @return array
     */
    public function parseFileRaw($filePath)
    {
        $conf = [];

        $dir = dirname($filePath);
        $fileName = FileSystemTool::getFileName($filePath);
        $profilePath = $dir . "/$fileName-" . $this->profile . ".yml";


        if (file_exists($filePath)) {
            $conf = BabyYamlUtil::readFile($filePath);
        }

        if (file_exists($profilePath)) {
            $conf2 = BabyYamlUtil::readFile($profilePath);
            $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $conf2]);
        }

        return $conf;
    }

}