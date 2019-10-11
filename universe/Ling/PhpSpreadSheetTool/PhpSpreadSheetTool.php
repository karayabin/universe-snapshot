<?php


namespace Ling\PhpSpreadSheetTool;


use Ling\Bat\FileSystemTool;
use Ling\PhpSpreadSheetTool\Exception\PhpSpreadSheetToolException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * The PhpSpreadSheetTool class.
 *
 * This uses the PhpSpreadsheet's library under the hood.
 *
 * https://phpspreadsheet.readthedocs.io/en/latest/
 */
class PhpSpreadSheetTool
{

    /**
     * Creates a spreadsheet file using the given rows.
     * Note: the possible file extensions are:
     * - ods
     * - xlsx
     * - xls
     * - html
     * - csv
     * - pdf (if one of Tcpdf, Dompdf, mPDF is installed)
     *      Note: this implementation ships with tcpdf, so you
     *      can use the pdf extension out of the box.
     *
     *
     *
     *
     * Available options are:
     * - columnNames: an array of column names to prepend to the rows.
     * - csv: (only if the csv file format is used)
     *      - delimiter: string = , (semicolon), the delimiter char
     *      - enclosure: string = " (double quote), the enclosure char
     *      - lineEnding: string = PHP_EOL, the line ending char
     * - extension: string, to force extension.
     *          You might want to use it when using:
     *              - file: php://output
     *              - options.extension: xls (or whatever extension)
     *
     *
     *
     * @param string $file
     * @param array $rows
     * @param array $options
     *
     * @throws \Exception
     */
    public static function createFileByRows(string $file, array $rows, array $options = []): void
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $columnNames = $options['columnNames'] ?? [];
        $extension = $options['extension'] ?? null;
        if ($columnNames) {
            array_unshift($rows, $columnNames);
        }


        $c = 1;
        foreach ($rows as $row) {
            $letter = 'A';
            while ($row) {
                $val = array_shift($row);
                $sheet->setCellValue($letter++ . $c, $val);
            }
            $c++;
        }


        // https://phpspreadsheet.readthedocs.io/en/latest/topics/reading-and-writing-to-file/
        if (null === $extension) {
            $extension = FileSystemTool::getFileExtension($file);
        }
        switch ($extension) {
            case "ods":
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Ods($spreadsheet);
                break;
            case "xlsx":
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                break;
            case "xls":
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
                break;
            case "html":
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Html($spreadsheet);
                break;
            case "csv":
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
                $csvOptions = $options['csv'] ?? [];
                if (array_key_exists('delimiter', $csvOptions)) {
                    $writer->setDelimiter($csvOptions['delimiter']);
                }
                if (array_key_exists('enclosure', $csvOptions)) {
                    $writer->setEnclosure($csvOptions['enclosure']);
                }
                if (array_key_exists('lineEnding', $csvOptions)) {
                    $writer->setLineEnding($csvOptions['lineEnding']);
                }
                break;
            case "pdf":
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Tcpdf');
                break;
            default:
                throw new PhpSpreadSheetToolException("Don't know how to handle file $file with extension $extension.");
                break;
        }

        $writer->save($file);
    }

}