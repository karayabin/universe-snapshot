Id Filter
========================
2015-10-06



This is an implementation of the [idFilter notation](https://github.com/lingtalfi/NotationFan/blob/master/IdFilter/notation.idFilter.eng.md).<br>
This notation might be useful if you want to select a subset of numbers from a given set of numbers.<br>

As a concrete example, I used this class while creating a moderating command line tool.<br>
The moderator had the power to validate/refute items, so this notation came handy, and 
the moderator was able to specify multiple items with one command.


Usage
---------


```php
<?php


use NotationFan\IdFilter\IdFilterTool;

require_once 'bigbang.php';

$strings = [
    '5',
    '5, 9',
    '5, 9, 15, 9',
    '5-8',
    '8-5',
    '8, 1-4, 6',
    '8, 1-4, 30-28, 7',
];

foreach ($strings as $s) {
    a(IdFilterTool::getSelectedIds($s));
}


```


Note, for this script, 
I used the [bigbang](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md)
autoloader (which contains the a function). 



