<?php


namespace Kamille\Architecture\ApplicationParameters\Web;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Environment\Web\Environment;


class WebApplicationParameters extends ApplicationParameters
{


    public static function boot($appDir)
    {

        $paramsFile = $appDir . "/config/application-parameters-" . Environment::getEnvironment() . ".php";
        $params = [];
        if (file_exists($paramsFile)) {
            require $paramsFile;

        }
        self::$params = $params;
        return $params;
    }
}