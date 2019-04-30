Chloroform
===========
2019-04-12



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
    - [Example #5: CSRF protection](#example-5-csrf-protection)
- [The available fields](#the-available-fields)    
- [The available validators](#the-available-validators)    
- [Rendering the form](#rendering-the-form)    
- Pages
    - [Chloroform diary](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-diary.md)
    - [Chloroform discussion](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md)





How to use
========


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
a($form->toArray());
?>
    <form method="post" action="">
        <label>
            First name
            <input type="text" name="first_name"/>
        </label>

        <input type="submit" value="Submit"/>
    </form>
<?php

```


The toArray method will output something like this (after submitting the form without typing anything):

```html
array(3) {
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
a($form->toArray());
?>
    <form method="post" action="">
        <label>
            First name
            <input type="text" name="first_name"/>
        </label>

        <input type="submit" value="Submit"/>
    </form>
<?php

```




The toArray method will output something like this (after submitting the form without typing anything):

```html
array(3) {
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
a($form->toArray());
?>
    <form method="post" action="">
        <label>
            First name
            <input type="text" name="first_name"/>
        </label>

        <input type="submit" value="Submit"/>
    </form>
<?php

```

The toArray method will output something like this (after submitting the form without typing anything):


```html
array(3) {
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
a($form->toArray());
?>
<form method="post" action="">
    <label>
        First name
        <input type="text" name="first_name"/>
    </label>

    <input type="submit" value="Submit"/>
</form>
<?php 


```


The toArray method will output something like this (after submitting the form without typing anything):


```html

array(3) {
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
}

```





Example #5: CSRF protection
--------------

With the following code:

```php
//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = new Chloroform();
$form->addField(CSRFField::create("csrf_token"), [CSRFValidator::create()]);


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
            CSRF token (usually would be hidden)
            <input type="text" name="csrf_token" value="<?php echo $formArray['fields']['csrf_token']['value']; ?>"/>
        </label>

        <input type="submit" value="Submit"/>
    </form>
<?php

```


The toArray method will output something like this (after submitting the form without typing anything):


```html
array(3) {
  ["notifications"] => array(1) {
    [0] => array(2) {
      ["type"] => string(7) "success"
      ["message"] => string(2) "ok"
    }
  }
  ["fields"] => array(1) {
    ["csrf_token"] => array(9) {
      ["id"] => string(10) "csrf_token"
      ["label"] => NULL
      ["hint"] => NULL
      ["errorName"] => string(10) "csrf token"
      ["value"] => string(32) "3db08f533513eb1554dce7fcbc6cca30"
      ["htmlName"] => string(10) "csrf_token"
      ["errors"] => array(0) {
      }
      ["className"] => string(31) "Ling\Chloroform\Field\CSRFField"
      ["validators"] => array(1) {
        [0] => array(3) {
          ["name"] => string(39) "Ling\Chloroform\Validator\CSRFValidator"
          ["custom_messages"] => array(0) {
          }
          ["messages"] => array(1) {
            [0] => string(33) "main: The CSRF token is corrupted"
          }
        }
      }
    }
  }
  ["errors"] => array(0) {
  }
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
- PasswordField: is generally represented by an html input tag of type password.



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




 








History Log
=============

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