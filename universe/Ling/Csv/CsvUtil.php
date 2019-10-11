<?php


namespace Ling\Csv;


use Ling\Bat\FileSystemTool;


/**
 * The CsvUtil class.
 */
class CsvUtil
{

    /**
     * Reads the csv from the given file, and returns the result as an array of rows.
     *
     * @param $f
     * @param string $sep
     * @param null $lineLength
     * @param array $options
     * @return array
     */
    public static function readFile($f, $sep = ",", $lineLength = null, array $options = []):array
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


    /**
     * Writes the given csv data array to the given file.
     *
     * @param array $data
     * @param string $file
     * @param string $delimiter
     * @throws \Exception
     */
    public static function writeToFile(array $data, string $file, string $delimiter = ",")
    {
        FileSystemTool::touchDone($file);
        $fp = fopen($file, 'w');
        foreach ($data as $fields) {
            fputcsv($fp, $fields, $delimiter);
        }
        fclose($fp);
    }


    /**
     * Returns the csv content from the given data array, without writing it to the filesystem.
     *
     * @param array $data
     * @param string $delimiter
     * @return bool|string
     */
    public static function getString(array $data, string $delimiter = ",")
    {
        $f = fopen('php://memory', 'r+');
        foreach ($data as $fields) {
            fputcsv($f, $fields, $delimiter);
        }
        rewind($f);
        $csv_line = stream_get_contents($f);
        return rtrim($csv_line);
    }
}