Light_Realform
===============
2019-10-14 -> 2020-09-04



For the history of these conception notes, see the **conception-notes-linear.md** document.


The hope of this tool is to be able to create any form.



The main idea is that we have the following parts:


- the form handling
- the success handler
- the miscellaneous part 


The form handler basically handles the form submission: it handles the form errors, and call the **success handler** if the form validates.

The success handler is some php code that does something with the validated posted data, it can for instance
update a database or send an email, or more.

The miscellaneous part contains properties such as the title of the form.



We configure a realform using a php array.





The form handler
==================
2019-10-14

We use [Chloroform](https://github.com/lingtalfi/Chloroform) under the hood. 

```php 

//--------------------------------------------
// Creating the form
//--------------------------------------------
$form = $container->get("realform")->getFormHandler("MyPlugin.the_form_id");



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
```

 





The realform handler
==================
2019-10-14 -> 2020-09-04


The service provides the following method:

- getRealformHandler(identifier): RealformHandlerInterface


The identifier is very important and has the following structure:

- identifier: {pluginName}:{id}

With: 

- pluginName: the name of the plugin providing the **RealformHandlerInterface**
- id: an internal identifier used by the {pluginName} plugin, see the methods below



Then, the **RealformHandlerInterface** has the following methods:

- getFormHandler(string id): Chloroform
- getConfiguration(string id): array
- getSuccessHandler(string id): callable|RealformSuccessHandlerInterface
- getFormRenderer(string id): RealformRendererInterface



With:

- RealformRendererInterface->render( chloroformArray ) 
- RealformSuccessHandlerInterface->handle( formValidatedData ) 




Realform handler alias helper
==================
2019-11-01


To configure the formHandler instance correctly (usually a Chloroform instance),
we use aliases in the configuration file.

And so each field has an alias, and each validator has an alias, and each data transformer
has an alias.

For instance, the alias for the RequiredDateValidator is requiredDate.

Because plugins can create their own validators, they also need a way to provide their aliases.

This plugin's service will transmit the external plugin aliases to the
main realform handler which uses them.

If you are a plugin author and you want to provide your own aliases, you must create a class that 
implements the **RealformHandlerAliasHelperInterface** and register it to our **realform_handler_alias_helper** service.

See our service configuration file for more info.




 








