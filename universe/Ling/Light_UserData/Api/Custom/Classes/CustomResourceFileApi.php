<?php


namespace Ling\Light_UserData\Api\Custom\Classes;

use Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceFileApiInterface;
use Ling\Light_UserData\Api\Generated\Classes\ResourceFileApi;
use Ling\SimplePdoWrapper\Helper\FetchAllComponentsHelper;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The CustomResourceFileApi class.
 */
class CustomResourceFileApi extends ResourceFileApi implements CustomResourceFileApiInterface
{


    /**
     * Builds the CustomResourceFileApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function fetchAllByUserId(string $userId, array $components = []): array
    {
        $where = Where::inst()->key("lud_user_id")->equals($userId);
        FetchAllComponentsHelper::mergeWhereByComponents($where, $components);

        $q = "
select
    f.*
from 
    luda_resource_file f 
    inner join luda_resource r on r.id=f.luda_resource_id    
        ";

        $markers = [];
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


}
