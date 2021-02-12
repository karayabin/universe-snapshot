SokoForm
============
2017-10-29 --> 2018-06-01


SokoForm is a system that helps you creating your forms.

The main feature of Soko is that it gives a lot of freedom to the view.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SokoForm
```

Or just download it and place it where you want otherwise.


Dependencies
------------------

If you use the SokoTvaIntracomValidationRule with the webservice to check tva intracom number,
then you will need those two extra composer dependencies:

- symfony/dom-crawler:* 
- symfony/css-selector:*






What's the philosophy behind Soko form?
=============================================

With Soko form, the view (SokoFormRenderer in particular) has a lot of power:

- it's aware of the controls' names 
- it can decide to show/hide the label of any control 
- it can access any control property and make a custom control from scratch 





How does it work?
===================

The strategy is quite simple:

- create a form object
- react to form submission
- display the form object


That's it for the basics, but then, we can do extra things such as:

- add notification message to the form
- add the SokoFormErrorRemovalTool.js script to remove user errors as she/he fixes them

 
At the end of this document, I will provide the complete and functional example. 


But before we start, we need to agree on a definition of the form model.



The form model
===================
2017-11-24


The form model is the array representing the form at any time.
It is created by the Model (M of Mvc) and passed to the view (V of Mvc),
so it's very important that both sides agree on a common format.

In fact, the SokoForm object that we will see later is just an Api to create the form model, which means
if you wanted to, you could use another api, or even create the form model manually, and it would still works
with your renderers (should they use the same model too). 


In soko, we use this model in version 1.4.0:


- https://github.com/lingtalfi/Models/blob/master/Form/form-model.md


Plus, Soko adds an extra property to this model::

- validationRules: array of controlName => SokoValidationRuleInterface instance









Create a form object
====================


To create a form object, we proceed in two steps:

- creating the form 
- adding controls to the form
- adding validation rules to the form 



Creating the form
---------------------------

The form is just an instance of SokoFormInterface.

```php
$form = SokoForm::create();
```  

Now we can add some form properties if we want to:

- name: string, default=sokoform,
            this is the name of the form.
            Soko form will automatically add a hidden control with this name
            to detect whether or not this particular form instance was submitted.
            In general, you don't need to set the name unless you know you have more
            than one soko form instance on the page, in which case you MUST set the name.
            
- method: post|get, default=post
- action: string, detault=""
- enctype: string|null, default=null, null means no enctype
        

Note: the SokoForm object automatically sets the enctype value to **multipart/form-data** if 
the form contains a regular file control (a SokoFileControl with type=static, see the SokoFileControl
later in this document for more details). 





Adding controls to the form
---------------------------

Add controls to the SokoForm object.

A control is a "widget" that transmits data from the user to your form.

It also means that decorative things in your form, and even position/order
things are all handled at the view level. 


All controls have common properties:

- label: the label
        The label might be used in different cases:
            - the most obvious area is in front of the control widget
            - an other less obvious area is if we decide to display all errors at the top of the form.
                    Then the label is used to prefix the error messages
            
            The label is therefore always needed (because of the second case).
            However, sometimes we don't want to display it at the control level (first case);
            therefore the setLabel method has a second argument which allows us to hide the "control" label.
            This impacts the control model (more details on this in the "display the form object" section 
            of this document)
                                 
                     
            
- name: the value of the name html attribute to display 
- value: the value of the control (that we will collect when the form is submitted) 
- errors: the (translated) error message(s) to display 
- valueIsOverridable: bool, whether or not it is possible for the user to override the value that we set at the model level
        


Apart from the valueIsOverridable property, all properties are intended to be used by the view.

The view will display those how it wants.


There are different types of control:

- Input control: is used to collect text from the user
- Choice control: is used to provide a choice to the user
- File control: is used to let the user upload a file 
        
        
        
Below is a simple example showing a form with one control bound to it:


```php
$form = SokoForm::create()
    ->addControl(SokoInputControl::create()
        ->setName("email")
        ->setLabel('E-mail')
//        ->setValue("some default value")
//        ->setValueIsOverridable(false)
    )
```


### Tip: always set the label


You should always set the label at the model level, because
even if the view decide to not display it next to the control, it might need
it when creating error messages for instance.




The input control
---------------------

The input control is used to collect text from the user.

The input control has few extra properties:

- placeholder 
- type: the desired type
    - hidden 
    - password
    - text (default)
    - textarea
    - ...other types of your own

Note: the view can decide to display the label as a placeholder if it wants to,
or it can even ignore/override the type if it wants to.
        
        
The input control is used to represent:

- input control type=text  
- input control type=password  
- input control type=hidden  
- textarea
  


```php
SokoInputControl::create()
        /**
         * Note: the password type is added/not added at the view level
         */
        ->setName("password")
        ->setType("password")
        ->setLabel('Password (6 characters minimum)');
```



The choice control
---------------------

The choice is used to provide a choice to the user.

It can be used to represent:

- input type=radio
- select with options
- select with option groups
- single checkbox
- checkboxes with different names



To represent a select with options or an input type=radio:

```php
SokoChoiceControl::create()
        ->setName("gender")
        ->setLabel('Gender')
        ->setChoices([
            "f" => "Female", 
            "m" => "Male", 
        ]);
```


To represent a select with option groups:

```php
SokoChoiceControl::create()
        ->setName("country")
        ->setLabel('Country')
        ->setChoices([
            "Europe" => [
                "fr" => "France",
                "es" => "Spain",
            ], 
            "Asia" => [
                "cn" => "China",
                "jp" => "Japan",
            ],  
        ]);
