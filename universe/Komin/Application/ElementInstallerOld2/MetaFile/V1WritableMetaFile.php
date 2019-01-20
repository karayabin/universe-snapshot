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
 * V1WritableMetaFile
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class V1WritableMetaFile extends WritableMetaFile implements WritableMetaFileInterface
{

    //------------------------------------------------------------------------------/
    // IMPLEMENTS WritableMetaFileInterface
    //------------------------------------------------------------------------------/
    public function setMetaArray(array $metaArray)
    {
        $this->checkArrayKeys($metaArray, [
            'type',
            'name',
        ]);


        $version = (array_key_exists('version', $metaArray)) ? $metaArray['version'] : '';
        $dependencies = (array_key_exists('dependencies', $metaArray)) ? $metaArray['dependencies'] : [];
        
        $this
            ->setType($metaArray['type'])
            ->setName($metaArray['name'])
            ->setVersion($version)
            ->setDependencies($dependencies);

        return $this;
    }
}
