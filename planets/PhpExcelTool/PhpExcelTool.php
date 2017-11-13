<?php


namespace PhpExcelTool;


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

    /**
     * @param $columnName , str the name of the column (i.e. A, B, ...)
     * @return $ret array, an array containing all the values for column $columnName
     */
    public static function getColumnValues($columnName, $file)
    {
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

}