```



To represent a single checkbox:

```php
SokoChoiceControl::create()
        ->setName("newsletter")
        ->setLabel('Subscribe to the newsletter?')
        ->setChoices([
            "1" => "Yes", // or leave this empty as the choice is obvious in this case 
        ]);
```



To represent checkboxes with different names, we can leverage the second parameter
of setChoices, which is the createIndividualNames parameter.

It takes a boolean, and its default is false.


```php
SokoChoiceControl::create()
        ->setName("animals")
        ->setLabel('What's your favorite animals?')
        ->setChoices([
             "panda" => "Panda",
             "koala" => "Koala",
             "dog" => "Dog",
             "bird" => "Bird",
             "cat" => "Cat",
        ], true); 
```

With this setup, each choice will have an individual name wrapped by the name of the control.
And so the names will be:


- animals\[panda]
- animals\[koala]
- animals\[dog]
- animals\[bird]
- animals\[cat]




The file control
---------------------

The file control is used to let the user upload a file.

```php
$form
    ->addControl(SokoFileControl::create()
        ->setLabel("Your diploma (pdf)")
        ->setName("diploma")
        ->setAccept(".pdf") // same as html accept attribute
    )
```


Note: the file control has an implicit type property, which value
defaults to static.
The possible values are:

- static, the control uses regular php upload file system 
- ajax, the control uses an ajax based upload system
- ...one of your own


This property helps us do two things:

- it is passed to the view so that the template knows better how to display the control
- the soko form automatically can add the enctype if the form contains a file control
        with the static type (and if the form method is post)




Add your own properties
------------------------------

Use the setCustomModelProperty method of the SokoControl to extend the control model with properties of
your own:


```php
SokoInputControl::create()->setCustomModelProperty("myProperty", "myValue");
```

Note: the "main" properties listed below cannot be changed with this technique:

- label
- name
- value
- errors


 
Adding validation rules to your form object
-------------------------------------------

Once the form structure is created, we can go ahead 
and add the validation layer.

Note: having an extra validation layer is intentional: it allows
me to not overload the Control objects (in case you were asking yourself
why don't I add validation method on the controls directly).


We add the validation rules one by one, the target of each rule being
the control name that we set in the previous phase (creating the form structure). 

A control can have multiple validation rules attached to it.


Validation rules are objects that we can override or make from scratch.




### From scratch

A validation rule made from scratch looks like this, example for a password
validation rule.


```php
<?php 

$form->addValidationRule("password", SokoValidationRule::create()
    ->setPreferences([
        'minChar' => 5,
    ])
    /**
     * If value is null, it means that the control was not posted.
     * This behaviour might be useful in the case of checkboxes.
     */
    ->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
        $value = (string)$value;
        if (strlen($value) < $preferences['minChar']) {
            $errors[] = "This field requires at least {minChar} characters";
            return false;
        }
        return true;
    })
);
```

As we can see, the process is quite straightforward.

The validation function does quite a lot here:

- it checks whether or not the user value is valid, and returns the boolean result  
- in case of error, it sets the error.
        Note: this allows us to translate the error messages before appending them
        to the control.
        
        Note2: the errors are bound to the control, but the view will decide later where and how to display the errors (do they appear all 
        at the top of the form, or are they displayed at the control level, do we display only the
        first error message...)
        
        Note3: each failing validation rule must return one and one only error message. 
        
        
- the form instance is passed.
        That's because in some cases, you need to access other controls (for their value or their labels maybe).
        For instance, the "Type your password again" needs to check whether or not the values of password and password2
        are identical.
        
- the control instance is passed.
        That's because in some cases, you need to make a quick test for a specific control (so accessing $control->getName()
        makes it easier)
        
- the preferences array is passed by reference, so that the function can add its own "tags".
        For instance in the InArray validation rule, we want to display the message:
                - The value must be one of {sArray}
        And sArray is a comma separated string, each component being an array item.        


### Using the validation rules library

Soko also comes with its own library of validation rules, amongst which:

- SokoMandatoryValidationRule: check that the control was posted 
- SokoNotEmptyValidationRule: check that the control was posted and the value is not empty (in the php sense: meaning 0, false, "" all are empty) 
- SokoAtLeastXCharsValidationRule: check that the control was posted and its value converted to string is more than $minChars characters 
- SokoEmailValidationRule: check that the control was posted and is a valid email. Note: an empty string is not a valid email 
- SokoSameAsValidationRule: check that the control was posted and has the same value as the $otherControl
- SokoInArrayValidationRule: check that the control was posted and its value is one of the value of the $array 
- SokoInRangeValidationRule: check that the control was posted and its value is in the range defined by $min and $max with step=$step (step defaults to 1)
- SokoContainsBetweenXAndYDigitsValidationRule: check that the control was posted and its value contains between $min and $max digits (can be used in phone numbers validation for instance)
- SokoIsCheckedValidationRule: alias for SokoMandatoryValidationRule (useful for single checkboxes)
- SokoDateValidationRule: check that the control was posted and its value matches the $dateFormat
- SokoTvaIntracomValidationRule: check that the control was posted and is a valid tva number for the given $countryValue and $countryLabel
 



### Working with multiple languages

Because they will be used again and again, validation rules error messages are 
good candidates for being translated.

Soko form gives you two options to deal with multi-language validation errors:

- validationRulesLang, string|null, default=eng
    This will use the default soko validation rules translation system.
    The string is a 3 letters code representing the lang (iso 639-2). 
     
- validationRulesTranslator, callable|null, default=null
    This is if you prefer to use your own translation system


If both are defined, validationRulesTranslator will be used.
If none are defined, there will be no translation.
The default configuration of soko form uses the default translation system.


Here is how we can translate all validation rules error messages to french,
using the validationRulesLang property:

```php
$form = SokoForm::create()
    ->setValidationRulesLang('fra') // set the default lang for validation rules error messages
