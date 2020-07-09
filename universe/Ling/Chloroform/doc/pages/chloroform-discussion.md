Chloroform discussion
==========
2019-04-10 -> 2020-06-01



Summary
===========
- [The form anatomy and general behaviour](#the-form-anatomy-and-general-behaviour)
    - [The field id](#the-field-id)
    - [Formatting/transforming form values](#formattingtransforming-field-values)
- [The posted data](#the-posted-data)
- [The isPosted method and form concurrency](#the-isposted-method-and-form-concurrency)
- [The concept of very important data](#the-concept-of-very-important-data)
- [Data transformers](#data-transformers)
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
2019-04-10 -> 2020-06-01

When a form is posted, an array of key/value pairs is created representing the form data.

In Chloroform, this array contains a merge of the $_POST and the flattened version of the $_FILES.

By flattened, I mean dot flattened using the PhpUploadFileFixTool from [the PhpUploadFileFix planet](https://github.com/lingtalfi/PhpUploadFileFix).



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




The concept of very important data
===============
2019-10-22

When we post a form, we usually want to do something with the posted data.
For instance, update the database, or send an email.

So this data that we use I call it very important data.

However, not all the posted data is very important, some of the posted data, for instance:

- some posted data is just used to check whether this particular form (i.e. with a particular form id) was posted (and not another form)
- some posted data is just used to check whether a csrf token is valid
- some malicious user has added a lot of garbage data to your form

We don't need that kind of data in the end, when updating the database or sending an email,
and so this I call not very important data.


Now in chloroform, I believed it would have been useful to be able to get those very important data only.
So, now Chloroform has a new method called **getVeryImportantData**, and each field has the **setHasVeryImportantData** and **hasVeryImportantData** methods
to help implementing this idea. 

As for now, the hasVeryImportantData is handled internally and will not be exposed in the [form array](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-array.md),
because I'm not sure that would be a good idea, maybe it's just some parasite info we don't need to have in the array? 




Data transformers
===============
2019-10-22


I created the concept of data transformers based on one use case only, and so here is how it works:

so the form has been posted, validated, and now you've got your very important data, you're about to do something with them.

But the very important data, they don't have their final form yet.

So you apply the data transformers, and now you use the very important data as you like (i.e. updating the database, sending an email, ...).


So what's the use case for data transformer?

It's about a form with an ajax file upload field, and we use the [2svp idea](https://github.com/lingtalfi/TheBar/blob/master/discussions/ajax-file-upload.md#2-steps-validation-process),
so basically the very important data contains the name of the temporary file (i.e. with the 2svp extension), but before we can use this data, we need to have the final file (i.e. remove
the 2svp extension). So that's why the data transformer concept was originally created for: to give me a hook allowing for removing this temporary file extension in a programmatic way (because
I intend to generate forms later, and so I need the DataTransformer phase to be handled automatically on the generated forms).

So, data transformer is a bit special, and you might not use it yourself, unless you use ajax file uploads with 2svp, but it's there.


The data transformers also don't appear in the [form array](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-array.md),
as it's an internal feature, and the **form array** is intended to be processed by renderers (the view side of the MVC model).



The validates method and the fallback value
===================
2019-11-01


I struggled until today with this concept of validates method, but today I think I've got it right.

So here is what the validates method do.


When the form is posted, all fields values are updated.

If the value is found in the posted data (POST+FILES), then the posted value becomes the new field value.

Otherwise, if the value is not found in the posted data, then the field takes the **fallback value**, which defaults to null.

The developer can override the **fallback value** at the field level.

This design has been deliberately chosen, so that if you have a checkboxField for instance, when the form is posted and if the
user didn't check any checkboxes, then you have a value to check against.

Note, and it's important, that with this specific design, if there were some default checkboxes ticked, and the user unchecked them all,
you still get the **fallback** value. This is important to understand because it emphasizes the difference between the default value (some checkboxes
checked by default for instance), and the fallback value (the **generated** value once the form is posted).


With all that said, back to the validates method.

So the validates method basically takes the posted data (POST+FILES), and injects the posted data value (or the fallback value if not set) in the field.

Then, once the fields are correctly "prepared", it triggers the validators associated with each field, and eventually returns a boolean, which is true only if 
all fields have validated.


Note that the fallback value doesn't appear in the [chloroform array](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-array.md), 
because it's handled internally and eventually a fallback value becomes the actual field value. 







The Chloroform synopsis
==========
2019-04-10 -> 2019-12-03


And so having discussed all that, here is my final version (so far) of the chloroform synopsis (omitting the form.mode for now):


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


Note that with this design, the **setValue** method of the fields (which is called indirectly by the **injectValues** method
of the form) is not called when the form is used in **"insert" mode**. It's only used in **"update" mode**.

Note that the validates method also injects the postedData values.







