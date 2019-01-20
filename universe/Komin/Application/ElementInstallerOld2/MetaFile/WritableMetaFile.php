<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstaller\MetaFile;

use BeeFramework\Bat\BdotTool;
use Komin\Application\ElementInstaller\MetaFile\Exception\MissingMetaPropertyException;


/**
 * WritableMetaFile
 * @author Lingtalfi
 * 2015-05-21
 *
 */
abstract class WritableMetaFile extends MetaFile implements WritableMetaFileInterface
{
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function checkArrayKeys(array $metaArray, array $dotKeys)
    {
        $missingKeys = [];
        foreach ($dotKeys as $key) {
            if (false === BdotTool::hasDotValue($key, $metaArray)) {
                $missingKeys[] = $key;
            }
        }
        if ($missingKeys) {
            throw new MissingMetaPropertyException($missingKeys);
        }
    }
}