```


If instead we prefer to use our own translation system, we can use the setValidationRulesTranslator method:  

```php
$form = SokoForm::create()
        /**
        * The tags argument is an array of $tagName => $tagValue.
        * $errorMessage wraps tags with curly brackets (for instance {minChars}),
        * don't forget it when creating your own function!  
        */
        ->setValidationRulesTranslator(function ($errorMessage, array $tags) {
            return $errorMessage;
        })
```


  
#### Adding your own language
  
To create your own language, simply copy the **assets/validation-rules-lang/eng.php**
file and replace the translations with your owns.

If you do so, please consider giving me your translations so that I can add them to this repo.


  
#### Override the default error message
  
Sometimes, you will find yourself using a validation rule that almost fit your likings, except for the 
error message.

To customize the error message, simply use the setErrorMessage method, which takes an abstract error message (like
the ones created inside ValidationRule objects).


```php
$form
    ->addValidationRule("phone_prefix", SokoInArrayValidationRule::create()
            ->setErrorMessage("L'indicateur téléphonique doit être l'une des valeurs suivantes: {sArray}")
            ->setArray(["33", "32"]))
```





 


React to the form submission
=============================

Reacting to the form is easy:


```php
$form->process(function(array $filteredValues, SokoFormInterface $form){
    // do something with the values and or the form here
});

```

What this will do?

- Soko will check whether or not the form was posted.
    Note: it does that by automatically adding a fake input=hidden in the form in order to detect whether the form was 
    posted or not.
    Note 2: don't forget to display that fake input=hidden from your view (use the submitKey method of the soko renderer 
    if this is an option).

- If the form is posted 
    - the value of the controls will be updated to emulate data persistency (so that the user doesn't have to type again
            the value she/he already set)
    - if all validation rules pass, the success callback will be executed.


The success callback takes two arguments:

- values: array of controlName => value
- form: the form instance (you can use it to add notifications for instance)


The second argument of the process method is the context, and it defaults to null.

The context is the array of data to use as the user values.

Generally, the context is the $_POST array.

But if your form method is get, then it's the $_GET array.

Plus, sometimes you use the $_FILES.

Rather than doing it ourself, we can just let Soko figure it out by using the
default (null).










Display the form object
====================

So far, we've discussed the model part (as in MVC) of the SokoForm.

But now we enter the view part and display the form model.

In this section we will discuss two main topics:

- the renderer object
- general recommendations for rendering forms




The renderer object
----------------------

The renderer object is an object used to render a form model. 
Soko provides a default SokoRenderer object to help you with this task.


You don't have to use the soko renderer object to display a form, but it can help you getting started.


In this section, we will discuss the following topics:

- configuring the renderer
- using the renderer
- extending the renderer
- naming conventions


### Configuring the renderer

The soko renderer comes with the following configuration properties:

- errorDisplayMode: string: controls where/how to display the errors. 
        This also potentially influences the following model properties (in dot notation):
                - form.errors
                - control.$controlName.errors
                
        The value is one of:
        formLevel: the intent is to display all errors of all controls at the form level.
                    It will remove the errors from the control and put them in the form.errors property of the model
                    instead.                
        formLevelFirst: the intent is display the first error of all controls at the form level.
                    It will remove the errors from the control and put the first of each in the form.errors property 
                     of the model instead.                                
        controlLevel: the intent is to display all errors next to their control.
                    The form.errors property of the model will be an empty array.
                                      
        controlLevelFirst: (default) the intent is to display the first error next to their control.                 
                    The form.errors property of the model will be an empty array.
                    Each control's error property in the model will have only one error (at most).

        The default value is **controlLevelFirst**.
        
        Note, the implementation of this system at the SokoRenderer object level allows us to have less pressure 
        on individual control renderers (imagine if each control renderer had to decide whether or not and how 
        to display error messages).
        
        

```php
SokoFormRenderer::create()->setErrorDisplayMode("formLevelAll"); 
```





### Using the renderer


The example below shows the soko renderer in action.

```html 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<?php
//--------------------------------------------
// NOW ABOUT RENDERING THE FORM
//--------------------------------------------
$r = SokoDemoFormRenderer::create()->setForm($form); // form is a soko form instance

?>


<body>
<form <?php $r->formAttributes(); ?>>
    <h2>A soko form</h2>
    <?php $r->render('account_type'); ?>
    <?php $r->render('email'); ?>
    <?php $r->render('password'); ?>
    <?php $r->render('password2'); ?>
    <?php $r->render('gender'); ?>
    <?php $r->render('last_name'); ?>
    <?php $r->render('first_name'); ?>

    <?php $r->date3('birthday_day', 'birthday_month', 'birthday_year'); ?>

    <?php $r->render('birthday_day'); ?>
    <?php $r->render('birthday_month'); ?>
    <?php $r->render('birthday_year'); ?>

    <?php $r->render('diploma'); ?>
    
    <?php $r->phone('phone_indicator', 'phone'); ?>
    
    <?php $r->render('phone_indicator'); ?>
    <?php $r->render('phone'); ?>

    <?php $r->render('abos'); ?>
    <?php $r->render('i_agree'); ?>
    
    <?php $r->submitKey(); ?>
    <?php $r->submitButton(); ?>
