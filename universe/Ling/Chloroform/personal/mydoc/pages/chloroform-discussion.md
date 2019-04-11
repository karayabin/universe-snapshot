Chloroform discussion
==========
2019-04-10



Summary
===========
- [The form anatomy and general behaviour](#the-form-anatomy-and-general-behaviour)
    - [The field id](#the-field-id)
    - [Formatting/transforming form values](#formattingtransforming-field-values)
- [The posted data](#the-posted-data)
- [The isPosted method and form concurrency](#the-isposted-method-and-form-concurrency)
- [The Chloroform synopsis](#the-chloroform-synopsis)


The form anatomy and general behaviour
=========================
2019-04-10


So the user will post the form, and some basic fields checking (validators) will be done,
and if all fields validate, then the form notifies a success message: "Congrats, the form has been successfully posted".

Sometimes, the form will notify an error message: "There's a problem with the database. The data couldn't be saved. blabla".

So yes, the form needs a notification system, and in terms of anatomy, at the top of the form we will have a notification zone.

But usually, errors and validation pertains to specific fields, and so we have the global errors, at the top of the form (but below the notification zone),
where all error messages are displayed, and we also have a per field error zone (aka inline error messages), to direct the attention of the user to specific fields.

So, that's for the errors.

Now in terms of validation logic, we should have a Validator object, and extend it whenever we need to perform a check.

For instance, to check if the user is not already registered in the database, we could create a custom Validator.

And finally, there are all those common validators, which have been encapsulated in objects already, such as EmailValidator, NotEmptyValidator, and so on.


In terms of design, I will so delegate validators and error messages to the fields (i.e not at the form level).





The field id
-------------
2019-04-10

Each field has an id. 
An id can be translated to an html name (the html form name for the element).

The field id is basically the dot version of the html name.

For instance if the html name is ```colors[red]```, then the id would be **colors.red**.


The field id is important, because it allows to target the data a field should validate against (could be an array, or a string generally).



Formatting/Transforming field values
------------------
2019-04-11


Sometimes, we will need to transform the raw form data, to prepare it so that it can be inserted in a database.
For instance, we might want to lowercase some fields, and for some people, they might want to format a date.

To keep things simple, I just consider that those tasks are not part of the Chloroform domain, since the form has already posted.

So, no work would be done for that.

This decision allows me to give more significance to the validates method of the Chloroform.

I can now pass the postedData as a reference, which gives us the following design:


```php

$postedData = null

if form->validates ( $postedData ): 
    // now do something useful with $postedData


```






The posted data
===============
2019-04-10

When a form is posted, an array of key/value pairs is created representing the form data.

In Chloroform, this array contains a merge of the $_POST and the flattened version of the $_FILES.

By flattened, I mean dot flattened using the PhpUploadFileFixTool from @page(the PhpUploadFileFix planet).


The postedData is a concept used a lot in chloroform.

From the validation's point of view, the postedData array represents the data to validate against.



The isPosted method and form concurrency
============
2019-04-10

Most of the time, web pages display only one form.
And so, in order to know whether or not a form was posted, suffices to check if the $_POST
array is not empty.

However, in some cases, web pages have multiple forms.

When that happens, we need to have a more complex algorithm to detect whether a specific 
form is posted. 

Since this is quite rare from my experience, I'm not implementing a system yet for that, 
but I give you the isPosted method, which we can use to implement algorithms with
any level of complexity. 

I remember that in the past, I used to create a hidden field with a unique name and detect
whether that field was posted.

The default isPosted method will just check whether the postedData are not empty.





The Chloroform synopsis
==========
2019-04-10


And so having discussed all that, here is my final version (so far) of the chloroform synopsis:


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


Note: the validates method also injects the postedData values.





