<?php

namespace HtmlTemplate;

/*
 * LingTalfi 2016-02-29
 */


use DirScanner\YorgDirScannerTool;
use HtmlTemplate\Exception\HtmlTemplateException;

class HtmlTemplate
{

    // should be /path/to/app/www/templates
    public static $templateDir = '/tmp';
    public static $templateExtension = 'htpl';
    public static $aliases = [];


    public static function getHtml($data, string $template, string $dataType = 'map', $extra = null): string
    {
        $s = '';
        if (array_key_exists($template, self::$aliases)) {
            $template = self::$aliases[$template];
        }
        $file = self::$templateDir . '/' . $template;
        if (file_exists($file)) {

            $s = file_get_contents($file);

            switch ($dataType) {
                case 'map':
                    $s = self::processMap($s, $data);
                    break;
                case 'rows':
                    $s = self::processRows($s, $data);
                    break;
                case 'list':
                    if (null === $extra) {
                        $extra = '';
                    }
                    $s = self::processList($s, $data, $extra);
                    break;
                default:
                    throw new HtmlTemplateException("Invalid data type: $dataType");
                    break;
            }

            return $s;
        }
        else {
            trigger_error("File not found: $file", E_USER_WARNING);
        }
        return $s;
    }


    public static function writeTemplates($subDirOrFile = '', bool $recursive = true)
    {
        if (!is_array($subDirOrFile)) {
            $subDirOrFile = [$subDirOrFile];
        }
        foreach ($subDirOrFile as $_subDirOrFile) {
            $target = self::$templateDir . "/" . $_subDirOrFile;
            if (is_dir($target)) {
                $files = YorgDirScannerTool::getFilesWithExtension($target, self::$templateExtension, false, $recursive);
                foreach ($files as $file) {
                    self::printTarget($file);
                }
            }
            elseif (is_file($target)) {
                self::printTarget($target);
            }
            else {
                trigger_error("Target not found: $target");
            }
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private static function processMap(string $raw, array $data):string
    {
        foreach ($data as $key => $value) {
            $raw = str_replace('$' . $key, $value, $raw);
        }
        return $raw;
    }

    private static function processRows(string $raw, array $data):string
    {
        $s = '';
        foreach ($data as $row) {
            $s .= self::processMap($raw, $row);
        }
        return $s;
    }

    private static function processList(string $raw, array $data, string $sep = ''):string
    {
        $s = '';
        $c = 0;
        foreach ($data as $k => $v) {
            if (0 !== $c) {
                $s .= $sep;
            }
            $s .= self::processMap($raw, [
                'key' => $k,
                'value' => $v,
            ]);
            $c++;
        }
        return $s;
    }

    private static function printTarget($file)
    {
        $relPath = str_replace(self::$templateDir . '/', '', $file);
        echo '<div data-id="' . str_replace('"', '\"', $relPath) . '">';
        echo file_get_contents($file);
        echo '</div>';
    }

}
