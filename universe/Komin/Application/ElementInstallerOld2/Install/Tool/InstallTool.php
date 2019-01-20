<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstaller\Install\Tool;

use BeeFramework\Bat\CompressTool;
use BeeFramework\Bat\FileSystemTool;
use Komin\Application\ElementInstaller\Install\Exception\InstallProcessInterruptedException;
use Komin\Application\ElementInstaller\Install\InstallVars\InstallVarsInterface;


/**
 * InstallTool
 * @author Lingtalfi
 * 2015-05-20
 *
 */
class InstallTool
{

  

    /**
     * Copy files located under srcDir and inject them to dstDir.
     * Does not delete existing files.
     */
    public static function copyDirContent($srcDir, $dstDir)
    {
        FileSystemTool::copyDirContent($srcDir, $dstDir, 0);
    }
    



    public static function unzip($zip)
    {
        return CompressTool::unzip($zip);
    }


}
