<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\UniqueBaseName\AffixGenerator;


/**
 * AffixGeneratorInterface
 * @author Lingtalfi
 * 2015-04-15
 *
 *
 * This class helps finding a new unique baseName for a file/dir we are about to create.
 *
 *
 */
interface AffixGeneratorInterface
{


    /**
     *
     * Returns a callback that returns a new string each time it is called,
     * depending on the generator settings.
     *
     * @return callback
     */
    public function getGenerator();


}
