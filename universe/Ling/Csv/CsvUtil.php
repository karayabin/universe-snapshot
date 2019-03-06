<?php


namespace Ling\Csv;


use Ling\Bat\FileSystemTool;

class CsvUtil
{
    public static function readFile($f, $sep = ",", $lineLength = null, array $options = [])
    {
        if (null === $lineLength) {
            $lineLength = 2048;
        }
        $skipBlankLines = $options['skipBlankLines'] ?? false;
        $ret = [];
        if (($handle = fopen($f, "r")) !== false) {
            while (($data = fgetcsv($handle, $lineLength, $sep)) !== false) {
                if (true === $skipBlankLines && 1 === count($data) && empty(trim($data[0]))) {
                    continue;
                }
                $ret[] = $data;
            }
            fclose($handle);
        }
        return $ret;
    }


    public static function writeToFile(array $data, $file, $delimiter = ",")
    {
        FileSystemTool::touchDone($file);
        $fp = fopen($file, 'w');
        foreach ($data as $fields) {
            fputcsv($fp, $fields, $delimiter);
        }
        fclose($fp);
    }
}