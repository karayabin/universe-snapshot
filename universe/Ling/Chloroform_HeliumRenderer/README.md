Chloroform_HeliumRenderer
===========
2019-07-26 -> 2020-03-11



A bootstrap 4 renderer for [Chloroform](https://github.com/lingtalfi/Chloroform).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).







Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Chloroform_HeliumRenderer
```

Or just download it and place it where you want otherwise.






Summary
===========
* [Chloroform_HeliumRenderer api](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
* [What is it?](#what-is-it)
    * [Implemented fields](#implemented-fields)
    * [Implemented js validators](#implemented-js-validators)
* [How to use](#how-to-use)
* [Related](#related)
* [History Log](#history-log)





What is it?
============

[Chloroform Helium demo here](https://lingtalfi.com/universe/Ling/Chloroform_HeliumRenderer/demo).

Image 1
![helium renderer](https://lingtalfi.com/img/universe/Chloroform_HeliumRenderer/Chloroform_HeliumRenderer.png)


Image 2
![helium renderer with errors](https://lingtalfi.com/img/universe/Chloroform_HeliumRenderer/Chloroform_HeliumRenderer_with_errors.png)


This is my second [Chloroform](https://github.com/lingtalfi/Chloroform) renderer attempt.

It basically renders a Chloroform form, using bootstrap 4 framework.



It also provides js validation for free.

The js validation is based on the [Chloroform validators](https://github.com/lingtalfi/Chloroform#the-available-validators).

This means you don't have to type a single line of javascript, the HeliumRenderer takes care of that for you.



Quick note about validation
---------

Note: I found the bootstrap form validation class confusing to use, so I recreated them, inspired by them.

Basically, the form has the helium class.
When the form is submitted, it gets the **helium-was-validated** class.

Error messages are contained in elements with class **.helium-invalid-feedback**. 
The **.helium-invalid-feedback** is not displayed unless the form has the **helium-was-validated** class,
in which case it's displayed in red color.

Similarly, **form-control** elements receive the **helium-is-invalid** class if they hold an error (and again
this class takes effect only if the form has class **helium-was-validated**).


   




Implemented fields
-------------

The Helium renderer can render the following fields:

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
- DecorativeField


See the [Chloroform available fields](https://github.com/lingtalfi/Chloroform#the-available-fields) for the complete list of fields.


Implemented js validators
-----------

The Helium renderer's js layer will handle the following validators:


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


You first need to import the assets.
The HeliumRenderer depends on the following assets:

- bootstrap 4 (you can use a cdn for instance)
- jquery (you can use a cdn for instance)
- the helium.js file provided with this planet (must be called AFTER jquery)
- the helium.css file provided with this planet 



Once the assets are imported, you instantiate the HeliumRenderer with some options, and then call the render method.

For more details about the options, see the [HeliumRenderer class](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer.md) documentation.


Below is a full working example:


```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Bootstrap Theme</title>
</head>

<body>

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
use Ling\Chloroform_HeliumRenderer\HeliumRenderer;



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
<link rel="stylesheet" href="libs/universe/Ling/Chloroform_HeliumRenderer/helium.css">


<script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="libs/universe/Ling/Chloroform_HeliumRenderer/helium.js"></script>


<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>HeliumRenderer: Bootstrap4 form</h5>
                </div>
                <div class="card-body">

                    <?php
                    $renderer = new HeliumRenderer([
                        "useEnctypeMultiformData" => true,
                        "renderPrintsJsHandler" => false,
                    ]);
                    echo $renderer->render($form->toArray());


                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<?php  $renderer->printJsHandler(); ?>


</body>

</html>


```



Related
---------
- [Chloroform](https://github.com/lingtalfi/Chloroform), the library to create the form structure
- [Chloroform Hydrogen renderer](https://github.com/lingtalfi/Chloroform_HydrogenRenderer), another renderer for chloroform
- [Chloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer), the light version of the Chloroform Helium renderer



History Log
=============

- 1.15.0 -- 2020-03-11

    - update helium.js to ensure that the form submit event handler is bound first
    
- 1.14.2 -- 2020-02-27

    - fix HeliumRenderer->printJsHandler assuming that jquery is loaded right away
    
- 1.14.1 -- 2020-02-27

    - fix HeliumRenderer->printDateTimeField not having a default value for useSecond property
    
- 1.14.0 -- 2020-01-09

    - update HeliumRenderer->printCustomScripts, is now empty
    
- 1.13.2 -- 2019-12-13

    - update HeliumRenderer->__construct, now accepts the cssId option
    
- 1.13.1 -- 2019-12-13

    - update HeliumRenderer->printCustomScripts, is now public
    
- 1.13.0 -- 2019-12-13

    - add HeliumRenderer->printCustomScripts
    
- 1.12.0 -- 2019-12-09

    - update HeliumRenderer->printCheckboxField, now accepts htmlAttr property
    
- 1.11.0 -- 2019-12-06

    - update HeliumRenderer, now can handle chloroform.cssId property
    
- 1.10.0 -- 2019-12-06

    - update HeliumRenderer, now can handle chloroform.jsCode property
    
- 1.9.0 -- 2019-12-06

    - add HeliumRenderer->printDecorativeField

- 1.8.0 -- 2019-12-04

    - update HeliumRenderer->printSelectField, now handles arrays
    
- 1.7.0 -- 2019-11-25

    - update HeliumRenderer->printFormContent, now can handle basic iframe-signal property
    
- 1.6.1 -- 2019-11-18

    - fix HeliumRenderer->printHiddenField, not printing the css id like the input field
    
- 1.6.0 -- 2019-11-18

    - update HeliumRenderer->printSelectField, now converts all keys in strings
    
- 1.5.0 -- 2019-11-18

    - update HeliumRenderer, now input accepts icon option (using bootstrap input groups)
    
- 1.4.1 -- 2019-10-24

    - add link in README.md
    
- 1.4.0 -- 2019-10-17

    - add HeliumRenderer->printField method
    
- 1.3.0 -- 2019-10-16

    - updating css location so that it imports automatically when the planet is imported (https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md).
    
- 1.2.0 -- 2019-07-30

    - update css, rendering file looks a bit better now

- 1.1.0 -- 2019-07-30

    - add prepare, printFormTagOpening, printFormTagClosing and printFormContent methods
    - move renderPrintsJsHandler option to printJsHandler option
    - add printSubmitButton and printFormTag options
    
    
- 1.0.1 -- 2019-07-26

    - update doc
    
- 1.0.0 -- 2019-07-26

    - initial commit