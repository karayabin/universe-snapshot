<?php


namespace Csv;


class CsvUtil
{
    public static function readFile($f, $sep = ",", $lineLength = 2048)
    {
        $ret = [];
        if (($handle = fopen($f, "r")) !== false) {
            while (($data = fgetcsv($handle, $lineLength, $sep)) !== false) {
                $ret[] = $data;
            }
            fclose($handle);
        }
        return $ret;
    }


    public static function writeToFile(array $data, $file, $delimiter = ",")
    {
        $fp = fopen($file, 'w');
        foreach ($data as $fields) {
            fputcsv($fp, $fields, $delimiter);
        }
        fclose($fp);
    }
}