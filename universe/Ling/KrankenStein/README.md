KrankenStein
===========
2019-04-02



A tool to help with php method call notations.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/KrankenStein
```

Or just download it and place it where you want otherwise.






Summary
===========
- [KrankenStein api](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [One shot notation](#one-shot-notation)





One shot notation
==================

The one shot notation allows us to call a php static method or a php non-static method in one line.

The arguments are written using the [BabyYaml](https://github.com/lingtalfi/BabyYaml#sequences-and-mappings) inline notation.



Example #1: static call
-------------

```php
$str = "Ling\Deploy\Helper\EasyConsoleMenuHelper::myMethod(arg1, arg2, [one, two], 'boris')";
$result = KrankenSteinTool::executeOneShot($str);
```


Example #2: non-static call
-------------

```php
$str = "My\Class->myMethod(arg1, arg2, [one, two], 'boris')";
$result = KrankenSteinTool::executeOneShot($str);
```


Example #3: is it a one shot string?
-------------

```php
$str = "Ling\Deploy\Helper\EasyConsoleMenuHelper::myMethod(arg1, arg2, [one, two], 'boris')";
a(KrankenSteinTool::isOneShot($str)); // true
```







History Log
=============

- 1.0.0 -- 2019-04-02

    - initial commit