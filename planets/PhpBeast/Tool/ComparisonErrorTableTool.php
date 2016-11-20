<?php

namespace PhpBeast\Tool;

/*
 * LingTalfi 2015-11-15
 */
class ComparisonErrorTableTool
{


    private static $errors = [];


    public static function collect($testNumber, $expected, $result)
    {
        self::$errors[] = [$testNumber, $expected, $result];
    }


    public static function display()
    {
        
        echo <<<EEE
<style>
    .phpbeast_comparison_error_table_tool
    {
        border-collapse: collapse;
    }
    .phpbeast_comparison_error_table_tool tr,
    .phpbeast_comparison_error_table_tool th,
    .phpbeast_comparison_error_table_tool td
    {
        border: 1px solid #aaa;
        padding: 3px;
    }
    
    .phpbeast_comparison_error_table_tool .first_line 
    {
        background-color: orange;
    }
</style>
EEE;



        echo '<table class="phpbeast_comparison_error_table_tool">';
//        echo '<caption>Comparison errors</caption>';
        echo '<tr class="first_line"><th>Test Number</th><th>Expected</th><th>Result</th></tr>';
        foreach (self::$errors as $error) {

            list($testNumber, $expected, $res) = $error;
            ob_start();
            var_dump($expected);
            $sExp = ob_get_clean();
            if ('1' !== ini_get('xdebug.default_enable')) {
                $sExp = preg_replace("!\]\=\>\n(\s+)!m", "] => ", $sExp);
            }

            ob_start();
            var_dump($res);
            $sRes = ob_get_clean();
            if ('1' !== ini_get('xdebug.default_enable')) {
                $sRes = preg_replace("!\]\=\>\n(\s+)!m", "] => ", $sRes);
            }
            echo '<tr>';
            echo '<td>' . $testNumber . '</td>';
            echo '<td>' . $sExp . '</td>';
            echo '<td>' . $sRes . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

}
