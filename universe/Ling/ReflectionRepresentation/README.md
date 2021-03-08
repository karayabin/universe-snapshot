ReflectionRepresentation
==========================
2015-10-27 -> 2021-03-05



Class to help with representation of \Reflection elements.




ReflectionRepresentation is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ReflectionRepresentation
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ReflectionRepresentation
```



How to use
-------------

ReflectionRepresentation is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).

### Getting a string representation for a \Reflection parameter 

```php
<?php


use Ling\ReflectionRepresentation\ReflectionParameterUtil;


require_once "bigbang.php";


class ABC
{

    public function getDynamicBoost($doing, ABC $parent, array $mood = ['oo' => 'pp'], &$please = true)
    {
        if (true === $please) {
            echo "please";
        }
    }

}

$o = new ABC();
$method = new \ReflectionMethod($o, 'getDynamicBoost');
$parameters = $method->getParameters();
foreach ($parameters as $parameter) {
    $s = ReflectionParameterUtil::create()->getParameterAsString($parameter);
    echo $s . '<br>';
}
```



Dependencies
------------------
    
- [VariableToString:1.0.0](https://github.com/lingtalfi/VariableToString)



History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2015-10-27

    - initial commit