QuickForm
================
2016-11-25



Quick and dirty form helper class in php.



Table of contents
---------------------

- [README first](#readme-first)
- [Simplest example](#simplest-example)
- [Removing the title](#removing-the-title)
- [Display a header](#display-a-header)
- [Adding constraints](#adding-constraints)
- [Moving constraints messages to the top](#moving-constraints-messages-to-the-top)
- [Adding multiple constraints](#adding-multiple-constraints)
- [Displaying only the first constraint error message](#displaying-only-the-first-constraint-error-message)
- [Using different form types](#using-different-form-types)
- [Using labels](#using-labels)
- [Customizing form messages](#customizing-form-messages)
- [Using default values](#using-default-values)
- [Forcing values with finalValues](#forcing-values-with-finalvalues)
- [Translate validation error messages](#translate-validation-error-messages)
- [Doing something useful with the posted data](#doing-something-useful-with-the-posted-data)
- [Who uses QuickForm](#who-uses-quickform)
- [History Log](#history-log)




README first
---------------


QuickForm is part of the [universe](https://github.com/karayabin/universe-snapshot).

All the examples below assume that quickform.css is properly linked (find it here: link to [quickform.css](https://github.com/lingtalfi/QuickForm/blob/master/styles/quickform.css)).

Also, all examples use the [bigbang](https://github.com/karayabin/universe-snapshot#bigbang) autoloader, but you can use any [PSR-0](http://www.php-fig.org/psr/psr-0/) autoloader.






Simplest example
===============================================
[![form-simplest.png](https://s19.postimg.org/l0tjmg0df/form_simplest.png)](https://postimg.org/image/6hmel178f/)
[![success-msg.png](https://s19.postimg.org/ih2i63277/success_msg.png)](https://postimg.org/image/yfb7w7wf3/)


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
<link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->addControl('first_name')->type('text');
$form->addControl('last_name')->type('text');


$form->play();
```


Removing the title
===============================================
[![no-title.png](https://s19.postimg.org/4v1sdjkkj/no_title.png)](https://postimg.org/image/bli9mz7q7/)


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
//$form->title = null;
$form->addControl('first_name')->type('text');
$form->addControl('last_name')->type('text');


$form->play();
```


Display a header
===============================================
[![header.png](https://s19.postimg.org/vrlrlv3dv/header.png)](https://postimg.org/image/uck6x52an/)


The header is displayed below the title.

It helps adding information about the purpose of the form.



```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->header = "We would like to know more about you";
$form->addControl('first_name')->type('text');
$form->addControl('last_name')->type('text');


$form->play();
```




Adding constraints
===============================================
[![required.png](https://s19.postimg.org/5bmzzz8bn/required.png)](https://postimg.org/image/5bmzzz8bj/)


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->addControl('first_name')->type('text')
    ->addConstraint('required');
$form->addControl('last_name')->type('text');


$form->play();
```







Moving constraints messages to the top
===============================================

[![required-top.png](https://s19.postimg.org/vvazodjhf/required_top.png)](https://postimg.org/image/f7jhlvopr/)


You can choose whether you want to put the constraints error messages at the control level (default), or at the 
top of the form, as done in the example below:


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top'; // top | local (default)
$form->addControl('first_name')->type('text')
    ->addConstraint('required');
$form->addControl('last_name')->type('text');


$form->play();
```




Adding multiple constraints
===============================================
[![multiple-constraints.png](https://s19.postimg.org/zcd1rcijn/multiple_constraints.png)](https://postimg.org/image/69yroiw9r/)



```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top';
$form->addControl('first_name')->type('text')
    ->addConstraint('required')
    ->addConstraint('minChar', 5);
$form->addControl('last_name')->type('text');


$form->play();
```




Displaying only the first constraint error message
===============================================
[![multiple-constraints-first-only.png](https://s19.postimg.org/up6zpkv6r/multiple_constraints_first_only.png)](https://postimg.org/image/jcue7smhr/)



Although a control might have multiple failing constraints, you might want to display only
the first message. The code below does that.


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top';
$form->allowMultipleErrorsPerControl = false;
$form->addControl('first_name')->type('text')
    ->addConstraint('required')
    ->addConstraint('minChar', 5);
$form->addControl('last_name')->type('text');


$form->play();
```





Using different form types
===============================================
[![form-types.png](https://s19.postimg.org/nbw74d0ir/form_types.png)](https://postimg.org/image/gy7413vmn/)

The code below showcases all the available control types as of today. 


```php
<?php


use QuickForm\QuickForm;
use QuickPdo\QuickPdo;

require "bigbang.php";





// required by the selectByRequest form control type
QuickPdo::setConnection("mysql:host=localhost;dbname=oui", 'root', 'root', [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);




?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top';
$form->allowMultipleErrorsPerControl = false;




$form->addControl('first_name')->type('text');
$form->addControl('last_name')->type('text');
$form->addControl('country')->type('selectByRequest', "select id, nom from pays");
$form->addControl('favorite_sport')->type('select', ['judo', 'kendo', 'sudo']);
$form->addControl('birthdate')->type('date3');
$form->addControl('begin_at')->type('date6');
$form->addControl('biography')->type('message');


$form->play();
```




Using labels
===============================================
[![labels.png](https://s19.postimg.org/wfq0r2cpv/labels.png)](https://postimg.org/image/damrhay1r/)



Use the labels array to embellish the labels in your form. 

```php
<?php


use QuickForm\QuickForm;
use QuickPdo\QuickPdo;

require "bigbang.php";





// required by the selectByRequest form control type
QuickPdo::setConnection("mysql:host=localhost;dbname=oui", 'root', 'root', [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);




?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top';
$form->allowMultipleErrorsPerControl = false;
$form->labels = [
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'begin_at' => 'Begin at',
];



$form->addControl('first_name')->type('text');
$form->addControl('last_name')->type('text');
$form->addControl('country')->type('selectByRequest', "select id, nom from pays");
$form->addControl('birthdate')->type('date3');
$form->addControl('begin_at')->type('date6');
$form->addControl('biography')->type('message');


$form->play();
```




Customizing form messages
===============================================


[![customize-messages.png](https://s19.postimg.org/3kzdkr1er/customize_messages.png)](https://postimg.org/image/p7ee1rzz3/)


The QuickForm has its own set of messages.
You can access them via the public messages property.

This will allow you to change, amongst other things, the submit button's text.




```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";



?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top';

$form->messages['submit'] = 'Send';
$form->messages['formHasControlErrors'] = 'Booya, please fix the following errors:';


$form->addControl('first_name')->type('text')->addConstraint('required');
$form->addControl('last_name')->type('text');


$form->play();
```






Using default values
===============================================
[![default-values.png](https://s19.postimg.org/t51nr6msj/default_values.png)](https://postimg.org/image/5e2a92mlb/)


Default values are set when the form is first display.

Posted values (when the user sends the form) override the default values.

There are two ways to specify default values:

- using the form's defaultValues property 
- using the control's value method 



The example below uses the defaultValues property of the form object.

```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";



$form->defaultValues = [
    'first_name' => 'Roger',
    'last_name' => 'Rabbit',
];

$form->addControl('first_name')->type('text')->addConstraint('required');
$form->addControl('last_name')->type('text');




$form->play();
```


The example below uses the value method of the control objects.

```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";




$form->addControl('first_name')->type('text')->addConstraint('required')->value('Roger');
$form->addControl('last_name')->type('text')->value("Rabbit");




$form->play();
```





Forcing values with finalValues
===============================================


Once the form is posted, you still can set the control's value using the finalValues property, as demonstrated
in the example below.

Note that the finalValues are not processed by the treatment function (see formTreatmentFunc).

Here is the life cycle of the value in a control:

- initial value
- $_POST value
- (treatment of the form if any)
- final value
 
 


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";



$form->finalValues = [
    'first_name' => 'Roger',
    'last_name' => 'Rabbit',
];

$form->addControl('first_name')->type('text')->addConstraint('required');
$form->addControl('last_name')->type('text');




$form->play();
```





Translate validation error messages
===============================================
[![translate-constraints.png](https://s19.postimg.org/t5694xc6b/translate_constraints.png)](https://postimg.org/image/cu658lzof/)


QuickForm is multi-language friendly.

Below is an example of how you can translate the constraints errors.


```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->validationTranslateFunc = function($v){
    return 'translate_to_french (' . $v . ')';
};

$form->addControl('first_name')->type('text')->addConstraint('required');
$form->addControl('last_name')->type('text');




$form->play();
```





Doing something useful with the posted data
===============================================
[![on-form-posted.png](https://s19.postimg.org/3twyaoe77/on_form_posted.png)](https://postimg.org/image/4jfqn1eqn/)


You treat the form's posted data using the formTreatmentFunc callback.

It returns a boolean: whether the form's treatment was a success of a failure.

This will display either a green message, or a red message, depending on the return of the callback.

The default success or error message can be overridden using the second argument; msg, which is passed by reference.

Below is an example of what was just discussed.



```php
<?php


use QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->formTreatmentFunc = function(array $formattedValues, &$msg){

    $success = true;
    $msg = "All right";
    a($formattedValues); // a function comes from bigbang script
    return $success;
};

$form->addControl('first_name')->type('text')->addConstraint('required');
$form->addControl('last_name')->type('text');




$form->play();
```




 
Who uses QuickForm
------------------
    
- [nullos admin](https://github.com/lingtalfi/nullos-admin)


 
History Log
------------------
    
- 3.0.0 -- 2016-11-26

    - renamed display method to play 


- 2.0.0 -- 2016-11-26

    - changed ControlFactoryInterface.displayControl's return value
    - added select 

    
- 1.1.0 -- 2016-11-26

    - added header public property

    
- 1.0.0 -- 2016-11-25

    - initial commit





