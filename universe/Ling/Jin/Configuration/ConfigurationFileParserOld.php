<?php


namespace Ling\Jin\Configuration;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Jin\Registry\Access;

/**
 * @info The ConfigurationFileParser class is a utility class providing tools to parse and interpret configuration
 * files in a jin application.
 *
 */
class ConfigurationFileParserOld
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
     * @info Parses and resolves the configuration file $filePath, plus all configuration files in $dirPath.
     *
     * First, $filePath is parsed, with (Conf) variables resolved (and optionally service instantiation code interpreted).
     * This yields a base configuration array.
     * Then all files in the directory (recursively) are parsed using the same technique, and are merged with the base
     * configuration array.
     *
     * This method is designed mainly for components who allow plugins to participate to their configuration.
     * For instance, the RoutineRouter component (Jin\Component\Routing\Router\RoutineRouter) use the following structure:
     *
     * - config/
     * ----- routes.yml                 // the base configuration file
     * ----- routes/                    // contains plugins configuration files
     * --------- $plugin_id.yml         // example plugin configuration file
     *
     * You can get the whole merged configuration array using this method, like this:
     *
     * $conf = $confFileParser->parseFileWithDir( /my_app/config/routes.yml, /my_app/config/routes, true );
     *
     *
     *
     * Note: the plugin files are sharing the same array, namespaces if required, must be done at the plugin level.
     *
     *
     * @param $filePath
     * @param $dirPath
     * @param bool $interpretServiceInstantiationCode
     * @return array
     */
//    public function parseFileWithDir($filePath, $dirPath, bool $interpretServiceInstantiationCode = true)
//    {
//        // first creating a big unresolved array
//        $conf = $this->parseFileRaw($filePath);
//
//        if (is_dir($dirPath)) {
//            $files = YorgDirScannerTool::getFilesWithExtension($dirPath, "yml", false, true, false);
//            foreach ($files as $file) {
//                $pluginConf = $this->parseFileRaw($file);
//                $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $pluginConf]);
//            }
//        }
//
//
//        // then resolve all at once
//        $this->resolve($conf); // resolving calls to configuration variables
//
//        // resolving sic? (service instantiation code)
//        if (true === $interpretServiceInstantiationCode) {
//            $this->resolveServiceInstantiationCode($conf);
//        }
//
//        return $conf;
//    }
//

    public function parseDir($dir, $dirPath, array $options = [])
    {

        $parseFileWithSameName = $options['parseFileWithSameName'] ?? true;


        $conf = [];

        if (true === $parseFileWithSameName) {
            $fileName = $dir . ".yml";
            if (file_exists($fileName)) {
                $conf = $this->parseFileRaw($fileName);
            }
        }


        if (is_dir($dirPath)) {
            $files = YorgDirScannerTool::getFilesWithExtension($dirPath, "yml", false, true, false);
            foreach ($files as $file) {
                $pluginConf = $this->parseFileRaw($file);
                $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $pluginConf]);
            }
        }


        // then resolve all at once
        $this->resolve($conf); // resolving calls to configuration variables

        // resolving sic? (service instantiation code)
        if (true === $interpretServiceInstantiationCode) {
            $this->resolveServiceInstantiationCode($conf);
        }

        return $conf;
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
        $fileName = FileSystemTool::getBasename($filePath);
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
            $replaceStringInline = false;
            $ret = preg_replace_callback('!\$\{([^}]*)\}!', function ($val) use (&$v, &$replaceStringInline) {
                $key = $val[1];

                // if the tag spans the whole value, replacing and converting to the right type
                // so that we pass booleans, objects, ...
                if ('${' . $key . '}' === $v) {
                    $v = Access::conf()->get($key, $key);
                } else {
                    // using the preg_replace function to replace the tag inline
                    $replaceStringInline = true;
                    return Access::conf()->get($key, $key);
                }

            }, $v);

            if ($replaceStringInline) {
                $v = $ret;
            }
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
                    if (is_array($methods)) {
                        foreach ($methods as $methodName => $args) {
                            call_user_func_array([$o, $methodName], $args);
                        }
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

}