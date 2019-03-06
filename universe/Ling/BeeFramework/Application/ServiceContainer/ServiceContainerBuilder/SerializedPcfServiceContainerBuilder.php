<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Application\ServiceContainer\ServiceContainerBuilder;

use Ling\BeeFramework\Bat\ArrayTool;
use Ling\BeeFramework\Component\Cache\CacheMaster\CacheDisciple\ByFileMtimeCacheDisciple;
use Ling\BeeFramework\Component\Cache\CacheMaster\CacheDisciple\CacheDiscipleInterface;
use Ling\BeeFramework\Component\Cache\CacheMaster\FileSystemCacheMaster;


/**
 * SerializedPcfServiceContainerBuilder
 * @author Lingtalfi
 * 2015-03-08
 *
 */
class SerializedPcfServiceContainerBuilder extends PcfServiceContainerBuilder
{

    /**
     * @var CacheDiscipleInterface
     */
    protected $cacheDisciple;
    protected $pcfFiles;

    public function __construct(array $params)
    {
        ArrayTool::checkKeysAndTypes(['cacheDir' => 's'], $params);
        parent::__construct($params);
        $this->cacheDisciple = ByFileMtimeCacheDisciple::create()->setCacheMaster(
            FileSystemCacheMaster::create()->setRootDir($params['cacheDir'])
        );
        $this->pcfFiles = [];
    }

    //------------------------------------------------------------------------------/

    // 
    //------------------------------------------------------------------------------/
    protected function doBuild(array $appTags = [])
    {
        sort($appTags);
        $cacheName = implode('-', $appTags);
        if (false !== $data = $this->cacheDisciple->getData($cacheName)) {
            return $data;
        }
        else {
            $data = parent::doBuild($appTags); // will call onPcfFilesCollectedAfter 
            $this->cacheDisciple->store($cacheName, $data, [
                'files' => $this->pcfFiles,
            ]);
        }
        return $data;
    }
    
    protected function onPcfFilesCollectedAfter(array $pcfFiles)
    {
        $this->pcfFiles = $pcfFiles;
    }

}
