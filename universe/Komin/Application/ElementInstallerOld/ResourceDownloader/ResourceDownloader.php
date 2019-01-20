<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\ResourceDownloader;


/**
 * ResourceDownloader
 * @author Lingtalfi
 * 2015-04-21
 *
 *
 * This resource downloader is based on convention 1 for downloader objects (@see docs).
 *
 */
class ResourceDownloader implements ResourceDownloaderInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ResourceDownloaderInterface
    //------------------------------------------------------------------------------/
    /**
     * Try to copy the resource from a location defined by the given downloadInfo,
     * to the given dstFile (probably on the current file system).
     *
     *
     * @param string $dstFile , where the resource should be copied to.
     *                  If the dstFile's parent folder does not exist, it should be created.
     *
     *
     * @param string|array $downloadInfo
     *      If the downloadInfo is a string, it's a default url.
     *      If the downloadInfo is an array of parameters that concrete implementations
     *              can use to achieve the goal of the method.
     *
     *
     * @return bool, true in case of success, and false in case of error
     *
     */
    public function copy($downloadInfo, $dstFile)
    {
        if (is_string($downloadInfo)) {
            return copy($downloadInfo, $dstFile);
        }
        throw new \RuntimeException("Not implemented yet");
    }
}
