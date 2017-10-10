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
 * WritableMetaFileInterface
 * @author Lingtalfi
 * 2015-05-21
 *
 */
interface WritableMetaFileInterface extends MetaFileInterface
{

    public function setMetaArray(array $metaArray);
}
