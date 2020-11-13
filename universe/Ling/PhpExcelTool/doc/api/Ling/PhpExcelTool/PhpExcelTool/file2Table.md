[Back to the Ling/PhpExcelTool api](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool.md)<br>
[Back to the Ling\PhpExcelTool\PhpExcelTool class](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool.md)


PhpExcelTool::file2Table
================



PhpExcelTool::file2Table — This method creates a table (in the database) from the given XLSX file.




Description
================


public static [PhpExcelTool::file2Table](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/file2Table.md)(string $file, ?array $options = []) : void




This method creates a table (in the database) from the given XLSX file.


This method uses the QuickPdo planet on the background.
https://github.com/lingtalfi/Quickpdo
Make sure your QuickPdo instance is already initialized BEFORE you call this method.




Parameters
================


- file

    

- options

    - database: string=null, the database in which to insert the data.
                         If null, it will use the current database as returned by the QuickPdo wrapper class.
     - tableName: string=null, the table in which to insert the data.
                         If null, the snake case version of the file name without the extension will be used.
                         For more about snake case, see this document: https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#snake-case
     - skipFirstLine: bool=true, whether or not to skip the first line. Use this if your first line contains the column names.
     - trimValues: bool=true, whether or not to trim the values (in the cells).
                         Note that the trimming occur before the rowCallback is executed (see rowCallback below).
     - rowCallback: callback=null, if set, allows you to customize a row. Use this to format the date for instance.
                     The callback has the following signature:

                             fn ( string column, mixed value, array row ):string
                                 It returns the new value to use.
                                 - column: the column (of the table, not of the xlsx file)
     - colTypes: array=[], array of columnLetter (of xlsx file) to a mysqlType (for instance: TEXT, VARCHAR(512), ...).
                         The default type for each column is: VARCHAR(256)
     - columnsMap: array, array of columnLetter (of the xlsx file) to tableColumn (of the table).
                     If not set explicitly, this method will consider that the first row contains the column names
                     and will use it.


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PhpExcelTool::file2Table](https://github.com/lingtalfi/PhpExcelTool/blob/master/PhpExcelTool.php#L321-L392)


See Also
================

The [PhpExcelTool](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool.md) class.

Previous method: [createExcelFileByData](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/createExcelFileByData.md)<br>Next method: [table2File](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/table2File.md)<br>

