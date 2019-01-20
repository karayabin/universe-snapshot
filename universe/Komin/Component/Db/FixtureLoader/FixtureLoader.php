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

use BeeFramework\Chemical\Errors\Voles\VersatileErrorsTrait;
use Komin\Component\Db\FixtureLoader\DbProcessor\DbProcessorInterface;
use Komin\Component\Db\FixtureLoader\Exception\FixtureLoaderException;
use Komin\Component\Db\FixtureLoader\Fixture\FixtureInterface;
use Komin\Component\Db\FixtureLoader\FixtureStorage\FixtureStorageInterface;


/**
 * FixtureLoader
 * @author Lingtalfi
 * 2015-05-30
 *
 */
class FixtureLoader implements FixtureLoaderInterface
{

    /**
     * @var DbProcessorInterface
     */
    private $dbProcessor;

    /**
     * @var FixtureStorageInterface
     */
    private $fixtureStorage;

    public function __construct()
    {

    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS FixtureLoaderInterface
    //------------------------------------------------------------------------------/
    /**
     * @param $path ,
     *              path to a fixture, or container of fixtures.
     *              If the filesystem is used, those are respectively a file and a folder.
     *
     *
     * @param bool $deleteRecords ,
     *              whether or not to delete the possibly existing entries before loading the fixtures.
     * @return bool
     *              false in case of failure,
     *              true in case of success.
     */
    public function load($path, $deleteRecords = true)
    {
        if (null !== $this->dbProcessor) {
            if (null !== $this->fixtureStorage) {
                $fixtures = $this->fixtureStorage->find($path);
                $this->dbProcessor->loadFixtures($fixtures);
                return true;
            }
            else {
                $this->error("please set the fixtureStorage first");
            }
        }
        else {
            $this->error("please set the dbProcessor first");
        }
        return false;
    }


    /**
     * @return FixtureLoaderInterface
     */
    public function setDbProcessor(DbProcessorInterface $p)
    {
        $this->dbProcessor = $p;
        return $this;
    }

    /**
     * @return FixtureLoaderInterface
     */
    public function setFixtureStorage(FixtureStorageInterface $s)
    {
        $this->fixtureStorage = $s;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return FixtureStorageInterface
     */
    public function getFixtureStorage()
    {
        return $this->fixtureStorage;
    }

    /**
     * @return DbProcessorInterface
     */
    public function getDbProcessor()
    {
        return $this->dbProcessor;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new FixtureLoaderException($m);
    }
}
