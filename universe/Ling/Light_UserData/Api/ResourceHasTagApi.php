<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;

/**
 * The ResourceHasTagApi class.
 */
class ResourceHasTagApi implements ResourceHasTagApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the ResourceHasTagApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }




    /**
     * @implementation
     */
    public function insertResourceHasTag(array $resourceHasTag, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("luda_resource_has_tag", $resourceHasTag);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'luda_resource_id' => $resourceHasTag["luda_resource_id"],
				'luda_tag_id' => $resourceHasTag["luda_tag_id"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select luda_resource_id, luda_tag_id from `luda_resource_has_tag`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $resourceHasTag);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'luda_resource_id' => $res["luda_resource_id"],
				'luda_tag_id' => $res["luda_tag_id"],

                ];
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getResourceHasTagByLudaResourceIdAndLudaTagId(int $luda_resource_id, int $luda_tag_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from user where luda_resource_id=:luda_resource_id and luda_tag_id=:luda_tag_id", [
            "luda_resource_id" => $luda_resource_id,
				"luda_tag_id" => $luda_tag_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with luda_resource_id=$luda_resource_id, luda_tag_id=$luda_tag_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function updateResourceHasTagByLudaResourceIdAndLudaTagId(int $luda_resource_id, int $luda_tag_id, array $resourceHasTag)
    {
        $this->pdoWrapper->update("luda_resource_has_tag", $resourceHasTag, [
            "luda_resource_id" => $luda_resource_id,
			"luda_tag_id" => $luda_tag_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteResourceHasTagByLudaResourceIdAndLudaTagId(int $luda_resource_id, int $luda_tag_id)
    {
        $this->pdoWrapper->delete("luda_resource_has_tag", [
            "luda_resource_id" => $luda_resource_id,
			"luda_tag_id" => $luda_tag_id,

        ]);
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }
}
