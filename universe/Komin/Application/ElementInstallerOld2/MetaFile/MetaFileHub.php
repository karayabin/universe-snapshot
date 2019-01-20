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
 * MetaFileHub
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class MetaFileHub extends BaseMetaFileHub
{
    public function __construct()
    {
        parent::__construct();
        $this->setWritableMetaFile(1, V1WritableMetaFile::create());
    }


}