</form>
</body>
</html>
```


As we can see, there are a few methods:

- render, this is the main method which renders a control by its name, we will go into more details in a moment
- formAttributes, renders the html attributes of the soko form as a string
- date3, this is extra method to display a date quickly using 3 selects
            Note that in the above example, the three statements below the 
            date3 method (render birthday_day, birthday_month, birthday_year) are obsolete.

- phone, this is method that we need to implement ourself (it's not a default method of the soko renderer)
          I put it in the example so that we can understand that the SokoFormRenderer can/should be extended
          to adapt our needs.

            Note that again in the above example, there are two obsolete statements (render phone_indicator and
            render phone, since those are already taken care of by the phone method call)
            
- submitKey, this method is provided at the SokoFormRenderer, since its appearance is not important.
            It creates the hidden input which allows the soko form instance to detect 
            whether or not this form instance was submitted.
            In other words, you must call this method to make the form useful.
            
- submitButton, this is a method provided by the SokoTableFormRenderer, since displaying a submit button
        is a very common action. 


Now the subclasses of SokoRenderer can give us some rendering flavours.

Even if not implemented yet, we can imagine some handy classes: SokoTableRenderer, SokoFlexRenderer,
SokoNestedLabelRenderer,... (I made those names up but you get the idea).

In order to create your own renderer, pick the closest Renderer to your own needs and copy, paste and adapt it.

Before you do so, be sure to check that it doesn't already exist in the Renderer directory of this repository.  


Just remember one thing: use the form model, not the object (this was discussed previously in this page).




### The render method 

The render method uses the following algorithm for every control:

- find the renderIdentifier corresponding to the control
- once the renderIdentifier is found, see if there is a method of the class corresponding to this renderIdentifier
        (camelCase version of the renderIdentifier prefixed with the word render).
        If so, execute it (this will display the control on the screen)
- if not, look if there is a render callback in the renderCallbacks array.
        If so, execute it (this will display the control on the screen)
        
                 

The rendering method, when used as a method, has the following signature:
 
```php 
void  rendererMethod ( array controlModel, array preferences=[] ) // This function displays the control     
```

When used as a callback, it has the following signature:
```php 
void  rendererFn ( array controlModel, array preferences=[], array formModel ) // This callback displays the control     
```


Note: the renderCallbacks system allows us to extend the rendering methods on the fly.

The preferences parameter represents the display preferences of the control if any.

The general philosophy of the renderer is that it always allows you to add your own 
css properties, at least at the outermost html element of the control.

This is particularly useful if we want to add some css id or class on the fly,
which might be helpful in case we want to add some js behaviour.

The css properties are stored with the "css" key.

Also, it could be used in a case where the control is a list, and we want to provide two flavours:

- select
- radio

So in short, the recommended preferences array should look like this:

- attributes: array of html attributes, you can use it to pass css properties (id, class, style, ...)
- ...your own control preferences



You might have noticed that the callback version has an extra argument: formModel.
The formModel is just the form model.

It's not passed as an argument in the method version, because I thought it would
have a negative impact on the reading of the class in general.
So instead, renderer classes can access the formModel using the formModel property
of the SokoFormRenderer parent class.






### Extending the renderer


To extend the renderer, just take any existing renderer, like the **SokoTableFormRenderer**
for instance, and copy/paste/adapt it.


To see my thoughts about how the errors should be displayed at the control level, 
visi the **general-recommendations-for-rendering-form-errors.md** document.


Another tip that might help you is the use of traits. 



#### Using the renderer traits

So the SokoFormRenderer is a base object that we can reuse/extend.

It is recommended to extend the SokoFormRenderer before you use it in your application.
This way, you can add as many methods as you want in it.

However, maybe I will develop methods that you would be interested to import in your
own classes (as to save some time).
That's why the methods I develop, I provide them as Traits in the **Renderer/Traits** directory.

Feel free to parse this directory and compose your class with the traits you need.

Look at the SokoDemoFormRenderer class to see how it's done.

Traits are organized in flavours, as each renderer creates its own flavour.



### Naming conventions

All the objects under the Renderer section of this planets were created 
using certain naming conventions.

I recommend that the "renderer" developer be aware of those and try to 
implement them in her/his own creations.

Those conventions are: 

- at the class level
    - renderers, the class name follows this scheme:
        - <Soko> <$rendererIdentifier> <FormRenderer>
    - Traits, a trait applies to a specific renderer.
            Therefore the relative path for a trait (from a "trait" directory) is:
        - <$rendererIdentifier> </> <Soko> <$traitIdentifier> <$rendererIdentifier> <Trait>
          
- at the method level, the available methods follow the model's controls quite precisely.
    The main methods are:
    
    - renderInputText
    - renderInputHidden
    - renderInputPassword
    - renderInputTextarea
    - renderChoiceList
    - renderChoiceListGroup
    - renderChoiceListWithNames
    - renderFileStatic
    - ...
    
    Internally, they call methods starting with the doRender prefix (factorizing):
    
    - doRenderInputControl
    - doRenderChoiceControl
    
    Then those methods use some lower level components:
    
    - doRenderLabel
    - doRenderError
    - doRenderInputWidget
    - doRenderTextareaWidget
    - doRenderChoiceWidget
        - doRenderChoiceListWidget
        - doRenderChoiceListGroupWidget
        - doRenderChoiceListWithNamesWidget

    So, we can observe the control/widget distinction, where the control is the whole thing (including
    label and error messages...), while the widget is actually just the very html element the user 
    is interacting with.
    
 














Add notification messages to the form
=============================

What's a notification?

We will take our definition from here:
https://github.com/lingtalfi/Models/blob/master/Notification/NotificationsModel.php

In other words, the notification is an array with those 3 properties:

- type: string, the type of notification, can be one of: success, info, error, warning.
- title: null|string, the title of the notification, or null to use the default value (which could be not title)
- msg: null|string, the message of the notification, can contain html, or null to use the default value.

In our case, we will always set the msg property, so it will never be null.

Using such a model promotes the idea that developers can use their own notification renderers (provided that 
they use the same model) to render a notification.

So, the notification rendering system is decoupled from our soko system, and for the better: more flexibility
in the rendering process.


Create a notification
------------------------
To create a notification, use the form's addNotification method, which signature is the following:

- void addNotification ( type, msg, title=null )

Typically, you would use this from inside the onSuccess callback, so that the user sees a congratulation message, 
or an error message (if something wrong happens).



Display notifications
-------------------------


Couple of things that make life even easier for the developers:
 
- soko comes with a default notification renderer (SokoNotificationRenderer), which output 
        you can/should theme using css
- the soko form renderer has a **setNotificationRenderer** method that let us attach a 
    notification renderer object (any object with a render method), or a callable to it.  
    Plus, it also has a **notifications** method that makes displaying those rendered notifications a breeze
```php
<?php $r->notifications(); ?>
```        
 
 
SokoFormErrorRemovalTool.js remove user errors as she/he fixes them
============================== 


The errorRemovalTool is a thin javascript layer on top of a soko form that removes
the form errors dynamically as the user fixes them.

Find the script in this repository here: **assets/js/soko-form-error-removal-tool.js**.


How to use it
------------------
Here is how to use it:


- include jquery in your view.
- include the js source in your view.
- then paste this in your code somewhere:

```js
document.addEventListener("DOMContentLoaded", function (event) {
    $(document).ready(function () {
        var jForm = $('#widget-create-account');
        var errorRemoval = SokoFormErrorRemovalTool.getInst("createAccount", { 
            context: jForm
        });
        errorRemoval.refresh();
    });
});
```

Note: in this case we create a non existing instance **createAccount** with parameters.
This will memorize our instance for later uses.



If you have custom control and your error message doesn't go away automatically (like a datepicker plugin
for instance), then you can always make the error message vanish programmatically using the
removeErrorByControlName method, like so:

```js
$('.datepicker').datepicker({
    onSelect: function (date, obj) {
        var errorRemoval = SokoFormErrorRemovalTool.getInst("createAccount"); // note the tool identifier here (createAccount)
        errorRemoval.removeErrorByControlName("birthday");
    }
});

