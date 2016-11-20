<?php

namespace PhpTemplate;

/*
 * LingTalfi 2016-02-03
 */
use PhpTemplate\Pilot\PhpTemplatePilot;

class PhpTemplate
{

    public static $templateDir = '/tmp';


    public static function write($tpl, array $tags = [], array $options = [])
    {
        $file = self::$templateDir . '/' . $tpl;
        if (file_exists($file)) {

            /**
             * First resolve php things...
             */
            $p = new PhpTemplatePilot($options);
            ob_start();
            require_once $file;
            $c = ob_get_clean();


            /**
             * Then insert tags
             */
            foreach ($tags as $key => $value) {
                $c = str_replace('$' . $key, $value, $c);
            }

            /**
             * Spit it out
             */
            echo $c;
        }
        else {
            trigger_error("File not found: $file", E_USER_WARNING);
        }
    }
}
