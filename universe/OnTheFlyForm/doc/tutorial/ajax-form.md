Ajax form
==============
2017-07-25


In this tutorial we will show the necessary steps to create an ajax form.

An ajax form involves more steps than a static form.

It is strongly advised that you read the **static form tutorial** before you read this one,
because I might use references to it. 


We will use the OnTheFlyForm php object, and the onTheFlyForm js object.



We need to execute the following steps:


- create the OnTheFlyForm instance
- display the template
- handling the ajax communication when the user posts the form 
- implementing OnTheFlyForm handling logic server side with php 







Create the OnTheFlyFormInstance
==================

Here is how you would create an OnTheFlyForm instance.
It's the same init as a static form instance.

```php

<?php

$countries = []; // your app provides...
$validationRules = [
    "email" => ["required", "email"],
    "first_name" => ["required"],
    "city" => ["required"],
]; 
$form = OnTheFlyForm::create([
    'first_name',
    'last_name',
    'address',
    'postcode',
    'city',
    'country',
    'phone',
], 'optional key')  
    ->setOptions("country", $countries)
    ->setMethod("post") // this is the default, you don't need this line
    ->setNotHtmlSpecialChars([
        'country',
    ])
    ->setValidationRules($validationRules);
 


```



It's a good idea to store your OnTheFlyForm instance somewhere so that you can re-use it later.

For instance, if your form is handled by ajax, you can use the instance server side to display
the form, and re-use the instance ajax-side to handle the form.


The way you store your form depends on the framework and application you are using.

