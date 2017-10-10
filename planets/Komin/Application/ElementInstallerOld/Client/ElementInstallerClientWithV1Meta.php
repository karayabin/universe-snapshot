<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Client;


use Komin\Application\ElementInstallerOld\MetaMapInterpreter\V1MetaMapInterpreter;


/**
 * ElementInstallerClientWithV1Meta
 * @author Lingtalfi
 * 2015-04-21
 *
 */
class ElementInstallerClientWithV1Meta extends ElementInstallerClient
{
    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->setMetaMapInterpreter(new V1MetaMapInterpreter());
    }


    protected function getMetaInfoForDownload(array $meta)
    {
        // meta v1 specific 
        $id = $meta['id'];
        $type = $meta['type'];
        $version = $meta['version'];
        return [
            "$type $id with version $version",
            $meta['download'],
            "$type-$id-$version.zip",
        ];
    }
}
