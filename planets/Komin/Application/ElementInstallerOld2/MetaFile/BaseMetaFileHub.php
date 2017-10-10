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


/**
 * BaseMetaFileHub
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class BaseMetaFileHub implements MetaFileHubInterface
{

    private $metaFiles;

    public function __construct()
    {
        $this->metaFiles = [];
    }


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS MetaFileHubInterface
    //------------------------------------------------------------------------------/
    /**
     * @return MetaFileInterface|false
     */
    public function getMetaFile($metaVersion, array $metaArray)
    {
        if (array_key_exists($metaVersion, $this->metaFiles)) {
            $r = $this->metaFiles[$metaVersion];
            /**
             * @var WritableMetaFileInterface $r
             */
            $r->setMetaArray($metaArray);
            return $r;
        }
        return false;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setWritableMetaFile($metaVersion, WritableMetaFileInterface $m)
    {
        $this->metaFiles[$metaVersion] = $m;
        return $this;
    }

    public function setWritableMetaFiles(array $metaFiles)
    {
        foreach ($metaFiles as $k => $v) {
            $this->setWritableMetaFile($k, $v);
        }
        return $this;
    }
}
