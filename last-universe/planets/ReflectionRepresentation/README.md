ReflectionRepresentation
==========================
2015-10-27



Class to help with representation of \Reflection elements.





How to use
-------------

ReflectionRepresentation is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).

### Getting a string representation for a \Reflection parameter 

```php
<?php


use ReflectionRepresentation\ReflectionParameterUtil;


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
    
- 1.0.0 -- 2015-10-27

    - initial commit