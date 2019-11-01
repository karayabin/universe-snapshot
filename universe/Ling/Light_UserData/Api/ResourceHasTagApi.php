<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;


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
     * This property holds the microPermissionPlugin for this instance.
     * @var string
     */
    protected $microPermissionPlugin;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the ResourceHasTagApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
		$this->microPermissionPlugin = "Light_UserData";
		$this->container = null;
    }




    /**
     * @implementation
     */
    public function insertResourceHasTag(array $resourceHasTag, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
		$this->checkMicroPermission("create");
        return $this->doInsertResourceHasTag($resourceHasTag, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, $default = null, bool $throwNotFoundEx = false)
    { 
		$this->checkMicroPermission("read");
        return $this->doGetResourceHasTagByResourceIdAndTagId($resource_id, $tag_id, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function updateResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, array $resourceHasTag)
    { 
		$this->checkMicroPermission("update");
        $this->doUpdateResourceHasTagByResourceIdAndTagId($resource_id, $tag_id, $resourceHasTag);
    }



    /**
     * @implementation
     */
    public function deleteResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id)
    { 
		$this->checkMicroPermission("delete");
        $this->doDeleteResourceHasTagByResourceIdAndTagId($resource_id, $tag_id);
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


    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }
    /**
     * Sets the name of the plugin used to handle the micro-permissions.
     *
     * @param string $pluginName
     */
    public function setMicroPermissionPlugin(string $pluginName)
    {
        $this->microPermissionPlugin = $pluginName;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * The working horse behind the insertResourceHasTag method.
     * See the insertResourceHasTag method for more details.
     *
     * @param array $resourceHasTag
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertResourceHasTag(array $resourceHasTag, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("luda_resource_has_tag", $resourceHasTag);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'resource_id' => $resourceHasTag["resource_id"],
				'tag_id' => $resourceHasTag["tag_id"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select resource_id, tag_id from `luda_resource_has_tag`";
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
                    'resource_id' => $res["resource_id"],
				'tag_id' => $res["tag_id"],

                ];
            }
        }
        return false;
    }

    /**
     * The working horse behind the getResourceHasTagByResourceIdAndTagId method.
     * See the getResourceHasTagByResourceIdAndTagId method for more details.
     *
     * @param int $resource_id
	 * @param int $tag_id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `luda_resource_has_tag` where resource_id=:resource_id and tag_id=:tag_id", [
            "resource_id" => $resource_id,
				"tag_id" => $tag_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with resource_id=$resource_id, tag_id=$tag_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * The working horse behind the updateResourceHasTagByResourceIdAndTagId method.
     * See the updateResourceHasTagByResourceIdAndTagId method for more details.
     *
     * @param int $resource_id
	 * @param int $tag_id
     * @param array $resourceHasTag
     * @throws \Exception
     * @return void
     */
    protected function doUpdateResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, array $resourceHasTag)
    {
        $this->pdoWrapper->update("luda_resource_has_tag", $resourceHasTag, [
            "resource_id" => $resource_id,
			"tag_id" => $tag_id,

        ]);
    }



    /**
     * The working horse behind the deleteResourceHasTagByResourceIdAndTagId method.
     * See the deleteResourceHasTagByResourceIdAndTagId method for more details.
     *
     * @param int $resource_id
	 * @param int $tag_id
     * @throws \Exception
     * @return void
     */
    protected function doDeleteResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id)
    {
        $this->pdoWrapper->delete("luda_resource_has_tag", [
            "resource_id" => $resource_id,
			"tag_id" => $tag_id,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Checks whether the current user has the micro permission which type is specified.
     * See [the micro-permission recommended notation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md)
     * for more details.
     *
     *
     *
     * @param string $type
     * @throws \Exception
     */
    protected function checkMicroPermission(string $type)
    {
        $microPermission = $this->microPermissionPlugin . ".tables.luda_resource_has_tag." . $type;
        if (false === $this->container->get("micro_permission")->hasMicroPermission($microPermission)) {
            throw new LightMicroPermissionException("Permission denied! You don't have the micro permission $microPermission.");
        }
    }

}
