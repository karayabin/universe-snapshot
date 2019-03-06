QuickForm
================
2016-11-25



Quick and dirty form helper class in php.


QuickForm is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/QuickForm
```




Table of contents
---------------------

- [README first](#readme-first)
- [Simplest example](#simplest-example)
- [Removing the title](#removing-the-title)
- [Display a header](#display-a-header)
- [Using fieldsets](#using-fieldsets)
- [Adding placeholders](#adding-placeholders)
- [Adding constraints](#adding-constraints)
- [Adding enctype=multipart/form-data](#adding-enctypemultipartform-data)
- [Moving constraints messages to the top](#moving-constraints-messages-to-the-top)
- [Adding multiple constraints](#adding-multiple-constraints)
- [Displaying only the first constraint error message](#displaying-only-the-first-constraint-error-message)
- [Using different form types](#using-different-form-types)
- [Using MagicControlFactory types](#using-magiccontrolfactory-types)
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
[![form-simplest.png](http://lingtalfi.com/img/universe/QuickForm/form-simplest.png)](http://lingtalfi.com/img/universe/QuickForm/form-simplest.png)
[![success-msg.png](http://lingtalfi.com/img/universe/QuickForm/success-msg.png)](http://lingtalfi.com/img/universe/QuickForm/success-msg.png)


```php
<?php


