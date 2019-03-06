<?php


namespace Ling\Kamille\Architecture\ApplicationParameters\Web;


use Ling\Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Ling\Kamille\Architecture\Environment\Web\Environment;


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