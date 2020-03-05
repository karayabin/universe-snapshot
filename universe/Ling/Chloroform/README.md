Chloroform
===========
2019-04-12 -> 2020-02-21



Another form library for php.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Chloroform
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use](#how-to-use)
    - [Example #1: the simplest form](#example-1-the-simplest-form)
    - [Example #2: a simple form with custom validation](#example-2-a-simple-form-with-custom-validation)
    - [Example #3: a simple form with validation](#example-3-a-simple-form-with-validation)
    - [Example #4: Changing the validation error message](#example-4-changing-the-validation-error-message)
    - [Example #5: The file field](#example-5-the-file-field)
- [The available fields](#the-available-fields)    
- [The available validators](#the-available-validators)    
- [Rendering the form](#rendering-the-form)    
- Pages
    - [Chloroform diary](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-diary.md)
    - [Chloroform discussion](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md)
    - [Chloroform array](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-array.md)





How to use
========



Latest example
--------------
2019-10-22


This is how you should use the chloroform.


```php
//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(StringField::create("First name"));





//--------------------------------------------
// Posting the form and validating data
//--------------------------------------------
if (true === $form->isPosted()) {
    if (true === $form->validates()) {

        // gets the data
        $data = $form->getVeryImportantData();


        // do some more checking here if necessary


        // eventually add a valid notification when you think it's ok
        $form->addNotification(SuccessFormNotification::create("ok"));

        // get the data in its final form
        $form->executeDataTransformers($data);


        // now do something with $data (i.e. update database, send email, ...)
        a($data);


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
a($formArray);
?>
<form method="post" action="">
    <label>
        First name
        <input type="text" name="first_name"/>
    </label>

    <input type="submit" value="Submit"/>
    <?php ChloroformRendererHelper::printsFormIdKeyControl($formArray); ?>
</form>


```



If I post the form above (without filling anything), I obtain the following:


```html 
// a($data)
array(1) {
  ["first_name"] => string(0) ""
}

// a($formArray)
array(8) {
  ["isPosted"] => bool(true)
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(7) "success"
      ["message"] => string(2) "ok"
    }
  }
  ["fields"] => array(2) {
    ["chloroform_hidden_key"] => array(9) {
      ["value"] => string(14) "chloroform_one"
      ["id"] => string(21) "chloroform_hidden_key"
      ["label"] => NULL
      ["hint"] => NULL
      ["errorName"] => string(21) "chloroform hidden key"
      ["htmlName"] => string(21) "chloroform_hidden_key"
      ["errors"] => array(0) {
      }
      ["className"] => string(33) "Ling\Chloroform\Field\HiddenField"
      ["validators"] => array(0) {
      }
    }
    ["first_name"] => array(9) {
      ["label"] => string(10) "First name"
      ["id"] => string(10) "first_name"
      ["hint"] => NULL
      ["errorName"] => string(10) "first name"
      ["value"] => string(0) ""
      ["htmlName"] => string(10) "first_name"
      ["errors"] => array(0) {
      }
      ["className"] => string(33) "Ling\Chloroform\Field\StringField"
      ["validators"] => array(0) {
      }
    }
  }
  ["errors"] => array(0) {
  }
  ["properties"] => array(0) {
  }
  ["mode"] => string(7) "not_set"
  ["jsCode"] => NULL
  ["cssId"] => NULL
}


```





Example #1: the simplest form
-----------

```php

//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(StringField::create("First name"));





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
a($formArray);
?>
    <form method="post" action="">
        <label>
            First name
            <input type="text" name="first_name"/>
        </label>

        <input type="submit" value="Submit"/>
        <?php ChloroformRendererHelper::printsFormIdKeyControl($formArray); ?>
    </form>
<?php

```


The toArray method will output something like this (after submitting the form without typing anything):

```html
array(8) {
  ["isPosted"] => bool(false)
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(7) "success"
      ["message"] => string(2) "ok"
    }
  }
  ["fields"] => array(1) {
    ["first_name"] => array(9) {
      ["label"] => string(10) "First name"
      ["id"] => string(10) "first_name"
      ["hint"] => NULL
      ["errorName"] => string(10) "first name"
      ["value"] => string(0) ""
      ["htmlName"] => string(10) "first_name"
      ["errors"] => array(0) {
      }
      ["className"] => string(33) "Ling\Chloroform\Field\StringField"
      ["validators"] => array(0) {
      }
    }
  }
  ["errors"] => array(0) {
  }
  ["properties"] => array(0) {
  }
  ["mode"] => string(7) "not_set"
  ["jsCode"] => NULL
  ["cssId"] => NULL
}

```


Example #2: a simple form with custom validation
---------

With the following code:


```php

//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(StringField::create("First name"), [
    CustomValidator::create(function ($value, string $fieldName, FieldInterface $field, string &$error = null) {
        $error = "Nul, t'es nul!";
        return false;
    })
]);



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
a($formArray);
?>
    <form method="post" action="">
        <label>
            First name
            <input type="text" name="first_name"/>
        </label>

        <input type="submit" value="Submit"/>
        <?php ChloroformRendererHelper::printsFormIdKeyControl($formArray); ?>
    </form>
<?php

```




The toArray method will output something like this (after submitting the form without typing anything):

```html
array(8) {
  ["isPosted"] => bool(false)
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(5) "error"
      ["message"] => string(20) "There was a problem."
    }
  }
  ["fields"] => array(1) {
    ["first_name"] => array(9) {
      ["label"] => string(10) "First name"
      ["id"] => string(10) "first_name"
      ["hint"] => NULL
      ["errorName"] => string(10) "first name"
      ["value"] => string(0) ""
      ["htmlName"] => string(10) "first_name"
      ["errors"] => array(1) {
        [0] => string(14) "Nul, t'es nul!"
      }
      ["className"] => string(33) "Ling\Chloroform\Field\StringField"
      ["validators"] => array(1) {
        [0] => array(1) {
          ["name"] => string(41) "Ling\Chloroform\Validator\CustomValidator"
        }
      }
    }
  }
  ["errors"] => array(1) {
    ["first_name"] => array(1) {
      [0] => string(14) "Nul, t'es nul!"
    }
  }
  ["properties"] => array(0) {
  }
  ["mode"] => string(7) "not_set"
  ["jsCode"] => NULL
  ["cssId"] => NULL
}

```




Example #3: a simple form with validation
---------

With the following code:

```php
//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(StringField::create("First name"), [RequiredValidator::create(), MinMaxCharValidator::create()->setMin(3)]);



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
a($formArray);
?>
    <form method="post" action="">
        <label>
            First name
            <input type="text" name="first_name"/>
        </label>

        <input type="submit" value="Submit"/>
        <?php ChloroformRendererHelper::printsFormIdKeyControl($formArray); ?>
    </form>
<?php

```

The toArray method will output something like this (after submitting the form without typing anything):


```html
array(8) {
  ["isPosted"] => bool(false)
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(5) "error"
      ["message"] => string(20) "There was a problem."
    }
  }
  ["fields"] => array(1) {
    ["first_name"] => array(9) {
      ["label"] => string(10) "First name"
      ["id"] => string(10) "first_name"
      ["hint"] => NULL
      ["errorName"] => string(10) "first name"
      ["value"] => string(0) ""
      ["htmlName"] => string(10) "first_name"
      ["errors"] => array(2) {
        [0] => string(26) "The first name is required"
        [1] => string(64) "The first name must contain at least 3 chars (you wrote 0 chars)"
      }
      ["className"] => string(33) "Ling\Chloroform\Field\StringField"
      ["validators"] => array(2) {
        [0] => array(3) {
          ["name"] => string(43) "Ling\Chloroform\Validator\RequiredValidator"
          ["custom_messages"] => array(0) {
          }
          ["messages"] => array(1) {
            [0] => string(33) "main: The {fieldName} is required"
          }
        }
        [1] => array(5) {
          ["name"] => string(45) "Ling\Chloroform\Validator\MinMaxCharValidator"
          ["custom_messages"] => array(0) {
          }
          ["messages"] => array(3) {
            [0] => string(81) "min: The {fieldName} must contain at least {min} chars (you wrote {number} chars)"
            [1] => string(80) "max: The {fieldName} must contain at most {max} chars (you wrote {number} chars)"
            [2] => string(109) "between: The {fieldName} must contain at least {min} chars and at most {max} chars (you wrote {number} chars)"
          }
          ["min"] => int(3)
          ["max"] => NULL
        }
      }
    }
  }
  ["errors"] => array(1) {
    ["first_name"] => array(2) {
      [0] => string(26) "The first name is required"
      [1] => string(64) "The first name must contain at least 3 chars (you wrote 0 chars)"
    }
  }
  ["properties"] => array(0) {
  }
  ["mode"] => string(7) "not_set"
  ["jsCode"] => NULL
  ["cssId"] => NULL
}



```


Example #4: Changing the validation error message
---------

With the following code:

```php
//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(StringField::create("First name"), [MinMaxCharValidator::create()->setMin(3)->setErrorMessage("Yo, the {fieldName} must contain at least {min} chars", "min")]);



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
a($formArray);
?>
<form method="post" action="">
    <label>
        First name
        <input type="text" name="first_name"/>
    </label>

    <input type="submit" value="Submit"/>
    <?php ChloroformRendererHelper::printsFormIdKeyControl($formArray); ?>
</form>
<?php 


```


The toArray method will output something like this (after submitting the form without typing anything):


```html

array(8) {
  ["isPosted"] => bool(false)
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(5) "error"
      ["message"] => string(20) "There was a problem."
    }
  }
  ["fields"] => array(1) {
    ["first_name"] => array(9) {
      ["label"] => string(10) "First name"
      ["id"] => string(10) "first_name"
      ["hint"] => NULL
      ["errorName"] => string(10) "first name"
      ["value"] => string(0) ""
      ["htmlName"] => string(10) "first_name"
      ["errors"] => array(1) {
        [0] => string(48) "Yo, the first name must contain at least 3 chars"
      }
      ["className"] => string(33) "Ling\Chloroform\Field\StringField"
      ["validators"] => array(1) {
        [0] => array(5) {
          ["name"] => string(45) "Ling\Chloroform\Validator\MinMaxCharValidator"
          ["custom_messages"] => array(1) {
            ["min"] => string(53) "Yo, the {fieldName} must contain at least {min} chars"
          }
          ["messages"] => array(3) {
            [0] => string(81) "min: The {fieldName} must contain at least {min} chars (you wrote {number} chars)"
            [1] => string(80) "max: The {fieldName} must contain at most {max} chars (you wrote {number} chars)"
            [2] => string(109) "between: The {fieldName} must contain at least {min} chars and at most {max} chars (you wrote {number} chars)"
          }
          ["min"] => int(3)
          ["max"] => NULL
        }
      }
    }
  }
  ["errors"] => array(1) {
    ["first_name"] => array(1) {
      [0] => string(48) "Yo, the first name must contain at least 3 chars"
    }
  }
  ["properties"] => array(0) {
  }
  ["mode"] => string(7) "not_set"
  ["jsCode"] => NULL
  ["cssId"] => NULL
}

```








Example #5: the file field
--------------

File fields are special in that the value returned is the php file item provided in the $_FILES super array (the one
with the following entries: name, type, tmp_name, size and error).

In other words, if you have a chloroform instance with a file field, like this:


```php
<?php


use Ling\Chloroform\Field\FileField;
use Ling\Chloroform\Form\Chloroform;

$form = new Chloroform();
$form->addField(FileField::create("Avatar url", [
    "value" => "/img/the-avatar.jpg",
]));

```

Once the form is submitted (provided that you used the enctype=multipart/form-data attribute on the form),
the resulting chloroform array will look like this:


```html 
array(8) {
  ["isPosted"] => bool(true)
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(7) "success"
      ["message"] => string(2) "ok"
    }
  }
  ["fields"] => array(1) {
    ["avatar_url"] => array(9) {
      ["value"] => array(5) {
        ["name"] => string(0) ""
        ["type"] => string(0) ""
        ["tmp_name"] => string(0) ""
        ["error"] => int(4)
        ["size"] => int(0)
      }
      ["label"] => string(10) "Avatar url"
      ["id"] => string(10) "avatar_url"
      ["hint"] => NULL
      ["errorName"] => string(10) "avatar url"
      ["htmlName"] => string(10) "avatar_url"
      ["errors"] => array(0) {
      }
      ["className"] => string(31) "Ling\Chloroform\Field\FileField"
      ["validators"] => array(0) {
      }
    }
  ["errors"] => array(0) {
  }
  ["properties"] => array(0) {
  }
  ["mode"] => string(7) "not_set"
  ["jsCode"] => NULL
  ["cssId"] => NULL
}

```








The available fields
===========

- StringField: is generally represented by an input tag of type text.
- TextField: is generally represented by a textarea tag.
- NumberField: is generally represented by an input tag of type number.
- HiddenField: is generally represented by an input tag of type hidden.
- CSRFField: is generally represented by an input tag of type hidden.
- ColorField: used to capture an rgb color (like #cc0057 for instance).
- DateField: used to capture a date (like 2019-04-10 for instance).
- TimeField: used to capture a time (like 05:06:17 for instance).
- DateTimeField: used to capture a datetime (like 2019-04-10 05:06:17 for instance).
- SelectField: is generally represented by a html select tag.
- CheckboxField: is generally represented by some html input tags of type checkbox.
- RadioField: is generally represented by some html input tags of type radio.
- FileField: is generally represented by an html input tag of type file.
- AjaxFileBoxField: is generally represented by an html input tag of type file with a drop zone. It's coupled with a third-party javascript client and a backend service to provide the desired functionality of 
        uploading the files via ajax.
- PasswordField: is generally represented by an html input tag of type password.
- DecorativeField: used to represent any kind of decorative elements in the form



The available validators
============

- CSRFValidator: works in tandem with the CSRFField, provides csrf protection based on the [CSRFTools planet](https://github.com/lingtalfi/CSRFTools).
- CustomValidator: to create your own validator.
- MinMaxCharValidator: check that a field has more than, less than, or between x and y number of characters (works with StringField, TextField).
- MinMaxNumberValidator: check that the field value is has more than, less than, or comprised between x and y (works with NumberField).
- MinMaxDateValidator: check that the date is comprised inside some defined boundaries (works with DateField, DateTimeField, TimeField).
- MinMaxItemValidator: check that the user chose a certain number of items (works with SelectField with multiple on, CheckboxField).
- MinMaxFileSizeValidator: check that the file size of the posted file is within the defined boundaries (works with FileField).
- FileMimeTypeValidator: check that the file mime type is allowed (works with FileField).
- RequiredValidator: check that the string version of the value is not the empty string (works with all fields).
- RequiredDateValidator: check that the date is not empty (0000-00-00 or empty string).
- PasswordConfirmValidator: check that the password matches the value of a password confirm field (works with PasswordField).




Rendering the form
=============

The Chloroform planet doesn't provide Renderer classes by default.

That's because I wanted to have a clean separation between the form validation logic and the form rendering logic.

You can render a Chloroform manually (without using a renderer), just by playing with the **$form->toArray** method.

Or, you can use an external renderer, such as the Chloroform_Hydrogen renderer.

Here is a list of known chloroform renderers:


- [Chloroform_HydrogenRenderer](https://github.com/lingtalfi/Chloroform_HydrogenRenderer)
- [Chloroform_HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer)
- [Chloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer)




 








History Log
=============

- 1.26.0 -- 2020-02-21

    - update AjaxFileBoxField, now only provide the maxFile property. 

- 1.25.0 -- 2019-12-06

    - add Chloroform.cssId property 
    
- 1.24.1 -- 2019-12-06

    - update chloroform array documentation 
    
- 1.24.0 -- 2019-12-06

    - add Chloroform.jsCode property 
    
- 1.23.3 -- 2019-12-06

    - add DecorativeField.$decorationOptions 
    
- 1.23.2 -- 2019-12-06

    - update DecorativeField->getType to getDecorationType 
    
- 1.23.1 -- 2019-12-06

    - fix DecorativeField->toArray not returning a compliant array of properties 

- 1.23.0 -- 2019-12-06

    - add DecorativeField class 
    
- 1.22.0 -- 2019-12-05

    - add Chloroform getMode method 
    
- 1.21.0 -- 2019-12-05

    - add form.mode property 
    
- 1.20.2 -- 2019-12-03

    - add documentation comment in chloroform discussion 
    
- 1.20.1 -- 2019-11-25

    - add Chloroform->hasProperty method 
    
- 1.20.0 -- 2019-11-25

    - add Chloroform.properties 

- 1.19.3 -- 2019-11-25

    - add AjaxFileBoxField->getFallbackValue method override
    
- 1.19.2 -- 2019-11-18

    - change documentation link
    
- 1.19.1 -- 2019-11-15

    - add precision to chloroform array documentation page
    
- 1.19.0 -- 2019-11-01

    - add the concept of fallback value
    
- 1.18.0 -- 2019-11-01

    - add FieldInterface->setDataTransformer
    
- 1.17.2 -- 2019-10-24

    - add link in README.md
    
- 1.17.1 -- 2019-10-22

    - add BaseDataTransformer class
    
- 1.17.0 -- 2019-10-22

    - update "very important data" concept
    
- 1.16.0 -- 2019-10-22

    - add DataTransformer concept
    - removed FieldInterface->setHasVeryImportantData
    - changed FieldInterface->validates method

- 1.15.0 -- 2019-10-22

    - add concept of "very important data"
    
- 1.14.2 -- 2019-10-21

    - add AbstractValidator->getDefaultMessagesDir

- 1.14.1 -- 2019-10-18

    - add precision to chloroform array
    
- 1.14.0 -- 2019-10-18

    - add chloroform array document

- 1.13.1 -- 2019-10-17

    - add precision to AjaxFileBoxField class comment
    
- 1.13.0 -- 2019-10-16

    - renamed CSRFField->setCSRFIdentifier to setCsrfIdentifier and getCSRFIdentifier to getCsrfIdentifier   
    
- 1.12.1 -- 2019-09-20

    - update CSRFField, changed token name form default to chloroform-csrf-field 
    
- 1.12.0 -- 2019-09-20

    - update CSRFField and CSRFValidator to accept custom CSRFProtector instances. 
    
- 1.11.0 -- 2019-08-05

    - update CSRFValidator to work with CSRFTools 1.1.0
    
- 1.10.0 -- 2019-08-05

    - add the AjaxFileBoxField postParams property
    
- 1.9.0 -- 2019-08-02

    - add AjaxFileBoxField class

- 1.8.4 -- 2019-07-31

    - fix Chloroform getPostedData not returning the chloroform_hidden_key
    
- 1.8.3 -- 2019-07-29

    - fix Chloroform->__construct not adding the hidden field correctly
    
- 1.8.2 -- 2019-07-26

    - update doc
    
- 1.8.1 -- 2019-07-26

    - fix chloroform_hidden_key problems
    
- 1.8.0 -- 2019-07-26

    - add isPosted property in the chloroform array
    
- 1.7.0 -- 2019-07-26

    - add Chloroform default mechanism for identifying if the form was posted when there are multiple forms in the same page

- 1.6.9 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.6.8 -- 2019-04-29

    - add README link to Chloroform_HydrogenRenderer
    
- 1.6.7 -- 2019-04-18

    - fix FileMimeTypeValidator test failing if file was not uploaded
    
- 1.6.6 -- 2019-04-18

    - minor change in documentation
    
- 1.6.5 -- 2019-04-18

    - minor change in documentation
    
- 1.6.4 -- 2019-04-18

    - minor change in documentation

- 1.6.3 -- 2019-04-18

    - fix FileMimeTypeValidator->setMimeTypes method not returning the instance
    
- 1.6.2 -- 2019-04-18

    - fix translations for MinMaxDateValidator 
    
- 1.6.1 -- 2019-04-18

    - fix translations for MinMaxCharValidator 
    
- 1.6.0 -- 2019-04-17

    - add RequiredDateValidator 
    
- 1.5.0 -- 2019-04-17

    - update htmlName in AbstractField, now does never has the trailing brackets [] 
    
- 1.4.2 -- 2019-04-17

    - fix Chloroform->injectValues re-injecting null by default for all fields 
    - fix PasswordValidator not working (didn't test it when committed) 
    
- 1.4.1 -- 2019-04-16

    - fix PasswordValidator not resolving tag {fieldName}   
    
- 1.4.0 -- 2019-04-16

    - add rows property for the TextField   
    
- 1.3.0 -- 2019-04-15

    - add PasswordValidator 
    
- 1.2.0 -- 2019-04-15

    - add ChloroformRendererInterface 
    
- 1.1.0 -- 2019-04-15

    - add validators in the toArray array, so that renderers get a chance to add js validation 
    
- 1.0.0 -- 2019-04-12

    - initial commit