<?php


namespace Kamille\Utils\ModulePacker\FileCreator;


use Bat\FileSystemTool;

class ServicesClassCreator extends BaseClassCreator
{


    /**
     * $methodName2InfoFromThisModule and
     * $methodName2InfoFromOtherModule have the same structure:
     *
     * array
     *      - 0: signature
     *      - 1: built in content
     */
    public static function createClass($moduleName, array $methodName2Info, $file)
    {
        $className = $moduleName . "Services";
        $s = <<<EEE
<?php


namespace Module\\$moduleName;


class $className
{


EEE;


        self::addMethods($methodName2Info, $s);


        $s .= <<<EEE
        
        
}
EEE;


        FileSystemTool::mkfile($file, $s);
    }
}