EscapeTool
=================
2015-11-13



A tool helping with string escaping.



It uses the [escape modes convention](https://github.com/lingtalfi/Escaper/blob/master/convention/convention.escapeModes.eng.md).


There is only one class: EscapeTool, which methods are explained in this document.
For all of the methods, there are two common arguments:

- modeRecursive: bool, whether to use the recursive mode (default) or the simple mode. See the escape mode convention document for more info
- escSymbol: the escape expression used. The default is the backslash (\\) character


Also, all methods use the **[mb_](http://php.net/manual/en/ref.mbstring.php)** php functions, which means that unless you've done something
special on your machine, the default encoding is utf-8.




getEscapedSymbolPositions
-----------------------
2015-11-16


Returns the positions of the escaped symbols in a given string, or false if there is no escaped symbol in the string or if there is an error.

```php
false|array:positions       getEscapedSymbolPositions( str:string, str:symbol, int:offset=0, bool:modeRecursive = true, str:escSymbol=\ )
```

### Examples

```php
<?php


use Escaper\EscapeTool;

require_once "bigbang.php";

$string = 'He\"ll\"o "there';
$pos = EscapeTool::getEscapedSymbolPositions($string, '"');
a($pos);  // prints [3,7]

```







getNextUnescapedSymbolPos
----------------------------
2015-11-14

Returns the position of the next unescaped given symbol, or false.

```php
int|false       getNextUnescapedSymbolPos ( str:string, str:symbol, int:startPos=0, bool:modeRecursive=true, str:escSymbol='\\' )
```


getUnescapedSymbolPositions
-----------------------
2015-11-17


Returns the positions of the unescaped symbols in a given string, or false if there is no unescaped symbol in the string or if there is an error.

```php
false|array:positions       getUnescapedSymbolPositions( str:string, str:symbol, int:offset=0, bool:modeRecursive = true, str:escSymbol=\ )
```

### Examples

```php
<?php


use Escaper\EscapeTool;

require_once "bigbang.php";

$string = 'He"ll"o \"there';
$pos = EscapeTool::getUnescapedSymbolPositions($string, '"');
a($pos);  // prints [2,5]

```




isEscapedPos
---------------
2015-11-13


Returns whether or not the given position of the haystack is escaped.


```php
bool        isEscapedPos ( str:haystack, int:pos, bool:modeRecursive, str:escSymbol=\ )
```



unescape
---------------
2015-11-18


Unescapes the given symbols of a string.


```php
bool        unescape( str:string, array:symbols, bool:modeRecursive = true, str:escSymbol = '\\')
```

```php
<?php


use Escaper\EscapeTool;

require_once "bigbang.php";

a(EscapeTool::unescape('abc\"def', ['"'])); // abc"def
```







Dependencies
------------------

- [lingtalfi/Bat 1.14](https://github.com/lingtalfi/Bat)



History Log
------------------
    
- 1.4.0 -- 2015-11-18

    - add unescape  
    
    
- 1.3.0 -- 2015-11-17

    - add getUnescapedSymbolPositions  
    
- 1.2.0 -- 2015-11-16

    - add getEscapedSymbolPositions 
    - fix btests:escapeTool.getNextUnescapedSymbolPos utf-8 calls 
    
    
- 1.1.0 -- 2015-11-14

    - add getNextUnescapedSymbolPos 


- 1.0.0 -- 2015-11-13

    - initial commit
    
    