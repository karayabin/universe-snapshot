<?php

namespace Ling\Light_It4Tools\Light_DatabaseInfo;

use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_It4Tools\Service\LightIt4ToolsService;
use Ling\Light_It4Tools\SimplePdoWrapper\Util\It42021MysqlInfoUtil;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;


/**
 * The It42021LightDatabaseInfoService class.
 */
class It42021LightDatabaseInfoService extends LightDatabaseInfoService
{


    /**
     * The root dir of the dbKeys system of this planet.
     * @var string|null
     */
    private ?string $dbKeysRootDir;


    /**
     * Builds the It42021LightDatabaseInfoService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbKeysRootDir = null;
    }


    /**
     * Returns the dbKeysRootDir of this instance.
     *
     * @return string
     */
    public function getDbKeysRootDir(): string
    {
        return $this->dbKeysRootDir;
    }

    /**
     * Sets the dbKeysRootDir.
     *
     * @param string $dbKeysRootDir
     */
    public function setDbKeysRootDir(string $dbKeysRootDir)
    {
        $this->dbKeysRootDir = $dbKeysRootDir;
    }


    /**
     * @overrides
     */
    protected function prepareMysqlInfoUtil(string $database = null): MysqlInfoUtil
    {
        /**
         * @var $db LightDatabaseService
         */
        $pdoWrapper = $this->container->get("database");


        /**
         * @var $it4s LightIt4ToolsService
         */
        $it4s = $this->container->get("it4_tools");


        $util = new It42021MysqlInfoUtil($pdoWrapper);
        $util->setIt4ToolService($it4s);
        if (null !== $this->dbKeysRootDir) {
            $util->setDbKeysRootDir($this->dbKeysRootDir);
        }
        if (null !== $database) {
            $util->changeDatabase($database);
        }
        return $util;
    }
}