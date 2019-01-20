<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Downloader;

use BeeFramework\Bat\FileTool;


/**
 * Downloader
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class Downloader implements DownloaderInterface
{

    //------------------------------------------------------------------------------/
    // IMPLEMENTS DownloaderInterface
    //------------------------------------------------------------------------------/
    public function copy($downloadInfo, $dstFile)
    {
        if (is_string($downloadInfo)) {
            if (file_exists($downloadInfo)) {
                if ('.zip' === substr($downloadInfo, -4)) {
                    return copy($downloadInfo, $dstFile);
                }
                else {
                    $extension = FileTool::getExtension($downloadInfo);
                    throw new \RuntimeException("src file extension must be zip, $extension given");
                }
            }
            else {
                throw new \RuntimeException("File not found: $downloadInfo");
            }
        }
        else {
            throw new \RuntimeException("Not implemented yet");
        }
        return false;
    }
}
