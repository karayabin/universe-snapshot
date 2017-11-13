ConditionResolver
===========
2017-11-07



Util to interpret a simple condition language for your applications.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import ConditionResolver
```

Or just download it and place it where you want otherwise.




How to
==========

Example in a [kamille](https://github.com/lingtalfi/kamille) app.

```php
<?php

$conditionString = '$date><2017-10-06,2017-11-09||$user_country=FR&&michel=tamere';
$conditionString = '((1 && 2)) || 3';
$conditionString = '1 && 2 || 3';
$conditionString = '1 && ((2 || 3))';
$conditionString = '((1 && 2)) || ((3 || 4 || 5 ))';
$conditionString = '((1 && 2 && 3)) || ((4 || 5 || 6 ))';
$conditionString = '$date><2017-10-06,2017-11-09';
$conditionString = '((1 && 2 || 3)) && ((4 || 5 || 6 ))';
$conditionString = '1 && 2 || 3';
$conditionString = '1 || 2 && 3';
$conditionString = '((1 || 2 && 3))';
$conditionString = '((2 || 0 && 1)) && ((0 || 1))';
$conditionString = '$date><2017-10-06,2017-11-09||$user_country=FR';
$conditionString = '$date>=<2017-10-06,2017-11-09 || $user_country=FR';
$pool = [
    "date" => "2017-10-06",
    "user_country" => "DE",
];



a($conditionString);
az(SimpleConditionResolverUtil::create()->evaluate($conditionString, $pool));
```



The conditions language
---------------------------

The SimpleConditionResolverUtil object uses the simple conditions language
found in the **doc/simple-conditions-language.md** document.




History Log
------------------    
    
- 1.0.1 -- 2017-11-07

    - update SimpleConditionResolverUtil.evaluate's second argument is now optional
    
- 1.0.0 -- 2017-11-07

    - initial commit