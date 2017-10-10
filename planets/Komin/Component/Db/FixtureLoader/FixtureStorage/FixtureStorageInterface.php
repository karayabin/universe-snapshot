<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\FixtureStorage;


/**
 * FixtureStorageInterface
 * @author Lingtalfi
 * 2015-05-30
 *
 */
interface FixtureStorageInterface
{

    /**
     * @param $path , to a fixture or to a fixture container
     * @return array of FixtureInterface
     */
    public function find($path);
}
