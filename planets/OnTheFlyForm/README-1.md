OnTheFlyForm
=================
2017-06-08


A quick dirty form strategy for your front forms.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import OnTheFlyForm
```

Or just download it and place it where you want otherwise.





Intro (the guy needs to talk about his project...)
===========

When I have time, I like to use a [form model](https://github.com/lingtalfi/formmodel) to handle my forms.

That's in theory only because in practice time is such a scarce resource.

Creating a renderer object can be very cumbersome and time consuming, so there must be another way.

Sometimes, you just have a nice template, and you just want to quickly inject
your form logic in that template, and not the other way around.


So, I came back to my old way of doing forms back then when I was a young php jedi with the will to learn,
and now this is the re-mastered version of this form technique, to which I gave the name "on the fly form".




The OnTheFlyForm base principle
===========================

The secret of OnTheFlyForm resides in using prefixes to organize the data.

That's it :)

Rendering a form
--------------------
Here is a typical on-the-fly form model, I believe it doesn't need too much explanations:

```php
- formAction => "",
- formMethod => "post",

- nameEmail => "email",
- namePass => "pass",
- namePass2 => "pass2",
- nameKey => "key",
- nameNewsletter => "newsletter",

- valueEmail => "",
- valuePass => "",
- valuePass2 => "",
- valueKey => $key,

- checkedNewsletter => "",

- errorEmail => "",
- errorPass => "",
- errorPass2" => "",
```         


As you can guess, we have the following prefixes:
- name: indicate the html name to use
- value: indicate the html value to use.
         For a unique checkbox, we use the checked prefix instead
         
- checked: this is only for checkbox
         for checkbox, the value is either an empty string, or the "checked" string,
         so that we can inject it directly in the html (this is a very pragmatic design).
         
- error: indicate the error message to display (only one, not an array of messages,
          because the philosophy is to alleviate the template author's work)

So that's it!

Very intuitive, straight to the point.

The template author is a happy guy, because he has all the data he wants.

Rendering an "on the fly" form is really easy, just insert the data in any form you want.



Here is a simple example (static form, not ajax)

```php
    <form action="<?php echo $m['formAction']; ?>" method="<?php echo $m['formMethod']; ?>" style="width: 500px">
        <table class="form-table">
            <tr>
                <td>First Name</td>
                <td>
                    <input name="<?php echo $m['nameFirstName']; ?>" type="text"
                           value="<?php echo htmlspecialchars($m['valueFirstName']); ?>">
                    <?php if (($m['errorFirstName'])): ?>
                        <div class="error"><?php echo $m['errorFirstName']; ?></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input name="<?php echo $m['nameLastName']; ?>" type="text"
                           value="<?php echo htmlspecialchars($m['valueLastName']); ?>">
                    <?php if (($m['errorLastName'])): ?>
                        <div class="error"><?php echo $m['errorLastName']; ?></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Subscribe</td>
                <td><input name="<?php echo $m['nameNewsletter']; ?>" type="checkbox"
                        value="1"
                    <?php echo $m['checkedNewsletter']; ?>>
                </td>
            </tr>
        </table>
        <div class="buttons">
            <button>Create this</button>
            <button>Cancel</button>
        </div>
    </form>
```


With this technique, you can integrate any layout without too much effort.



Validating a form
--------------------

One of the most repetitive and boring task with forms is to validate the data
before they are really treated by the server.

Therefore, we have the OnTheFlyFormValidator.validate method, which helps us automate the basic
server side validation process (required, isEmail, minChar, etc...).

Note: although OnTheFlyFormValidator.validate is part of the "onTheFlyForm" system,
it's located in the [FormTools planet](https://github.com/lingtalfi/FormTools)
(that's simply because it was first created there).


Here is an example of what you would do server side:

- first create the model (the array)
- then check for validation errors
- if no error, continue your business logic




```php
<?php

