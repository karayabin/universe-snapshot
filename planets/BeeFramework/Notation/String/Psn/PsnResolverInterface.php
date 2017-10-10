<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\Psn;


/**
 * PsnResolverInterface.
 * @author Lingtalfi
 *
 *
 */
interface PsnResolverInterface
{

    /**
     * @param $object , if object is passed, the temporary symbol [object] is created
     *              and represents the path to the folder containing the file in which 
     *              the object is defined.
     * @return string
     */
    public function getPath($symbolicPath, $object = null);

    public function getSymbolicPath($absolutePath);
}
