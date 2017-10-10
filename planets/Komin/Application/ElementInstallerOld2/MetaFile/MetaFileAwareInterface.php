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
 * MetaFileAwareInterface
 * @author Lingtalfi
 * 2015-05-22
 *
 */
interface MetaFileAwareInterface
{

    public function setMetaFile(MetaFileInterface $metaFile);
}
