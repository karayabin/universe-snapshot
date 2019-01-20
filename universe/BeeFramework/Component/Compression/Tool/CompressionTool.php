<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Compression\Tool;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\FileTool;
use BeeFramework\Component\FileSystem\UniqueBaseName\AffixGenerator\AffixGenerator;
use BeeFramework\Component\FileSystem\UniqueBaseName\UniqueBaseNameUtil;


/**
 * CompressionTool
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class CompressionTool
{
    
    /**
     * @return string, the path to a dir which name is based on the given file,
     * and located in the same directory.
     */
    public static function findUniqueDirByFile($file)
    {
        $fileName = FileTool::getFileName($file);
        $parent = dirname($file);
        FileSystemTool::mkdir($parent);

        $affixGenerator = new AffixGenerator([
            'baseLength' => 1,
            'startAt' => 1,
        ]);
        $gen = $affixGenerator->getGenerator();
        $o = new UniqueBaseNameUtil();
        $o->setSep(' ');
        $o->setAffixGenerator($gen);
        return $o->getUniqueResource($fileName, $parent);

    }

}
