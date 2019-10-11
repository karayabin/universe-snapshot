Example 2: Create various file types (pdf, html, csv, ...)
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