FormTools
===========
2017-05-28



Some form tools that I use.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/FormTools
```

Or just download it and place it where you want otherwise.


How to
==========


```php
<?php

//--------------------------------------------
// EXAMPLE FOR THE SYNTAX 
//--------------------------------------------
use Ling\FormTools\Validation\OnTheFlyFormValidator;

$key = "Ekom_Front_CreateAccountController_render";
$model = [
    "formAction" => "",
    "formMethod" => "post",
    "nameEmail" => "email",
    "namePass" => "pass",
    "namePass2" => "pass2",
    "nameKey" => "key",
    "nameNewsletter" => "newsletter",
    "valueEmail" => "",
    "valuePass" => "",
    "valuePass2" => "",
    "valueKey" => $key,
    "checkedNewsletter" => "",
    //
    "errorEmail" => "",
    "errorPass" => "",
    "errorPass2" => "",
];


if (array_key_exists($model['nameKey'], $_POST) && $key === $_POST[$model['nameKey']]) {
    $model['valueEmail'] = $_POST[$model['nameEmail']];
    $model['valuePass'] = $_POST[$model['namePass']];
    $model['valuePass2'] = $_POST[$model['namePass2']];
    $model['checkedNewsletter'] = (array_key_exists($model['nameNewsletter'], $_POST)) ? 'checked' : '';


    $validator = OnTheFlyFormValidator::create();
    if (true === $validator->validate([
            'email' => ['required', 'email'],
            'pass' => ['required', "min:6"],
            'pass2' => ['required', 'sameAs:pass'],
        ], $model)
    ) {
        az("form has validated");
    }

}
```





History Log
------------------

- 1.7.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.7.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.7.0 -- 2017-07-22

    - add Rendering and Modeling tools
    
- 1.6.0 -- 2017-07-18

    - add OnTheFlyFormValidatorMessageInterface
    
- 1.5.0 -- 2017-07-17

    - add OnTheFlyFormValidator::initModel method
    
- 1.4.0 -- 2017-07-17

    - add OnTheFlyFormValidator::addBlankErrors
    
- 1.3.0 -- 2017-07-17

    - OnTheFlyFormValidator::validate add exactLength validation rule
    
- 1.2.0 -- 2017-07-17

    - OnTheFlyFormValidator::validate now returns formErrors and _formErrors
    
- 1.1.0 -- 2017-07-17

    - add OnTheFlyFormValidator::wasPosted method
    - add OnTheFlyFormValidator::infuse method
    
- 1.0.0 -- 2017-05-28

    - initial commit