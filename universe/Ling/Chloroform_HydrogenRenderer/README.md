Chloroform_HydrogenRenderer
===========
2019-04-18 -> 2020-08-11



A basic renderer for [Chloroform](https://github.com/lingtalfi/Chloroform).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).

[Chloroform_HydrogenRenderer demo](https://lingtalfi.com/universe/Ling/Chloroform_HydrogenRenderer/prototype_php)


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Chloroform_HydrogenRenderer
```

Or just download it and place it where you want otherwise.






Summary
===========
2019-04-18



* [Chloroform_HydrogenRenderer api](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
* [What is it?](#what-is-it)
    * [Implemented fields](#implemented-fields)
    * [Implemented js validators](#implemented-js-validators)
* [How to use](#how-to-use)
* [Creating other renderers](#creating-other-renderers)
* [Related](#related)
* [History Log](#history-log)





What is it?
============
2019-04-18

![screenshot](https://lingtalfi.com/img/universe/Chloroform_HydrogenRenderer/Chloroform_HydrogenRenderer.png)


This is my first [Chloroform](https://github.com/lingtalfi/Chloroform) renderer attempt.

It basically renders a Chloroform form.



It also provides js validation for free.

The js validation is based on the [Chloroform validators](https://github.com/lingtalfi/Chloroform#the-available-validators).

This means you don't have to type a single line of javascript, the HydrogenRenderer takes care of that for you.  



I created a [css prototype](http://lingtalfi.com/universe/Ling/Chloroform_HydrogenRenderer/prototype) before I implemented the renderer (it's not functional, just pure css design, no js layer either).
It should give you a pretty good idea of how the renderer looks like.






Implemented fields
-------------
2019-04-18


The Hydrogen renderer can render the following fields:

- StringField
- TextField
- NumberField
- HiddenField
- CSRFField
- ColorField
- DateField
- TimeField
- DateTimeField
- SelectField
- CheckboxField
- RadioField
- FileField
- PasswordField


See the [Chloroform available fields](https://github.com/lingtalfi/Chloroform#the-available-fields) for the complete list of fields.


Implemented js validators
-----------
2019-04-18 -> 2020-08-11

The Hydrogen renderer's js layer will handle the following validators:


- IsIntegerValidator
- IsMysqlDateValidator
- IsMysqlDatetimeValidator
- IsNumberValidator
- MinMaxCharValidator
- MinMaxNumberValidator
- MinMaxDateValidator
- MinMaxItemValidator
- MinMaxFileSizeValidator
- FileMimeTypeValidator
- RequiredValidator
- RequiredDateValidator
- PasswordConfirmValidator

See the complete [list of Chloroform validators here](https://github.com/lingtalfi/Chloroform#the-available-validators).





How to use
==============
2019-04-18



You first need to import the assets.
The HydrogenRenderer depends on three assets:

- jquery (you can use a cdn for instance)
- the hydrogen.js file provided with this planet (must be called AFTER jquery)
- the hydrogen.css file provided with this planet 



Once the assets are imported, you instantiate the HydrogenRenderer with some options, and then call the render method.

For more details about the options, see the [HydrogenRenderer class](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer.md) documentation.


```php


// ...
$formArray = $form->toArray(); // $form = your Chloroform instance


// let's import the assets
?>
    <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>
    <script src="/js/hydrogen.js"></script>
    <link rel="stylesheet" href="/css/hydrogen.css">
<?php


// instantiate the renderer
$renderer = new HydrogenRenderer();

// then display the html code
echo $renderer->render($form->toArray()); 
```



And here is a little demo that I made: [chloroform demo](http://lingtalfi.com/universe/Ling/Chloroform_HydrogenRenderer/prototype_php?d).

The exact for this demo is written below.

If you want to use it, don't forget to update the references to the assets.

```php
<?php


use Ling\Chloroform\Field\CheckboxField;
use Ling\Chloroform\Field\ColorField;
use Ling\Chloroform\Field\CSRFField;
use Ling\Chloroform\Field\DateField;
use Ling\Chloroform\Field\DateTimeField;
use Ling\Chloroform\Field\FileField;
use Ling\Chloroform\Field\HiddenField;
use Ling\Chloroform\Field\NumberField;
use Ling\Chloroform\Field\PasswordField;
use Ling\Chloroform\Field\RadioField;
use Ling\Chloroform\Field\SelectField;
use Ling\Chloroform\Field\StringField;
use Ling\Chloroform\Field\TextField;
use Ling\Chloroform\Field\TimeField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Chloroform\FormNotification\SuccessFormNotification;
use Ling\Chloroform\Validator\CSRFValidator;
use Ling\Chloroform\Validator\FileMimeTypeValidator;
use Ling\Chloroform\Validator\MinMaxCharValidator;
use Ling\Chloroform\Validator\MinMaxDateValidator;
use Ling\Chloroform\Validator\MinMaxFileSizeValidator;
use Ling\Chloroform\Validator\MinMaxItemValidator;
use Ling\Chloroform\Validator\MinMaxNumberValidator;
use Ling\Chloroform\Validator\PasswordConfirmValidator;
use Ling\Chloroform\Validator\PasswordValidator;
use Ling\Chloroform\Validator\RequiredDateValidator;
use Ling\Chloroform\Validator\RequiredValidator;
use Ling\Chloroform_HydrogenRenderer\HydrogenRenderer;


//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(StringField::create("First name"), [RequiredValidator::create()]);
$form->addField(TextField::create("Description"), [RequiredValidator::create(), MinMaxCharValidator::create()->setMin(2)]);
$form->addField(NumberField::create("Age"), [RequiredValidator::create(), MinMaxNumberValidator::create()->setMin(0)->setMax(150)]);
$form->addField(HiddenField::create("nathalie_je_t_aime")->setValue("158"));
$form->addField(CSRFField::create("csrf_token"), [CSRFValidator::create()]);
$form->addField(ColorField::create("Background color"));
$form->addField(DateField::create("Birthday"), [MinMaxDateValidator::create()->setMax(date("Y-m-d"))]);
$form->addField(TimeField::create("What time do you go to bed?", [
    "useSecond" => false,
])->setId("bedtime"));
$form->addField(DateTimeField::create("When exactly was the last time you ate a burger at MacDonalds?")
    ->setErrorName("eat time")
    ->setId("eattime"), [RequiredDateValidator::create()]);


$form->addField(SelectField::create("Country")->setItems([
    "france" => "France",
    "germany" => "Germany",
    "italy" => "Italy",
    "japan" => "Japan",
]));


$form->addField(SelectField::create("Animal")->setItems([
    'Dog' => [
        'labrador_retriever' => "Labrador Retriever",
        'bulldog' => "Bulldog",
        'german_shepherd' => "German Shepherd",
    ],
    'Cat' => [
        'persian_cat' => "Persian cat",
        'maine_coon' => "Maine Coon",
        'siamese_cat' => "Siamese cat",
    ],
]));

$form->addField(SelectField::create("Favorite colors", ["multiple" => true,])->setItems([
    "red" => "Red",
    "blue" => "Blue",
    "green" => "Green",
    "yellow" => "Yellow",
]));


$form->addField(CheckboxField::create("Do you like sushis?")->setItems([
    "yes" => "Yes",
]));

$form->addField(CheckboxField::create("Favorite sports")->setItems([
    "judo" => "Judo",
    "karate" => "Karate",
    "basket" => "Basket-ball",
]), [RequiredValidator::create(), MinMaxItemValidator::create()->setMax(2)]);


$form->addField(RadioField::create("Favorite Cameron movie")->setItems([
    "avatar" => "Avatar",
    "alita" => "Alita",
    "alien" => "Alien",
]));


$form->addField(FileField::create("Upload your avatar")->setId("avatar")
    ->setErrorName("avatar")
    ->setHint("Should be an image (jpeg, gif or png)"), [
    MinMaxFileSizeValidator::create()->setMax("2M"),
    FileMimeTypeValidator::create()->setMimeTypes(["image/jpeg", 'image/png', 'image/gif'])
]);
$form->addField(PasswordField::create("Password")
    ->setHint("It should contain at least one letter, one digit, and one special character"), [PasswordValidator::create()
    ->setNbAlpha(3)
    ->setNbDigits(2)
    ->setNbSpecial(1)
]);
$form->addField(PasswordField::create("Confirm the password"), [PasswordConfirmValidator::create()->setOtherFieldId("password")]);


//--------------------------------------------
// Posting the form and validating data
//--------------------------------------------
if (true === $form->isPosted()) {
    if (true === $form->validates()) {
        $form->addNotification(SuccessFormNotification::create("ok"));
        // do something with $postedData;
        $postedData = $form->getPostedData();
    } else {
        $form->addNotification(ErrorFormNotification::create("There was a problem."));
    }
} else {
    $valuesFromDb = []; // get the values from the database if necessary...
    $form->injectValues($valuesFromDb);
}


//--------------------------------------------
// Template part
//--------------------------------------------
$formArray = $form->toArray();


?>
    <link rel="stylesheet" href="/css/pages/universe/Ling/Chloroform_HydrogenRenderer/hydrogen.css">
    <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>
    <script src="/js/pages/universe/Ling/Chloroform_HydrogenRenderer/hydrogen.js"></script>
<?php
$renderer = new HydrogenRenderer([
    "useEnctypeMultiformData" => true,
]);
echo $renderer->render($form->toArray());


```





Creating other renderers
===========
2019-04-18



Now that this hydrogen renderer is created, I can see how much time would be saved by just copy pasting adapting
this renderer instead of re-creating a new renderer from scratch.

This is mainly due to the facts that:

- I created the renderer just after creating the Chloroform class, and so my mind was fully aware of all 
        the implementation details of the Chloroform system. And so the Hydrogen renderer fully embraces
        the Chloroform system as it should.
        
- I believe that more than 90% of the Hydrogen code could be re-used when creating a new renderer.
    For the HydrogenRenderer php class, all the html snippets will need to be changed, but the general organization can
    remain the same. My advice to the new renderer implementor would be: try to keep the logic behind the hydrogen
    renderer and you will be fine (as I said, there are some implementation details that you might miss if you go on your own
    and you're not fully aware of how Chloroform works).
    For the javascript layer, of course everything related to error injection would need to be reimplemented, but that's less
    than 10% of the file, and so you can reuse the validation logic entirely.
    
    
I created the Hydrogen renderer from scratch in three days.
By re-using the Hydrogen renderer as a basis for a new renderer, I might be able to minimize that time to one or two days (just a rough estimation of course,
depends on how complex the renderer is).
  

Note: if you just want a different look for the form, consider creating a new css file (instead of the hydrogen.css file). 
Depending on your css skills, you might get another look and feel quite easily.  




Related
===========
- [Chloroform](https://github.com/lingtalfi/Chloroform), the library to create the form structure
- [Chloroform Helium renderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer), a bootstrap 4 renderer for chloroform
- [Chloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer), the light version of the Chloroform Helium renderer



History Log
=============

- 1.4.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.4.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.5.0 -- 2020-08-11

    - update hydrogen.js, now supports IsMysqlDateValidator and IsMysqlDatetimeValidator
    
- 1.4.0 -- 2020-08-11

    - update hydrogen.js, now supports isIntegerValidator.mode option
    
- 1.3.0 -- 2020-08-11

    - add support for IsIntegerValidator and isNumberValidator
    
- 1.2.3 -- 2019-10-24

    - add link in README.md
    
- 1.2.2 -- 2019-07-26

    - update doc
    
- 1.2.1 -- 2019-07-26

    - fix HydrogenRenderer->printJsHandler typo
    
- 1.2.0 -- 2019-07-26

    - enhance HydrogenRenderer->printJsHandler for standalone call
    
- 1.1.0 -- 2019-07-26

    - add HydrogenRenderer->renderPrintsJsHandler option
    
- 1.0.3 -- 2019-07-25

    - update README.md
    
- 1.0.2 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.1 -- 2019-04-18

    - add demo in the README.md file
    
- 1.0.0 -- 2019-04-18

    - initial commit