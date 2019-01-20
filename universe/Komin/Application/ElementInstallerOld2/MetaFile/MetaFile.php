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
 * MetaFile
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class MetaFile implements MetaFileInterface
{


    private $metaVersion;
    private $type;
    private $name;
    private $version;
    private $dependencies;

    public function __construct()
    {
        $this->metaVersion = 1;
        $this->type = '';
        $this->name = '';
        $this->version = '';
        $this->dependencies = [];
    }


    public static function create()
    {
        return new static();
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS MetaFileInterface
    //------------------------------------------------------------------------------/
    public function getDependencies()
    {
        return $this->dependencies;
    }

    public function getMetaVersion()
    {
        return $this->metaVersion;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getVersion()
    {
        return $this->version;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function setDependencies(array $dependencies)
    {
        $this->dependencies = $dependencies;
        return $this;
    }

    public function setMetaVersion($metaVersion)
    {
        $this->metaVersion = $metaVersion;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }
}