```

Note: in this case, we re-use the **createAccount** instance of the tool created earlier, that's why
we don't need to pass parameters.


Note2: if having all the javascript code in one place is an option, then you don't need to use the **getInst**
method at all and can just use the reference to the instance you create manually:

```js
var errorRemoval = new SokoFormErrorRemovalTool();
errorRemoval.refresh();
// then later...
errorRemoval.removeErrorByControlName("birthday");

```



Internals
----------------
The errorRemovalTool internally leverages intricate structure details of the sokoForm:
- the fact that a soko error has the .soko-error css class
- the fact that a soko error has a data-name attribute set to the control name
- the fact that named items (created with SokoChoiceControl[type=listWithNames] have
         a data-control-name attribute set to the control name





The final example
========================

```php 

<?php


use Ling\Bat\ArrayTool;
use Core\Services\A;
use Ling\SokoForm\Control\SokoChoiceControl;
use Ling\SokoForm\Control\SokoFileControl;
use Ling\SokoForm\Control\SokoInputControl;
use Ling\SokoForm\Form\SokoForm;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\NotificationRenderer\SokoNotificationRenderer;
use Ling\SokoForm\Renderer\SokoDemoFormRenderer;
use Ling\SokoForm\ValidationRule\SokoAtLeastXCharsValidationRule;
use Ling\SokoForm\ValidationRule\SokoContainsBetweenXAndYDigitsValidationRule;
use Ling\SokoForm\ValidationRule\SokoEmailValidationRule;
use Ling\SokoForm\ValidationRule\SokoInArrayValidationRule;
use Ling\SokoForm\ValidationRule\SokoInRangeValidationRule;
use Ling\SokoForm\ValidationRule\SokoIsCheckedValidationRule;
use Ling\SokoForm\ValidationRule\SokoNotEmptyValidationRule;
use Ling\SokoForm\ValidationRule\SokoSameAsValidationRule;


//--------------------------------------------
// kamille framework specific app boot (don't mind this...)
//--------------------------------------------
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";
A::testInit();


//--------------------------------------------
// SOKO FORM MODEL
//--------------------------------------------
$form = SokoForm::create()
    //--------------------------------------------
    // CONFIG
    //--------------------------------------------
    ->setName("sokoform")// this is the default name
    ->setValidationRulesLang('fra')// set the default lang for validation rules error messages
    //--------------------------------------------
    // CONTROLS
    //--------------------------------------------
    ->addControl(SokoChoiceControl::create()
        ->setName("account_type")
        ->setLabel('Account type')
        ->setChoices([
            "stu" => "Student",
            "pro" => "Professional",
        ])
    )
    ->addControl(SokoInputControl::create()
        ->setName("email")
        /**
         * Note: the label can be displayed as a placeholder if the view wants it so.
         * What if the view wants a label AND a placholder? Didn't have the use case yet,
         * so
         */
        ->setLabel('E-mail')
//        ->setValue("some default value")
//        ->setValueIsOverridable(false)
    )
    ->addControl(SokoInputControl::create()
        /**
         * Note: the password type is added/not added at the view level
         */
        ->setName("password")
        ->setType("password")
        ->setLabel('Password (6 characters minimum)')
    )
    ->addControl(SokoInputControl::create()
        ->setName("password2")
        ->setType("password")
        ->setLabel('Type your password again')
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("gender")
        ->setLabel('Gender')
        ->setChoices([
            "f" => "Female",
            "m" => "Male",
        ])
    )
    ->addControl(SokoInputControl::create()
        ->setName("last_name")
        ->setLabel('Last Name')
    )
    ->addControl(SokoInputControl::create()
        ->setName("first_name")
        ->setLabel('First Name')
    )
