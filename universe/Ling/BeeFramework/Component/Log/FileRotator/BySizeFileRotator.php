<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Component\Log\FileRotator;

use Ling\BeeFramework\Bat\ConvertTool;
use Ling\BeeFramework\Bat\DateTool;
use Ling\BeeFramework\Bat\FileSystemTool;


/**
 * BySizeFileRotator
 * @author Lingtalfi
 * 2015-05-25
 *
 * This class rotates files based on their size.
 *
 *
 */
class BySizeFileRotator extends FileRotator
{

    private $maxSize;

    public function __construct()
    {
        parent::__construct();
        $this->maxSize = ConvertTool::convertHumanSizeToBytes('1M');
    }

    protected function rotate($file, $plainText, $appendCarriageReturn)
    {
        if (!file_exists($file)) {
            $file = touch($file);
            clearstatcache();
        }
        if (false !== $size = filesize($file)) {
            if ($size >= $this->maxSize) {
                $baseName = $this->baseName . '-' . DateTool::getY4mdDateTime('file');
                $newFile = FileSystemTool::getUniqueResource($this->rootDir, $baseName);
                copy($file, $newFile);
                FileSystemTool::filePutContents($file, '', 0);
            }
        }
        return $file;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setMaxSize($maxSize)
    {
        $this->maxSize = ConvertTool::convertHumanSizeToBytes($maxSize);
        return $this;
    }


}
