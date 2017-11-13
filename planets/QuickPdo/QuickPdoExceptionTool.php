<?php

namespace QuickPdo;

/*
 * LingTalfi 2016-02-12
 * 
 * http://dev.mysql.com/doc/refman/5.7/en/error-messages-server.html
 * 
 */

class QuickPdoExceptionTool
{


    public static function isDuplicateEntry(\Exception $e)
    {
        if ($e instanceof \PDOException) {

            $sqlstate = $e->errorInfo[0];
            $driverCode = $e->errorInfo[1];

            if ('23000' === $sqlstate) {
                $driver = QuickPdoInfoTool::getDriver();
                if ("mysql" === $driver) {
                    if (1062 === $driverCode) {
                        return true;
                    }
                } else {
                    throw new \Exception("Driver not implemented: $driver");
                }
            }
        }
        return false;
    }
}
