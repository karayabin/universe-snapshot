<?php


namespace Ling\Light_RealGenerator\Util;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;

/**
 * The RepresentativeColumnFinderUtil class.
 * A tool to find the @page(representative column).
 */
class RepresentativeColumnFinderUtil
{

    /**
     * This property holds the commonMatches for this instance.
     * @var array
     */
    protected $commonMatches;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the RepresentativeColumnFinderUtil instance.
     */
    public function __construct()
    {
        $this->commonMatches = [];
    }


    /**
     * Returns the @page(representative column) from the given table name.
     *
     *
     *
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    public function findRepresentativeColumn(string $table): string
    {
        /**
         * @var $dbInfo LightDatabaseInfoService
         */
        $database = null;
        $dbInfo = $this->container->get('database_info');
        $tableInfo = $dbInfo->getTableInfo($table, $database);
        $types = $tableInfo['simpleTypes'];
        $firstStringTypeCol = null;


        // return common matches first
        foreach ($types as $col => $type) {
            if (in_array($col, $this->commonMatches, true)) {
                return $col;
            }
            if (null === $firstStringTypeCol && 'str' === $type) {
                $firstStringTypeCol = $col;
            }
        }

        // otherwise return the first column of type string
        if (null !== $firstStringTypeCol) {
            return $firstStringTypeCol;
        }

        // eventually return any column name
        return $col;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the commonMatches.
     *
     * @param array $commonMatches
     */
    public function setCommonMatches(array $commonMatches)
    {
        $this->commonMatches = $commonMatches;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}