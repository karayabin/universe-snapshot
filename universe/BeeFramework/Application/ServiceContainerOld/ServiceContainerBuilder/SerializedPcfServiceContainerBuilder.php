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

use BeeFramework\Bat\ArrayTool;
use BeeFramework\Component\Cache\CacheMaster\CacheMasterHandler\ByFileMtimeCacheMasterHandler;
use BeeFramework\Component\Cache\CacheMaster\CacheMasterHandler\CacheMasterHandlerInterface;


/**
 * SerializedPcfServiceContainerBuilder
 * @author Lingtalfi
 * 2015-03-08
 *
 */
class SerializedPcfServiceContainerBuilder extends PcfServiceContainerBuilder
{

    /**
     * @var CacheMasterHandlerInterface
     */
    protected $cacheHandler;
    protected $pcfFiles;

    public function __construct(array $params)
    {
        ArrayTool::checkKeysAndTypes(['cacheDir' => 's'], $params);
        parent::__construct($params);
        $this->cacheHandler = new ByFileMtimeCacheMasterHandler([
            'storeDir' => $params['cacheDir'],
        ]);
        $this->pcfFiles = [];
    }

    //------------------------------------------------------------------------------/

    // 
    //------------------------------------------------------------------------------/
    protected function doBuild(array $appTags = [])
    {
        sort($appTags);
        $cacheName = implode('-', $appTags);
        if (false !== $data = $this->cacheHandler->getData($cacheName)) {
            return $data;
        }
        else {
            $data = parent::doBuild($appTags); // will call onPcfFilesCollectedAfter 
            $this->cacheHandler->store($cacheName, $data, [
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
