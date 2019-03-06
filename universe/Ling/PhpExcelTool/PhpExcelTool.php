<?php


namespace Ling\PhpExcelTool;

use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\QuickPdo\QuickPdo;
use Ling\QuickPdo\QuickPdoInfoTool;


/**
 * Class PhpExcelTool
 * @package PhpExcelTool
 *
 * This is a simple wrapper around the library here:
 * https://github.com/PHPOffice/PHPExcel
 * (since I tend to loose memory)
 *
 * Before you can use this tool, please install the PHPOffice/PHPExcel library, instructions are in the
 * install.txt at the top of this repository.
 *
 * Also, you need to call the PHPExcel.php class before hand (using a require_once for instance).
 *
 *
 */
class PhpExcelTool
{


    public static function getAllAsRows(string $file)
    {
        self::init();
        $ret = [];
        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $worksheet = $objPHPExcel->getActiveSheet();
        $lastRow = $worksheet->getHighestRow();
        $lastCol = $worksheet->getHighestColumn();


        for ($row = 1; $row <= $lastRow; $row++) {
            $returnRow = [];
            $letter = 'A';
            $c = 0;
            while (true) {


                $cell = $worksheet->getCell($letter . $row);
                $val = $cell->getValue();
                $returnRow[$letter] = $val;


                //
                $letter++;
                if ($lastCol === $letter) {
                    break;
                }


                // infinite loop prevention, if you have more than 100 columns increase this number
                $c++;
                if ($c > 100) {
                    break;
                }
            }

            $ret[] = $returnRow;
        }


        return $ret;
    }

    /**
     * @param $columnName , str the name of the column (i.e. A, B, ...)
     * @return $ret array, an array containing all the values for column $columnName
     */
    public static function getColumnValues($columnName, string $file)
    {
        self::init();
        $ret = [];
        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $worksheet = $objPHPExcel->getActiveSheet();
        $lastRow = $worksheet->getHighestRow();
        for ($row = 1; $row <= $lastRow; $row++) {
            $cell = $worksheet->getCell($columnName . $row);
            $val = $cell->getValue();
            $ret[] = $val;
        }
        return $ret;
    }

    public static function getRowValues($rowName, string $file, array $options = [])
    {
        self::init();
        $ret = [];
        $useLetterAsKey = $options['useLetterAsKey'] ?? false;
        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $worksheet = $objPHPExcel->getActiveSheet();
        $lastCol = $worksheet->getHighestColumn();
        $letter = 'A';
        $c = 0;
        while (true) {
            $cell = $worksheet->getCell($letter . $rowName);
            $val = $cell->getValue();
            if (false === $useLetterAsKey) {
                $ret[] = $val;
            } else {
                $ret[$letter] = $val;
            }

            if ($lastCol === $letter) {
                break;
            }

            $letter++;

            // infinite loop prevention
            if ($c++ > 100) {
                break;
            }
        }
        return $ret;
    }


    public static function getColumnsAsRows(array $columnName2Keys, string $file, int $skipNLines = 0)
    {
        self::init();
        $ret = [];
        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $worksheet = $objPHPExcel->getActiveSheet();
        $lastRow = $worksheet->getHighestRow();
        for ($row = 1; $row <= $lastRow; $row++) {

            if ($skipNLines > 0) {
                $skipNLines--;
                continue;
            }

            $returnRow = [];
            foreach ($columnName2Keys as $columnName => $key) {
                $cell = $worksheet->getCell($columnName . $row);
                $val = $cell->getValue();
                $returnRow[$key] = $val;
            }
            $ret[] = $returnRow;
        }
        return $ret;
    }

