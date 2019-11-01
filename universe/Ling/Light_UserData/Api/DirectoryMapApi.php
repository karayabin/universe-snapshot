<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;


/**
 * The DirectoryMapApi class.
 */
class DirectoryMapApi implements DirectoryMapApiInterface
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
     * Builds the DirectoryMapApi instance.
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
    public function insertDirectoryMap(array $directoryMap, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
		$this->checkMicroPermission("create");
        return $this->doInsertDirectoryMap($directoryMap, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getDirectoryMapByObfuscatedName(string $obfuscated_name, $default = null, bool $throwNotFoundEx = false)
    { 
		$this->checkMicroPermission("read");
        return $this->doGetDirectoryMapByObfuscatedName($obfuscated_name, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function updateDirectoryMapByObfuscatedName(string $obfuscated_name, array $directoryMap)
    { 
		$this->checkMicroPermission("update");
        $this->doUpdateDirectoryMapByObfuscatedName($obfuscated_name, $directoryMap);
    }



    /**
     * @implementation
     */
    public function deleteDirectoryMapByObfuscatedName(string $obfuscated_name)
    { 
		$this->checkMicroPermission("delete");
        $this->doDeleteDirectoryMapByObfuscatedName($obfuscated_name);
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
     * The working horse behind the insertDirectoryMap method.
     * See the insertDirectoryMap method for more details.
     *
     * @param array $directoryMap
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertDirectoryMap(array $directoryMap, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("luda_directory_map", $directoryMap);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'obfuscated_name' => $directoryMap["obfuscated_name"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select obfuscated_name from `luda_directory_map`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $directoryMap);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'obfuscated_name' => $res["obfuscated_name"],

                ];
            }
        }
        return false;
    }

    /**
     * The working horse behind the getDirectoryMapByObfuscatedName method.
     * See the getDirectoryMapByObfuscatedName method for more details.
     *
     * @param string $obfuscated_name
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetDirectoryMapByObfuscatedName(string $obfuscated_name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `luda_directory_map` where obfuscated_name=:obfuscated_name", [
            "obfuscated_name" => $obfuscated_name,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with obfuscated_name=$obfuscated_name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * The working horse behind the updateDirectoryMapByObfuscatedName method.
     * See the updateDirectoryMapByObfuscatedName method for more details.
     *
     * @param string $obfuscated_name
     * @param array $directoryMap
     * @throws \Exception
     * @return void
     */
    protected function doUpdateDirectoryMapByObfuscatedName(string $obfuscated_name, array $directoryMap)
    {
        $this->pdoWrapper->update("luda_directory_map", $directoryMap, [
            "obfuscated_name" => $obfuscated_name,

        ]);
    }



    /**
     * The working horse behind the deleteDirectoryMapByObfuscatedName method.
     * See the deleteDirectoryMapByObfuscatedName method for more details.
     *
     * @param string $obfuscated_name
     * @throws \Exception
     * @return void
     */
    protected function doDeleteDirectoryMapByObfuscatedName(string $obfuscated_name)
    {
        $this->pdoWrapper->delete("luda_directory_map", [
            "obfuscated_name" => $obfuscated_name,

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
        $microPermission = $this->microPermissionPlugin . ".tables.luda_directory_map." . $type;
        if (false === $this->container->get("micro_permission")->hasMicroPermission($microPermission)) {
            throw new LightMicroPermissionException("Permission denied! You don't have the micro permission $microPermission.");
        }
    }

}
