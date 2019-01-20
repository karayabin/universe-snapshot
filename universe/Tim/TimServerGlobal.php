<?php

namespace Tim;

/*
 * LingTalfi 2016-01-18
 * 
 * 
 * 
 * service name
 * -----------------
 * The name of the targeted service, or the asterisk (*) to target all services globally.
 * Or you can use the asterisk after a namespace followed by a dot, like this:
 * 
 *          serviceProvider.*
 * 
 * Matches every services with namespace "serviceProvider", like:
 *      
 * - serviceProvider
 * - serviceProvider.service1
 * - serviceProvider.another_service
 * 
 * But not:
 * 
 * - serviceProviderOther
 * 
 * 
 */
class TimServerGlobal
{


    private static $logCbs = [];
    private static $opaqueMsgs = [];


    /**
     * @param callable $cb          void function ( \Exception $e, $serviceName )
     * @param null $serviceName
     */
    public static function setLogCb(callable $cb, $serviceName = null)
    {
        self::$logCbs[$serviceName] = $cb;
    }

    public static function getLogCb($serviceName)
    {
        if (false !== ($ret = self::getItem($serviceName, self::$logCbs))) {
            return $ret;
        }
        return false;
    }

    public static function setOpaqueMessage($msg, $serviceName = null)
    {
        self::$opaqueMsgs[$serviceName] = $msg;
    }

    public static function getOpaqueMessage($serviceName)
    {
        if (false !== ($ret = self::getItem($serviceName, self::$opaqueMsgs))) {
            return $ret;
        }
        return 'An error occurred! Please retry later';
    }


    private static function getItem($serviceName, array $items)
    {
        if (array_key_exists($serviceName, $items)) {
            return $items[$serviceName];
        }
        else {
            // handling namespaces like myService.upload
            if (false !== $pos = strpos($serviceName, '.')) {
                $namespace = substr($serviceName, 0, $pos) . '.*';
                if (array_key_exists($namespace, $items)) {
                    return $items[$namespace];
                }
            }
            elseif (array_key_exists($serviceName . '.*', $items)) {
                return $items[$serviceName . '.*'];
            }
            if (array_key_exists('*', $items)) {
                return $items['*'];
            }
        }
        return false;
    }

}
