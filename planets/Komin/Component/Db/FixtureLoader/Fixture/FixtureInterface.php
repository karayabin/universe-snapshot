<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\Fixture;


/**
 * FixtureInterface
 * @author Lingtalfi
 * 2015-05-30
 *
 */
interface FixtureInterface
{

    /**
     * @return FixtureInterface
     */
    public function setTarget($target);

    /**
     * @return FixtureInterface
     */
    public function setData(array $data);

    public function getTarget();

    public function getData();
}