//    ->addControl(SokoChoiceControl::create()
//        ->setName("country")
//        ->setLabel('Country')
//        ->setChoices([
//            "Europe" => [
//                "fr" => "France",
//                "es" => "Spain",
//            ],
//            "Asia" => [
//                "cn" => "China",
//                "jp" => "Japan",
//            ],
//        ])
//    )

    ->addControl(SokoChoiceControl::create()
        ->setName("birthday_day")
        ->setLabel('Birthday')
        ->setChoices(ArrayTool::mirrorRange(1, 31))
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("birthday_month")
        ->setChoices([
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December",
        ])
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("birthday_year")
        ->setChoices(ArrayTool::mirrorRange(1900, date('Y') - 4))
    )
    ->addControl(SokoFileControl::create()
        ->setLabel("Your diploma (pdf)")
        ->setName("diploma")
        ->setAccept(".pdf") // same as html accept attribute
    )
    ->addControl(SokoInputControl::create()
        ->setName("phone_indicator") // a custom widget
    )
    ->addControl(SokoInputControl::create()
        ->setName("phone")
        ->setLabel('Phone')
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("abos")
        ->setLabel('Subscribe')
        ->setChoices([
            "promos" => "I want to receive promotions from yourcompany",
            "partners" => "I want to receive offers from friends of yourcompany",
            "sms" => "I want to receive offers as sms",
        ], true)
    )
    ->addControl(SokoChoiceControl::create()
        ->setName("i_agree")
        ->setLabel('Agree')
        ->setChoices([
            "1" => "I agree with the terms",
        ], true)
    );

//--------------------------------------------
// VALIDATION RULES
//--------------------------------------------
$form
//    ->addValidationRule("password", SokoValidationRule::create()
//    ->setPreferences([
//        'minChar' => 5,
//    ])
//    /**
//     * If value is null, it means that the control was not posted.
//     * This behaviour might be useful in the case of checkboxes.
//     */
//    ->setValidationFunction(function ($value, array &$preferences, array &$errors = [], SokoFormInterface $form) {
//        $value = (string)$value;
//        if (strlen($value) < $preferences['minChar']) {
//            $errors[] = "This field requires at least {minChar} characters";
//            return false;
//        }
//        return true;
//    })
    ->addValidationRule("account_type", SokoInArrayValidationRule::create()->setArray(['stu', 'pro']))
    ->addValidationRule("email", SokoEmailValidationRule::create())
    ->addValidationRule("password", SokoAtLeastXCharsValidationRule::create()->setMinChar(5))
    ->addValidationRule("password2", SokoSameAsValidationRule::create()->setSameAs("password"))
    ->addValidationRule("gender", SokoInArrayValidationRule::create()->setArray(['m', 'f']))
    ->addValidationRule("last_name", SokoNotEmptyValidationRule::create())
    ->addValidationRule("first_name", SokoNotEmptyValidationRule::create())
    ->addValidationRule("birthday_day", SokoInRangeValidationRule::create()->setRange(1, 31))
    ->addValidationRule("birthday_month", SokoInRangeValidationRule::create()->setRange(1, 12))
    ->addValidationRule("birthday_year", SokoInRangeValidationRule::create()->setRange(1900, date('Y') - 4))
    ->addValidationRule("phone_indicator", SokoInArrayValidationRule::create()->setArray(["33", "32"]))
    ->addValidationRule("phone", SokoContainsBetweenXAndYDigitsValidationRule::create()->setRange("10", "10"))
    ->addValidationRule("i_agree", SokoIsCheckedValidationRule::create());


//--------------------------------------------
// MODEL THINGS
//--------------------------------------------


/**
 * Will check whether or not the form was posted.
 *      Note: Soko automatically adds a fake input=hidden in the form in order to detect if the form was posted
 *
 * If the form is posted and all validation rules pass,
 * the success callback (second argument) will be executed
 */
$form->process(function (array $values, SokoFormInterface $form) {
    // do something with the values here
    $form->addNotification("yeepee", "success");
});


//a($_POST);
//az($form->getModel());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A soko demo</title>
    <style>
        .soko-error-container {
            color: red;
        }
    </style>
    <?php
    SokoNotificationRenderer::cssTheme();
    ?>
</head>
<?php
//--------------------------------------------
// NOW ABOUT RENDERING THE FORM
//--------------------------------------------
$r = SokoDemoFormRenderer::create()
    ->setNotificationRenderer(SokoNotificationRenderer::create())
    ->setForm($form);
?>


<body>
<div id="mywidget">
    <form <?php $r->formAttributes(); ?>>
        <?php $r->notifications(); ?>
        <h2>A soko form</h2>
        <table>
            <?php $r->render('account_type'); ?>
            <?php $r->render('email'); ?>
            <?php $r->render('password'); ?>
            <?php $r->render('password2'); ?>
            <?php $r->render('gender'); ?>
            <?php $r->render('last_name'); ?>
            <?php $r->render('first_name'); ?>
    
            <?php $r->date3('birthday_day', 'birthday_month', 'birthday_year'); ?>
    
    
            <?php $r->render('diploma'); ?>
    
            <?php $r->phone('phone_indicator', 'phone'); ?>
    
            <?php $r->render('abos'); ?>
            <?php $r->render('i_agree'); ?>
    
            <?php $r->submitKey(); ?>
            <?php $r->submitButton(); ?>
        </table>
    </form>
