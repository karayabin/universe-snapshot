[Back to the Ling/PhpSpreadSheetTool api](https://github.com/lingtalfi/PhpSpreadSheetTool/blob/master/doc/api/Ling/PhpSpreadSheetTool.md)<br>
[Back to the Ling\PhpSpreadSheetTool\PhpSpreadSheetTool class](https://github.com/lingtalfi/PhpSpreadSheetTool/blob/master/doc/api/Ling/PhpSpreadSheetTool/PhpSpreadSheetTool.md)


PhpSpreadSheetTool::createFileByRows
================



PhpSpreadSheetTool::createFileByRows — Creates a spreadsheet file using the given rows.




Description
================


public static [PhpSpreadSheetTool::createFileByRows](https://github.com/lingtalfi/PhpSpreadSheetTool/blob/master/doc/api/Ling/PhpSpreadSheetTool/PhpSpreadSheetTool/createFileByRows.md)(string $file, array $rows, ?array $options = []) : void




Creates a spreadsheet file using the given rows.
Note: the possible file extensions are:
- ods
- xlsx
- xls
- html
- csv
- pdf (if one of Tcpdf, Dompdf, mPDF is installed)
     Note: this implementation ships with tcpdf, so you
     can use the pdf extension out of the box.




Available options are:
- columnNames: an array of column names to prepend to the rows.
- csv: (only if the csv file format is used)
     - delimiter: string = , (semicolon), the delimiter char
     - enclosure: string = " (double quote), the enclosure char
     - lineEnding: string = PHP_EOL, the line ending char
- extension: string, to force extension.
         You might want to use it when using:
             - file: php://output
             - options.extension: xls (or whatever extension)




Parameters
================


- file

    

- rows

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;





Examples
================

Example 1: Create a xlsx file
----------------

```php
$f = "/tmp/test.xlsx";
$rows = [
    [
        "Fruit",
        "Number",
    ],
    [
        "Apple",
        "11",
    ],
    [
        "Banana",
        "22",
    ],
];
PhpSpreadSheetTool::createFileByRows($f, $rows);
az();

```


Alternately, we can also do this to achieve the same result:


```php
$f = "/tmp/test.xlsx";
$rows = [
    [
        "Apple",
        "11",
    ],
    [
        "Banana",
        "22",
    ],
];
PhpSpreadSheetTool::createFileByRows($f, $rows, [
    "columnNames" => [
        "Fruit",
        "Number",
    ],
]);
az();

```Example 2: Create various file types (pdf, html, csv, ...)
----------------

Simply by changing the extension of the file, we can create different file types: 

```php

// comment/uncomment the lines below to generate various file formats 

$f = "/tmp/test.ods"; // generate open office doc
$f = "/tmp/test.xlsx"; // generate xslx doc
$f = "/tmp/test.xls"; // generate xsl doc
$f = "/tmp/test.html"; // generate html doc
$f = "/tmp/test.csv"; // generate csv doc
$f = "/tmp/test.pdf"; // generate pdf using tcpdf under the hood
$rows = [
    [
        "Apple",
        "11",
    ],
    [
        "Banana",
        "22",
    ],
];
PhpSpreadSheetTool::createFileByRows($f, $rows, [
    "columnNames" => [
        "Fruit",
        "Number",
    ],
]);
az();

```

Source Code
===========
See the source code for method [PhpSpreadSheetTool::createFileByRows](https://github.com/lingtalfi/PhpSpreadSheetTool/blob/master/PhpSpreadSheetTool.php#L55-L117)


See Also
================

The [PhpSpreadSheetTool](https://github.com/lingtalfi/PhpSpreadSheetTool/blob/master/doc/api/Ling/PhpSpreadSheetTool/PhpSpreadSheetTool.md) class.



