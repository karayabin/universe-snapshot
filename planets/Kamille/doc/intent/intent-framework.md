Intent framework
====================
2018-05-24


A way to display widgets with states.



Discussion
==================
There are many ways to display widgets on a page, here is another one.

By widget, I mean a component, like for instance a weather component (medium size),
or the login/logout widget (small size), the number of items in the cart badge widget (tiny size),
or the one page checkout process (huge size).


This technique works with any widgets, independently of their size, but is best used with
widgets that have different states: widgets which state could be updated.



The main idea
---------------

The main idea at the core of this framework is that you place markers on the page.

When you call a service, all markers on the page are automatically passed to that service (they are merged 
into the "intent" array, which is passed along with your service's params).


Each marker reacts to a certain key found in the service output: if the key is there, the widget bound to the marker
will be updated, otherwise nothing happens for this widget.

The service basically compose its output depending on the markers you have on the page.
Each bit returned is an html code that is re-injected on widget defined by each marker.

The main benefit of this technique is that it makes your page alive and consistent: the intent framework helps you creating reactive pages, 
where the different components of the page update themselves depending on some triggering actions defined by your theme.

It also for a great code reduction, as you could decide to create only one generic service if you wanted, called "refreshPage" for instance , 
and all your widgets on the page would update automatically every time you trigger the "refreshPage" generic service.

However, doing so could result in unnecessary processing, since all widgets on the page don't necessarily need to be updated
every time. 
The reality is that some actions should update more than one widget, but some others don't, that's something that the intent
framework let you control manually.



The login/logout widget tutorial
------------------

Now that we have a basic/abstract overview of the intent of the intent framework,
let's see how it works in more details.

Pre-requisites: 

- ecp: https://github.com/lingtalfi/Ecp
- bionic: https://github.com/lingtalfi/bionic


The example below illustrates how we would use the intent framework to make
the login/logout widget reactive.

Here are the steps we are going to go through:

- create the marker
- create the trigger
- create the service


### What's a trigger?
Just a javascript code that calls a service when certain action(s) is performed by the user.
For instance, if the user clicks on that button, it will trigger the ABC service.
We obviously need triggers to implement the intent framework.


### Create the marker

To create the marker, we simply rely on the bionic framework, which will act as our js medium between our html widget
and our ecp service.

In your template, do this:

```html
<div class="bionic-marker" data-type="intent" data-value="connexion_block"></div>
```

This creates a "connexion_block" marker.
Now, every time you call a service via bionic, the connexion_block will 
be automatically appended in the "intent" array passed as a service parameter.


### Create the trigger

Since we use the bionic framework, creating a bionic element is enough to have
a fully functional trigger (calling an ecp service and handling the return):

```html
<button 
        class="bionic-btn"
        data-action="connect_user"
        data-directive-form2params="1"

>Connect to my account</button>
```

For more details on the implementation of this button, see bionic doc (and cheatsheet).


This will call the (non-yet-existing) connect_user action in your 
bionic.js, which you can map to any service.

To make things simple, we are creating the connect_user service.

Our bionic.js file will look like this:

```js
(function () {

    var api = myModuleApi.inst(); // use the api you want here
    window.bionicActionHandler = function (jObj, action, params, take) {  // override this function to get started
        switch (action) {
            case 'connect_user': // this is the bionic action
            /**
            * this method below will call the "connect_user" (for instance) ecp service, passing all params.
            * Note: because of the marker we've created, 
            * the params contain at least the following:
            * 
            * - intent: 
            *       - connexion_block
            *       - ...
            * 
            * 
            * 
            * 
            */
                api.user.connect(params); // code not completed, READ ALL THE STEPS
                break;
            default:
                console.log("Unknown action: " + action);
                console.log(params);
                break;

        }

    };


})();
```



### Create the service

Now that the connexion_block intent has been passed to our service,
we only need to respond to it and provide the relevant html(/js) code that we want.
Actually, you can do it the way you want, but I want to talk about the module way, but I will talk about that in 
a few sections (Adding modules to the mix).

Let's just say that when the "connexion_block" intent is passed, our service returns the following key: connexionWidget.


Here is a really quick implementation in php, in an ecp/api.php file corresponding to your module:


```php
<?php


use Ecp\Output\EcpOutputInterface;
use Module\Ekom\Ecp\EkomEcpServiceUtil;

/**
 * Please read "Create your own ECP service, preserve the harmony" section from the
 * doc/apis/ekom-service-api.md document first.
 */
$out = EkomEcpServiceUtil::executeProcess(function ($action, $intent, EcpOutputInterface $output) {

    $out = [];
    switch ($action) {
        case 'connect_user':
            $out = [];
            // ...
            if(in_array("connexion_block", $intent, true)){
                $out["connexionWidget"] = \SomeRenderer::renderConnexionBlockWidget();   
            }
            break;
        default:
            break;
    }



    return $out;
});


```


### Updating the js so that it injects the updated widget 

I didn't want to overload you with a ton of information in the first steps, so I skipped
some code.

But as for now our code will trigger the ecp service, but will not handle the return,
we need to inject the updated widget in the view.


So following a linear logic, the js handler (bionic) should look more like this:

```js


(function () {

    var api = myModuleApi.inst(); // use the api you want here
    window.bionicActionHandler = function (jObj, action, params, take) {  // override this function to get started
        switch (action) {
            case 'connect_user': // this is the bionic action
            /**
            * this method below will call the "connect_user" (for instance) ecp service, passing all params.
            * Note: because of the marker we've created, 
            * the params contain at least the following:
            * 
            * - intent: 
            *       - connexion_block
            *       - ...
            * 
            * 
            * 
            * 
            */
                api.user.connect(params, function(data){ // this is our success handler
                    /**
                    * Just spreading the information to any listener.
                    * Note that in this example the data contains our connexionWidget key as long as the connexion_block
                    * marker is on the page
                    */
                     api.trigger("onConnectAfter", data);
                }); 
                break;
            default:
                console.log("Unknown action: " + action);
                console.log(params);
                break;

        }

    };


})();

```


And finally, next to the marker, we need the injection code

```html
<div id="connexion_block_widget">
    <?php echo \SomeRenderer::renderConnexionBlockWidget(); ?>
</div>
<div class="bionic-marker" data-type="intent" data-value="connexion_block"></div>

<script>
    jqueryComponent.ready(function () {



        var jWidget = $('#connexion_block_widget');
        var api = myModuleApi.inst();
        
        
        api.on('onConnectAfter', function (data) {
            jWidget.empty().append(data.connexionWidget);
        });
    });
</script>

```
 





Adding modules to the mix
-----------------------------

The Application module provides the Application_Ecp_decorateOutput hook in order for other modules
to implement their "intent" strategies.

This means that we can remove the "intent" code from our service, our service could look like this instead:



```php
<?php


use Ecp\Output\EcpOutputInterface;
use Module\Ekom\Ecp\EkomEcpServiceUtil;
use Core\Services\Hooks;

/**
 * Please read "Create your own ECP service, preserve the harmony" section from the
 * doc/apis/ekom-service-api.md document first.
 */
$out = EkomEcpServiceUtil::executeProcess(function ($action, $intent, EcpOutputInterface $output) {

    $out = [];
    switch ($action) {
        case 'connect_user':
            $out = [];
            break;
        default:
            break;
    }

    // we will transfer the intent logic in this hooks, makes it cleaner in an environment with modules
    Hooks::call("Application_Ecp_decorateOutput", $out, $action, $intent);

    return $out;
});


```


Each module needs to:

- provide some intent identifiers that theme authors can use 
- for each intent identifier, they also could/do // todo:
    provide the list of actions allowed to create the key in the 
    output (trigger the widget's html code injection in the view).
    That's because as we said earlier, not all widgets need to be refreshed every time.  
    





Conclusion
--------------

Amongst the benefits yielded by this technique, we have:

- the intent can be written once per page and will be automatically passed to all subsequent calls
- the modules provide intent identifiers that the themes can use whenever they want
- each intent identifier (potentially) yields a well defined model
- the returned model will be rendered by the theme


Things to remember:

- not all markers will need to be updated all the time
- with intent framework, your template calls for bits of information 




 









