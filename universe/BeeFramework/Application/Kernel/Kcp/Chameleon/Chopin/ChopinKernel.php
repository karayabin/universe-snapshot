<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Kernel\Kcp\Chameleon\Chopin;

use BeeFramework\Application\Kernel\Kcp\Chameleon\ChameleonKernel;
use BeeFramework\Application\Kernel\Kcp\Chameleon\Chopin\Tool\ChopinPcfFinderTool;
use BeeFramework\Application\ServiceContainer\ServicePlainCode\ServicePlainCode;
use BeeFramework\Component\Cache\CacheMaster\CacheMaster;
use BeeFramework\Component\Cache\CacheMaster\CacheMasterInterface;
use BeeFramework\Component\Cache\CacheMaster\FileSystemCacheMaster;
use BeeFramework\Notation\PhpArray\ArrayWithSelfReferences\ArrayWithSelfReferences;
use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;
use BeeFramework\Bat\BdotTool;
use BeeFramework\Notation\Service\Biscotte\BiscotteParser;


/**
 * ChopinKernel
 * @author Lingtalfi
 * 2014-08-22
 *
 */
class ChopinKernel extends ChameleonKernel implements ChopinKernelInterface
{
    protected $configDir;
    protected $fnTagsMatchTagSoup;
    protected $container;
    protected $options;
    protected $booted;
    protected $applicationRoot;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            /**
             * The dir where the cached container will be stored.
             * If you don't want to use a cached container, then let this to null.
             *
             * The caching method will try to create a container each time the cache is invalid.
             * The cache is considered invalid when at least one of the config file used to create it was
             * modified (based on mtime comparison).
             *
             * The problem with this approach is that it relies only on existing config files, not on newly created ones.
             * As the app maintainer can add other (contextual) config files, she will have to remove the cache manually,
             * either by deleting the cached container, or by deleting the cached data.
             *
             *
             */
            'containerDir' => null,
            /**
             * The cache is used to store the mtime of the cached container.
             * It is only effective if options.containerDir is used.
             *
             * string|CacheMasterInterface|null
             *      - string: path of the storeDir (a CacheMasterInterface instance
             *                      will be created internally)
             *      - null: a cache master will be created, with a storeDir located at the current directory (.)
             */
            'cache' => null,
            /**
             * The idea here is that we can plug an external container,
             * and it will be built for us.
             */
            'container' => null,
            /**
             * This is application root dir.
             * Lot of services will need to know the application structure, which is based on the applicationRoot dir.
             * By passing it once at the kernel level, we can then spread that information for all services, in a portable manner.
             * This is not mandatory for every kernel, but might be required by plugins that use services based on psn for instance.
             */
            'applicationRoot' => null,
            /**
             * - bool callable (fileTags, tagSoup)
             *          Returns whether or not the current file should match, according to the tagSoup.
             *
             */
            'fnTagsMatchTagSoup' => null,
            /**
             * In some environments it is possible to share the same config directory amongst many applications.
             * This is originally a dev feature but it could be used as a prod mechanism too.
             * When using this technique however, we need an extra param dir to override specific parameters.
             * The extraParamDir parameter, when not null, indicates the path to that special directory.
             */
            'extraParamDir' => null,
        ], $options);
        parent::__construct($options);
        $this->booted = false;
    }


    public static function create(array $options = [])
    {
        return new static($options);
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS KernelInterface
    //------------------------------------------------------------------------------/
    public function boot()
    {
        // building the container
        if (false === $this->booted) {

            // check cache...
            $loadedFromCache = false;
            $containerClassName = null;
            $createCache = false;
            $cache = $this->options['cache'];
            $cacheMTimes = [];

            // do we want to cache? (if cFile is false, the answer is no)
            if (false !== $cFile = $this->getCachedContainerFile()) {
                $createCache = true;
                $containerClassName = $this->getCachedContainerClassName();

                // is the cached container there ?
                if (is_file($cFile)) {
                    // is it still valid

                    if (is_string($cache)) {
                        $cache = FileSystemCacheMaster::create()->setRootDir($cache);
                    }
                    elseif (!$cache instanceof CacheMasterInterface) {
                        $cache = FileSystemCacheMaster::create()->setRootDir('.');
                    }
                    if (false !== $files2Mtimes = $cache->retrieve('ChopinKernel')) {
                        $isValid = true;
                        // test cache validity
                        if ($files2Mtimes) {
                            foreach ($files2Mtimes as $file => $mtime) {
                                if (is_file($file)) {
                                    if (false !== $m = filemtime($file)) {
                                        if ($m !== $mtime) {
                                            $isValid = false;
                                            break;
                                        }
                                    }
                                    else {
                                        $isValid = false;
                                        break;
                                    }
                                }
                                else {
                                    $isValid = false;
                                    break;
                                }
                            }
                        }
                        else {
                            // cache is not valid if there is no config file
                            $isValid = false;
                        }
                        if (true === $isValid) {
                            require_once $cFile;
                            $this->container = new $containerClassName();
                            $loadedFromCache = true;
                        }
                    }
                }
            }


            if (false === $loadedFromCache) {

                $fnTagsMatchTagSoup = (null !== $this->fnTagsMatchTagSoup) ? $this->fnTagsMatchTagSoup : $this->getDefaultTagsMatchTagSoup();
                if (is_callable($fnTagsMatchTagSoup)) {


                    // no cache: build the container
                    $container = ($this->container instanceof ContainerInterface) ? $this->container : $this->getDefaultContainer();

                    if ($container instanceof PlainCodeContainerInterface) {


                        // create parameters
                        $params = [];

                        if (file_exists($this->configDir)) {


                            $pluginConfDir = $this->configDir . '/plugins';


                            // At first, parse parameters files in $config/plugins
                            // parseByType
                            if (file_exists($pluginConfDir)) {
                                $files = ChopinPcfFinderTool::findFiles('parameters', $pluginConfDir, $this->getTagSoup(), $fnTagsMatchTagSoup);
                                foreach ($files as $f) {
                                    $params = array_replace_recursive($params, $this->parseConfigFile($f));
                                    $this->collectMTime($f, $cacheMTimes);
                                }
                            }
                            // At last (have precedence over the plugin params), parse parameters files at $config root
                            $files = ChopinPcfFinderTool::findFiles('parameters', $this->configDir, $this->getTagSoup(), $fnTagsMatchTagSoup, ['depth' => 0]);
                            foreach ($files as $f) {
                                $params = array_replace_recursive($params, $this->parseConfigFile($f));
                                $this->collectMTime($f, $cacheMTimes);
                            }


                            // extra param dir
                            if (null !== $this->options['extraParamDir'] && file_exists($this->options['extraParamDir'])) {
                                $files = ChopinPcfFinderTool::findFiles('parameters', $this->options['extraParamDir'], $this->getTagSoup(), $fnTagsMatchTagSoup, ['depth' => 0]);
                                foreach ($files as $f) {
                                    $params = array_replace_recursive($params, $this->parseConfigFile($f));
                                    $this->collectMTime($f, $cacheMTimes);
                                }
                            }


                            // resolve self references
                            $awsr = ArrayWithSelfReferences::create();
                            $params = $awsr->resolve($params);

                            // injecting parameters
                            $container->setParameters($params);


                            // creating services from plugins
                            $services = [];
                            $pluginsRelPath = $container->getParameter('__plugins', []);
                            $pluginDirs = [];
                            foreach ($pluginsRelPath as $pluginRelPath) {
                                $pluginDirs[] = $pluginConfDir . '/' . $pluginRelPath;
                            }

                            if ($pluginDirs && file_exists($pluginConfDir)) {
                                $files = ChopinPcfFinderTool::findFiles('services', $pluginDirs, $this->getTagSoup(), $fnTagsMatchTagSoup);
                                foreach ($files as $f) {
                                    $services = array_replace_recursive($services, $this->parseConfigFile($f));
                                    $this->collectMTime($f, $cacheMTimes);
                                }


                                // finding hooks and injecting them in services
                                $files = ChopinPcfFinderTool::findFiles('hooks', $pluginDirs, $this->getTagSoup(), $fnTagsMatchTagSoup);
                                foreach ($files as $f) {
                                    $hooks = $this->parseConfigFile($f);

                                    // merge section
                                    if (array_key_exists('merge', $hooks) && is_array($hooks['merge'])) {
                                        foreach ($hooks['merge'] as $key => $value) {
                                            if (!is_array($value)) {
                                                $value = [$value];
                                            }
                                            // what to do if a service is not found? Here we throw an exception.
                                            if (null !== $v = BdotTool::getDotValue($key, $services, null)) {
                                                if (is_array($v)) {
                                                    BdotTool::setDotValue($key, array_merge_recursive($v, $value), $services);
                                                }
                                                else {
                                                    throw new \RuntimeException(sprintf("File '%s', in merge section, the target of key %s must be an array", $f,
                                                        $key));
                                                }
                                            }
                                            else {
                                                throw new \RuntimeException(sprintf("File '%s', in merge section: the key %s was not found in services", $f, $key));
                                            }

                                        }
                                    }

                                    // replace section
                                    if (array_key_exists('replace', $hooks) && is_array($hooks['replace'])) {
                                        foreach ($hooks['replace'] as $key => $value) {
                                            // what to do if a service is not found? Here we throw an exception.
                                            if (true === BdotTool::hasDotValue($key, $services)) {
                                                BdotTool::setDotValue($key, $value, $services);
                                            }
                                            else {
                                                throw new \RuntimeException(sprintf("File '%s', in replace section: the key %s was not found in services", $f, $key));
                                            }
                                        }
                                    }

                                    $this->collectMTime($f, $cacheMTimes);
                                }
                            }


                            if ($services) {
                                // resolving parameters in services
                                $awsr->apply($params, $services);

                                // injecting resolved services in container
                                $biscotte = new BiscotteParser();
                                BdotTool::walk($services, function (&$v, $k, $p) use ($biscotte, $container) {
                                    if (false !== $code = $biscotte->parseValue($v, $p)) {
                                        $container->setServiceByCode($p, new ServicePlainCode($code));
                                    }
                                });
                            }
                        }

                    }
                    else {
                        throw new \RuntimeException("container must be of type PlainCodeContainerInterface");
                    }

                    $this->container = $container;


                    // do we want to cache the container?
                    if (true === $createCache && $cache instanceof CacheMasterInterface) {
                        ExpanderTool::expand($container, [
                            'dst' => $cFile,
                            'author' => 'ChopinKernel',
                            'className' => $containerClassName,
                        ]);
                        $cache->store('ChopinKernel', $cacheMTimes);
                    }


                }
                else {
                    throw new \InvalidArgumentException("filterRules must be a callable");
                }
            }
            else {
                // from cache ;)
            }


            //------------------------------------------------------------------------------/
            // PLUGIN INIT
            //------------------------------------------------------------------------------/
            $pluginsAbsoluteIds = $this->container->getParameter('__plugins', []);
            foreach ($pluginsAbsoluteIds as $pluginAbsId) {
                $pluginAddress = str_replace([
                        '.',
                        '/',
                    ], [
                        '\.',
                        '.',
                    ], $pluginAbsId) . '.__init';
                if (null !== $service = $this->container->getService($pluginAddress, false, 2)) {
                    if (method_exists($service, 'init')) {
                        call_user_func([$service, 'init'], $this);
                    }
                }
            }


            $this->booted = true;
        }
    }


//------------------------------------------------------------------------------/
// IMPLEMENTS KcpKernelInterface
//------------------------------------------------------------------------------/
    /**
     * @return PlainCodeContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }


    /**
     *
     * You probably don't want to use this method.
     * To plug in a container, use the container option.
     *
     * This method is used to plug a fully functional already resolved container.
     * If you use it, the kernel will skip the boot process.
     */
    public function setContainer(ContainerInterface $container)
    {
        if ($container instanceof PlainCodeContainerInterface) {
            $this->container = $container;
            $this->booted = true;
        }
        else {
            throw new \InvalidArgumentException("container must be an instance of PlainCodeContainerInterface");
        }
    }


//------------------------------------------------------------------------------/
// IMPLEMENTS ChopinKernelInterface
//------------------------------------------------------------------------------/
    /**
     * @return ChopinKernelInterface
     */
    public function setConfigDir($dir)
    {
        $this->configDir = $dir;
        return $this;
    }

    public function getConfigDir()
    {
        return $this->configDir;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function collectMTime($file, array &$mTimes)
    {
        if (false !== $m = filemtime($file)) {
            $mTimes[$file] = $m;
        }
    }

    private function getCachedContainerFile()
    {
        if (is_string($this->options['containerDir'])) {
            $ret = $this->options['containerDir'] . '/' . 'chopin-cached-container-' . implode('-', $this->getTagSoup()) . '.php';
        }
        else {
            $ret = false;
        }
        return $ret;
    }

    private function getCachedContainerClassName()
    {
        $ret = 'ChopinKernelCachedContainer';
        foreach ($this->getTagSoup() as $tag) {
            $ret .= ucfirst(strtolower($tag));
        }
        return $ret;
    }


    private function getDefaultTagsMatchTagSoup()
    {
        return function ($fileTags, array $tagSoup) {
            $ret = false;
            if (
                !in_array('dev', $fileTags) &&
                !in_array('prod', $fileTags) &&
                !in_array('cli', $fileTags)
            ) {
                $ret = true;
            }
            else {

                if (in_array('cli', $fileTags)) {
                    if (in_array('cli', $tagSoup)) {
                        $ret = true;
                    }
                }
                if (
                    (in_array('dev', $fileTags) && !in_array('dev', $tagSoup)) ||
                    (in_array('prod', $fileTags) && !in_array('prod', $tagSoup))
                ) {
                    $ret = false;
                }
            }
            return $ret;
        };
    }

    private function getDefaultContainer()
    {
        return new Container();
    }

    private function parseConfigFile($file)
    {
        // might have some other interpreters here...
        return BabyYamlTool::parseFile($file);
    }
}
