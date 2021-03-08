Ecp
===========
2017-11-20 -> 2021-03-05



A simple communication protocol for your app's ajax requests.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Ecp
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Ecp
```

Or just download it and place it where you want otherwise.



The basic idea
==================

An ajax communication starts with a request and ends with a response.


The ecp request
------------------

- the action parameter is passed via the uri ($_GET) and defines the action to execute
- all other parameters are passed via $_POST
- the special $_POST parameters are the following:
        - intent: see the intent section later in this document


This might help:
 
- [bionic](https://github.com/lingtalfi/bionic), see the related section at the end of this document


The ecp response
------------------ 

It's a json array called output in this section.

Some keys contained in the output have a special meaning:

- $$success$$: a success message to display to the user
- $$error$$: your app should display a public error message (intented for your customers)
- $$invalid$$: the request you've made was erroneous (invalid parameters send), your app should generally console.log
                this message for development debug; you could also server-side log it just to be sure 
                    

Note: there can only be one of the above special keys at the time.


### Helpers:

- EcpServiceUtil::executeProcess (in this class, see the How to section)




Intent
==========


The basic idea of intent is expressed with this schema:
[![rendering-templates-with-intent-markers.jpg](http://lingtalfi.com/img/universe/Ecp/rendering-templates-with-intent-markers.jpg)](http://lingtalfi.com/img/universe/Ecp/rendering-templates-with-intent-markers.jpg)


Intent is a powerful idea.
To understand it, we need to understand its background first.

A dynamic template is a template which state reacts to the user's actions without reloading the whole page.
For instance in an e-commerce app on the product page, if the user clicks the blue version of the t-shirt,
some parts of the template will change: the price, maybe the reference, the label etc...


There are multiple approaches to rendering a dynamic template in the front.

- you can generate the template using php, and then update it (partially or totally) using javascript
        This is an old school method, the problem is that you need to do the work twice:: 
            - the php template
            - the js update code
        Plus, now if you change the php code, you also need to change the js code as well, ouch...
               
- using an all js solution like React
        This is a really cool idea.
        However in november 2017 there are still some issues with the search engines (google), and so the SEO topic
        is partially compromised, you need to find workaround solutions, which implicitly means: more work...

- using a php method to generate the template, both for initial rendering and updates.
        Basically, every time the gui needs to be changed, you replace your template 
        with a big chunk of html (from an ajax call).
        The benefit of this method is that you can RE-USE the same php method.
        Therefore, you have to think the logic only once
        (plus every php dev is familiar with php, so it's a trivial task).
        
- ...maybe some other approaches?         


Although the choice of a strategy might depend on the type of templates you need to render, intent assumes that
the third approach (all php) is taken, which by the way is well suited for the most complex templates you can imagine.

Beware though that using this approach tends to blur the limit between the view and the controller (in MVC model),
so be careful not to abuse it, or do is consciously.
 


But actually, intent is just an idea, and it could apply to all approaches (but don't worry, it's good that
we have had this context refresher anyway).

The problem **intent** tries to solve is that different parts of your page might want to react to ONE user action.

This happens for instance in an e-commerce app, where you have a mini-cart at the top indicating the number of items in
your cart. You can also unfold the mini cart recap and even change quantities from there (for instance).
Imagine now that on top of that you are on your "cart summary" page, then you can update the quantities as well.

Which ever quantity change you make on this page, both the mini-cart widget and the "cart summary" widget should
be consistent in displaying the quantities of the items in your cart.

Hopefully this example convinced you that there are some cases where you need coordination/consistency between
different parts of your page after an ajax call.

So, how do you address that?


Intent, in the context of ecp, addresses this problem by passing an array along with the 
request (the intent params in $_POST), and this array will trigger different php renderers to attach html chunks
to the response (which in ecp is an array).

So for instance, you pass this intent:

```php
- miniCart
- cartSummary
```

And then, you can expect the response to contain those keys (amongst others):

```php
- miniCartHtml: the html code generated by the php renderer for the mini cart 
- cartSummaryHtml: the html code generated by the php renderer for the cart summary 
```

Note: the names (miniCartHtml) are arbitrary, there is no naming convention defined



Now front side, to update the new template is a breeze, just replace the old template with the corresponding html chunk
from the response.


The real question is: how do you collect the intent?

It's the role of your js api to do so, intent doesn't tell you how to do it.


However, you might be interested in the **bionic.js** layer (see the related section at the end of this document),
which does that for you, and much more.






How to create your ecp server
==========

This is a typical ecp script.
It uses the **EcpServiceUtil::executeProcess** method (from this planet).

It's assumed that your app service controller wraps the code below (the $out variable) and displays it as json.


```php
<?php


