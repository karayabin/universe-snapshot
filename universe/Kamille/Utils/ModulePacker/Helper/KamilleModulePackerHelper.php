<?php


namespace Kamille\Utils\ModulePacker\Helper;


use TokenFun\TokenFinder\Tool\TokenFinderTool;

class KamilleModulePackerHelper
{


    public static function getDependenciesInfoByDir($dir)
    {
        $ret = [];
        $externalOrAvoid = [
            "Knp", // Knp\Snappy\Pdf
            "Throwable", // php native
            "IteratorTrait", // php native
        ];


        $planets = [];
        $modules = [];
        $themes = [];


        $useDependencies = TokenFinderTool::getUseDependenciesByFolder($dir);
        foreach ($useDependencies as $dependency) {
            $p = explode('\\', $dependency);
            $first = $p[0];


            if (false === in_array($first, $externalOrAvoid, true)) {
                if ('Module' === $first) {
                    if (array_key_exists(1, $p)) {
                        $moduleName = $p[1];
                        $modules[] = $moduleName;
                    }
                } elseif ('Theme' === $first) {
                    if (array_key_exists(1, $p)) {
                        $themeName = $p[1];
                        $themes[] = $themeName;
                    }
                } else {
                    $planets[] = $first;
                }
            }

        }


        $planets = array_unique($planets);
        $modules = array_unique($modules);
        $themes = array_unique($themes);

        $ret['planets'] = $planets;
        $ret['modules'] = $modules;
        $ret['themes'] = $themes;

        return $ret;
    }

}