</div>

<script>
// note: the js code below is optional, but it will enhance the user experience
document.addEventListener("DOMContentLoaded", function (event) {
    $(document).ready(function () {
        var jContext = $('#mywidget');
        var errorRemoval = new SokoFormErrorRemovalTool({ 
            context: jContext
        });
        errorRemoval.refresh();
    });
});
</script>
</body>
</html>


```



Related
-------------

- https://github.com/lingtalfi/OnTheFlyForm, the predecessor of SokoForm


History Log
------------------

- 1.72.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.72.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.72.0 -- 2018-06-15

    - add SokoFormInterface.addError method

- 1.71.0 -- 2018-06-14

    - add SokoAtLeastNCheckboxCheckedValidationRule class
    
- 1.70.0 -- 2018-06-06

    - add SokoForm.countNotifications method
    
- 1.69.0 -- 2018-06-06

    - add UikitSokoFormRenderer array option for checkboxes
    
- 1.68.0 -- 2018-06-06

    - add UikitSokoFormRenderer br option for checkboxes
    
- 1.67.0 -- 2018-06-03

    - add UikitSokoFormRenderer.renderSokoFilePlaceHolderControl method

- 1.66.0 -- 2018-06-03

    - add SokoFilePlaceholderControl control

- 1.65.0 -- 2018-06-02

    - add UikitSokoFormRenderer grid system

- 1.64.1 -- 2018-06-02

    - fix SokoForm.getModel errors at form level not returned

- 1.64.0 -- 2018-06-02

    - add UikitSokoFormRenderer.renderForm controlIds option

- 1.63.0 -- 2018-06-02

    - enhance SokoForm.process method; now returns false when callback returns false

- 1.62.0 -- 2018-06-02

    - add UikitSokoFormRenderer.renderForm topContent option

- 1.61.0 -- 2018-06-01

    - add WithParsleyUikitSokoFormRenderer topNotification system, add internal js handler for parsley
    
- 1.60.1 -- 2018-05-31

    - fix UikitSokoFormRenderer error handling for ajax file upload controls 
    
- 1.60.0 -- 2018-05-31

    - enhance SokoForm.process method; it now returns a useful output 
    
- 1.59.0 -- 2018-05-31

    - add UikitSokoFormRenderer class 
    - add FrenchSokoForm class 
    
- 1.58.0 -- 2018-05-25

    - add SummerSokoFormRenderer.renderSelect method 
    
- 1.57.0 -- 2018-05-25

    - add SummerSokoFormRenderer 
    
- 1.56.2 -- 2018-05-21

    - fix SokoForm internal translation mechanism not resolving tags
    
- 1.56.1 -- 2018-05-21

    - fix SokoValidationRuleTranslator getLang -> setLang typo
    
- 1.56.0 -- 2018-05-21

    - add SokoValidationRuleTranslator
    
- 1.55.1 -- 2018-05-09

    - fix SokoTvaIntracomValidationRule.checkTvaIntracomUsingVies private method, use more permissive code (against webservice evolution))
    
- 1.55.0 -- 2018-05-01

    - add SokoTool::getGroupControls method
    
- 1.54.0 -- 2018-04-30

    - add SokoTool::removeGroup method

- 1.53.0 -- 2018-04-30

    - add SokoTool::addSection method
    - moved SokoUtil::changeGroupControls method to SokoTool

- 1.52.0 -- 2018-04-30

    - add SokoUtil::changeGroupControls method

- 1.51.0 -- 2018-04-21

    - enhance SokoInArrayValidationRule, now is more permissive with strings vs int checking

- 1.50.0 -- 2018-04-20

    - reforged SokoFormErrorRemovalTool js getInst method, add auto-registration based on form css id
    
- 1.49.0 -- 2018-04-20

    - enhance SokoFormErrorRemovalTool js, now handles inputs of type password
    
- 1.48.0 -- 2018-04-13

    - add setGroups to SokoFormInterface

- 1.47.1 -- 2018-04-04

    - fix SokoTennisListChoiceControl allSelectedReturnsNull property not being returned properly

- 1.47.0 -- 2018-04-04

    - add SokoTennisListChoiceControl.allSelectedReturnsNull property, true by default

- 1.46.0 -- 2018-04-04

    - add SokoTennisListChoiceControl
    
- 1.45.0 -- 2018-03-23

    - add SokoDateControl
    
- 1.44.0 -- 2018-03-16

    - add SokoSafeUploadControl.setPayloadVar method
    
- 1.43.0 -- 2018-03-12

    - add SokoFormInterface.getGroups method
    
- 1.42.1 -- 2018-03-12

    - fix SokoFreeHtmlControl internal html property conflict with user defined properties
    
- 1.42.0 -- 2018-03-12

    - add SokoFreeHtmlControl object
    - add SokoControl.setProperty method
    
- 1.41.0 -- 2018-03-11

    - add SokoComboBoxControl.addEmptyChoiceAtBeginning method
    
- 1.40.0 -- 2018-03-11

    - add SokoComboBoxControl object
    
- 1.39.0 -- 2018-02-27

    - add SokoSafeUploadControl object
    
- 1.38.0 -- 2018-02-19

    - add SokoControl.addProperties method
    
- 1.37.0 -- 2018-02-08

    - soko-form-error-removal-tool.js now handles textarea
    
- 1.36.0 -- 2018-02-06

    - SokoFormRenderer internal getRenderIdentifier method now throws exceptions when the class is unknown
    
- 1.35.1 -- 2018-01-29

    - update SokoAutocompleteInputControl object, now is more agnostic
    
- 1.35.0 -- 2018-01-29

    - add SokoAutocompleteInputControl object
    
- 1.34.0 -- 2018-01-25

    - SokoFormRenderer.render now distinguishes SokoBooleanChoiceControl from other types of control
    
- 1.33.0 -- 2018-01-24

    - enhance SokoForm.process, now ask the value back from the control objects (rather than just from the pool)
    
- 1.32.0 -- 2018-01-24

    - add SokoBooleanChoiceControl
    
- 1.31.0 -- 2018-01-18

    - improve SokoControl, now accept properties property
    
- 1.30.4 -- 2018-01-01

    - fix notifications, now callback executes first
    
- 1.30.3 -- 2017-12-12

    - fix SokoSiretValidationRule illegally returning false
    
- 1.30.2 -- 2017-12-12

    - fix SokoSiretValidationRule accepting string with length different than 14
    
- 1.30.1 -- 2017-11-30

    - fix SokoTableFormRenderer.renderInputCheckbox now the value is fixed to 1
        
- 1.30.0 -- 2017-11-30

    - update SokoForm, now filteredContext returns null if the control's value isn't posted
    
- 1.29.0 -- 2017-11-30

    - add SokoTableFormRenderer.renderInputCheckbox method
    
- 1.28.0 -- 2017-11-30

    - add SokoFileNotEmptyValidationRule
    
- 1.27.0 -- 2017-11-30

    - add SokoFormRenderer.getFormErrors method
    
- 1.26.0 -- 2017-11-29

    - add SokoFormRenderer.getControlModel method
    - add SokoTableFormRenderer.renderControlError method
    
- 1.25.0 -- 2017-11-28

    - add SokoFormInterface.inject method
    
- 1.24.0 -- 2017-11-28

    - add SokoFormInterface.getName method
    
- 1.23.0 -- 2017-11-28

    - improve SokoTableFormRenderer.submitButton method, now accept attributes
    
- 1.22.0 -- 2017-11-28

    - add SokoFormInterface.addControl method
    
- 1.21.0 -- 2017-11-27

    - update SokoForm, now is compliant with formModel 1.2.0
    
- 1.20.1 -- 2017-11-27

    - fix SokoForm erroneous returned model
    
- 1.20.0 -- 2017-11-27

    - update SokoForm, now is compliant with formModel 1.1.0
    
- 1.19.0 -- 2017-11-24

    - add SokoTableFormRenderer style=checkbox preference for rendering choice control
    
- 1.18.0 -- 2017-11-24

    - update SokoForm now accept formModel as input
    
- 1.17.0 -- 2017-11-23

    - update SokoForm now passes context to SokoValidationRuleInterface
    
- 1.16.1 -- 2017-11-02

    - fix SokoTvaIntracomValidationRule::$$country2Pattern is now private again
    
- 1.16.0 -- 2017-11-02

    - add SokoTvaIntracomValidationRule::getUeCountries method
    
- 1.15.0 -- 2017-11-02

    - add SokoTvaIntracomValidationRule::countryIsInUe method
    
- 1.14.3 -- 2017-11-02

    - fix SokoTvaIntracomValidationRule (updated all tva patterns)
    
- 1.14.2 -- 2017-11-02

    - improve SokoTvaIntracomValidationRule heuristics, now can use a webservice
    
- 1.14.1 -- 2017-11-02

    - add SokoValidationRuleInterface.addValidationRule
    
- 1.14.0 -- 2017-11-02

    - add SokoTvaIntracomValidationRule
    
- 1.13.0 -- 2017-11-02

    - improve SokoFormErrorRemovalTool now handles select
    
- 1.12.1 -- 2017-11-02

    - fix SokoInArrayValidationRule isAssociative heuristic
    
- 1.12.0 -- 2017-11-02

    - the SokoValidationRule.setValidationFunction method now accepts a SokoControlInterface as its fifth argument
    
- 1.11.0 -- 2017-11-02

    - add SokoFormErrorRemovalTool js tool
    
- 1.10.2 -- 2017-11-02

    - improve SokoChoiceControl, now passes the controlName along with every item name
    
- 1.10.1 -- 2017-11-01

    - fix SokoValidationRule.setErrorMessage (private translateError function had problems)
    
- 1.10.0 -- 2017-11-01

    - add SokoValidationRule.setErrorMessage system (makes it possible to override default error messages using inheritance)
    
- 1.9.0 -- 2017-11-01

    - improve SokoInArrayValidationRule now accepts associative array (prettier labels in error messages)
    
- 1.8.1 -- 2017-11-01

    - add attributes string on SokoTableFormRenderer.doRenderInputControl internal method
    
- 1.8.0 -- 2017-11-01

    - add SokoDateValidationRule 
    
- 1.7.1 -- 2017-10-31

    - fix SokoUtil.addCssClassToPreferencesAttributes, now really works 
    
- 1.7.0 -- 2017-10-31

    - add SokoUtil
    
- 1.6.0 -- 2017-10-31

    - add SokoTableFormRenderer.getHtmlAtributesAsString protected method
    
- 1.5.0 -- 2017-10-31

    - update SokoTableFormRenderer render method; now preferences is an array and cannot be null
    
- 1.4.0 -- 2017-10-31

    - add SokoTableFormRenderer style preference (radio|select)
    
- 1.3.0 -- 2017-10-31

    - add SokoFormRenderer.setGeneralPreferences method
    
- 1.2.0 -- 2017-10-31

    - add SokoFormRenderer.getControlProperty method
    
- 1.1.0 -- 2017-10-31

    - add SokoForm.init method, as an extension of the constructor (to make subclassing a bit easier)
    
- 1.0.0 -- 2017-10-30

    - initial commit
    
    