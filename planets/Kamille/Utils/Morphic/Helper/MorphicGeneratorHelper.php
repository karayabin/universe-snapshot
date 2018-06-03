<?php


namespace Kamille\Utils\Morphic\Helper;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;

class MorphicGeneratorHelper
{


    public static function getGeneratedMenuLocation(string $moduleName): string
    {
        return ApplicationParameters::get("app_dir") . "/store/$moduleName/Morphic/morphic-generated-menu.php";
    }


    public static function getGeneratedRoutesLocation(string $moduleName): string
    {
        return ApplicationParameters::get("app_dir") . "/store/$moduleName/Morphic/morphic-generated-routes.php";
    }

    public static function mergeModuleRoutes($moduleName, array &$routes)
    {
        $generatedFile = MorphicGeneratorHelper::getGeneratedRoutesLocation($moduleName);
        if (file_exists($generatedFile)) {
            /**
             * Tip: use EkomNullosMorphicGenerator (the morphic-generator.php script) to
             * generate the whole database in a short amount of time
             */
            $generatedRoutes = [];
            include $generatedFile;
            $routes = array_replace($routes, $generatedRoutes);
        }

    }
}