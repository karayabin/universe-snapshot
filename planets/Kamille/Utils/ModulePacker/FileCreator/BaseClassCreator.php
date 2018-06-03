<?php


namespace Kamille\Utils\ModulePacker\FileCreator;


class BaseClassCreator
{


    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function addMethods(array $info, &$s, $title = null)
    {


        if (null !== $title) {
            $s .= '
    //--------------------------------------------
    // ' . $title . '
    //--------------------------------------------';
        }

        foreach ($info as $method => $info) {
            list($signature, $content) = $info;


            $s .= <<<EEE
            
    $signature {
        $content    
    }
EEE;

            $s .= str_repeat(PHP_EOL, 2);
        }

    }

}