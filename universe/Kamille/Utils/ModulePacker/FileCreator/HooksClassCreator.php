<?php


namespace Kamille\Utils\ModulePacker\FileCreator;


use Bat\FileSystemTool;

class HooksClassCreator extends BaseClassCreator
{


    /**
     * $methodName2InfoFromThisModule and
     * $methodName2InfoFromOtherModule have the same structure:
     *
     * array
     *      - 0: signature
     *      - 1: built in content
     */
    public static function createClass($moduleName, array $methodName2InfoFromThisModule, array $methodName2InfoFromOtherModule, $file)
    {
        $className = $moduleName . "Hooks";
        $s = <<<EEE
<?php


namespace Module\\$moduleName;


class $className
{


EEE;


        self::addMethods($methodName2InfoFromThisModule, $s, 'HOOKS OF ' . strtoupper($moduleName) . " MODULE");
        self::addMethods($methodName2InfoFromOtherModule, $s, 'SUBSCRIBED HOOKS');


        $s .= <<<EEE
        
        
}
EEE;


        FileSystemTool::mkfile($file, $s);
    }
}