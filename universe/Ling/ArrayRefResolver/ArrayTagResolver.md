ArrayTagResolver
================
2019-02-05




Summary
=======

- [Quickstart](#quickstart)
- [Features](#features)
- [Examples](#examples)
    - [The simplest example](#the-simplest-example)
    - [The bdot notation example](#the-bdot-notation-example)
    - [The recursion example](#the-recursion-example)
    - [The custom tag example](#the-custom-tag-example)
    - [The inline injection example](#the-inline-injection-example)
    - [The type-free replacement example](#the-type-free-replacement-example)
- [Definitions](#definitions)
    - [The tag anatomy](#the-tag-anatomy)
- [Errors handling](#error-handling)






QuickStart
==========


```php
<?php


//--------------------------------------------
// ARRAY TAG RESOLVER DEMO
//--------------------------------------------
$variables = [
    "email" => 'my.email@${company}.com', // recursive reference
    "fruits" => [
        "apple",
        "banana",
        "cherry",
        '${randomFruit}', // nested recursive reference
        '${berries}', // nested recursive reference +1
    ],
    "company" => "Amiga",
    "randomFruit" => "orange",
    "berries" => [
        "strawberry",
        "blueberry",
        '${anotherBerry}',
        '${company}', // test that this is not a circular reference
    ],
    "anotherBerry" => "raspberry",
    "last_names" => [
        "john" => 'carpenter',
        "clint" => 'east${forest}',
    ],
    "forest" => 'wood',
];
$conf = [
    'public' => [
        "customer_send_mail_to" => '${email} and stuff',
        "poll_send_mail_to" => '${email}',
    ],
    "business_send_mail_to" => '${email}',
    "default_fruits" => '${fruits}',
    "dot_access" => '${berries.2}', // referencing a numeric index using the dot notation
    "dot_access2" => '${last_names.clint}', // referencing a string index using the dot notation
];






$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
a($resolver->getErrors());
az($conf);
```


The result will be:

```html
array(0) {
}

array(5) {
  ["public"] => array(2) {
    ["customer_send_mail_to"] => string(28) "my.email@Amiga.com and stuff"
    ["poll_send_mail_to"] => string(18) "my.email@Amiga.com"
  }
  ["business_send_mail_to"] => string(18) "my.email@Amiga.com"
  ["default_fruits"] => array(5) {
    [0] => string(5) "apple"
    [1] => string(6) "banana"
    [2] => string(6) "cherry"
    [3] => string(6) "orange"
    [4] => array(4) {
      [0] => string(10) "strawberry"
      [1] => string(9) "blueberry"
      [2] => string(9) "raspberry"
      [3] => string(5) "Amiga"
    }
  }
  ["dot_access"] => string(9) "raspberry"
  ["dot_access2"] => string(8) "eastwood"
}

```





Features
============


This resolver handles the following features:

- [Bdot notation to reference nested values](#the-bdot-notation-example)
- [Recursion (optional)](#the-recursion-example)
- [Customizable tag](#the-custom-tag-example)
- [Inline injection](#the-inline-injection-example)
- [Type free replacement](#the-type-free-replacement-example)





Examples
========



The simplest example
--------------------


```php
$variables = [
    "admin_email" => 'johndoe@gmail.com',
];
$conf = [
    'email' => '${admin_email}',
];



$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf);
az($conf);

```


Will output:

```html
array(1) {
  ["email"] => string(17) "johndoe@gmail.com"
}

```




The bdot notation example
-------------------------

We can access array deep levels using the [bdot notation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md).


```php
$variables = [
    "fruits" => [
        "apple",
        "banana",
        "berries" => [
            "blueberry",
            "raspberry",
        ],
        "lemon",
    ],
    "key.with.dots" => [
        "name" => "john",
    ]
];
$conf = [
    'fruit' => '${fruits.berries.1}', // raspberry (dot notation ending with a numeric index)
    'name' => '${key\.with\.dots.name}', // john
];






$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($conf);


```

Will output:

```html
array(2) {
  ["fruit"] => string(9) "raspberry"
  ["name"] => string(4) "john"
}

```







The recursion example
---------------------


A tag can reference another tag, recursively...


```php
<?php


$variables = [
    "choose_for_me" => '${some_fruit}',
    "some_fruit" => '${a_round_fruit}',
    "a_round_fruit" => 'apple',
];
$conf = [
    'fruit' => '${choose_for_me}',
];






$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($conf);


```



Will output:

```html
array(1) {
  ["fruit"] => string(5) "apple"
}

```



The custom tag example
----------------------


We can change the opening and closing tag expressions.

See [tag anatomy](#the-tag-anatomy) for more details.



```php
$variables = [
    "admin_email" => 'johndoe@gmail.com',
];
$conf = [
    'email' => '[admin_email]',
];



$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->setOpeningExpression('[');
$resolver->setClosingExpression(']');
$resolver->resolve($conf, [
    "recursion" => true,
]);

az($conf);

```

Will output:


```html
array(1) {
  ["email"] => string(17) "johndoe@gmail.com"
}

```



The inline injection example
----------------------------

We can inject tags as a part of a bigger string.


```php
$variables = [
    "name" => 'John',
    "age" => '99',
];
$conf = [
    'inline_value' => 'Hi, my name is ${name}, and my age is ${age}.',
];



$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);

az($conf);
```

Will output:


```html
array(1) {
  ["inline_value"] => string(38) "Hi, my name is John, and my age is 99."
}

```



### Important note

This only works if the resolved value is scalar (obviously we can't inject
an array into a string).





The type free replacement example
---------------------------------------

We can inject special values (i.e. non string values) like arrays, booleans, int, floats, objects.

In order to do so, our tag must not be part of a bigger string (see [The inline injection example](#the-inline-injection-example)).


```php
$o = new \stdClass();
$o->name = "Boris";

$variables = [
    "name" => 'John',
    "age" => 99,
    "money" => 45.12,
    "hobbies" => [
        "judo",
        "chess",
        "flying on the moon",
    ],
    "is_male" => true,
    "knowledge_level" => null,
    "boy_instance" => $o,
];


$conf = [
    'fellow_name' => '${name}',
    'fellow_age' => '${age}',
    'fellow_money' => '${money}',
    'fellow_hobbies' => '${hobbies}',
    'fellow_is_male' => '${is_male}',
    'fellow_knowledge_level' => '${knowledge_level}',
    'fellow_boy_instance' => '${boy_instance}',
];


$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);

az($conf);
```


Will output:

```html
array(7) {
  ["fellow_name"] => string(4) "John"
  ["fellow_age"] => int(99)
  ["fellow_money"] => float(45.12)
  ["fellow_hobbies"] => array(3) {
    [0] => string(4) "judo"
    [1] => string(5) "chess"
    [2] => string(18) "flying on the moon"
  }
  ["fellow_is_male"] => bool(true)
  ["fellow_knowledge_level"] => NULL
  ["fellow_boy_instance"] => object(stdClass)#78 (1) {
    ["name"] => string(5) "Boris"
  }
}

```








Definitions
===========




The tag anatomy
---------------


This class sees a tag as the following expression:

- {opening_expression} {tag_name} {closing_expression}


The tag expression contains 3 components:

- opening_expression: string, indicates the opening of the tag. It cannot be empty.
- tag_name: string, the name of the tag
- closing_expression: string, indicates the end of the tag. It cannot be empty.


Example:


```md
${this_is_a_tag}

[this_is_also_a_tag]

--I'm a tag too--

{{YesAlsoATag}}


```

The default tag (first in the list above) is composed of the following elements:

- opening_expression:       ${
- tag_name:                 this_is_a_tag
- closing_expression:       }





Error handling
==============



The **ArrayTagResolver** provides an **errorMode** property, which defines its behaviour when an error is encountered.

It can take one of two values


- ignore: (default) The value is left unresolved (i.e. the tag is not replaced), and the errors are accessible via the getErrors method.
- strict: an exception is thrown.




Below is the list of all possible errors:



All errors
----------


- [Error #1 Reference not found](#error-1-reference-not-found)
- [Error #2 Allow non scalar injection forbidden by configuration](#error-2-allow-non-scalar-injection-forbidden-by-configuration)
- [Error #3 Cannot inject non-scalar into a string](#error-3-cannot-inject-non-scalar-into-a-string)
- [Error #4 Deep level: allow non-scalar injection forbidden by configuration](#error-4-deep-level-allow-non-scalar-injection-forbidden-by-configuration)
- [Error #5 Deep level: cannot inject non-scalar into a string](#error-5-deep-level-cannot-inject-non-scalar-into-a-string)
- [Error #6 Circular reference](#error-6-circular-reference)



### Error #1 Reference not found

```php
$variables = [
    "email" => 'johndoe@gmail.com',
];

$conf = [
    "ref_not_found" => '${not_a_var}',
];

$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($resolver->getErrors());
```


Will output:


```html
array(1) {
  [0] => string(76) "ArrayTagResolver error: Reference not found: not_a_var. (Breadcrumb: (none))"
}

```



### Error #2 Allow non scalar injection forbidden by configuration

```php
$variables = [
    "fruits" => [
        "apple",
        "banana",
    ],
];

$conf = [
    "fruits" => '${fruits}',
];


$resolver = new ArrayTagResolver();
$resolver->setAllowNonScalarInjection(false);
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($resolver->getErrors());
```


Will output:


```html
array(1) {
  [0] => string(112) "ArrayTagResolver error: Non-scalar replacement forbidden by configuration. Variable: fruits (Breadcrumb: (none))"
}

```


### Error #3 Cannot inject non-scalar into a string


```php
$variables = [
    "fruits" => [
        "apple",
        "banana",
    ],
];

$conf = [
    "fruits" => '${fruits} and vegetables',
];


$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($resolver->getErrors());
```




Will output:

```html
array(1) {
  [0] => string(107) "ArrayTagResolver error: Cannot inject non-scalar value into a string. Variable: fruits (Breadcrumb: (none))"
}

```


### Error #4 Deep level: allow non-scalar injection forbidden by configuration


```php
$variables = [
    'berries' => [
        "blueberries",
        "strawberries",
    ],
    'someFruit' => '${berries}'
];

$conf = [
    "fruits" => '${someFruit}',
];


$resolver = new ArrayTagResolver();
$resolver->setAllowNonScalarInjection(false);
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($resolver->getErrors());
```


Will output:


```html
array(1) {
  [0] => string(125) "ArrayTagResolver error: Non-scalar replacement forbidden by configuration. Variable: someFruit > berries (Breadcrumb: (none))"
}

```


### Error #5 Deep level: cannot inject non-scalar into a string



```php
$variables = [
    'berries' => [
        "blueberries",
        "strawberries",
    ],
    'someFruit' => '${berries} and more'
];

$conf = [
    "fruits" => '${someFruit}',
];


$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($resolver->getErrors());

```

Will output:


```html
array(1) {
  [0] => string(120) "ArrayTagResolver error: Cannot inject non-scalar value into a string. Variable: someFruit > berries (Breadcrumb: (none))"
}

```

### Error #6 Circular reference


```php
$variables = [
    "ping" => '${pong}',
    "pong" => '${pang}',
    "pang" => '${ping}',
];

$conf = [
    "circular_problem" => '${ping} is bad.',
];


$resolver = new ArrayTagResolver();
$resolver->setVariables($variables);
$resolver->resolve($conf, [
    "recursion" => true,
]);
az($resolver->getErrors());
```


Will output:


```html
 array(1) {
   [0] => string(131) "ArrayTagResolver error: Circular reference detected, with array: ['pong','pang','ping']. Variable: ping > pong (Breadcrumb: (none))"
 }

```