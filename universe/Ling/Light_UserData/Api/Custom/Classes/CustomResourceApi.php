<?php


namespace Ling\Light_UserData\Api\Custom\Classes;

use Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface;
use Ling\Light_UserData\Api\Generated\Classes\ResourceApi;
use Ling\Light_UserData\Helper\LightUserDataHelper;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\SimplePdoSpecialExpressionHelper;
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
    public function hasResourceByResourceIdentifier(string $resourceIdentifier): bool
    {
        list($userId, $canonical) = LightUserDataHelper::extractResourceIdentifier($resourceIdentifier);
        return (0 !== (int)$this->fetch([
                Columns::inst()->set(['count(*)'])->singleColumn(),
                Where::inst()
                    ->key("lud_user_id")->equals($userId)
                    ->and()->key("canonical")->equals($canonical)
            ]));
    }


    /**
     * @implementation
     */
    public function getBaseResourceInfoByResourceIdentifier(string $resourceIdentifier, array $options = [])
    {


        $useTags = $options['tags'] ?? false;
        list($userId, $canonical) = LightUserDataHelper::extractResourceIdentifier($resourceIdentifier);


        if (true === $useTags) {
            $groupConcatSep = SimplePdoSpecialExpressionHelper::GROUP_CONCAT_SEPARATOR;

            $q = "
select 
r.*,
f.id as file_id,
f.path,
f.nickname,
f.is_source,
u.identifier as user_identifier,
group_concat(t.name separator '$groupConcatSep') as tags
   
from `$this->table` r
inner join luda_resource_file f on f.luda_resource_id=r.id
inner join lud_user u on u.id=r.lud_user_id 
left outer join luda_resource_has_tag h on h.resource_id=r.id 
left outer join luda_tag t on t.id=h.tag_id
where 
    r.lud_user_id=:lud_user_id and
    r.canonical=:canonical
    
     
group by r.lud_user_id, r.id, f.id, f.path, f.nickname, f.is_source

";
        } else {

            $q = "
               select 
r.*, 
f.id as file_id,
f.path,
f.nickname,
f.is_source,
u.identifier as user_identifier
 
        from `$this->table` r
        inner join luda_resource_file f on f.luda_resource_id=r.id        
        inner join lud_user u on u.id=r.lud_user_id

         where 
            r.lud_user_id=:lud_user_id and
            r.canonical=:canonical         
        ";
        }


        $res = $this->pdoWrapper->fetchAll($q, [
            "lud_user_id" => $userId,
            "canonical" => $canonical,
        ]);


        if (empty($res)) {
            return false;
        }


        $ret = $res[0];
        unset($ret['path']);
        unset($ret['nickname']);
        unset($ret['is_source']);
        $files = [];

        foreach ($res as $item) {
            $files[] = [
                "id" => $item['file_id'],
                "path" => $item['path'],
                "nickname" => $item['nickname'],
                "is_source" => (bool)$item['is_source'],
            ];
        }
        $ret['files'] = $files;
        $ret['canonical'] = $canonical;


        if (true === $useTags) {
            $tags = $ret['tags'];
            if (null === $tags) {
                $tags = [];
            } else {
                $tags = SimplePdoSpecialExpressionHelper::unserializeGroupConcatSeparator($tags);
            }
            $ret['tags'] = $tags;
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function getSourceFilePathInfoByResourceIdentifier(string $resourceIdentifier)
    {
        list($userId, $canonical) = LightUserDataHelper::extractResourceIdentifier($resourceIdentifier);

        $q = "
select 
    f.path,
    u.identifier as user_identifier
from
    luda_resource_file f 
    inner join luda_resource r on r.id=f.luda_resource_id
    inner join lud_user u on u.id=r.lud_user_id
where 
    r.lud_user_id=:user_id and
    r.canonical=:canonical and
    f.is_source=1
              
        ";

        return $this->pdoWrapper->fetch($q, [
            "user_id" => $userId,
            "canonical" => $canonical,
        ]);

    }


}
