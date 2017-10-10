<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\MetaMapInterpreter;


/**
 * MetaMapInterpreterInterface
 * @author Lingtalfi
 * 2015-04-21
 *
 */
interface MetaMapInterpreterInterface
{

    public function isValid(array $meta);


    /**
     * @return array of dependencies in the form of elementId.
     *
     */
    public function getDependencyArray(array $meta);

}
