FormModel
=============
2017-04-08 --> 2017-04-09




An object to create a form model.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/FormModel
```

Or just download it and place it where you want otherwise.





Let's get started
=====================
The form model created with this object is the form model described in the [form modelization text](https://github.com/lingtalfi/form-modelization).

With the FormModel object, you can create a form like that:

```php
<?php


use Ling\FormModel\Control\InputCheckBoxControl;

use Ling\FormModel\Control\InputFileControl;
use Ling\FormModel\Control\InputRadioControl;
use Ling\FormModel\Control\InputSubmitControl;
use Ling\FormModel\Control\InputTextControl;
use Ling\FormModel\Control\SelectControl;
use Ling\FormModel\Control\TextAreaControl;
use Ling\FormModel\FormModel;
use Ling\FormModel\Group\Group;


$formConf = FormModel::create()
    ->setFormErrorPosition('central')
    ->setOrder([
        'groupTwo',
        'groupOne',
        'submit',
    ])
    ->addGroup("groupOne", Group::create()
        ->label("About you")
        ->children([
            'name',
            'age',
        ])
    )
    ->addGroup("groupTwo", Group::create()
        ->label("About your favorite sports")
        ->children([
            'favorite_sports',
            'favorite_color',
            'country',
            'groupThree',
        ])
    )
    ->addGroup("groupThree", Group::create()
        ->label("Some other fields")
        ->children([
            'towns',
            'message',
            'avatar',
        ])
    )
    ->addControl("name", InputTextControl::create()
        ->placeholder("Type your name")
        ->addError("The name must contain at least 5 chars")
        ->addError("THe name must not be empty")
        ->hint("Your name is used to identify you")
        ->label("Name")
        ->name("name")
    )
    ->addControl("age", InputTextControl::create()
        ->value(38)
        ->label("Age")
        ->name("age")
    )
    ->addControl("favorite_sports", InputCheckBoxControl::create()
        ->setItems([
            'karate' => "Karaté",
            'judo' => "Judo",
            'kungfu' => "Kung Fu",
        ])
        ->label("What's your favorite sport?")
        ->name("favorite_sports[]")
        ->value(["karate", "judo"])
    )
    ->addControl("favorite_color", InputRadioControl::create()
        ->setItems([
            'red' => "Red",
            'blue' => "Blue",
            'green' => "Green",
        ])
        ->label("What's your favorite color?")
        ->name("favorite_color")
        ->value("red")
    )
    ->addControl("country", SelectControl::create()
        ->value("spain")
        ->setItems([
            'france' => "France",
            'spain' => "Spain",
            'italy' => "Italy",
        ])
        ->label("Country")
        ->name("country")
    )
    ->addControl("towns", SelectControl::create()
        ->multiple()
        ->setItems([
            'chartres' => "Chartres",
            'tours' => "Tours",
            'orleans' => "Orléans",
        ])
        ->label("Towns you've lived in")
        ->name("towns[]")
        ->value(["chartres", "tours"])
    )
    ->addControl("message", TextAreaControl::create()
        ->label("What's your message")
        ->name("message")
        ->value("Hello")
    )
    ->addControl("avatar", InputFileControl::create()
        ->label("Avatar")
        ->name("avatar")
    )
    ->addControl("submit", InputSubmitControl::create()
        ->name("form_posted")
        ->addHtmlAttribute("value", "Send")
    )
    ->getArray();

