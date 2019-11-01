<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;


/**
 * The ResourceApi class.
 */
class ResourceApi implements ResourceApiInterface
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
     * Builds the ResourceApi instance.
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
    public function insertResource(array $resource, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
		$this->checkMicroPermission("create");
        return $this->doInsertResource($resource, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getResourceById(int $id, $default = null, bool $throwNotFoundEx = false)
    { 
		$this->checkMicroPermission("read");
        return $this->doGetResourceById($id, $default, $throwNotFoundEx);
    }


    /**
     * @implementation
     */
    public function getResourceByRealPath(string $real_path, $default = null, bool $throwNotFoundEx = false)
    { 
		$this->checkMicroPermission("read");
        return $this->doGetResourceByRealPath($real_path, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function updateResourceById(int $id, array $resource)
    { 
		$this->checkMicroPermission("update");
        $this->doUpdateResourceById($id, $resource);
    }

    /**
     * @implementation
     */
    public function updateResourceByRealPath(string $real_path, array $resource)
    { 
		$this->checkMicroPermission("update");
        $this->doUpdateResourceByRealPath($real_path, $resource);
    }



    /**
     * @implementation
     */
    public function deleteResourceById(int $id)
    { 
		$this->checkMicroPermission("delete");
        $this->doDeleteResourceById($id);
    }

    /**
     * @implementation
     */
    public function deleteResourceByRealPath(string $real_path)
    { 
		$this->checkMicroPermission("delete");
        $this->doDeleteResourceByRealPath($real_path);
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
     * The working horse behind the insertResource method.
     * See the insertResource method for more details.
     *
     * @param array $resource
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertResource(array $resource, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("luda_resource", $resource);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select id from `luda_resource`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $resource);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return $res['id'];
                }
                return [
                    'id' => $res["id"],

                ];
            }
        }
        return false;
    }

    /**
     * The working horse behind the getResourceById method.
     * See the getResourceById method for more details.
     *
     * @param int $id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetResourceById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `luda_resource` where id=:id", [
            "id" => $id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with id=$id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * The working horse behind the getResourceByRealPath method.
     * See the getResourceByRealPath method for more details.
     *
     * @param string $real_path
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetResourceByRealPath(string $real_path, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `luda_resource` where real_path=:real_path", [
            "real_path" => $real_path,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with real_path=$real_path.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * The working horse behind the updateResourceById method.
     * See the updateResourceById method for more details.
     *
     * @param int $id
     * @param array $resource
     * @throws \Exception
     * @return void
     */
    protected function doUpdateResourceById(int $id, array $resource)
    {
        $this->pdoWrapper->update("luda_resource", $resource, [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the updateResourceByRealPath method.
     * See the updateResourceByRealPath method for more details.
     *
     * @param string $real_path
     * @param array $resource
     * @throws \Exception
     * @return void
     */
    protected function doUpdateResourceByRealPath(string $real_path, array $resource)
    {
        $this->pdoWrapper->update("luda_resource", $resource, [
            "real_path" => $real_path,

        ]);
    }



    /**
     * The working horse behind the deleteResourceById method.
     * See the deleteResourceById method for more details.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    protected function doDeleteResourceById(int $id)
    {
        $this->pdoWrapper->delete("luda_resource", [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the deleteResourceByRealPath method.
     * See the deleteResourceByRealPath method for more details.
     *
     * @param string $real_path
     * @throws \Exception
     * @return void
     */
    protected function doDeleteResourceByRealPath(string $real_path)
    {
        $this->pdoWrapper->delete("luda_resource", [
            "real_path" => $real_path,

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
        $microPermission = $this->microPermissionPlugin . ".tables.luda_resource." . $type;
        if (false === $this->container->get("micro_permission")->hasMicroPermission($microPermission)) {
            throw new LightMicroPermissionException("Permission denied! You don't have the micro permission $microPermission.");
        }
    }

}
