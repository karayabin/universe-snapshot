[Back to the Ling/PhpExcelTool api](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool.md)<br>
[Back to the Ling\PhpExcelTool\PhpExcelTool class](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool.md)


PhpExcelTool::getColumnsAsRows
================



PhpExcelTool::getColumnsAsRows — Returns an array of rows.




Description
================


public static [PhpExcelTool::getColumnsAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getColumnsAsRows.md)(array $columnName2Keys, string $file, ?int $skipNLines = 0) : array




Returns an array of rows.
Each row contains the entries defined with the columnName2Keys.

columnName2Keys is an array of column name => key.
The key is the name of the key in the returned row.




Parameters
================


- columnName2Keys

    

- file

    

- skipNLines

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PhpExcelTool::getColumnsAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/PhpExcelTool.php#L170-L193)


See Also
================

The [PhpExcelTool](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool.md) class.

Previous method: [getRowValues](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getRowValues.md)<br>Next method: [createExcelFileByData](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/createExcelFileByData.md)<br>