//--------------------------------------------
// EXAMPLE FOR THE SYNTAX 
//--------------------------------------------
use FormTools\Validation\OnTheFlyFormValidator;


// assuming we're in some kind of controller
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


    $validator = OnTheFlyFormValidator::create(); // this guy is in FormTool planet!
    if (true === $validator->validate([
            'email' => ['required', 'email'],
            'pass' => ['required', "min:6"],
            'pass2' => ['required', 'sameAs:pass'],
        ], $model)
    ) {
        az("form has validated");
    }

}

// then somewhere around here, pass the model to your template...

```



Ajax forms
----------------

Sometimes, you need ajax forms.

When I say ajax form, I mean the form is created by your template, but the handling of the form
is done via ajax.


Let's see what this planet can do for us.

First, create the ajax form from our template (using some kind of light box logic that basically make the form 
fade in when we click on a link...).

We can take back our previous example, and adapt it for ajax:


```php
<form action="" method="post" style="width: 500px">
    <table class="form-table">
        <tr>
            <td>First Name</td>
            <td>
                <input name="<?php echo $m['nameFirstName']; ?>" type="text"
                       data-error-popout="firstName"
                       value="<?php echo htmlspecialchars($m['valueFirstName']); ?>">
                <div data-error="firstName" class="error"></div>
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input name="<?php echo $m['nameLastName']; ?>" type="text"
                       data-error-popout="lastName"
                       value="<?php echo htmlspecialchars($m['valueLastName']); ?>">
                <div data-error="lastName" class="error"></div>
            </td>
        </tr>
        <tr>
            <td>Newsletter</td>
            <td><input name="<?php echo $m['nameNewsletter']; ?>" type="checkbox"
                       value="1" <?php echo htmlspecialchars($m['checkedNewsletter']); ?>></td>
        </tr>
    </table>
    <div class="buttons">
        <button class="submit-btn">Create this</button>
        <button>Cancel</button>
    </div>
</form>
```


Notice that in this case, the error messages are empty, and we don't check errors yet,
this will be done by ajax when we post the form.

Also, we have those "data-error" and "data-error-popout" attributes, I will explain them later.

For now, what we want is that when we post the form, it calls an ajax service,
and if there is an error, then the error appears on the form.
If there is no error, then the process is successful server side, and we want
a success callback js side.


Here is the kind of js pseudo code that we need to make the ajax call and handle the server's response:


```js
document.addEventListener("DOMContentLoaded", function (event) {
    $(document).ready(function (e) {


        function createNewItem(itemData, onSuccess, onFormDataInvalid, onError) {


            $.post("/my/json-service.php", {
                data: itemData
            }, function (r) {
                if ("success" === r.type) {
                    onSuccess();
                }
                else if ("error" === r.type) {
                    onError(r.error);
                }
                else if ('formerror' === r.type) {
                    onFormDataInvalid(r.model);
                }
            }, 'json');
        }


        $(document).on("click", function (e) {
            var jTarget = $(e.target);
            if (jTarget.hasClass("submit-btn")) {

                var jForm = jTarget.closest("form");
                var itemData = jForm.serialize();

                createNewItem(itemData,
                    // success
                    function () {
                        console.log("ok, form successfully treated");
                    },
                    // validation error
                    function (formModel) {
                        window.onTheFlyForm.injectValidationErrors(jForm, formModel);
                    },
                    // server error
                    function (errMsg) {
                        console.log("error: " + errMsg);
                    }
                );


                return false;
            }
        });


    });
});

```



And server side:

```php
<?php



