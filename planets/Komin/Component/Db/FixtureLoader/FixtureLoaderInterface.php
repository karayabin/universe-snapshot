<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader;

use Komin\Component\Db\FixtureLoader\DbProcessor\DbProcessorInterface;
use Komin\Component\Db\FixtureLoader\FixtureStorage\FixtureStorageInterface;


/**
 * FixtureLoaderInterface
 * @author Lingtalfi
 * 2015-05-30
 *
 */
interface FixtureLoaderInterface
{

    /**
     * @param $path ,
     *              path to a fixture, or container of fixtures.
     *              If the filesystem is used, those are respectively a file and a folder.
     *
     *
     * @param bool $deleteRecords ,
     *              whether or not to delete the possibly existing entries before loading the fixtures.
     * @return true
     * @throws \Exception
     */
    public function load($path, $deleteRecords = true);

    /**
     * @return FixtureLoaderInterface
     */
    public function setDbProcessor(DbProcessorInterface $p);

    /**
     * @return FixtureLoaderInterface
     */
    public function setFixtureStorage(FixtureStorageInterface $s);

}
