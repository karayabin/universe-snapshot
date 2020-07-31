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

