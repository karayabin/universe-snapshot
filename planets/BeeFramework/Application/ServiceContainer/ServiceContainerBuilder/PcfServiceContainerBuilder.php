<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\ServiceContainer\ServiceContainerBuilder;

use BeeFramework\Application\Config\Util\FeeConfig;
use BeeFramework\Application\ServiceContainer\ServiceContainer\ReadableParametersServiceContainer;
use BeeFramework\Application\ServiceContainer\ServiceContainer\ReadableParametersServiceContainerInterface;
use BeeFramework\Application\ServiceContainer\ServiceContainerBuilder\FileAggregator\ServiceContainerBuilderPcfFileAggregator;
use BeeFramework\Application\ServiceContainer\ServicePlainCode\ServicePlainCode;
use BeeFramework\Application\ServiceContainer\Tool\HotServiceContainerTool;
use BeeFramework\Bat\ArrayTool;
use BeeFramework\Bat\BdotTool;
use BeeFramework\Notation\Service\Biscotte\Util\BiscotteParserExpanderUtil;
use BeeFramework\Notation\WrappedString\Tool\CandyResolverTool;


/**
 * PcfServiceContainerBuilder
 * @author Lingtalfi
 * 2015-03-07
 *
 */
class PcfServiceContainerBuilder extends ServiceContainerBuilder
{

    protected $pcfDir;
    /**
     * At the root of this folder, put an extra master if you want
     */
    protected $extraMasterDir;

    /**
     * @var ServiceContainerBuilderPcfFileAggregator
     */
    protected $fileAggregator;


    //
    private $symbol;

    public function __construct(array $params)
    {
        ArrayTool::checkKeys(['pcfDir'], $params);
        $this->pcfDir = $params['pcfDir'];
        $this->extraMasterDir = (array_key_exists('extraMasterDir', $params)) ? $params['extraMasterDir'] : null;
        $this->fileAggregator = new ServiceContainerBuilderPcfFileAggregator();
        $this->symbol = '§';
    }

    /**
     * @return ReadableParametersServiceContainerInterface
     */
    public function build(array $appTags = [])
    {
        $container = $this->doBuild($appTags);
        $this->initPlugins($container);
        return $container;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * It returns an instance of service container,
     * but plugins are not initialized.
     *
     * @return ReadableParametersServiceContainerInterface
     */
    protected function doBuild(array $appTags = [])
    {
        $this->fileAggregator->setTags($appTags);


        /**
         * To save some finder iterations,
         * we will collect all files at once, this is done in the fileAggregator internals,
         * we just need to define the search dirs in the right order.
         */
        $pluginDir = $this->pcfDir . '/plugins'; // using pcf convention
        if (file_exists($pluginDir)) { // implicitly checking that pcfDir exists too

            // collecting all masters (from pcfDir and extraMasterDir if any)
            $masterFiles = $this->getMasterFiles();
            // collecting all plugins files at once
            list($paramsFiles, $hooksFiles, $servicesFiles) = $this->fileAggregator->collectHookAndServices($pluginDir);


            // providing opportunity to child classes to create a cache system
            $this->onPcfFilesCollectedAfter(array_merge($masterFiles, $paramsFiles, $hooksFiles, $servicesFiles));


            // computing the master 
            $master = $this->computeMaster($masterFiles, $paramsFiles);

            // resolving references recursively
            // now remember, master should be readable only: it represents the parameters used to create plugin services
            $this->resolveMaster($master);

            // hooks for children classes
            $this->onMasterReady($master);


            // computing services
            $services = $this->computeServices($servicesFiles);

            // now injecting hooks into services
            $this->injectHooks($services, $hooksFiles);


            // expand services biscotte inline notation
            $this->expandServices($services);

            // now safely resolving references in services
            $this->resolveServices($services, $master);

            // now let's convert services into plain code and inject it in a new service container instance
            return $this->buildContainer($services, $master);
        }
        else {
            throw new \RuntimeException(sprintf(sprintf("pluginDir doesn't exist: %s", $pluginDir)));
        }
    }


    protected function onPcfFilesCollectedAfter(array $pcfFiles)
    {

    }

    protected function onMasterReady(array $master)
    {

    }

    protected function onServiceCodeAttached($address, ServicePlainCode $code)
    {

    }

    protected function initPlugins(ReadableParametersServiceContainer $container)
    {
        $pluginsAbsoluteIds = $container->getParameter('__plugins');
        if (is_array($pluginsAbsoluteIds)) {
            foreach ($pluginsAbsoluteIds as $pluginAbsId) {
                $pluginAddress = str_replace([
                        '.',
                        '/',
                    ], [
                        '\.',
                        '.',
                    ], $pluginAbsId) . '.__init';
                
                
                if (false !== $service = $container->getService($pluginAddress, false)) {
                    if (method_exists($service, 'init')) {
                        call_user_func([$service, 'init'], $container);
                    }
                }
            }
        }
    }


    /**
     * @return ReadableParametersServiceContainer
     */
    protected function buildContainer(array $services, array $master)
    {
        return HotServiceContainerTool::createHotServiceContainer($services, $master, [
            'onServiceCodeAttached' => function ($address, ServicePlainCode $code) {
                $this->onServiceCodeAttached($address, $code);
            },
        ]);
    }

    protected function expandServices(array &$services)
    {
        $o = new BiscotteParserExpanderUtil();
        $o->expand($services);
    }


    protected function resolveServices(array &$services, array $master)
    {
        CandyResolverTool::applyCandy($services, $master, $this->symbol);
    }


    protected function injectHooks(array &$services, $hooksFiles)
    {
        foreach ($hooksFiles as $f) {
            $hooks = $this->readConfigFile($f);

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
        }
    }

    protected function getMasterFiles()
    {
        $masterDirs = [$this->pcfDir];
        if (null !== $this->extraMasterDir) {
            if (file_exists($this->extraMasterDir)) {
                $masterDirs[] = $this->extraMasterDir;
            }
            else {
                throw new \RuntimeException(sprintf("extraMasterDir does not exist: %s", $this->extraMasterDir));
            }
        }
        return $this->fileAggregator->collectMasterParameters($masterDirs);
    }

    protected function computeMaster(array $masterFiles, array $paramsFiles)
    {
        $r = [];
        foreach ($paramsFiles as $f) {
            $r = array_replace_recursive($r, $this->readConfigFile($f));
        }
        foreach ($masterFiles as $f) {
            $r = array_replace_recursive($r, $this->readConfigFile($f));
        }
        return $r;
    }

    protected function computeServices(array $servicesFiles)
    {
        $r = [];
        foreach ($servicesFiles as $f) {
            $r = array_replace_recursive($r, $this->readConfigFile($f));
        }
        return $r;
    }

    protected function readConfigFile($f)
    {
        return FeeConfig::readFile($f);
    }

    protected function resolveMaster(array &$master)
    {
        CandyResolverTool::selfResolve($master, $this->symbol);
    }


}
