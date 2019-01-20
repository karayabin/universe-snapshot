Static form
==============
2017-07-25


In this tutorial we will show the necessary steps to create a static form.

We will use the OnTheFlyForm php object, and the onTheFlyForm js object.



We need to execute the following steps:


- create the OnTheFlyForm instance
- implementing OnTheFlyForm handling logic with php 
- create the template, and add "one click removal of validation error message" behaviour with js







Create the OnTheFlyFormInstance
==================

Here is how you would create an OnTheFlyForm instance.

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


Implementing OnTheFlyForm handling logic with php
============================

Once you've got yourself an OnTheFlyForm instance, you can use it to implement your data handling logic.

For a static form, we use the two following phases:

- applying validation rules
- applying custom validation


Applying validation rules
-----------------

First, we test the validation rules using the validate method of the OnTheFlyForm instance.



Applying custom validation
--------------------

Sometimes, validation rules is just not enough, and we need to use our own custom rules.

When we do so, we end up with a binary result: either our validation tests passed, or they failed.

We indicate the result to the user using the **setSuccessMessage** or **setErrorMessage** method.




So here is an example of php code that implements this logic, assuming that we are in some Controller



```php

<?php

if (true === $form->isPosted()) { // the form was posted
    $form->inject($_POST); // always inject data. For starter, to provide data persistency in the view. Plus, the validate method also uses the injected data under the hood 
    if (true === $form->validate()) {


        // sometimes you need more business logic before validating the form...
        if (true === true) {
            
            $data = $form->getData(); // now do what you want with data
            
            $form->setSuccessMessage("All right!"); // customize the success message if you don't want to use the default one
        } else {
            // always inform the user when something wrong happens
            $form->setErrorMessage("Dude there is a problem with the database! We're currently tackling the problem. Sorry for the inconvenience.");
        }
    }
} else { // initial form display
    $defaultValues = [
        'country' => "FR",
    ];
    
    // inject data for data persistency in the view
    // the second argument is true, it's the useAdaptor flag; see the adaptors document for more info
    $form->inject($defaultValues, true); 
}


$newAddressModel = $form->getModel(); // see onTheFlyForm model in the doc for more details, you can pass the model to the template


```



So, the code above is basically the skeleton to handle any static form data.




Create the template
====================

OnTheFlyForm was designed to be template friendly.

Basically, the template designer has total freedom, which is good for us as we're about
to create a template.

Now with all this freedom, we have to make a choice.

As far as I'm concerned, I like tables for forms, because things get aligned easily. 

Therefore I created a [table-form.css](https://github.com/lingtalfi/table-form) library, because I knew I would be using forms a lot.

 
Feel free to change whatever doesn't suit you.

That being said, here is the technique I use for static forms, and don't forget to include the **table-form.css**
if you want to use this technique.


Note: I'm using kamille framework here, but you obviously can adapt this code to any framework you use.

```php

<?php

use Kamille\Utils\ThemeHelper\KamilleThemeHelper;
use OnTheFlyForm\Helper\OnTheFlyFormHelper;
use Theme\LeeTheme;


LeeTheme::useLib("onTheFlyForm");
KamilleThemeHelper::css("table-form.css");
$m = $v['formModel'];


?>
<form action="" method="post" style="width: 500px" class="table-form" id="context">

    <?php if (true === $m['isPosted']): ?>
        <?php if ('' !== $m['successMessage']): ?>
            <p class="off-success-message">{m:successMessage}</p>
        <?php elseif ('' !== $m['errorMessage']): ?>
            <p class="off-error-message">{m:errorMessage}</p>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php OnTheFlyFormHelper::generateKey($m); ?>
    
        
    <table>
        <tr>
            <td>Prénom</td>
            <td>
                <input name="{m:nameFirstName}" type="text"
                       value="{m:valueFirstName}">

            </td>
        </tr>
        <?php if ('' !== $m['errorFirstName']): ?>
            <tr data-error="{m:nameFirstName}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorFirstName}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Nom</td>
            <td><input name="{m:nameLastName}" type="text"
                       value="{m:valueLastName}">
            </td>
        </tr>
        <?php if ('' !== $m['errorLastName']): ?>
            <tr data-error="{m:nameLastName}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorLastName}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Adresse</td>
            <td><input name="{m:nameAddress}" type="text"
                       value="{m:valueAddress}">
            </td>
        </tr>
        <?php if ('' !== $m['errorAddress']): ?>
            <tr data-error="{m:nameAddress}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorAddress}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Code postal</td>
            <td><input name="{m:namePostcode}" type="text"
                       value="{m:valuePostcode}">
            </td>
        </tr>
        <?php if ('' !== $m['errorPostcode']): ?>
            <tr data-error="{m:namePostcode}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorPostcode}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Ville</td>
            <td><input name="{m:nameCity}" type="text"
                       value="{m:valueCity}">
            </td>
        </tr>
        <?php if ('' !== $m['errorCity']): ?>
            <tr data-error="{m:nameCity}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorCity}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Pays</td>
            <td><select name="{m:nameCountry}"
                >
                    <?php OnTheFlyFormHelper::selectOptions($m['optionsCountry'], $m['valueCountry']); ?>
                </select>
            </td>
        </tr>
        <?php if ('' !== $m['errorCountry']): ?>
            <tr data-error="{m:nameCountry}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorCountry}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Numéro de téléphone</td>
            <td><input name="{m:namePhone}" type="text"
                       value="{m:valuePhone}">
            </td>
        </tr>
        <?php if ('' !== $m['errorPhone']): ?>
            <tr data-error="{m:namePhone}">
                <td></td>
                <td data-error-text="1" class="error">
                    {m:errorPhone}
                </td>
            </tr>
        <?php endif; ?>
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

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {
            var jContext = $('#context');
            window.onTheFlyForm.formInit(jContext);
        });
    });
</script>

```


Note that this line:


```php
<?php OnTheFlyFormHelper::generateKey($m); ?>
```

is necessary: it helps detecting whether or not this form instance has been posted.




You might have noticed that every {template variable} seems to be prefixed with **m:**.
Don't worry about it, it's just a kamille feature that helps the developer to organize
the model data. 

Your mileage may vary.

But since I'm lazy, I figured out that it was faster to remove it (search/replace) than re-create it,
so I wrote the example with the **m:** prefix for my own convenience.



About error handling
------------------

With static forms, the approach of handling errors is the following:
if the error variable is set, we display it in the template.

That's why we have php if conditions in the template.

Also, we have the **data-error** attribute and **data-error-text** attributes.

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








