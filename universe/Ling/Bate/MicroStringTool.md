MicroStringTool
=====================
2015-11-30



Class for manipulating strings at the level char.


All examples here use 
the [portable autoloader technique](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).




skipBlanks
-----------
2015-12-01


Read the (assumed) string from the given position,
and skip the blanks (space or tab).
The given position is updated.


```php
void    skipBlanks ( str:string, int:&position )
```



### Example

```php
<?php


use Ling\Bate\MicroStringTool;

require_once "bigbang.php";


$string = "L'été il fait beau";
$pos = 5;
MicroStringTool::skipBlanks($string, $pos);
a($pos); // 6


```
