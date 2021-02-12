[Back to the Ling/ArrayVariableResolver api](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver.md)



The ArrayVariableResolverUtil class
================
2019-05-15 --> 2020-12-08






Introduction
============

The ArrayVariableResolverUtil class.

This is a simpler version of my previous [ArrayRefResolver](https://github.com/lingtalfi/ArrayRefResolver).
I basically dropped the circular references handling, and so variables here are resolved, but not recursively.



This class resolves variables (for instance ${myVar}) in a given array.

It parses all the values of the given array, and replaces the variables when it founds one.


The general notation for a variable "name" is the following:

- key: This is my ${name}.


We distinguish between two types of variables:
- inline variables
- standalone variables


Inline variables can be written inline, like in the above example, whereas standalone variables must be written alone: they
can't be part of a bigger string.

Example notation for a standalone variable myArray:

- key: ${myArray}

The following example won't work with standalone variable:

- key: doesn't work ${myArray}


The type of variable (inline/standalone) depends of the php type of the value of the variable:

If the php type is string, int or float, then the variable is inline.
Otherwise, the standalone notation should be used. This includes when the php type is null, boolean, array, object instance.



The symbols used in the variable notation can be changed; by default it uses the dollar and curly brackets.

You can change the symbols, but not the order of the symbols, which is:

- firstSymbol - openingBracket - variableName - closingBracket



Class synopsis
==============


class <span class="pl-k">ArrayVariableResolverUtil</span>  {

- Properties
    - protected string [$firstSymbol](#property-firstSymbol) ;
    - protected string [$openingBracket](#property-openingBracket) ;
    - protected string [$closingBracket](#property-closingBracket) ;
    - protected bool [$allowBdotResolution](#property-allowBdotResolution) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/__construct.md)() : void
    - public [setFirstSymbol](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setFirstSymbol.md)(string $firstSymbol) : void
    - public [setOpeningBracket](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setOpeningBracket.md)(string $openingBracket) : void
    - public [setClosingBracket](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setClosingBracket.md)(string $closingBracket) : void
    - public [setAllowBdotResolution](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setAllowBdotResolution.md)(bool $allowBdotResolution) : void
    - public [resolve](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/resolve.md)(array &$array, ?array $variables = []) : void

}




Properties
=============

- <span id="property-firstSymbol"><b>firstSymbol</b></span>

    This property holds the firstSymbol for this instance.
    
    

- <span id="property-openingBracket"><b>openingBracket</b></span>

    This property holds the openingBracket for this instance.
    
    

- <span id="property-closingBracket"><b>closingBracket</b></span>

    This property holds the closingBracket for this instance.
    
    

- <span id="property-allowBdotResolution"><b>allowBdotResolution</b></span>

    This property holds the allowBdotResolution for this instance.
    When true, you can use the [bdot notation](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md) in the variable name.
    
    



Methods
==============

- [ArrayVariableResolverUtil::__construct](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/__construct.md) &ndash; Builds the DynamicVariableTransformer instance.
- [ArrayVariableResolverUtil::setFirstSymbol](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setFirstSymbol.md) &ndash; Sets the firstSymbol.
- [ArrayVariableResolverUtil::setOpeningBracket](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setOpeningBracket.md) &ndash; Sets the openingBracket.
- [ArrayVariableResolverUtil::setClosingBracket](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setClosingBracket.md) &ndash; Sets the closingBracket.
- [ArrayVariableResolverUtil::setAllowBdotResolution](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/setAllowBdotResolution.md) &ndash; Sets the allowBdotResolution.
- [ArrayVariableResolverUtil::resolve](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/ArrayVariableResolverUtil/resolve.md) &ndash; Resolves the given array in place, by replacing the variable notation in the array values by the corresponding variables.


Examples
==========

Example #1: a simple use of the ArrayVariableResolver util
-----------------


The following code:

```php
$array = [
    "zones" => [
        "widgetOne" => [
            "vars" => [
                "userName" => 'Hello ${userName}',
            ],
        ]
    ],
    "value" => 777,
    "world" => [
        "countries" => '${countries}',
    ],
    "classifier" => '${classifier}',
    "userTastes" => [
        'likePizzas' => '${likePizzas}',
        'knowledgeLevel' => '${knowledgeLevel}',
        'favoriteNumber' => '${favoriteNumber}',
    ],
];

$variables = [
    'userName' => 'John',
    'countries' => [
        'france',
        'germany',
        'spain',
    ],
    'classifier' => new \stdClass(),
    'likePizzas' => true,
    'knowledgeLevel' => null,
    'favoriteNumber' => 7,

];
$util = new ArrayVariableResolverUtil();
$util->resolve($array, $variables);
a($array);
```

Will have the following output:

```html
array(5) {
  ["zones"] => array(1) {
    ["widgetOne"] => array(1) {
      ["vars"] => array(1) {
        ["userName"] => string(10) "Hello John"
      }
    }
  }
  ["value"] => int(777)
  ["world"] => array(1) {
    ["countries"] => array(3) {
      [0] => string(6) "france"
      [1] => string(7) "germany"
      [2] => string(5) "spain"
    }
  }
  ["classifier"] => object(stdClass)#4 (0) {
  }
  ["userTastes"] => array(3) {
    ["likePizzas"] => bool(true)
    ["knowledgeLevel"] => NULL
    ["favoriteNumber"] => int(7)
  }
}


```

Example #2: example with custom symbols
-----------------


The following code:

```php

$array = [
    "zones" => [
        "widgetOne" => [
            "vars" => [
                "userName" => 'Hello $[userName]',
            ],
        ]
    ],
    "value" => 777,
    "world" => [
        "countries" => '$[countries]',
    ],
    "classifier" => '$[classifier]',
    "userTastes" => [
        'likePizzas' => '$[likePizzas]',
        'knowledgeLevel' => '$[knowledgeLevel]',
        'favoriteNumber' => '$[favoriteNumber]',
    ],
];

$variables = [
    'userName' => 'John',
    'countries' => [
        'france',
        'germany',
        'spain',
    ],
    'classifier' => new \stdClass(),
    'likePizzas' => true,
    'knowledgeLevel' => null,
    'favoriteNumber' => 7,

];
$util = new ArrayVariableResolverUtil();
$util->setOpeningBracket('[');
$util->setClosingBracket(']');
$util->resolve($array, $variables);
a($array);

```

Will have the following output:

```html
array(5) {
  ["zones"] => array(1) {
    ["widgetOne"] => array(1) {
      ["vars"] => array(1) {
        ["userName"] => string(10) "Hello John"
      }
    }
  }
  ["value"] => int(777)
  ["world"] => array(1) {
    ["countries"] => array(3) {
      [0] => string(6) "france"
      [1] => string(7) "germany"
      [2] => string(5) "spain"
    }
  }
  ["classifier"] => object(stdClass)#4 (0) {
  }
  ["userTastes"] => array(3) {
    ["likePizzas"] => bool(true)
    ["knowledgeLevel"] => NULL
    ["favoriteNumber"] => int(7)
  }
}


```




Location
=============
Ling\ArrayVariableResolver\ArrayVariableResolverUtil<br>
See the source code of [Ling\ArrayVariableResolver\ArrayVariableResolverUtil](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/ArrayVariableResolverUtil.php)



SeeAlso
==============
Next class: [ArrayVariableResolverException](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/Exception/ArrayVariableResolverException.md)<br>
