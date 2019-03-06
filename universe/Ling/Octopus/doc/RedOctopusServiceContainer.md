RedOctopusServiceContainer
==========================
2019-02-06




The RedOctopusServiceContainer (aka red octopus) class is a dynamic container which resolves services on the fly.



Summary
=======

- [How to use?](#how-to-use)
    - [Example #1: top level service access](#example-1-top-level-service-access)
    - [Example #2: nested service access with bdot](#example-2-nested-service-access-with-bdot)
    - [Example #3: playing with sic notation](#example-3-playing-with-sic-notation)
    - [Example #4: The same instance is re-used on subsequent calls](#example-4-the-same-instance-is-re-used-on-subsequent-calls)
    - [Example #5: referencing a service using the @services function](#example-5-referencing-a-service-using-the-services-function)
- [Errors](#errors)
- [Related](#related)



How to use?
===========



Example #1: top level service access
------------------------------------


The following code:

```php

class Animal
{
    public function run()
    {
        a("I'm running");
    }
}

$config = [
    "animal" => [
        "instance" => "Animal",
    ],
];


$sc = new RedOctopusServiceContainer();
$sc->build($config);
$sc->get("animal")->run();
```


Will output:

```html
string(11) "I'm running"

```



Example #2: nested service access with bdot
-------------------------------------------

We can use the [bdot notation](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md) to access nested services.


The following code:

```php
class Animal
{
    public function run()
    {
        a("I'm running");
    }
}

$config = [
    "my_company" => [
        "animal" => [
            "instance" => "Animal",
        ],

    ],
];


$sc = new RedOctopusServiceContainer();
$sc->build($config);
$sc->get("my_company.animal")->run();
```


Will output:

```html
string(11) "I'm running"

```


Example #3: playing with sic notation
-------------------------------------

We can use all examples from the [sicTools's hot resolver documentation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/SicTools/doc/HotServiceResolver.md)
to build the configuration array.



Example #4: The same instance is re-used on subsequent calls
------------------------------------------------------------


The example below demonstrates that the service is cached after the first instantiation.
All subsequent calls to the same service therefore return the service from the cache (much faster, because we don't
interpret the sic code on the fly anymore).


The following code:

```php
class Animal
{
    private $nbMiles;

    public function __construct()
    {
        $this->nbMiles = 0;
    }

    public function run()
    {
        return ++$this->nbMiles;
    }
}


$config = [
    "animal" => [
        "instance" => "Animal",
    ],
];


$sc = new RedOctopusServiceContainer();
$sc->build($config);

/**
 * @var Animal $animal
 */
$animal = $sc->get("animal");
a($animal->run());
a($animal->run());
a($animal->run());
$animal = $sc->get("animal");
a($animal->run());
```


Will output:

```html
int(1)

int(2)

int(3)

int(4)

```


Example #5: referencing a service using the @services function
--------------------------------------------------------------

The red octopus provides a **@service** function, which allows to reference a service.

The function notation is the following:

- @service($serviceName)

With:

- service name: a string containing only alpha-numeric characters, and the dot and the underscore.
                Note that there is no space around the parentheses, this is important.


The following code:

```php
class Animal
{
}

class Human
{
    public function adopt(Animal $animal)
    {
        a("adopted");
    }
}

$config = [
    "animal" => [
        "instance" => "Animal",
    ],
    "human" => [
        "instance" => "Human",
        "methods" => [
            "adopt" => ['@service(animal)'],
        ],
    ],
];


$sc = new RedOctopusServiceContainer();
$sc->build($config);
$sc->get("human");
```


Will output:

```html
string(7) "adopted"

```


Errors
======


When something goes wrong with the "get" method, the **OctopusServiceErrorException** exception is thrown.


The following code:

```php
$config = [];


$sc = new RedOctopusServiceContainer();
$sc->build($config);
$sc->get("animal");
```


Will throw an error:

```html
Fatal error: Uncaught Octopus\Exception\OctopusServiceErrorException: Service not found: animal in /path/to/...
```




Related
=======

- [BlueOctopusServiceContainer](https://github.com/lingtalfi/Octopus/blob/master/doc/BlueOctopusServiceContainer.md)