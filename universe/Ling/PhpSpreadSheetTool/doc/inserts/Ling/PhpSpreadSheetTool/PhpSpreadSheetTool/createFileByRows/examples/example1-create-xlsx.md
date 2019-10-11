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

```