<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Client;

use Komin\Application\ElementInstallerOld\Installer\ElementInstallerInterface;
use Komin\Application\ElementInstallerOld\MetaMapInterpreter\MetaMapInterpreterInterface;
use Komin\Application\ElementInstallerOld\Monitor\MonitorInterface;
use Komin\Application\ElementInstallerOld\ResourceDownloader\ResourceDownloaderInterface;
use Komin\Application\ElementInstallerOld\Stock\StockInterface;


/**
 * MeeElementInstallerClientInterface
 * @author Lingtalfi
 * 2015-04-19
 *
 */
interface MeeElementInstallerClientInterface extends ElementInstallerClientInterface
{


    /**
     * @return array
     */
    public function getMetaRepositories();

    public function setMetaRepositories(array $metaRepositories);

    /**
     * @return StockInterface
     */
    public function getStock();

    public function setStock(StockInterface $stock);

    /**
     * @return ResourceDownloaderInterface
     */
    public function getDownloader();

    public function setDownloader(ResourceDownloaderInterface $downloader);

    /**
     * @return MetaMapInterpreterInterface
     */
    public function getMetaMapInterpreter();

    public function setMetaMapInterpreter(MetaMapInterpreterInterface $metaMapInterpreter);


    /**
     * @return MonitorInterface
     */
    public function getMonitor();

    public function setMonitor(MonitorInterface $monitor);

    /**
     * @return ElementInstallerInterface
     */
    public function getInstaller();

    public function setInstaller(ElementInstallerInterface $installer);
}
