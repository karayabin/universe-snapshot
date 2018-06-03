<?php


namespace ApplicationItemManager\Helper;


use ApplicationItemManager\Exception\ApplicationItemManagerException;

class KamilleApplicationItemManagerHelper
{

    public static function getInstallerClass($itemName)
    {
        return 'Module\\' . $itemName . '\\' . $itemName . "Module";
    }


    public static function getInstallerInstance($item, $throwEx = true)
    {
        $class = self::getInstallerClass($item);
        if (class_exists($class)) {
            return new $class;
        }
        if (true === $throwEx) {
            throw new ApplicationItemManagerException("Instance of $class not found");
        }
        return false;
    }

}