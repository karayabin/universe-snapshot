<?php


namespace Ling\Light_Realform\Feeder;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Realform\Exception\LightRealformException;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\Where;

/**
 * The RealformDatabaseFeeder class.
 */
class RealformDatabaseFeeder implements RealformFeederInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the RealformDatabaseFeeder instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    //--------------------------------------------
    // RealformFeederInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getDefaultValues(array $params = []): array
    {
        $updateRic = $params['updateRic'] ?? null;
        if (false === array_key_exists("storage_id", $params)) {
            $this->error("storage_id parameter is mandatory.");
        }
        $table = $params['storage_id'];
        $multiplier = $params['multiplier'] ?? null;


        $ret = [];
        if (null !== $updateRic) {
            /**
             * @var $db SimplePdoWrapperInterface
             */
            $db = $this->container->get("database");
            $query = "select * from `$table`";
            $markers = [];
            SimplePdoWrapper::addWhereSubStmt($query, $markers, $updateRic);
            $row = $db->fetch($query, $markers);
            if (false === $row) {
                $this->error("The record with ric: " . ArrayToStringTool::toInlinePhpArray($updateRic) . " was not found. Maybe it has been deleted.");
            }
            $ret = $row;


            if (null !== $multiplier) {


                $fieldIdentifier = $multiplier['item_id'];
                $onUpdateFetchSql = $multiplier['on_update_fetch_sql'] ?? null;
                $pivot = $multiplier['pivot'];

                if (null !== $onUpdateFetchSql) {
                    $this->error("Not implemented yet.");
                    $rows = $db->fetchAll($onUpdateFetchSql, $markers, \PDO::FETCH_COLUMN);
                } else {
                    /**
                     * abc.1
                     */
                    $query = "select $fieldIdentifier from $table";
                    if (false === array_key_exists($pivot, $updateRic)) {
                        $this->error("The updateRic doesn't contain the \"$pivot\" property.");
                    }

                    $markers = [];
                    SimplePdoWrapper::addWhereSubStmt($query, $markers, Where::inst()->key($pivot)->equals($updateRic[$pivot]));
                    $rows = $db->fetchAll($query, $markers, \PDO::FETCH_COLUMN);

                }

                $ret[$fieldIdentifier] = $rows;


            }


        }
        return $ret;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightRealformException($msg);
    }
}