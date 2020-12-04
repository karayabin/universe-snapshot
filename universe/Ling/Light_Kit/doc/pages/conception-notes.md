Conception notes 
========
2019-05-15 -> 2020-11-27




* [Dynamic variables](#dynamic-variables)
* [Light execute notation](#light-execute-notation)
* [Page conf updator](#page-conf-updator)




Dynamic variables
----------------
2019-05-15


The kit system distinguishes between static and dynamic variables.

Static variables are the ones stored directly in the page configuration.

And the dynamic variables are the ones created by php at runtime.

Static variables can reference dynamic variables by using a special notation, which defaults to the following:

- ${myVar}

(a dollar symbol, followed by an opening curly bracket, then the dynamic variable name, then the closing curly bracket)


Dynamic variables were create to solve the problem of a widget which needs to display "Hello Tim",
where "Tim" is the name of the currently logged user, and "Hello" is just one of many variations of a greeting word 
(could have been Hi, Bonjour, Salut, Guten Tag, Welcome,...).

Because of the number of potential variations of the greeting world ("Hello" in this case), it has to be stored in the 
widget configuration (and hence in the page configuration): the other approach would be to create one template by variation, 
but this would obviously lead us to too many template files, that's not a practical solution.

So thanks to the dynamic variable concept, we can store this in the widget configuration:

- Hello ${user_name}

Which solves the problem.







Light execute notation
----------------
2019-07-15 -> 2020-11-27


Like dynamic variables, the light execute notation system allows you to inject variables dynamically
into your templates. However, this time you can call a php method or a light service.


The notation is explained in great details in the [light execute notation reference, configuration files section](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md#using-the-notation-in-configuration-files).
It looks like this:


- ::(@reverse_router->getUrl(myRoute))::





Page conf updator 
---------------
2019-07-25 -> 2019-10-29


The page conf updator is the simplest way to update the page configuration array.

It basically allows controllers to change the kit page configuration array on the fly.


Example:

```php
return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/user/user_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
    'vars' => [
        'request_declaration_id' => 'Light_Kit_Admin:lud_user',
    ],
]));
```

Why do we need this?

In a Light kit application, the page logic is handled by controllers which then call 
the LightKitPageRenderer->renderPage method.


In other words, the controllers only have the renderPage method to communicate with the kit page configuration (which
is responsible for setting all the layout and widgets of a page, in other words the kit page configuration controls
all the gui part of the page).


Now most of the time, the controllers don't need to communicate with the gui. In kit, the controllers call 
a gui template, and that's it.

However, what if the gui needs more interaction with the controller?

This case happens with forms, where the controller will create form error messages and need to transmit them
to the page configuration.

In the previous state of things, we had page transformers (dynamic variables and lazy reference resolver), 
but it turns out those are mostly useful to convert some data into another.

Plus, setting a page transformer require some extra work; it needs to be registered, and we need to create
a PageTransformer object, this is not an optimal solution.


And so controllers need a more direct way to interact with the page configuration.

PageConfUpdator is the solution to this problem.
We could technically use a simple array, but the problem is that widgets being indexed numerically,
updating a specific widget requires to know the index of the widget. 

Usually, we know that index, suffices to look at the kit page configuration.
However the problem comes with third-party plugins, some plugins will update the page configuration,
some others won't, and so the kit page configuration is a dynamic target that might change every
time you install/uninstall a plugin.

So, the updator will basically allow us to update widget based on their names or other identifiers, rather
than just the index.

In fact, I suggest to leave names for users, and plugin authors should add a key named "identifier"
to the widget configuration, reserved for plugin authors. 

And so usually, what I believe should happen in practice, is that the plugin author would create
the controller and the corresponding widget configuration, so for instance she creates the UserFormController,
and then she also creates the userFormWidget configuration, so that she can safely choose her identifier.

In other words, the "identifier" key of a widget should not be changed by the app maintainer,
and plugin authors should not update the "name" key, but rather use the "identifier" key for their
own use.





 







 