use Core\Services\Hooks;
use Module\Ekom\Api\EkomApi;
use Module\Ekom\Api\Layer\ProductBoxLayer;
use Ling\Ecp\EcpServiceUtil;
use Ling\Ecp\Output\EcpOutputInterface;


$out = EcpServiceUtil::executeProcess(function ($action, $intent, EcpOutputInterface $output) {

    $out = [];
    switch ($action) {
        //--------------------------------------------
        // CART
        //--------------------------------------------
        case 'cart.addItem':
            $pool = $_POST;
            $quantity = EcpServiceUtil::get("quantity");
            $pId = EcpServiceUtil::get("product_id");
            $details = EcpServiceUtil::get("details", false, []);
            
            $cart = EkomApi::inst()->cartLayer();
            $boxModel = ProductBoxLayer::getProductBoxByProductId($pId, $details);
            $pool['details'] = $boxModel['productDetails'];

            $cart->addItem($quantity, $pId, $pool);
            $out['cartModel'] = $cart->getCartModel();
            break;
        case 'cart.updateItemQuantity':
            $qty = EcpServiceUtil::get("quantity");
            $token = EcpServiceUtil::get("token");
            $cart = EkomApi::inst()->cartLayer();
            $cart->updateItemQuantity($token, $qty);
            $out['cartModel'] = $cart->getCartModel();
//            Hooks::call("Ekom_updateItemQuantity_decorateCartModel", $out, $_POST); // deprecated?

            break;
        case 'cart.removeItem':
            $token = EcpServiceUtil::get("token");
            $cart = EkomApi::inst()->cartLayer();
            $cart->removeItem($token);
            $out['cartModel'] = $cart->getCartModel();

            break;
            //--------------------------------------------
            // ...
            //--------------------------------------------
        default:
            break;
    }

    /**
    * This is where the intent will be processed
    */
    Hooks::call("Ekom_Ecp_decorateOutput", $out, $action, $intent);

    return $out;
});




```


Conception Note
==================

In my ekom application, I have four layers of apis:

- the php api (the base)
- a service api based on ecp (so that my php api becomes available to the outerworld)
- a js api that allows me to call my ecp services from js code
- my templates use bionic, so that I can make js calls in html

This is how the relationship between ecp and bionic was thought in the first place. 



Related
==============

- [bionic](https://github.com/lingtalfi/bionic): a layer to help you bind html code to your services, via a js api
- [jqueryComponent](https://github.com/lingtalfi/jqueryComponent): helps you firing your jquery code no matter when the jquery library is actually called (in the head or next to the closing body tag)
- [ninShadow](https://github.com/lingtalfi/NinShadow): when an ajax action is fired, consistently display some visual hint that something is going on in the background



History Log
------------------

- 1.5.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.5.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.5.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.5.0 -- 2018-01-29

    - enhance EcpServiceUtil, add fourth argument (pool) to get method
    
- 1.4.1 -- 2017-12-02

    - fix EcpServiceUtil::doExecuteProcess called by self instead of static
    
- 1.4.0 -- 2017-12-02

    - add EcpServiceUtil::doExecuteProcess protected method
    
- 1.3.1 -- 2017-11-21

    - fix EcpServiceUtil::executeProcess, forgot getError method
    
- 1.3.0 -- 2017-11-21

    - add EcpOutputInterface.getError method
    
- 1.2.0 -- 2017-11-21

    - removed $$successNotif$$ special code (too risky in terms of confusing the mvc model)
    
- 1.1.0 -- 2017-11-21

    - add $$successNotif$$ special code
    
- 1.0.0 -- 2017-11-20

    - initial commit