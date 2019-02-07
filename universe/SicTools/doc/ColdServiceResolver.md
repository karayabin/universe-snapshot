ColdServiceResolver
==================
2019-02-06


The ColdServiceResolver class helps creating a cold service container: a service container with regular methods (one per service)
returning a service.



This is built using the sic notation.
See the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md) for more details.




Summary
=======

- [How to](#how-to)
    - [Example 1: simple instance](#example-1-simple-instance)
    - [Example 2: constructor arguments](#example-2-constructor-arguments)
    - [Example 3: calling methods](#example-3-calling-methods)
    - [Example 4: calling the same method multiple times](#example-4-calling-the-same-method-multiple-times)
    - [Example 5: recursion, using a service as parameter](#example-5-recursion-using-a-service-as-parameter)
    - [Example 6: recursion, using a service as nested parameter](#example-6-recursion-using-a-service-as-nested-parameter)
    - [Example 7: recursion, using a service in a service](#example-7-recursion-using-a-service-in-a-service)
    - [Example 8: recursion, using custom notation](#example-8-recursion-using-custom-notation)
    - [Example 9: bypassing the sic notation](#example-9-bypassing-the-sic-notation)
    - [Example 10: using a callable as an argument](#example-10-using-a-callable-as-an-argument)
- [Related](#related)





How to
======


Example 1: simple instance
--------------------------


The following code:

```php
$sicBlock = [
    "instance" => "Animal",
];
$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(32) "$s0 = new Animal();

return $s0;"


```


Example 2: constructor arguments
----------------------------------------------

The following code:

```php
$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [8],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(33) "$s0 = new Animal(8);

return $s0;"


```



Example 3: calling methods
---------------------------------------------------

The following code:

```php

$sicBlock = [
    "instance" => "Animal",
    "methods" => [
        "sayHi" => ["John"],
        "sayBye" => null,
    ],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(67) "$s0 = new Animal();
$s0->sayHi('John');
$s0->sayBye();

return $s0;"


```



Example 4: calling the same method multiple times
-------------------------------------------------


The following code:

```php

$sicBlock = [
    "instance" => "Animal",
    "methods_collection" => [
        [
            "method" => 'sayHi',
            "args" => ['john'],
        ],
        [
            "method" => 'sayHi',
            "args" => ['alice'],
        ],
        [
            "method" => 'sayBye',
        ],
    ],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(88) "$s0 = new Animal();
$s0->sayHi('john');
$s0->sayHi('alice');
$s0->sayBye();

return $s0;"



```





Example 5: recursion, using a service as parameter
--------------------------------------------------


The following code:

```php

$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [
        [
            "instance" => "Toy",
        ],
    ],
    "methods" => [
        "playWith" => [
            [
                "instance" => "Toy",
            ],
        ],
    ],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(89) "$s1 = new Toy();
$s2 = new Toy();
$s0 = new Animal($s1);
$s0->playWith($s2);

return $s0;"


```



Example 6: recursion, using a service as nested parameter
---------------------------------------------------------


The following code:

```php

$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [
        [
            "fruits" => [
                "raspberry" => "ok",
                "blueberry" => [
                    "instance" => "BlueBerry",
                ],
            ],
        ],
    ],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(109) "$s1 = new BlueBerry();
$s0 = new Animal(['fruits' => ['raspberry' => 'ok','blueberry' => $s1]]);

return $s0;"


```


Example 7: recursion, using a service in a service
---------------------------------------------------------------------


The following code:

```php
$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [
        [
            "instance" => "Feature",
            "constructor_args" => [
                [
                    "instance" => "Logger",
                ],
            ],

        ],
    ],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(79) "$s2 = new Logger();
$s1 = new Feature($s2);
$s0 = new Animal($s1);

return $s0;"


```




Example 8: recursion using custom notation
------------------------------------------

Custom notation allows us to extend the sic notation as we please.

This is done by extending the **ColdServiceResolver** class and overriding its **resolveCustomNotation** method.



The following code:

```php
class MyColdServiceResolver extends ColdServiceResolver
{
    protected function resolveCustomNotation($value, &$isCustomNotation = false)
    {
        if (is_string($value)) { // value could be anything
            if (0 === strpos($value, '@service: ')) {
                $isCustomNotation = true;
                $serviceName = substr($value, 10);

                $code = new CodeBlock();
                $code->addStatement('$myCustomVar = 654;');
                $this->addCodeBlock($code);
                return $this->encode('$this->getService("' . $serviceName . '")');
            }
        }
        return null;
    }

}


$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [
        8,
        '@service: Feature',
    ],
];


$o = new MyColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
string(82) "$myCustomVar = 654;
$s0 = new Animal(8,$this->getService("Feature"));

return $s0;"


```





Example 9: bypassing the sic notation
-------------------------------------

If an array contains an "instance" key but is not a sic block,
we need to tell it to the ColdServiceResolver using the pass key.

If we do this at the root level, we obtain false.



The following code:

```php
$sicBlock = [
    "instance" => "Animal",
    '__pass__' => true,
];


$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```


Will output:

```html
bool(false)


```

However at a nested level, we obtain the same array without the pass key.


```php
$sicBlock = [
    "instance" => "Animal",
    "methods" => [
        "run" => [
            [
                "instance" => "Poker",
                "cards" => "spade",
                "__pass__" => true,
            ],
        ],
    ],
];


$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```

Will output:

```html
string(86) "$s0 = new Animal();
$s0->run(['instance' => 'Poker','cards' => 'spade']);

return $s0;"

```




Example 10: using a callable as an argument
-------------------------------------------

It's possible to pass callables as argument of a method, thanks to the sic notation.

The following code:

```php
$sicBlock = [
    "instance" => "MyLogger",
    "methods_collection" => [
        [
            "method" => 'addListener',
            "args" => [
                "channels" => "*",
                "callback" => [
                    "instance" => "MyListener",
                    "callable_method" => "listen",
                ],
            ],
        ],
        [
            "method" => 'addListener',
            "args" => [
                "channels" => "fatal",
                "callback" => [
                    "instance" => "MyListener",
                    "callable_method" => "listen",
                ],
            ],
        ],
    ],
];

$o = new ColdServiceResolver();
az($o->getServicePhpCode($sicBlock));
```



Will output:

```html
string(242) "$s1 = new MyListener();
$s2 = [$s1, "listen"];
$s3 = new MyListener();
$s4 = [$s3, "listen"];
$s0 = new MyLogger();
$s0->addListener('channels' => '*','callback' => $s2);
$s0->addListener('channels' => 'fatal','callback' => $s4);

return $s0;"

```





Related
=======

- [HotServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/HotServiceResolver.md)