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