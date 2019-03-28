[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The TableUtil class
================
2019-02-26 --> 2019-03-26






Introduction
============

The TableUtil class.


Goal: render something like this (found in Symfony Symfony\Component\Console\Helper\Table::render method):


Example:


```txt
+---------------+-----------------------+------------------+
| ISBN          | Title                 | Author           |
+---------------+-----------------------+------------------+
| 99921-58-10-7 | Divine Comedy         | Dante Alighieri  |
| 9971-5-0210-0 | A Tale of Two Cities  | Charles Dickens  |
| 960-425-059-0 | The Lord of the Rings | J. R. R. Tolkien |
+---------------+-----------------------+------------------+
```



Class synopsis
==============


class <span class="pl-k">TableUtil</span>  {

- Properties
    - protected array [$headers](#property-headers) ;
    - protected array [$rows](#property-rows) ;
    - protected int [$horizontalPadding](#property-horizontalPadding) ;
    - protected array [$symbols](#property-symbols) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/__construct.md)() : void
    - public [setHeaders](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setHeaders.md)(array $headers) : void
    - public [setOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setOptions.md)(array $options) : void
    - public [setRows](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setRows.md)(array $rows) : void
    - public [render](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/render.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - protected [writeRow](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/writeRow.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, array $row, array $columnWidths) : void
    - protected [getColumnWidths](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/getColumnWidths.md)(array $rows, array $headers) : array

}




Properties
=============

- <span id="property-headers"><b>headers</b></span>

    This property holds the headers for this instance.
    
    

- <span id="property-rows"><b>rows</b></span>

    This property holds the rows for this instance.
    
    

- <span id="property-horizontalPadding"><b>horizontalPadding</b></span>

    This property holds the horizontalPadding for this instance.
    The number of spaces to add to before and after each column (does not apply to the header).
    
    

- <span id="property-symbols"><b>symbols</b></span>

    This property holds the symbols for this instance.
    It's an array with the following entries:
    
    
    - joint: +   (the symbol used on the corners of the table)
    - horizontal: -   (the symbol used to create horizontal borders)
    - vertical: |   (the symbol used to create vertical borders)
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    It's used to customize the look'n'feel of the rendered table.
    It's an array with the following entries:
    
    - use_row_separator: bool=true. If false, no separator line will be rendered between two consecutive rows.
    
    



Methods
==============

- [TableUtil::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/__construct.md) &ndash; Builds the TableUtil instance.
- [TableUtil::setHeaders](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setHeaders.md) &ndash; Sets the headers.
- [TableUtil::setOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setOptions.md) &ndash; Sets the options.
- [TableUtil::setRows](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setRows.md) &ndash; Sets the rows.
- [TableUtil::render](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/render.md) &ndash; Writes a html like table to the given $output.
- [TableUtil::writeRow](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/writeRow.md) &ndash; Writes a table row to the given output.
- [TableUtil::getColumnWidths](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/getColumnWidths.md) &ndash; Parses the rows, and returns an array of maxWidths for each column.


Examples
==========

Example #1: A simple table with TableUtil
---------------


The following code:

```php

$output = new Output();
$headers = [
    'ISBN',
    'Title',
    'Author',
];

$rows = [
    [
        '99921-58-10-7',
        'Divine Comedy',
        'Dante Alighieri',
    ],
    [
        '9971-5-0210-0',
        'A Tale of Two Cities',
        'Charles Dickens',
    ],
    [
        '960-425-059-0',
        'The Lord of the Rings',
        'J. R. R. Tolkien',
    ],
];

$table = new TableUtil();
$table->setHeaders($headers);
$table->setRows($rows);
$table->render($output);
```


Will look like this:


![cli tools screen shot](http://lingtalfi.com/img/universe/CliTools/clitools-tableutil.png)Example #2: A table without row separator
---------------


The following code:

```php

$output = new Output();
$headers = [
    'ISBN',
    'Title',
    'Author',
];

$rows = [
    [
        '99921-58-10-7',
        'Divine Comedy',
        'Dante Alighieri',
    ],
    [
        '9971-5-0210-0',
        'A Tale of Two Cities',
        'Charles Dickens',
    ],
    [
        '960-425-059-0',
        'The Lord of the Rings',
        'J. R. R. Tolkien',
    ],
];

$table = new TableUtil();
$table->setHeaders($headers);
$table->setOptions([
    "use_row_separator" => false,
]);
$table->setRows($rows);
$table->render($output);
```


Will look like this:


![cli tools screen shot](http://lingtalfi.com/img/universe/CliTools/tableutil-nosep.png)Example #3: A table without header
---------------


The following code:

```php
$output = new Output();
$rows = [
    [
        '99921-58-10-7',
        'Divine Comedy',
        'Dante Alighieri',
    ],
    [
        '9971-5-0210-0',
        'A Tale of Two Cities',
        'Charles Dickens',
    ],
    [
        '960-425-059-0',
        'The Lord of the Rings',
        'J. R. R. Tolkien',
    ],
];

$table = new TableUtil();
$table->setRows($rows);
$table->render($output);
```


Will look like this:


![cli tools screen shot](http://lingtalfi.com/img/universe/CliTools/tableutil-no-header.png)Example #4: A table without header and no row separator
---------------


The following code:

```php
$output = new Output();
$rows = [
    [
        '99921-58-10-7',
        'Divine Comedy',
        'Dante Alighieri',
    ],
    [
        '9971-5-0210-0',
        'A Tale of Two Cities',
        'Charles Dickens',
    ],
    [
        '960-425-059-0',
        'The Lord of the Rings',
        'J. R. R. Tolkien',
    ],
];

$table = new TableUtil();
$table->setOptions([
    "use_row_separator" => false,
]);
$table->setRows($rows);
$table->render($output);
```


Will look like this:


![cli tools screen shot](http://lingtalfi.com/img/universe/CliTools/tableutil-noheader-nosep.png)


Location
=============
Ling\CliTools\Util\TableUtil


SeeAlso
==============
Previous class: [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md)<br>
