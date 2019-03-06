<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\Komin\Component\Db\FixtureLoader;

use Ling\BeeFramework\Chemical\Errors\Voles\VersatileErrorsTrait;
use Ling\Komin\Component\Db\FixtureLoader\DbProcessor\DbProcessorInterface;
use Ling\Komin\Component\Db\FixtureLoader\DbProcessor\PdoDbProcessor;
use Ling\Komin\Component\Db\FixtureLoader\DbProcessor\PdoMysqlDbProcessor;
use Ling\Komin\Component\Db\FixtureLoader\Fixture\FixtureInterface;
use Ling\Komin\Component\Db\FixtureLoader\FixtureStorage\BabyYamlFixtureStorage;
use Ling\Komin\Component\Db\FixtureLoader\FixtureStorage\FixtureStorageInterface;


/**
 * BabyYamlPdoMysqlFixtureLoader
 * @author Lingtalfi
 * 2015-05-30
 */
class BabyYamlPdoMysqlFixtureLoader extends FixtureLoader
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setDbProcessor(PdoMysqlDbProcessor::create())
            ->setFixtureStorage(BabyYamlFixtureStorage::create()->setAllowedExtensions(['yml']));
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setPdoInstance(\PDO $pdo)
    {
        $this->getDbProcessor()->setPdoInstance($pdo);
        return $this;
    }

    public function setRootDir($rootDir)
    {
        $this->getFixtureStorage()->setRootDir($rootDir);
        return $this;
    }

}
