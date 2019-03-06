<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Application\Kernel\Kcp\Chameleon\Chopin\Tool;

use Ling\BeeFramework\Component\FileSystem\Caterpillar\CaterpillarTool;
use Ling\BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use Ling\BeeFramework\Component\FileSystem\Finder\Finder;


/**
 * ChopinPcfFinderTool
 * @author Lingtalfi
 * 2014-10-12
 *
 */
class ChopinPcfFinderTool
{


    public static function findFiles($type, $dirs, $tagSoup, $fnTagsMatchTagSoup, array $options = [])
    {
        $options = array_replace([
            'depth' => null,
        ], $options);

        $ret = [];


        $f = Finder::create($dirs)->files()->addFilter(function (FinderFileInfo $file) use ($type, $tagSoup, $fnTagsMatchTagSoup) {
            $tags = CaterpillarTool::getTags($file);
            if (in_array($type, $tags, true)) {
                return $fnTagsMatchTagSoup($tags, $tagSoup);
            }
            return false;
        });


        if (null !== $options['depth']) {
            $f->maxDepth($options['depth']);
        }


        $files = $f->find();
        foreach ($files as $file) {
            /**
             * @var FinderFileInfo $file
             */
            $ret[] = $file->getRealPath();
        }


        return $ret;
    }

}
