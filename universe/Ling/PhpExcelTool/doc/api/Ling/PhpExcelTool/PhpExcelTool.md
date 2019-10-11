[Back to the Ling/PhpExcelTool api](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool.md)



The PhpExcelTool class
================
2019-10-08 --> 2019-10-08






Introduction
============

Class PhpExcelTool



Class synopsis
==============


class <span class="pl-k">PhpExcelTool</span>  {

- Methods
    - public static [getAllAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getAllAsRows.md)(string $file) : array
    - public static [getColumnValues](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getColumnValues.md)(?$columnName, string $file) : array
    - public static [getRowValues](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getRowValues.md)(?$rowName, string $file, array $options = []) : array
    - public static [getColumnsAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getColumnsAsRows.md)(array $columnName2Keys, string $file, int $skipNLines = 0) : array
    - public static [createExcelFileByData](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/createExcelFileByData.md)(?$file, array $data, array $options = []) : false | mixed
    - public static [file2Table](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/file2Table.md)(string $file, array $options = []) : void
    - public static [table2File](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/table2File.md)(string $table, string $file) : false | mixed
    - private static [init](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/init.md)() : void
    - private static [getFirstRow](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getFirstRow.md)(?$file) : array

}






Methods
==============

- [PhpExcelTool::getAllAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getAllAsRows.md) &ndash; Returns all the rows of the spreadsheet.
- [PhpExcelTool::getColumnValues](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getColumnValues.md) &ndash; Returns all the column values for the given column.
- [PhpExcelTool::getRowValues](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getRowValues.md) &ndash; Returns an array of the values for the row identified by rowName (the index or name of the row).
- [PhpExcelTool::getColumnsAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getColumnsAsRows.md) &ndash; Returns an array of rows.
- [PhpExcelTool::createExcelFileByData](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/createExcelFileByData.md) &ndash; using the given data (which are rows).
- [PhpExcelTool::file2Table](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/file2Table.md) &ndash; This method creates a table (in the database) from the given XLSX file.
- [PhpExcelTool::table2File](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/table2File.md) &ndash; Creates the excel file using the data from the given table.
- [PhpExcelTool::init](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/init.md) &ndash; Initializes the library.
- [PhpExcelTool::getFirstRow](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getFirstRow.md) &ndash; Returns the first row of the given file.





Location
=============
Ling\PhpExcelTool\PhpExcelTool<br>
See the source code of [Ling\PhpExcelTool\PhpExcelTool](https://github.com/lingtalfi/PhpExcelTool/blob/master/PhpExcelTool.php)



SeeAlso
==============
Previous class: [PhpExcelToolHelper](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/Helper/PhpExcelToolHelper.md)<br>
