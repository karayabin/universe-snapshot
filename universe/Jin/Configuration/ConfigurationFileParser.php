<?php


namespace Jin\Configuration;


use ArrayRefResolver\ArrayRefResolverInterface;
use ArrayRefResolver\ArrayTagResolver;
use BabyYaml\BabyYamlUtil;
use Bat\ArrayTool;
use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
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
     * This property holds the array ref resolver instance used to resolve tags in the configuration
     * arrays.
     *
     * @var ArrayRefResolverInterface
     */
    private $resolver;

    /**
     * @info Constructs the ConfigurationFileParser instance with a default profile value.
     */
    public function __construct()
    {
        $this->profile = "prod";
        $this->resolver = null;
    }


    /**
     * @info Sets the application profile.
     * @param $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }


    public function setResolver(ArrayRefResolverInterface $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * @return ArrayRefResolverInterface|ArrayTagResolver|null
     */
    public function getResolver()
    {
        if (null === $this->resolver) {
            $this->resolver = new ArrayTagResolver();
        }
        return $this->resolver;
    }


    public function parseDir($dirPath, array $options = [])
    {

        $parseFileWithSameName = $options['parseFileWithSameName'] ?? true;
        $resolve = $options['resolve'] ?? true;

        $conf = [];
        if (true === $parseFileWithSameName) {
            /**
             * This file with the same name as the dir is the configuration
             * file reserved for the jin app maintainer.
             */
            $fileName = $dirPath . ".byml";
            if (file_exists($fileName)) {
                $conf = $this->parseFileRaw($fileName);
            }
        }
        if (is_dir($dirPath)) {
            $files = YorgDirScannerTool::getFilesWithExtension($dirPath, "byml", false, true, true);


            //--------------------------------------------
            // NOW MERGE ALL FILES
            //--------------------------------------------
            foreach ($files as $file) {
                /**
                 * Ignoring variations here, because the parseFileRaw method will get them.
                 */
                if (false === strpos($file, '-')) {
                    $realFile = $dirPath . "/" . $file;
                    $pluginConf = $this->parseFileRaw($realFile);
                    $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $pluginConf]);
                }
            }
        }


        if (true === $resolve) {
            $this->getResolver()->resolve($conf, [
                /**
                 * Note: in a jin app so far, recursion is only needed for the (config) variables the very first time,
                 * and this is handled manually in the Jin\ApplicationEnvironment\ApplicationEnvironment::bootVariables method.
                 *
                 * Once the variables are (recursively) resolved, they are available via the Access::conf service, and so
                 * any subsequent byml file that we parse can just inject those parsed/resolved variables into the
                 * configuration to parse, we don't need to recursively solve the variables anymore.
                 */
                "recursion" => false,
            ]);
        }

        return $conf;
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
//    public function parseFile($filePath, bool $interpretServiceInstantiationCode = true)
//    {
//        $conf = $this->parseFileRaw($filePath);
//        $this->resolve($conf); // resolving calls to configuration variables
//
//        // resolving sic? (service instantiation code)
//        if (true === $interpretServiceInstantiationCode) {
//            $this->resolveServiceInstantiationCode($conf);
//        }
//
//
//        return $conf;
//    }

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
        $profilePath = $dir . "/$fileName-" . $this->profile . ".byml";


        if (file_exists($filePath)) {
            $conf = BabyYamlUtil::readFile($filePath);
        }

        if (file_exists($profilePath)) {
            $conf2 = BabyYamlUtil::readFile($profilePath);
            $conf = ArrayTool::arrayMergeReplaceRecursive([$conf, $conf2]);
        }


        return $conf;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
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
     * @deprecated
     */
//    private function resolve(array & $array)
//    {
//        array_walk_recursive($array, function (&$v) {
//            $replaceStringInline = false;
//            $ret = preg_replace_callback('!\$\{([^}]*)\}!', function ($val) use (&$v, &$replaceStringInline) {
//                $key = $val[1];
//
//                // if the tag spans the whole value, replacing and converting to the right type
//                // so that we pass booleans, objects, ...
//                if ('${' . $key . '}' === $v) {
//                    $v = Access::conf()->get($key, $key);
//                } else {
//                    // using the preg_replace function to replace the tag inline
//                    $replaceStringInline = true;
//                    return Access::conf()->get($key, $key);
//                }
//
//            }, $v);
//
//            if ($replaceStringInline) {
//                $v = $ret;
//            }
//        });
//    }


}