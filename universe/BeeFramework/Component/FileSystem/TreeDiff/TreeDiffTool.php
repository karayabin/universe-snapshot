<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\TreeDiff;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;


/**
 * TreeDiffTool
 * @author Lingtalfi
 * 2014-08-12
 *
 */
class TreeDiffTool
{

    public static function treeDiff($dirA, $dirB, array $options = [])
    {
        $options = array_replace([

            'checkModified' => true,
            'checkRenamed' => true,
            //
            'hashFunctions' => ['crc32', 'sha1', 'md5'],
            //
            'filters' => [
                'r' => [],
                'd' => [
                    '!^\.(git|idea)$!i',
                ],
                'f' => [
                    '!\.(gitignore|DS_Store)$!i',
                ],
            ],
        ], $options);

        $filters = $options['filters'];
        $checkModified = (bool)$options['checkModified'];
        $checkRenamed = (bool)$options['checkRenamed'];


        /**
         * array of node:
         *      - 0: realPath
         *      - 0: subpathName
         *      - 1: old mtime
         *      - 0: new mtime
         */
        $modified = []; // only files

        /**
         * array of MeeSplFileInfo
         */
        $removed = []; // any resources
        /**
         * array of MeeSplFileInfo
         */
        $added = []; // any resources
        /**
         * array of nodes:
         *      - 0: old realPath
         *      - 1: new realPath
         *      - 2: old subpathName
         *      - 3: new subpathName
         */
        $renamed = []; // only files


        $fA = null;
        $addedHash2Files = [];
        if (true === $checkRenamed) {
            // storing all hashes as keys
            /**
             * Note:
             * all files are not as unique as you might think,
             * actually, simply by copying a file, you will obtain the same hash.
             */
            $useCrc = in_array('crc32', $options['hashFunctions']);
            $useSha1 = in_array('sha1', $options['hashFunctions']);
            $useMd5 = in_array('md5', $options['hashFunctions']);
        }


        //------------------------------------------------------------------------------/
        // MAIN ROUTINE
        //------------------------------------------------------------------------------/
        if (null === $fA) {
            $fA = Finder::create($dirA);
            self::applyFilters($fA, $filters);
        }
        foreach ($fA as $file) {
            /**
             * @var FinderFileInfo $file
             */
            $bFile = $dirB . DIRECTORY_SEPARATOR . $file->getComponentsPath();
            if (file_exists($bFile)) {
                if (true === $checkModified && is_file($bFile)) {
                    if (filemtime($file) !== filemtime($bFile)) {
                        $modified[] = [
                            $bFile,
                            $file->getComponentsPath(),
                            filemtime($file),
                            filemtime($bFile),
                        ];
                    }
                }
            }
            else {
                $removed[] = $file;
            }
        }
        $fB = Finder::create($dirB);
        self::applyFilters($fB, $filters);
        foreach ($fB as $file) {
            /**
             * @var FinderFileInfo $file
             */
            $aFile = $dirA . DIRECTORY_SEPARATOR . $file->getComponentsPath();
            if (!file_exists($aFile)) {
                $added[] = $file;
                if (true === $checkRenamed) {
                    $addedHash2Files[self::getHash($file, $useCrc, $useSha1, $useMd5)] = [$file, count($added)-1];
                }
            }
        }


        if (true === $checkRenamed) {

            foreach ($removed as $k => $file) {
                /**
                 * @var FinderFileInfo $file
                 */
                $hash = self::getHash($file, $useCrc, $useSha1, $useMd5);
                if (is_file($file) && array_key_exists($hash, $addedHash2Files)) {
                    $oldFile = $file;
                    unset($removed[$k]);
                    list($newFile, $index) = $addedHash2Files[$hash];
                    unset($added[$index]);
                    $renamed[] = [
                        $oldFile->getRealPath(),
                        $newFile->getRealPath(),
                        $oldFile->getComponentsPath(),
                        $newFile->getComponentsPath(),
                    ];
                }
            }
        }

        return [
            'modified' => $modified,
            'removed' => $removed,
            'added' => $added,
            'renamed' => $renamed,
        ];
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected static function applyFilters(Finder $f, array $filters)
    {
        if ($filters['r']) {
            foreach ($filters['r'] as $filter) {
                $f->excludeRelativePath($filter, true);
            }
        }
        if ($filters['d']) {
            foreach ($filters['d'] as $filter) {
                $f->excludeRelativePathIfDir($filter, true);
            }
        }
        if ($filters['f']) {
            foreach ($filters['f'] as $filter) {
                $f->excludeRelativePathIfFile($filter, true);
            }
        }
    }

    private static function getHash(\SplFileInfo $file, $useCrc32 = true, $useSha1 = true, $useMd5 = true)
    {
        $hash = $file->getMTime();
        if (true === $useCrc32) {
            // for directories, return 0
            $hash .= '-' . sprintf("%u", crc32(file_get_contents($file)));
        }
        if (true === $useSha1) {
            $hash .= '-' . sha1_file($file);
        }
        if (true === $useMd5) {
            $hash .= '-' . md5_file($file);
        }
        return $hash;
    }
}
