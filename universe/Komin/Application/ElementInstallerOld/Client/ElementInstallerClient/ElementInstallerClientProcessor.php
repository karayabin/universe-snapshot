<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Client\ElementInstallerClient;

use BeeFramework\Bat\ClassTool;
use BeeFramework\Bat\FileSystemTool;
use Komin\Application\ElementInstallerOld\Installer\ElementInstallerInterface;
use Komin\Application\ElementInstallerOld\MetaMapInterpreter\MetaMapInterpreterInterface;
use Komin\Application\ElementInstallerOld\MetaRepository\MetaRepositoryInterface;
use Komin\Application\ElementInstallerOld\Monitor\MonitorInterface;
use Komin\Application\ElementInstallerOld\ResourceDownloader\ResourceDownloader;
use Komin\Application\ElementInstallerOld\ResourceDownloader\ResourceDownloaderInterface;
use Komin\Application\ElementInstallerOld\Stock\StockInterface;


/**
 * ElementInstallerClientProcessor
 * @author Lingtalfi
 * 2015-04-23
 *
 */
class ElementInstallerClientProcessor
{


    /**
     * @var StockInterface
     */
    protected $stock;
    
    /**
     * @var MonitorInterface
     */
    protected $monitor;


    /**
     * @return false|array of metaArray
     */
    public function fetchAllMeta($input)
    {
        $ret = false;
        $recognized = false;
        if (is_string($input)) {
            if (file_exists($input)) {
                if (is_file($input) && '.zip' === substr($input, -4)) {
                    $this->msg("input recognized as bundle");
                    // fetchMetaByBundle
                    $recognized = true;
                }
                elseif (is_dir($input)) {
                    $this->msg("input recognized as bundle directory");
                    $recognized = true;
                    // foreach bundles as bundle
                    // fetchMetaByBundle
                }

            }
            if (false === $recognized) {
                $p = explode(':', $input, 3);
                if (count($p) >= 2) {
                    $this->msg("input recognized as elementId");
                    $recognized = true;
                    // fetchMetaByElementId
                }
            }
        }
        elseif (is_array($input)) {
            $this->msg("input recognized as array of elementId");
            $recognized = true;
            // foreach elementIds as elementId
            // fetchMetaByElementId

        }


        if (false === $recognized) {
            $s = (is_string($input)) ? $input : '(Array)';
            $this->msg(sprintf("Unrecognized input type with %s", $s), 'e');
        }


        return $ret;
    }


    /**
     * @return MonitorInterface
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    public function setMonitor(MonitorInterface $monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * @return StockInterface
     */
    public function getStock()
    {
        return $this->stock;
    }

    public function setStock(StockInterface $stock)
    {
        $this->stock = $stock;
    }


    /**
     * messages types are mostly used to change color
     */
    protected function msg($msg, $type = 'n')
    {
        if ($this->monitor) {
            $this->monitor->msg($msg, $type);
        }
    }
}
