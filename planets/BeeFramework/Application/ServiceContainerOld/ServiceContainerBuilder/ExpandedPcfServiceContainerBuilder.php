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

use BeeFramework\Application\ServiceContainer\ServiceContainer\TransparentServiceContainerInterface;
use BeeFramework\Application\ServiceContainer\ServiceContainerBuilder\FileTemplate\ExpandedReadableParametersServiceContainerFileTemplate;
use BeeFramework\Application\ServiceContainer\ServicePlainCode\ServicePlainCode;
use BeeFramework\Bat\ArrayTool;
use BeeFramework\Component\Cache\CacheMaster\CacheMasterHandler\ByFileMtimeCacheMasterHandler;
use BeeFramework\Component\Cache\CacheMaster\CacheMasterHandler\CacheMasterHandlerInterface;
use BeeFramework\Component\Log\SuperLogger\Traits\SuperLoggerTrait;
use BeeFramework\Exception\FileSystemException;


/**
 * ExpandedPcfServiceContainerBuilder
 * @author Lingtalfi
 * 2015-03-08
 *
 */
class ExpandedPcfServiceContainerBuilder extends PcfServiceContainerBuilder
{

    use SuperLoggerTrait;


    /**
     * @var CacheMasterHandlerInterface
     */
    protected $cacheHandler;
    protected $pcfFiles;
    //
    private $master;
    private $services;
    private $cacheDir;

    public function __construct(array $params)
    {
        ArrayTool::checkKeysAndTypes(['cacheDir' => 's'], $params);
        parent::__construct($params);
        $this->cacheHandler = new ByFileMtimeCacheMasterHandler([
            'storeDir' => $params['cacheDir'],
        ]);
        $this->pcfFiles = [];
        $this->cacheDir = $params['cacheDir'];
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function doBuild(array $appTags = [])
    {
        sort($appTags);
        $cacheName = implode('-', $appTags);
        $className = $this->getClassName($appTags);

        /**
         * In this strategy, we store the container in a file,
         * and we store the path to that file in the cache.
         *
         * If, for any reason, the filePath points to a non existing file
         * when we ask for it (shouldn't happen),
         * we remove the cache data and recreate the container live.
         *
         * We do so because we think that the container is a very important
         * piece of software.
         *
         *
         */
        $cacheUsed = false;
        if (false !== $data = $this->cacheHandler->getData($cacheName)) {
            if (file_exists($data)) {
                require_once $data;
                $data = new $className();
                $cacheUsed = true;
            }
            else {
                $this->cacheHandler->removeData($cacheName);
                $this->slog("unexpectedCacheFileNotFound", sprintf("Unexpected error for data %s: file not found: %s", $cacheName, $data));
            }
        }
        if (false === $cacheUsed) {
            $data = parent::doBuild($appTags); // will call onPcfFilesCollectedAfter and buildContainer

            ksort($this->services);
            $tpl = new ExpandedReadableParametersServiceContainerFileTemplate(
                $this->master,
                $this->services
            );
            $classCode = $tpl->getContent([
                'class' => $className,
            ]);
            /**
             * Since we share the cacheMaster main dir,
             * we try to use a "hard to find" file name to not conflict with cache master objects.
             */
            $file = $this->cacheDir . '/' . $className . '.class.php';
            if (false !== file_put_contents($file, $classCode)) {
                $this->cacheHandler->store($cacheName, $file, [
                    'files' => $this->pcfFiles,
                ]);
            }
            else {
                throw new FileSystemException(sprintf("Cannot write to file: %s", $file));
            }
        }
        return $data;
    }


    protected function onMasterReady(array $master)
    {
        $this->master = $master;
    }

    protected function onServiceCodeAttached($address, ServicePlainCode $code)
    {
        $this->services[$address] = $code;
    }

    protected function onPcfFilesCollectedAfter(array $pcfFiles)
    {
        $this->pcfFiles = $pcfFiles;
    }

    protected function getClassName(array $sortedAppTags)
    {
        $s = 'Auto';
        foreach ($sortedAppTags as $tag) {
            $s .= ucfirst(strtolower($tag));
        }
        return $s . 'ExpandedReadableParametersServiceContainer';
    }
}