if (array_key_exists("data", $_POST)) {
    $sData = $_POST["data"];
    parse_str($sData, $data);
    
    /**
     * @var $provider OnTheFlyFormProviderInterface
     */
    $provider = X::get("Core_OnTheFlyFormProvider"); // X is a service container in Kamille
    $form = $provider->getForm("Ekom", "UserAddress"); // in this modular architecture, we use the provider to access the OnTheFlyForm instance
    $model = $form->getModel(); // return a default model with empty values
    if (true === $form->validate($data, $model)) { // try to validate the data passed by the user...
        // data is valid :)
        // apply your business logic here...
        if(true === EkomApi::inst()->userLayer()->createAddress($userId, $data)){
            $out = [
                "type" => "success",
            ];
        }
        else {
            $out = [
                "type" => "error",
                "error" => "An exception occurred, please contact the webmaster.",
            ];
        }       
    } else {
        // the form contains validation errors (validation triggers are set in the $form instance)
        $out = [
            "type" => "formerror",
            "model" => $model,
        ];
    }
}
else{
  // oops, regular server side error
  $out = [
        "type" => "error",
        "error" => "the user is not connected",
    ];
}

// and here we give the out "thing" back to the server as json content 

```

In the above example:

- X is the service container from the [Kamille framework](https://github.com/lingtalfi/kamille)
- the $provider variable contains a OnTheFlyFormProviderInterface instance, which selects
    the OnTheFlyFormInterface that we want (in a modular architecture, all modules put their onTheFlyForm
    somewhere under their namespace, and the provider is the central place from which we can access
    any OnTheFlyForm from any module, basically)
- the $form contains the OnTheFlyFormInterface, which contains two important methods: getModel and validate.
            getModel returns a default model with empty values, while
            the validate method emulates the posting of the data, and goes through the validation process
            (validation data are chosen by the concrete OnTheFlyForm instance), and sprinkle the model
            with validation errors if any.
            $model is passed by reference to the validate method, so that if there is an error, 
            the process goes into the second block with type=formerror and the model (with the errors set)
            is returned to the js client.
            
    


Hopefully you get the idea.



What about data-error and data-error-popout?
=============================================

There is a tiny but useful accompanying js script that comes with OnTheFlyForm.

You will find it here in this repo: www/libs/on-the-fly-form/on-the-fly-form.js
Although compact, it's actually powerful.


The idea with data-error is that this script injects the validation errors in your form.

The idea with data-error-popout is that if you focus a control which has a validation error, 
the error message vanishes.

There is also a data-error-text attribute that you can use along with the data-error attribute,

- data-error indicates the container (to show/hide)
- data-error-text indicates the element inside data-error holding the error message


Read the [source code](https://github.com/lingtalfi/OnTheFlyForm/blob/master/www/libs/on-the-fly-form/on-the-fly-form.js)'s comments for more info.



Using data-error-popout with static form
===========================================


Problem
-----------
So you create a static form (a form which validation is processed server side), 
the user fills the form, submit the data, and some validation error occurs.

So right now the form has red errors all over the place, and what you want is:
when the user clicks on the control to fix the validation error, the error disappear.

Solution
-----------

You can use the onTheFlyForm js script to do that.

First ensure that you implement the correct markup described in the onTheFlyForm script.

1. Add the data-error-popout attribute to the control on which a click will trigger the error removal (typically 
on elements like input, select, ...)


2. Add the data-error attribute, with the appropriate value (the control name, see js script source code comments for more details)
on the error container.


3. Include the onTheFlyForm js script into your app and add this line in your javascript code:

```js
window.onTheFlyForm.staticFormInit(jContext); // jContext is any jquery object that contains the relevant markup (typically a form or a div containing the form)
```








Related
========== 
- https://github.com/lingtalfi/table-form
- https://github.com/lingtalfi/formmodel


 

History Log
------------------
    
- 1.2.0 -- 2017-07-23

    - add onTheFlyForm.staticFormInit method
    
- 1.1.0 -- 2017-07-02

    - onTheFlyForm.injectValidationErrors now supports the data-error-text attribute

- 1.0.1 -- 2017-06-09

    - OnTheFlyForm.validate, fix forgot to inject values
    
- 1.0.0 -- 2017-06-09

    - initial commit
    
 
 
 