In a typical [kamille](https://github.com/lingtalfi/Kamille) application, you can do something like this:


```php
$form = A::getOnTheFlyForm("Ekom:UserAddress");
```



Display the template
=====================


OnTheFlyForm was designed to be template friendly.

Basically, the template designer has total freedom, which is good for us as we're about
to create a template.

Now with all this freedom, we have to make a choice.

As far as I'm concerned, I like tables for forms, because things get aligned easily. 

Therefore I created a [table-form.css](https://github.com/lingtalfi/table-form) library, because I knew I would be using forms a lot.

 
Feel free to change whatever doesn't suit you.

That being said, here is the technique I use for ajax forms, and don't forget to include the **table-form.css**
if you want to use this technique.


Note: I'm using kamille framework here, but you obviously can adapt this code to any framework you use.

```php

<?php

<div class="templates" style="display: none">
    <div id="tpl-new-address-form" class="tpl-new-address-form">
        <form action="" method="post" style="width: 500px" class="table-form">


            <p class="off-success-message off-success-message-container">Success message</p>

            <p class="off-error-message off-error-message-container">Error message</p>


            <?php OnTheFlyFormHelper::generateKey($m); ?>

            <table>
                <tr>
                    <td>Prénom</td>
                    <td>
                        <input name="{m:nameFirstName}" type="text"
                               value="{m:valueFirstName}">
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:nameFirstName}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><input name="{m:nameLastName}" type="text"
                               value="{m:valueLastName}">
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:nameLastName}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>Adresse</td>
                    <td><input name="{m:nameAddress}" type="text"
                               value="{m:valueAddress}">
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:nameAddress}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>Code postal</td>
                    <td><input name="{m:namePostcode}" type="text"
                               value="{m:valuePostcode}">
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:namePostcode}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td><input name="{m:nameCity}" type="text"
                               value="{m:valueCity}">
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:nameCity}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>Pays</td>
                    <td><select name="{m:nameCountry}"
                        >
                            <?php OnTheFlyFormHelper::selectOptions($m['optionsCountry'], $m['valueCountry']); ?>
                        </select>
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:nameCountry}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>Numéro de téléphone</td>
                    <td><input name="{m:namePhone}" type="text"
                               value="{m:valuePhone}">
                    </td>
                </tr>
                <tr class="hidden" data-error="{m:namePhone}">
                    <td></td>
                    <td data-error-text="1" class="error"></td>
                </tr>
                <tr>
                    <td>
                        <span data-tip="Peut être imprimé sur l'étiquette pour faciliter la livraison (par exemple le code d'accès de la résidence)."
                              class="hint">Informations complémentaires</span>
                    </td>
                    <td><input name="{m:nameSupplement}" type="text"
                               value="{m:valueSupplement}"></td>
                </tr>
            </table>

            <div class="table-form-bottom">
                <button class="submit-btn create-new-address-btn">Créer cette adresse</button>
                <button>Annuler</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {

            var jWidget = $('#widget-customer-address-book');
            var jTplAddressForm = $("#tpl-new-address-form", jWidget);

            window.onTheFlyForm.formInit(jTplAddressForm);



            $(document).on("click", function (e) {
                if (1 === e.which) {
                    var jTarget = $(e.target);
                    if (jTarget.hasClass("open-new-address-form-btn")) {

                        jTplAddressForm.find("form")[0].reset();
                        $.featherlight(jTplAddressForm); // note that I use featherlight here but you can use any plugin you want
                        return false;
                    }
                    else if (jTarget.hasClass("create-new-address-btn")) {

                        var uriService = "/service/Ekom/json/api?action=user.newAddress";
                        window.onTheFlyForm.postForm(jTarget, uriService, function () {
                            // do your success things here
                            console.log("success"); 
                        });
                        return false;
                    }
                }
            });


        });
    });
</script>
```


There are a few things to say about the above example.


Hide your form
--------------------
First of all, the form is encapsulated in two divs: that's because in the example I use a light box named **featherlight**,
which implementation is outside the scope of this discussion.

The first div is a hidden div where I put all potential templates.
I use the second div as a target for the featherlight plugin.

So, the form is hidden until the user clicks a button that opens the form in a modal (featherlight).



Form level messages
---------------------
Then we have the form level success and error message containers:

```html
<p class="off-success-message off-success-message-container">Success message</p>
<p class="off-error-message off-error-message-container">Error message</p>
```

You can obviously replace the default messages by your owns, or alternately you could define them at the controller level,
using the setSuccessMessage and/or the setErrorMessage.
Messages set at the controller level override the template level messages.




The key
--------------

Then you need to add this line inside your form.

```php
<?php OnTheFlyFormHelper::generateKey($m); ?>
```

It will generate a hidden input which help detecting whether or not the form instance has been posted.



The m: prefix
--------------

You might have noticed that every {template variable} seems to be prefixed with **m:**.
Don't worry about it, it's just a kamille feature that helps the developer to organize
the model data. 

Your mileage may vary.

But since I'm lazy, I figured out that it was faster to remove it (search/replace) than re-create it,
so I wrote the example with the **m:** prefix for my own convenience.



About error handling
------------------

With ajax forms, the approach of handling errors is the following:
we display empty placeholders for the errors, and they will be injected, if necessary, by the
js code; we will see that later.


Like for static forms, we have the **data-error** attribute and **data-error-text** attributes.

Those have to do with the **window.onTheFlyForm.formInit(jContext)** js method call.

When the **formInit** method is called, it basically detects the relationship between a 
control and its error container, so that when you click on an erroneous control, the error container 
disappear (to alleviate the potential numerous error messages on the form as the user fixes her
errors).

Now the element containing the error message text is not necessarily the same as the one that
needs to be hidden. 

Actually, it turns out that with this table based design, the tr needs to be hidden, but it's the
td that holds the error text.

In this case where the error container and the error text holder are not the same, we can use 
the **data-error-text=1** attribute to indicate which is which.

It is assumed that the error text holder is a child of the error container.

Also, error containers are hidden by default, using the hidden class, so that at the first display
the error containers don't appear (even though they are empty they might eat a little space, depending
on the markup being used).


Then there is the javascript code, but I will explain it in the very next section.



Handling the ajax communication when the user posts the form
===============================================

The first thing we can do is call the onTheFlyForm.formInit method.

Under the hood, the formInit method does the following:

- it ensures that every control error (which appears if the user posts the form with erroneous data) is removed as 
the user is interacting with the control to fix the error.


Then in our above example, the code handles a click listening structure with two conditions.


The first **if**, testing whether the target has the class "open-new-address-form-btn" or not is not strictly relevant to our discussion,
but I wanted to include because it gives us more context.


The first click listener will trigger the opening of the popup containing the form; it uses the 
[featherlight plugin](https://github.com/noelboss/featherlight/)
as you can imagine.


The second click (on the element with class **create-new-address-btn**) is the one that handles the ajax communication with a service that we will implement
in the next section.


The onTheFlyForm.postForm method is used; it's third argument is a success callback that we can use
to execute some custom js code. The success callback is triggered only when the form has been validated server side.

Validated meaning:

- the basic validation rules have passed  
- there is no custom error message (the setErrorMessage has not been called server side)  


If the basic validation rules tests yield errors, they will be injected in the form.


So to recap, only two code blocks are required, and they are here below:

```php
window.onTheFlyForm.formInit(jTplAddressForm);



var uriService = "/service/Ekom/json/api?action=user.newAddress";
window.onTheFlyForm.postForm(jTarget, uriService, function () {
    console.log("pou");
});

```


Implementing OnTheFlyForm handling logic server side with php
==============================

In the previous section we've called a service and post some data to it.

As you can guess, there is a small convention between the js script and the php service,
and that convention defines what data should be sent and returned from the service.


So, here is what has been defined:

the php service input
-----------------------

The form is posted directly to the service, which means the input of the service is the $_POST
array containing all variables of the form.



the php service output
------------------------

The service output is in json format.

It's an array which can be of two forms:


### The erroneous form

- type: error
- error: string, error message


The **error** type means an error occurred, this error is not related to the OnTheFlyForm object,
but it might occur nonetheless, so we need it. 


### The complete form

- type: complete
- model: the OnTheFlyForm model
- data: some more custom data attached in case of a successful form 





Here is an example code that I used, it belongs to a switch condition of a bigger service handler:

```php

<?php
// ...
case 'user.newAddress':

    if (SessionUser::isConnected()) {

        $userId = SessionUser::getValue("id");
        $sData = getArgument("data", true);
        parse_str($sData, $data);

        $userLayer = EkomApi::inst()->userLayer();


        $addressId = null; // to update an existing address, otherwise it's a new address
        if (array_key_exists("address_id", $data)) {
            $addressId = $data["address_id"];
        }


        $form = A::getOnTheFlyForm("Ekom:UserAddress");
        $form->inject($data);

        $outData = null;

        if (true === $form->validate()) {
            
            
            $data = $form->getData(); // now do what you want with data
            

            if (true === $userLayer->createAddress($userId, $data, $addressId)) {
                $outData = [
                    'addresses' => $userLayer->getUserShippingAddresses($userId),
                ];
                $form->setSuccessMessage("ok"); // this is just for the demo, in real life, the popup closes so the success message is not seen
            } else {
                $form->setErrorMessage("An exception occurred, please contact the webmaster.");
            }
        }
        $model = $form->getModel();
        $out = [
            "type" => "complete",
            "model" => $model,
            "data" => $outData,
        ];


    } else {
        $out = [
            "type" => "error",
            "error" => "the user is not connected",
        ];
    }
    break;
// ...    
```



Conclusion
============

For the developer convenience, we can name the protocol that we use in this section.

We will name it off protocol (On the Fly Form protocol), 
and it will have its own [dedicated page here](https://github.com/lingtalfi/OnTheFlyForm/blob/master/doc/off-protocol.md).







