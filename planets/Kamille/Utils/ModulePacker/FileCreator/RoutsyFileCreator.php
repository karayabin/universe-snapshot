<?php


namespace Kamille\Utils\ModulePacker\FileCreator;


use Bat\FileSystemTool;

class RoutsyFileCreator extends BaseClassCreator
{


    /**
     *
     *
     * $newRoutesStatic and
     * $newRoutesDynamic have the same structure:
     *
     * array of routeId => routeContent (route content is php code)
     */
    public static function createFile(array $newRoutesStatic, array $newRoutesDynamic, $file)
    {
        $s = <<<EEE
<?php 


EEE;
        self::addRoutes($s, $newRoutesStatic, "STATIC");
        self::addRoutes($s, $newRoutesDynamic, "DYNAMIC");


        FileSystemTool::mkfile($file, $s);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function addRoutes(&$s, array $routes, $title = null)
    {
        if (null !== $title) {
            $s .= '
//--------------------------------------------
// ' . $title . '
//--------------------------------------------
';
        }

        foreach ($routes as $id => $content) {
            $s .= $content . PHP_EOL;
        }
    }

}