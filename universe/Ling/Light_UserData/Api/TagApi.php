<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;


/**
 * The TagApi class.
 */
class TagApi implements TagApiInterface
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
     * Builds the TagApi instance.
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
    public function insertTag(array $tag, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
		$this->checkMicroPermission("create");
        return $this->doInsertTag($tag, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getTagById(int $id, $default = null, bool $throwNotFoundEx = false)
    { 
		$this->checkMicroPermission("read");
        return $this->doGetTagById($id, $default, $throwNotFoundEx);
    }


    /**
     * @implementation
     */
    public function getTagByName(string $name, $default = null, bool $throwNotFoundEx = false)
    { 
		$this->checkMicroPermission("read");
        return $this->doGetTagByName($name, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function updateTagById(int $id, array $tag)
    { 
		$this->checkMicroPermission("update");
        $this->doUpdateTagById($id, $tag);
    }

    /**
     * @implementation
     */
    public function updateTagByName(string $name, array $tag)
    { 
		$this->checkMicroPermission("update");
        $this->doUpdateTagByName($name, $tag);
    }



    /**
     * @implementation
     */
    public function deleteTagById(int $id)
    { 
		$this->checkMicroPermission("delete");
        $this->doDeleteTagById($id);
    }

    /**
     * @implementation
     */
    public function deleteTagByName(string $name)
    { 
		$this->checkMicroPermission("delete");
        $this->doDeleteTagByName($name);
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
     * The working horse behind the insertTag method.
     * See the insertTag method for more details.
     *
     * @param array $tag
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertTag(array $tag, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("luda_tag", $tag);
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

                $query = "select id from `luda_tag`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $tag);
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
     * The working horse behind the getTagById method.
     * See the getTagById method for more details.
     *
     * @param int $id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetTagById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `luda_tag` where id=:id", [
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
     * The working horse behind the getTagByName method.
     * See the getTagByName method for more details.
     *
     * @param string $name
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetTagByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `luda_tag` where name=:name", [
            "name" => $name,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * The working horse behind the updateTagById method.
     * See the updateTagById method for more details.
     *
     * @param int $id
     * @param array $tag
     * @throws \Exception
     * @return void
     */
    protected function doUpdateTagById(int $id, array $tag)
    {
        $this->pdoWrapper->update("luda_tag", $tag, [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the updateTagByName method.
     * See the updateTagByName method for more details.
     *
     * @param string $name
     * @param array $tag
     * @throws \Exception
     * @return void
     */
    protected function doUpdateTagByName(string $name, array $tag)
    {
        $this->pdoWrapper->update("luda_tag", $tag, [
            "name" => $name,

        ]);
    }



    /**
     * The working horse behind the deleteTagById method.
     * See the deleteTagById method for more details.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    protected function doDeleteTagById(int $id)
    {
        $this->pdoWrapper->delete("luda_tag", [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the deleteTagByName method.
     * See the deleteTagByName method for more details.
     *
     * @param string $name
     * @throws \Exception
     * @return void
     */
    protected function doDeleteTagByName(string $name)
    {
        $this->pdoWrapper->delete("luda_tag", [
            "name" => $name,

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
        $microPermission = $this->microPermissionPlugin . ".tables.luda_tag." . $type;
        if (false === $this->container->get("micro_permission")->hasMicroPermission($microPermission)) {
            throw new LightMicroPermissionException("Permission denied! You don't have the micro permission $microPermission.");
        }
    }

}
