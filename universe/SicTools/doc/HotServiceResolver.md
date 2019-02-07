HotServiceResolver
==================
2019-02-06


The HotServiceResolver class helps creating a hot service container: a service container which resolves services
on the fly from a stored sic notation.


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
    - [Example 8: recursion, using custom notation](#example-8-using-custom-notation)
    - [Example 9: using a callable as an argument](#example-9-using-a-callable-as-an-argument)
- [Related](#related)





How to
======


Example 1: simple instance
--------------------------


The following code:

```php
Class Animal
{

}
$sicBlock = [
    "instance" => "Animal",
];
$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
object(Animal)#3 (0) {
}

```


Example 2: constructor arguments
----------------------------------------------

The following code:

```php
Class Animal
{
    public function __construct($number)
    {
        a($number);
    }
}
$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [8],
];

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
int(8)

object(Animal)#4 (0) {
}

```



Example 3: calling methods
---------------------------------------------------

The following code:

```php
Class Animal
{
    public function sayHi($name)
    {
        a("hi $name");
    }
    public function sayBye()
    {
        a("bye");
    }
}

$sicBlock = [
    "instance" => "Animal",
    "methods" => [
        "sayHi" => ["John"],
        "sayBye" => null,
    ],
];

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(7) "hi John"

string(3) "bye"

object(Animal)#3 (0) {
}


```



Example 4: calling the same method multiple times
-------------------------------------------------


The following code:

```php
Class Animal
{
    public function sayHi($name)
    {
        a("hi $name");
    }

    public function sayBye()
    {
        a("bye");
    }
}

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

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(7) "hi john"

string(8) "hi alice"

string(3) "bye"

object(Animal)#3 (0) {
}



```





Example 5: recursion, using a service as parameter
--------------------------------------------------


The following code:

```php
Class Toy
{

}

Class Animal
{
    public function __construct(Toy $toy)
    {

    }

    public function playWith(Toy $toy)
    {
        a("ok");
    }
}

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

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(2) "ok"

object(Animal)#5 (0) {
}


```



Example 6: recursion, using a service as nested parameter
---------------------------------------------------------


The following code:

```php
Class BlueBerry
{

    public function __construct()
    {
        a("blueberry");
    }
}

Class Animal
{
    public function __construct(array $args)
    {
    }
}

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

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(9) "blueberry"

object(Animal)#5 (0) {
}


```


Example 7: recursion, using a service in a service
---------------------------------------------------------------------


The following code:

```php
class Logger
{
    public function __construct()
    {
        a("logger");
    }
}

Class Feature
{

    public function __construct(Logger $logger)
    {
        a("feature");
    }
}

Class Animal
{
    public function __construct(Feature $feature)
    {
    }
}

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

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(6) "logger"

string(7) "feature"

object(Animal)#5 (0) {
}



```




Example 8: using custom notation
--------------------------------

Custom notation allows us to extend the sic notation as we please.

This is done by extending the **HotServiceResolver** class and overriding its **resolveCustomNotation** method.



The following code:

```php
class MyHotServiceResolver extends HotServiceResolver
{
    protected function resolveCustomNotation($value, &$isCustomNotation = false)
    {
        if (is_string($value)) { // value could be anything
            if (0 === strpos($value, '@service: ')) {
                $isCustomNotation = true;
                $service = substr($value, 10);
                return new $service();
            }
        }
        return null;
    }

}


Class Feature
{
    public function __construct()
    {
        a("feature");
    }
}

Class Animal
{
    public function __construct($number, Feature $feature)
    {
        a("animal number: $number");
    }
}

$sicBlock = [
    "instance" => "Animal",
    "constructor_args" => [
        8,
        '@service: Feature',
    ],
];


$o = new MyHotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(7) "feature"

string(16) "animal number: 8"

object(Animal)#5 (0) {
}

```





Example 9: using a callable as an argument
--------------------------------

It's possible to pass callables as argument of a method, thanks to the sic notation.




The following code:

```php
class MyListener
{
    public function listen()
    {
    }
}

Class MyLogger
{
    public function addListener($channels, callable $listener)
    {
        a("listener added with channels $channels");
    }
}

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

$o = new HotServiceResolver();
az($o->getService($sicBlock));
```


Will output:

```html
string(30) "listener added with channels *"

string(34) "listener added with channels fatal"

object(MyLogger)#3 (0) {
}


```




Related
=======

- [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/ColdServiceResolver.md)