    /**
     * Simple method to create an excel file (should end with xlsx for instance (or xls, or...)
     * using the given data (which are rows).
     * By default, the keys of the first row will be the names of the columns.
     *
     *
     *
     * options:
     * - showTopColumns: bool, whether or not to display the top columns
     * - writerType: str (default=Excel2007)
     *              Excel2007|Excel5|OpenDocument|PDF|???
     *
     *          The writerType is a notion introduced by the PHPExcel library.
     *          See its meaning in the PHPExcel library's documentation,
     *          or the default '' value works just fine in most cases.
     * - ?propertiesFn:  a callback which receives the PHPExcel_DocumentProperties object.
     *                      Use it to set properties such as the creator, the title, the last modified, the subject,...
     *                      More info in the relevant documentation.
     *
     *                      fn( PHPExcel_DocumentProperties $props ){}
     *
     *
     * @return false|mixed,
     *          return false if the data is empty
     *          otherwise return the same thing as the save method of the writer object (see PHPExcel library)
     *
     *
     */
    public static function createExcelFileByData($file, array $data, array $options = [])
    {
        self::init();

        if ($data) {

            $firstRow = $data[0];
            $colNames = array_keys($firstRow);
            $nbCols = count($colNames);


            $objPHPExcel = new \PHPExcel();
            $options = array_replace([
                'writerType' => 'Excel2007',
                'showTopColumns' => true,
                'propertiesFn' => function (\PHPExcel_DocumentProperties $props) {

                },
            ], $options);

            call_user_func($options['propertiesFn'], $objPHPExcel->getProperties());


            $worksheet = $objPHPExcel->setActiveSheetIndex(0);

            //--------------------------------------------
            // SET TITLE COLUMNS
            //--------------------------------------------
            if (true === $options['showTopColumns']) {
                $letter = 'A';
                for ($i = 1; $i <= $nbCols; $i++) {
                    $worksheet->setCellValue($letter . '1', $colNames[$i - 1]);
                    $letter++;
                }
            }

            //--------------------------------------------
            // ROWS
            //--------------------------------------------
            $c = 2;
            foreach ($data as $row) {
                $letter = 'A';
                while ($row) {
                    $val = array_shift($row);
                    $worksheet->setCellValue($letter++ . $c, $val);
                }
                $c++;
            }


            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, $options['writerType']);
            return $objWriter->save($file);
        }
        return false;
    }


    /**
     *
     * This method creates a table (in the database) from the given XLSX file.
     *
     *
     * This method uses the QuickPdo planet on the background.
     * https://github.com/lingtalfi/Quickpdo
     * Make sure your QuickPdo instance is already initialized BEFORE you call this method.
     *
     *
     *
     * @param string $file
     * @param array $options
     *      - database: string=null, the database in which to insert the data.
     *                          If null, it will use the current database as returned by the QuickPdo wrapper class.
     *      - tableName: string=null, the table in which to insert the data.
     *                          If null, the snake case version of the file name without the extension will be used.
     *                          For more about snake case, see this document: https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#snake-case
     *      - skipFirstLine: bool=true, whether or not to skip the first line. Use this if your first line contains the column names.
     *      - trimValues: bool=true, whether or not to trim the values (in the cells).
     *                          Note that the trimming occur before the rowCallback is executed (see rowCallback below).
     *      - rowCallback: callback=null, if set, allows you to customize a row. Use this to format the date for instance.
     *                      The callback has the following signature:
     *
     *                              fn ( string column, mixed value, array row ):string
     *                                  It returns the new value to use.
     *                                  - column: the column (of the table, not of the xlsx file)
     *      - colTypes: array=[], array of columnLetter (of xlsx file) to a mysqlType (for instance: TEXT, VARCHAR(512), ...).
     *                          The default type for each column is: VARCHAR(256)
     *      - columnsMap: array, array of columnLetter (of the xlsx file) to tableColumn (of the table).
     *                      If not set explicitly, this method will consider that the first row contains the column names
     *                      and will use it.
     *
     *
     *
     *
     * @throws \QuickPdo\Exception\QuickPdoException
     */
    public static function file2Table(string $file, array $options = [])
    {

        $database = $options['database'] ?? QuickPdoInfoTool::getDatabase();
        $tableName = $options['tableName'] ?? null;
        $skipFirstLine = $options['skipFirstLine'] ?? true;
        $trimValues = $options['trimValues'] ?? true;
        $rowCallback = $options['rowCallback'] ?? null;
        $colTypes = $options['colTypes'] ?? [];
        $columnsMap = $options['columnsMap'] ?? self::getFirstRow($file);

        $nbLinesToSkip = (true === $skipFirstLine) ? 1 : 0;
        /**
         * We want the first row anyway in case the user wants us to guess
         * the column names...
         */
        $cols = self::getColumnsAsRows($columnsMap, $file, $nbLinesToSkip);


        if (null === $tableName) {
            $tableName = CaseTool::toSnake(FileSystemTool::getFileName($file));
        }


        //--------------------------------------------
        // CREATE THE TABLE
        //--------------------------------------------
        $sFields = "";
        $c = 0;
        foreach ($columnsMap as $letter => $column) {
            if (0 !== $c) {
                $sFields .= "," . PHP_EOL;
            }
            if (array_key_exists($letter, $colTypes)) {
                $type = $colTypes[$letter];
            } else {
                $type = "VARCHAR(256)";
            }
            $sFields .= "\t`$column` $type NOT NULL";
            $c++;
        }
        $createTableQuery = "
CREATE TABLE IF NOT EXISTS `$database`.`$tableName` (
$sFields
)
ENGINE = InnoDB;        
        ";

        QuickPdo::freeQuery($createTableQuery);


        //--------------------------------------------
        // FILL THE ROWS
        //--------------------------------------------
        foreach ($cols as $row) {

            if (true === $trimValues) {
                $row = array_map(function ($v) {
                    return trim($v);
                }, $row);
            }

            if (is_callable($rowCallback)) {
                foreach ($row as $key => $value) {
                    $newValue = $rowCallback($key, $value, $row);
                    $row[$key] = $newValue;
                }
            }

            QuickPdo::insert("`$database`.`$tableName`", $row);
        }
    }


    public static function table2File(string $table, string $file)
    {
        $data = QuickPdo::fetchAll("select * from $table");
        return self::createExcelFileByData($file, $data);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function init()
    {
        require_once __DIR__ . "/PHPExcel/Classes/PHPExcel.php";
    }


    private static function getFirstRow($file)
    {
        self::init();
        $ret = [];
        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $worksheet = $objPHPExcel->getActiveSheet();
        $lastColumn = $worksheet->getHighestColumn();
        $n = 0;
        $col = "A";
        $isLastColumnNow = false;
        while (true) {

            $cell = $worksheet->getCell($col . "1");
            $val = $cell->getValue();
            $ret[$col] = $val;

            $col++;
            $n++;
            // if you have more than 100 cols, increase this number...
            if ($n > 100) {
                break;
            }

            if (true === $isLastColumnNow) {
                break;
            }

            if ($lastColumn === $col) {
                $isLastColumnNow = true;
            }

        }
        return $ret;
    }
}