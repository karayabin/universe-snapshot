<?php


namespace Ling\Light_UserData\Api\Custom\Classes;

use Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface;
use Ling\Light_UserData\Api\Generated\Classes\ResourceApi;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The CustomResourceApi class.
 */
class CustomResourceApi extends ResourceApi implements CustomResourceApiInterface
{


    /**
     * Builds the CustomResourceApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function getResourceInfoByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false)
    {

        $ret = $this->pdoWrapper->fetch("
        select r.*, u.identifier as user_identifier  from `$this->table` r
        inner join lud_user u on u.id=r.lud_user_id 
         
         where resource_identifier=:resource_identifier", [
            "resource_identifier" => $resource_identifier,

        ]);

        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with resource_identifier=$resource_identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function getRelatedByResourceIdentifier(string $resource_identifier): array
    {
        $where = Where::inst()->key("resource_identifier")->likePost($resource_identifier . "-");
        $q = "select * from `$this->table`";
        $markers = [];
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        $q .= ' order by id asc'; // related files index matters
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getRelatedIdsByResourceIdentifier(string $resource_identifier): array
    {
        $where = Where::inst()->key("resource_identifier")->likePost($resource_identifier . "-");
        $q = "select id from `$this->table`";
        $markers = [];
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        $q .= ' order by id asc'; // related files index matters
        return $this->pdoWrapper->fetchAll($q, $markers,  \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getSourceAndRelatedByResourceIdentifier(string $resource_identifier): array
    {
        $where = Where::inst()
            ->key("resource_identifier")
            ->openingParenthesis()
            ->equals($resource_identifier)->or()->likePost($resource_identifier . "-")
            ->closingParenthesis();


        $q = "select * from `$this->table`";
        $markers = [];
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }




}
