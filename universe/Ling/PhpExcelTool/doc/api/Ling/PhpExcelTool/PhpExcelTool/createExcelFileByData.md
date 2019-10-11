[Back to the Ling/PhpExcelTool api](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool.md)<br>
[Back to the Ling\PhpExcelTool\PhpExcelTool class](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool.md)


PhpExcelTool::createExcelFileByData
================



PhpExcelTool::createExcelFileByData — using the given data (which are rows).




Description
================


public static [PhpExcelTool::createExcelFileByData](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/createExcelFileByData.md)(?$file, array $data, array $options = []) : false | mixed




Simple method to create an excel file (should end with xlsx for instance (or xls, or...)
using the given data (which are rows).
By default, the keys of the first row will be the names of the columns.



options:
- showTopColumns: bool, whether or not to display the top columns
- writerType: str (default=Excel2007)
             Excel2007|Excel5|OpenDocument|PDF|???

         The writerType is a notion introduced by the PHPExcel library.
         See its meaning in the PHPExcel library's documentation,
         or the default '' value works just fine in most cases.
- ?propertiesFn:  a callback which receives the PHPExcel_DocumentProperties object.
                     Use it to set properties such as the creator, the title, the last modified, the subject,...
                     More info in the relevant documentation.

                     fn( PHPExcel_DocumentProperties $props ){}




Parameters
================


- file

    

- data

    

- options

    


Return values
================

Returns false | mixed.
Returns false if the data is empty otherwise return the same thing as the save method of the writer object (see PHPExcel library).

Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PhpExcelTool::createExcelFileByData](https://github.com/lingtalfi/PhpExcelTool/blob/master/PhpExcelTool.php#L226-L280)


See Also
================

The [PhpExcelTool](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool.md) class.

Previous method: [getColumnsAsRows](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/getColumnsAsRows.md)<br>Next method: [file2Table](https://github.com/lingtalfi/PhpExcelTool/blob/master/doc/api/Ling/PhpExcelTool/PhpExcelTool/file2Table.md)<br>