use Ling\QuickForm\QuickForm;

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
[![no-title.png](http://lingtalfi.com/img/universe/QuickForm/no-title.png)](http://lingtalfi.com/img/universe/QuickForm/no-title.png)


```php
<?php


use Ling\QuickForm\QuickForm;

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
[![header.png](http://lingtalfi.com/img/universe/QuickForm/header.png)](http://lingtalfi.com/img/universe/QuickForm/header.png)


The header is displayed below the title.

It helps adding information about the purpose of the form.



```php
<?php


use Ling\QuickForm\QuickForm;

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



Using fieldsets
===============================================
[![fieldsets.png](http://lingtalfi.com/img/universe/QuickForm/fieldsets.png)](http://lingtalfi.com/img/universe/QuickForm/fieldsets.png)


Use the fieldsets to organize your controls in sections.

QuickForm displays the controls in the order which they were registered.

However, if the control belongs to a fieldset, then the whole fieldset is diplayed (in the order
defined during the call to the addFieldset method).



```php
<?php


use Ling\QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->addControl('first_name')->type('text');
$form->addControl('last_name')->type('text');
$form->addControl('pet_first_name')->type('text');
$form->addControl('pet_last_name')->type('text');


$form->addFieldset('Your pet info', ['pet_first_name', 'pet_last_name']);

$form->play();
```



Adding placeholders
===============================================
[![placeholders.png](http://lingtalfi.com/img/universe/QuickForm/placeholders.png)](http://lingtalfi.com/img/universe/QuickForm/placeholders.png)


Controls of type text accept placeholders.

The example below show how to create such placeholders.


```php
<?php


use Ling\QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->addControl('first_name')->type('text', 'Roger');
$form->addControl('last_name')->type('text', 'Rabbit');


$form->play();
```




Adding constraints
===============================================
[![required.png](http://lingtalfi.com/img/universe/QuickForm/required.png)](http://lingtalfi.com/img/universe/QuickForm/required.png)


```php
<?php


use Ling\QuickForm\QuickForm;

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



Adding enctype=multipart/form-data
===============================================


```php
<?php


use Ling\QuickForm\QuickForm;


require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->multipart = true; // we use an input of type file
$form->title = "Form";
$form->addControl('photos')->type('file', [
    'accept' => 'image/*',
    'multiple', // accept multiple images
]);


$form->play();
```







Moving constraints messages to the top
===============================================

[![required-top.png](http://lingtalfi.com/img/universe/QuickForm/required-top.png)](http://lingtalfi.com/img/universe/QuickForm/required-top.png)


You can choose whether you want to put the constraints error messages at the control level (default), or at the 
top of the form, or even at the bottom of the form. See the example below:


```php
<?php


use Ling\QuickForm\QuickForm;

require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->title = "Form";
$form->controlErrorLocation = 'top'; // top | local (default) | bottom
$form->addControl('first_name')->type('text')
    ->addConstraint('required');
$form->addControl('last_name')->type('text');


$form->play();
```




Adding multiple constraints
===============================================
[![multiple-constraints.png](http://lingtalfi.com/img/universe/QuickForm/multiple-constraints.png)](http://lingtalfi.com/img/universe/QuickForm/multiple-constraints.png)



```php
<?php


use Ling\QuickForm\QuickForm;

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
[![multiple-constraints-first-only.png](http://lingtalfi.com/img/universe/QuickForm/multiple-constraints-first-only.png)](http://lingtalfi.com/img/universe/QuickForm/multiple-constraints-first-only.png)



Although a control might have multiple failing constraints, you might want to display only
the first message. The code below does that.


```php
<?php


use Ling\QuickForm\QuickForm;

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
[![types.png](http://lingtalfi.com/img/universe/QuickForm/types.png)](http://lingtalfi.com/img/universe/QuickForm/types.png)


The code below showcases all the available control types as of today. 


```php
<?php


use Ling\QuickForm\QuickForm;
use Ling\QuickPdo\QuickPdo;

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
$form->multipart = true; // we use an input of type file
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
$form->addControl('favorite_towns')->type('selectMultiple', ['Paris', 'New-York', 'London', 'Beijing']);
$form->addControl('options')->type('checkboxList', [
    'option1' => "Option 1",
    'option2' => "Option 2",
    'option3' => "Option 3",
])->addConstraint('minChecked', 1);
$form->addControl('favorite_meal')->type('radioList', [
    'pizza' => "Pizza",
    'bacon' => "Bacon",
    'ice_cream' => "Ice cream",
])->value('pizza');
$form->addControl('photos')->type('file', [
    'accept' => 'image/*',
    'multiple', // accept multiple images
]);
$form->addControl("current_country")->type('select', [
    'Asia' => [
        'china' => 'china',
        'japan ' => 'japan',
    ],
    'Europe' => [
        'france' => 'france',
        'germany' => 'germany',
    ],
], ['size' => 6]);
$form->addControl("newsletter")->type("checkbox", "Subscribe to the newsletter");

$form->play();
```





Using MagicControlFactory types
===============================================
[![magic.png](http://lingtalfi.com/img/universe/QuickForm/magic.png)](http://lingtalfi.com/img/universe/QuickForm/magic.png)


The code below shows how to use the MagicControlFactory factory, which provides javascript enhanced controls.


```php
<?php


use Ling\QuickForm\ControlFactory\MagicControlFactory;
use Ling\QuickForm\QuickForm;
use Ling\QuickPdo\QuickPdo;


/**
 * Show case of the MagicControlFactory types
 */
require "bigbang.php";


?>
    <link rel="stylesheet" href="quickform.css">
<?php
$form = new QuickForm();
$form->addControlFactory(MagicControlFactory::create());
$form->title = "Form with MagicControlFactory";

$form->addControl('options')->type('checkboxList', [
    'option1' => "Option 1",
    'option2' => "Option 2",
    'option3' => "Option 3",
])->addConstraint('minChecked', 1);
$form->addControl('check_all')->type("checkUncheckAll", "options", "Check all", "Uncheck all")->label("");
$form->addControl('numberList')->type("multipleInput")->label("List of numbers");

$form->play();
```





Using labels
===============================================
[![labels.png](http://lingtalfi.com/img/universe/QuickForm/labels.png)](http://lingtalfi.com/img/universe/QuickForm/labels.png)



Use the labels array to embellish the labels in your form. 

```php
<?php


use Ling\QuickForm\QuickForm;
use Ling\QuickPdo\QuickPdo;

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


[![customize-messages.png](http://lingtalfi.com/img/universe/QuickForm/customize-messages.png)](http://lingtalfi.com/img/universe/QuickForm/customize-messages.png)


The QuickForm has its own set of messages.
You can access them via the public messages property.

This will allow you to change, amongst other things, the submit button's text.




```php
<?php


use Ling\QuickForm\QuickForm;

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
[![default-values.png](http://lingtalfi.com/img/universe/QuickForm/default-values.png)](http://lingtalfi.com/img/universe/QuickForm/default-values.png)


Default values are set when the form is first display.

Posted values (when the user sends the form) override the default values.

There are two ways to specify default values:

- using the form's defaultValues property 
- using the control's value method 



The example below uses the defaultValues property of the form object.

```php
<?php


use Ling\QuickForm\QuickForm;

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


use Ling\QuickForm\QuickForm;

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


use Ling\QuickForm\QuickForm;

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
[![translate-constraints.png](http://lingtalfi.com/img/universe/QuickForm/translate-constraints.png)](http://lingtalfi.com/img/universe/QuickForm/translate-constraints.png)


QuickForm is multi-language friendly.

Below is an example of how you can translate the constraints errors.


```php
<?php


use Ling\QuickForm\QuickForm;

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
[![on-form-posted.png](http://lingtalfi.com/img/universe/QuickForm/on-form-posted.png)](http://lingtalfi.com/img/universe/QuickForm/on-form-posted.png)


You treat the form's posted data using the formTreatmentFunc callback.

It returns a boolean: whether the form's treatment was a success of a failure.

This will display either a green message, or a red message, depending on the return of the callback.

The default success or error message can be overridden using the second argument; msg, which is passed by reference.

Below is an example of what was just discussed.



```php
<?php


use Ling\QuickForm\QuickForm;

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


 
Dependencies
-----------------
- [Bat 1.32](https://github.com/lingtalfi/Bat) 
- [QuickPdo 1.21.0](https://github.com/lingtalfi/QuickPdo) 
 
 
 
History Log
------------------


- 4.6.1 -- 2017-03-02

    - LingControlFactory fix date6 parent bug
    
- 4.6.0 -- 2017-03-02

    - LingControlFactory add first option to selectByRequest

- 4.5.0 -- 2017-03-02

    - LingControlFactory add nullable to date6
    
- 4.4.0 -- 2016-12-24

    - MagicControlFactory add multipleInput

- 4.3.0 -- 2016-12-24

    - LingControlFactory.text, now has focus facility
    
- 4.2.0 -- 2016-12-22

    - LingControlFactory.message, now uses htmlspecialchars 
    
- 4.1.0 -- 2016-12-22

    - add QuickFormValidator.regex constraint 

- 4.0.0 -- 2016-12-22

    - add ControlFactoryInterface.prepareControl
    
- 3.21.0 -- 2016-12-22

    - add html args to LingControlFactory.message
    
- 3.20.0 -- 2016-12-21

    - add inertSelect to inertFactory

- 3.19.0 -- 2016-12-21

    - add hint to controls
    
    
- 3.18.0 -- 2016-12-07

    - input of type text now accepts any html attribute
    
    
- 3.17.0 -- 2016-12-07

    - validationTranslateFunc now accepts the name of the control as the second parameter
    
- 3.16.0 -- 2016-12-07

    - controlErrorLocation can now be bottom too
    
    
- 3.15.0 -- 2016-12-07

    - add password type
    
- 3.14.1 -- 2016-12-05

    - fix checkbox boolean control value
    

- 3.14.0 -- 2016-12-05

    - add checkbox boolean control 
    
- 3.13.0 -- 2016-12-03

    - The form now returns success and error messages when the returned msg is null

- 3.12.0 -- 2016-12-03

    - add isFake method to controls so that they don't waste the formattedValues array
    
    
- 3.11.0 -- 2016-12-03

    - add MagicControlFactory with checkUncheckAll type
    - add InertControlFactory
    - add cssId on all control bundles
    - add QuickForm::getControlCssId
    
    
- 3.10.0 -- 2016-12-01

    - select type now handles optgroup
    
- 3.9.0 -- 2016-12-01

    - every added control now returns a value (null if not set) so that they are seen by the validation system 
    - handling submit process now handles $_FILES so that they also can be validated with constraints
    
- 3.8.0 -- 2016-12-01

    - add file type
    - add multipart property for enctype=multipart/form-data
    
- 3.7.0 -- 2016-12-01

    - add radioList type
    
- 3.6.1 -- 2016-11-29

    - fix bug: QuickForm->defaultValues was overriding the posted values
    
- 3.6.0 -- 2016-11-29

    - add minChecked constraint in QuickFormValidator
    
- 3.5.0 -- 2016-11-29

    - add checkboxList type
    
- 3.4.2 -- 2016-11-27

    - fix LingControlFactory $canHandle always returns true
    
- 3.4.1 -- 2016-11-27

    - fix undefined index bug for QuickForm line 109
    
- 3.4.0 -- 2016-11-26

    - added selectMultiple control type
    
- 3.3.0 -- 2016-11-26

    - add displayNothing property
    
    
- 3.2.0 -- 2016-11-26

    - add placeholders


- 3.1.1 -- 2016-11-26

    - fix fieldsets

    
- 3.1.0 -- 2016-11-26

    - added fieldsets 
    
- 3.0.0 -- 2016-11-26

    - renamed display method to play 


- 2.0.0 -- 2016-11-26

    - changed ControlFactoryInterface.displayControl's return value
    - added select 

    
- 1.1.0 -- 2016-11-26

    - added header public property

    
- 1.0.0 -- 2016-11-25

    - initial commit