```


And this is the equivalent array that it produces:


```php
$formConf = [
    'form' => [
        'htmlAttributes' => [
            'action' => "",
            'method' => "POST",
        ],
        "formErrorPosition" => "control",
        "displayFirstErrorOnly" => true,
    ],
    'order' => [
        'groupTwo',
        'groupOne',
        'submit',
    ],
    'groups' => [
        'groupOne' => [
            'label' => "About you",
            'children' => [
                'name',
                'age',
            ],
        ],
        'groupTwo' => [
            'label' => "About your favorite sports",
            'children' => [
                'favorite_sports',
                'favorite_color',
                'country',
                'groupThree',
            ],
        ],
        'groupThree' => [
            'label' => "Some other fields",
            'children' => [
                'towns',
                'message',
                'avatar',
            ],
        ],
    ],
    'controls' => [
        "name" => [
            'label' => 'Name',
            'type' => 'input',
            'htmlAttributes' => [
                'name' => 'name',
                'type' => 'text',
                'value' => '',
                'placeholder' => 'Type your name',
            ],
            'hint' => 'Your name is used to identify you',
            /**
             *
             * A setting at the widget level determines whether or not only the first error message should be
             * displayed, or all error messages.
             * Also, there will be some "trick" to grab all error messages and display them in a centralized place
             * rather than on a per control basis, also depending on a widget level setting.
             *
             */
            'errors' => [
                "The name must contain at least 5 chars",
                "The name must not be empty",
            ],
        ],
        "age" => [
            'type' => 'input',
            'label' => 'Age',
            'htmlAttributes' => [
                'name' => 'age',
                'type' => 'text',
                'value' => '38',
            ],
            'errors' => [],
        ],
        "favorite_sports" => [
            'type' => 'input',
            'labelLeftSide' => false,
            'label' => "What's your favorite sport?",
            'htmlAttributes' => [
                'name' => 'favorite_sports[]',
                'type' => 'checkbox',
            ],
            'value' => ["karate", "judo"],
            'items' => [
                'karate' => "Karaté",
                'judo' => "Judo",
                'kungfu' => "Kung Fu",
            ],
            'errors' => [],
        ],
        "favorite_color" => [
            'type' => 'input',
            'labelLeftSide' => false,
            'label' => "What's your favorite color?",
            'htmlAttributes' => [
                'name' => 'favorite_color',
                'type' => 'radio',
            ],
            'value' => "red",
            'items' => [
                'red' => "Red",
                'blue' => "Blue",
                'green' => "Green",
            ],
            'errors' => [],
        ],
        "country" => [
            'type' => 'select',
            'label' => "Country",
            'htmlAttributes' => [
                "name" => "country",
            ],
            'value' => "spain",
            'items' => [
                'france' => "France",
                'spain' => "Spain",
                'italy' => "Italy",
            ],
            'errors' => [],
        ],
        "towns" => [
            'type' => 'select',
            'label' => "Towns you've lived in",
            'htmlAttributes' => [
                "name" => "towns",
                "multiple",
            ],
            'value' => ["chartres", "tours"],
            'items' => [
                'chartres' => "Chartres",
                'tours' => "Tours",
                'orleans' => "Orléans",
            ],
            'errors' => [],
        ],
        "message" => [
            'type' => 'textarea',
            'label' => "What's your message",
            'htmlAttributes' => [
                "name" => "message",
            ],
            'value' => "Hello",
            'errors' => [],
        ],
        "avatar" => [
            'type' => 'input',
            'label' => 'Avatar',
            'htmlAttributes' => [
                'name' => 'avatar',
                'type' => 'file',
            ],
            'errors' => [],
        ],
        "submit" => [
            'type' => 'input',
            'htmlAttributes' => [
                'name' => 'form_posted',
                'type' => 'submit',
                'value' => 'Send',
            ],
        ],
    ],
];

```


So, by using the FormModel, you save about one third of typing.

Nonetheless, that's not the main reason why one would need the FormModel.

FormModel handles two extra things for you:

- data persistency
- data validation


Those two things are maybe easier to handle with objects than with just a describing array.



Data persistency
====================
Data persistency is when you submit the form, and the values re-appear in the field (this often
happens when you had an error in your form).

This saves the user the time to re-fill the form from scratch and is a must have in forms.

With the FormModel object, this mechanism is handled with one line:


```php
$formModel->inject($_POST);
```



Data validation
=================

The second bonus that you get for free by using the FormModel instead of the raw array is easy to 
use data validation methods.

To use the validation with the FormModel, you first create a validator, like this.

```php
$validator = ControlsValidator::create()
    ->setTests("message", "Message", RequiredControlTest::create());
```

Or like this (you can bind multiple tests for a given control)

```php
$validator = ControlsValidator::create()
    ->setTests("message", "Message", [
        RequiredControlTest::create(),
        MinCharControlTest::create()->min(4),
    ]);
```


Then, you just need to bind your validator instance to the FormModel,
and call the validate method when you want, like this:


```php
$formModel->setValidator($validator);
a($formModel->validate($values));
```

That's it.

BUT, please do not confound control validation with business validation.


Here is how validation should occur:

[![formmodel-validation.jpg](http://lingtalfi.com/img/universe/FormModel/formmodel-validation.jpg)](http://lingtalfi.com/img/universe/FormModel/formmodel-validation.jpg)

As you can see, it's a two steps proces: first the validation of the form controls (which I consider the low level
of validation), and then, the validation at the business level (which I consider the high level of validation).





Conclusion
===================

So, that's it, you can now inject values into your form model, or even validate it.






History Log
------------------

- 1.5.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.5.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.5.0 -- 2017-05-09

    - add HiddenInputControl
    
- 1.4.0 -- 2017-05-07

    - add FormModel.submitButtonBar
    
- 1.3.0 -- 2017-04-28

    - FormModel.addFormAttribute now accepts standalone attributes
    
- 1.2.0 -- 2017-04-21

    - add NotInjectableControlInterface
    
- 1.1.0 -- 2017-04-09

    - add InputPasswordControl
    
- 1.0.0 -- 2017-04-08

    - initial commit
