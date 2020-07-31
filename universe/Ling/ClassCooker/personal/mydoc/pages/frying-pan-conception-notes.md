FryingPan conception notes
==================
2020-07-24




Summary
---------

* [Summary](#summary)
* [Why the need of a frying pan?](#why-the-need-of-a-frying-pan)
* [Some special ingredients](#some-special-ingredients)
 * [The ConstructorVariableInitializationIngredient ingredient](#the-constructorvariableinitializationingredient-ingredient)
* [The basic constructor](#the-basic-constructor)
* [A concrete snippet](#a-concrete-snippet)





Why the need of a frying pan?
---------
2020-07-24


When adding new things (methods, properties, etc...) to an existing class, I observed that I always used the same pattern:

- if the thing is not added, then add it and send to the info log: "adding the thing ABC"
- else (if the thing is already there), then send to the info log: "the thing ABC is already added"


Well, the frying pan's goal is to encapsulate that condition, so that the code gets cleaner and basically looks like this:


```pseudo

pan = new FryingPan
pan.addIngredient ( MethodIngredient::create().setName(myMethodABC)  )
pan.cook

```


So, I suppose the pseudo-code snippet above just explains it all, in terms of documentation, at least for me it does.
So, enjoy...





Some special ingredients
----------
2020-07-24


All ingredients encapsulate the basic if/else condition described previously.

However, some ingredients have an extra behaviour.


### The ConstructorVariableInitializationIngredient ingredient
2020-07-24

For instance the **ConstructorVariableInitializationIngredient** will add a **basic constructor** method, if necessary, to be able
to add the constructor variable initialization into it.

See more about the **basic constructor** in the dedicated section in this document.



The basic constructor
-----------
2020-07-24


A **basic constructor** is a **__construct** method with no arguments.

As a normal constructor, it will call the parent's constructor if there is a parent, but again the call will be done without any arguments (i.e. it's assumed the parent also uses a basic constructor).

Note that if your class extends a non **basic constructor** (for instance if the parent class doesn't have a constructor at all, or if the parent class 
has a constructor with arguments), then you don't want to add a **basic constructor** in your class, because it's not adapted to your needs.


The **basic constructor** is a simple concept which works in a certain context, and not in some others.

I personally try to never add arguments to my constructors, hence I tend to only deal with **basic constructors**, but that's just me (I believe
it's a little more flexible than having constructor with arguments).

 




A concrete snippet
-----------
2020-07-24


Here is a snippet to get you started.


```php
<?php


use Ling\ClassCooker\FryingPan\FryingPan;
use Ling\ClassCooker\FryingPan\Ingredient\BasicConstructorIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\BasicConstructorVariableInitIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\PropertyIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\UseStatementIngredient;

require_once "app.init.inc.php"; // using the light framework, your mileage may vary


//--------------------------------------------
// THIS SNIPPET DEMONSTRATES THE DIFFERENT INGREDIENTS, AND HOW TO USE THEM
//--------------------------------------------


$f = __DIR__ . "/../universe/Ling/Light_Train/Service/LightTrainService.php";


$pan = new FryingPan();
$pan->setFile($f);
$pan->setOptions([
    /**
     * $msgType can be one of: add, skip, error.
     */
    'loggerCallable' => function (string $msg, string $msgType) {

        a("logging $msgType: $msg.");
    },
]);


$pan->addIngredient(PropertyIngredient::create()->setValue("container", [
    'template' => '
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;
    
',
]));

$pan->addIngredient(PropertyIngredient::create()->setValue("name", [
    'template' => '
    /**
     * This property holds the name of the dog.
     * @var string
     */
    protected $name;
    
',
    'beforeProperty' => 'container',
]));

$pan->addIngredient(UseStatementIngredient::create()->setValue("Ling\Light\ServiceContainer\LightServiceContainerInterface"));


$pan->addIngredient(MethodIngredient::create()->setValue("sayHello", [
    'template' => '
    /**
     * Prints a hello on the screen.
     */
    public function sayHello()
    {
        echo "Hello";
    }
    
',
]));


$pan->addIngredient(MethodIngredient::create()->setValue("sayBye", [
    'template' => '
    /**
     * Prints a bye on the screen.
     */
    public function sayBye()
    {
        echo "Bye";
    }
    
',
    "beforeMethod" => 'sayHello',
]));


$pan->addIngredient(BasicConstructorIngredient::create());
$pan->addIngredient(BasicConstructorVariableInitIngredient::create()->setValue('name', [
    'template' => str_repeat(' ', 8) . '$this->name = "michel";        
', // don't forget the carriage return, which is generally desirable
]));


$pan->cook();


```




