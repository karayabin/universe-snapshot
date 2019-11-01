<?php


namespace Ling\Light_UserData\Api\Custom;


use Ling\Light_UserData\Api\DirectoryMapApi;


/**
 * The CustomDirectoryMapApi class.
 */
class CustomDirectoryMapApi extends DirectoryMapApi
{


    /**
     * Returns the directoryMap row identified by the given realName.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $realName
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getDirectoryMapByRealName(string $realName, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from luda_directory_map where real_name=:real_name", [
            "real_name" => $realName,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with real_name=$realName.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

}