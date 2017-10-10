<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Client\ModuleInstallerClient;

use BeeFramework\Component\Compression\CompressionUtil\ZipCommandCompressionUtil;
use BeeFramework\Notation\File\BabyYaml\Reader\BabyYamlReader;


/**
 * ModuleInstallerClientTool
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class ModuleInstallerClientTool
{

    /**
     * @param array|false
     */
    public static function getMetaFromBundle($bundlePath, $metaBaseName)
    {

        $ret = false;
        if (file_exists($bundlePath)) {
            $z = new ZipCommandCompressionUtil();
            $content = $z->extractFile($bundlePath, $metaBaseName);
            $ret = BabyYamlReader::create()->readString($content);
        }
        else {
            throw new \InvalidArgumentException("bundlePath not found: $bundlePath");
        }
        return $ret;
    }
}
