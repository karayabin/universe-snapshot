BlueOctopusServiceContainer
==========================
2019-02-07




The BlueOctopusServiceContainer is a blue octopus.


A blue octopus is composed of two classes acting together as a cold (aka static) service container.

See [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/ColdServiceResolver.md) for more info.

The two parts are the following:

- light part (the **Octopus\ServiceContainer\BlueOctopusServiceContainer** class): this is the parent class, which contains the "get" method implementing the OctopusServiceContainerInterface.
- dark part (a class to be generated): this is the child class, which contains all the methods (one method per service).


The dark part can be generated using a class like the **Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder** for instance.


When both parts are generated, the client calls the dark blue octopus and can use it.



Summary
=======

- [How to use?](#how-to-use)
- [Using the service function](#using-the-service-function)
- [Using the container function](#using-the-container-function)
- [Customizing the generator](#customizing-the-generator)
- [Errors](#errors)
- [Related](#related)



How to use?
===========


Before we can use the blue octopus, we need to create its dark part.

We can use the **Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder** class for that.


```php
class Animal
{
    public function __construct()
    {
        a("animal constructor");
    }
}

class House
{
    private $nbRooms;


    public function setNumberOfRooms($number)
    {
        $this->nbRooms = $number;
    }

    public function getNumberOfRooms()
    {
        return $this->nbRooms;
    }
}

$conf = [
    "my_company" => [
        "service1" => [
            "instance" => "Animal",
        ],
        "service2" => [
            "instance" => "House",
            "methods" => [
                "setNumberOfRooms" => [5],
            ],
        ],
    ],
];


$file = __DIR__ . "/MyServiceContainer.php";
$o = new DarkBlueOctopusServiceContainerBuilder();
$o->setSicConfig($conf);

/**
 * This will build the service container class.
 */
$o->build($file);
```


The code above will create the dark blue octopus in the form of the **MyServiceContainer.php** file ($file).

Below is the content of this generated class:

```php
<?php

use Ling\Octopus\ServiceContainer\BlueOctopusServiceContainer;

/**
* This class is the dark blue octopus service container.
* It was generated automatically by the Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder object on 2019-02-07.
*/
class DarkBlueOctopusServiceContainer extends BlueOctopusServiceContainer {

    protected function my_company_service1()  {
        $s0 = new Animal();

        return $s0;
    }

    protected function my_company_service2()  {
        $s0 = new House();
        $s0->setNumberOfRooms(5);

        return $s0;
    }

}


```

As you can see, all our services have their own methods.

So now we can start using the blue octopus.
The following code, which is a follow-up of the code above, demonstrates how:


```php
/**
 * Let's use the newly created service container now.
 */
include_once $file;
$sc = new DarkBlueOctopusServiceContainer(); // DarkBlueOctopusServiceContainer is the default name of the generated class; you can customize it via the options of the build method.
a("123"); // just a marker to ease interpretation of the output
a($sc->get("my_company.service1"));
a($sc->get("my_company.service1"));
a("456");
a($sc->get("my_company.service2")->getNumberOfRooms());
```


The output will be:

```html
string(3) "123"

string(18) "animal constructor"

object(Animal)#16 (0) {
}

object(Animal)#16 (0) {
}

string(3) "456"

int(5)

```



To make more complex services, please refer to the [cold resolver examples](https://github.com/lingtalfi/SicTools/blob/master/doc/ColdServiceResolver.md)
and/or the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md)






Using the service function
==========================

The blue octopuses built with the **Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder** class
provide a **@service** function, which allows to reference a service.

The function notation is the following:

- @service($serviceName)

With:

- service name: a string containing only alpha-numeric characters, and the dot and the underscore.
                Note that there is no space around the parentheses, this is important.


The following code demonstrates the use of the **@service** notation.

This code:

```php
class Animal
{

}

class Boy
{
    public function __construct(Animal $a)
    {
        a("boy");
    }
}

$conf = [
    "service1" => [
        "instance" => "Animal",
    ],
    "service2" => [
        "instance" => "Boy",
        "constructor_args" => ['@service(service1)'],
    ],
];
$file = __DIR__ . "/MyServiceContainer.php";
$o = new DarkBlueOctopusServiceContainerBuilder();
$o->setSicConfig($conf);
$o->build($file);


include_once $file;
$sc = new DarkBlueOctopusServiceContainer();
$sc->get("service2");
```



Will output:

```html
string(3) "boy"

```



Using the container function
=============

The blue octopuses built with the **Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder** class
provide a **@container** function, which allows to reference the service container instance.

The function notation is the following:

- @container()


Note that there is no space in the notation.


The following code demonstrates the use of the **@container()** notation.


This code:

```php
class MyApp
{
    public function __construct(DarkBlueOctopusServiceContainer $container)
    {
        a("ok");
    }
}
$conf = [
    "my_app" => [
        "instance" => "MyApp",
        "constructor_args" => ['@container()'],
    ],
];
$file = "/tmp/MyServiceContainer.php";
$o = new DarkBlueOctopusServiceContainerBuilder();
$o->setSicConfig($conf);
$o->build($file);


include_once $file;
$sc = new DarkBlueOctopusServiceContainer();
$sc->get("my_app");
az();
```



Will output:

```html
string(2) "ok"


```



Customizing the generator
=========================

The **Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder** generator
let you customized the created service container classes.

This is done by using second argument of the **build** method: $options.

The $options argument is an array with the following keys:

- **classCreator**: an instance of the **ClassCreator\Creator\ClassCreator**. If not set, the default ClassCreator will be used.

    See [ClassCreator documentation](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/ClassCreator) for more details.

- **profile**: **ClassCreator\Profile\Profile**, the profile (see [class creator documentation profile](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/ClassCreator#profile) for more details). If not set, the default profile will be used.

- **namespace**: null|string, a namespace to use, null by default

- **useStatements**: array, the use statements to use (see class creator documentation examples for exact syntax).

    By default, contains the use statement for the **Octopus\ServiceContainer\BlueOctopusServiceContainer** (light part of the blue octopus)

- **comment**: **ClassCreator\Comment\Comment**, a class comment to use. If not defined, a default class comment will be used.

- **signature**: string, the class signature. If not defined, the default class signature  will be used: ```class DarkBlueOctopusServiceContainer extends BlueOctopusServiceContainer```.






Errors
======


When something goes wrong with the "get" method, the **OctopusServiceErrorException** exception is thrown.


The following code:

```php
$conf = [];
$file = __DIR__ . "/MyServiceContainer.php";
$o = new DarkBlueOctopusServiceContainerBuilder();
$o->setSicConfig($conf);
$o->build($file);


include_once $file;
$sc = new DarkBlueOctopusServiceContainer();
$sc->get("my_company.service1");
```


Will throw an error:

```html
Fatal error: Uncaught Error: Call to undefined method DarkBlueOctopusServiceContainer::my_company_service1() in /path/to/...
```



Related
=======

- [RedOctopusServiceContainer](https://github.com/lingtalfi/Octopus/blob/master/doc/RedOctopusServiceContainer.md)