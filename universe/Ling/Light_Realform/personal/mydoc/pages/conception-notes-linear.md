Light_Realform
===============
2019-10-14 -> 2019-11-01





Summary
=========
* [Intro](#intro)
* [The form handler](#the-form-handler)
* [The realform handler](#the-realform-handler)
* [Dynamic injection](#dynamic-injection)



Intro
========
The hope of this tool is to be able to create any form.



The main idea is that we have three main parts:


- the form handling
- the form rendering
- the success handler


The form handler connects the two other parts together.
It handles the form errors, and call the **success handler** if the form validates.

The form renderer is only responsible for displaying the form, it has no brain.
The success handler is some php code that does something with the validated posted data, it can for instance
update a database or send an email, or more.




Another important idea, more of a personal wish, is that 
we will be using an array for the configuration, and in particular, I plan
to use the readable babyYaml notation to store this array.



Yet another idea is one pertaining to the rendering of the form:
we shall be able to render any kind of form, yet I don't know a single system
that can handle that, and therefore the rendering section of the configuration
shall be extensible. And in general the whole configuration array shall be extensible,
meaning that we can always add more blocks later, each block encoding for a specific subsystem.
In particular, I was thinking about the fact that some forms are rendered horizontally,
and some are rendered using a mix of vertical/horizontal layout. However for my first (and perhaps only)
renderer, I plan to do create a very basic renderer which only handles vertical layout.

So, the horizontal/vertical handling could be added as a subsystem, later when the needs for it arises.





Those are my main ideas for the realform, let's now get into more details.




Note: from now on I intend to have my conception notes be chronologically linear, so that if I revisit/fix
a section later, I just add a new paragraph in the conception notes, but I have the full history of my thoughts
in the conception notes. I'll use a separate conception notes file to compile the ideas that eventually made it to the end.

So this file you're reading is conception-notes-linear, and is linear, meaning some information you're reading might 
be outdated.

The other conception-notes file is kind of a summary of the ideas found in conception-notes-linear.
In other words, conception-notes-linear is more like an alive brainstorming, and conception notes is more like a manual for the developer.  





The form handler
==================
2019-10-14


As it turns out, I've already written such a form handler: [Chloroform](https://github.com/lingtalfi/Chloroform#rendering-the-form).
Reading the chloroform doc, I believe it shall be agnostic enough to let us do whatever we want, and therefore I want to give it a try.

Rather than wrapping everything in with even more agnostic interfaces, which would produce a lot of code and be time consuming,
I say let's use the chloroform handler directly.


Chloroform comes with a simple pattern as far as handling the form data:

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
```

 
 
Now with realform, the only thing I want to change so far is just how the chloroform instance is created.
In real form, I plan to have something like this:


```php

$form = $container->get("realform")->getFormHandler("some identifier"); // returns a chloroform instance directly (rather than a realFormHandler interface...)

```





The realform handler
==================
2019-10-14


In order to have more flexibility in terms of architecture, I believe realform should delegate its tasks to plugins.

So there is this interface called RealformHandlerInterface, which is different than a simple form handler (which is chloroform in our case).

To get the **RealformHandlerInterface** instance, we use the realform service:


- getRealformHandler(identifier): RealformHandlerInterface


The identifier is very important and has the following structure:

- identifier: {pluginName}.{id}

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





Dynamic injection
=============
2019-11-01

We use the same system as [realist dynamic injection](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/duelist.md#dynamic-injection).

Dynamic injection basically allows us to add dynamic variables into the (otherwise static) configuration array.

It allows this kind of syntax:

```yaml
csrf_token: REALFORM(Light_Realform, csrf_token, a_token_name)
```

The arguments of the REALFORM pseudo-function are:

- the dynamic injection handler identifier, used to get the dynamicInjectionHandler instance.
        In most cases we recommend using the plugin name.  
- ...the rest of the arguments ("csrf_token" and "a_token_name" in the above example) are passed as an array to the dynamic injection handler.
        Usually, the handlers use the first argument (csrf_token) as an "action" identifier, and then the rest of the arguments (a_token_name and what potentially follows)
        as the arguments for that "action", but this is up to the dynamic injection handler instance.


Now the **Light_Realform** plugin comes with its own dynamic injection handler, which use the second parameter as the action identifier (as described just above),
and the available actions are:

- csrf_token (string tokenName)
        This method will create a token and return its value (i.e. the output of the LightCsrfService->createToken method).














