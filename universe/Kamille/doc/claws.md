Claws
========
2017-08-02





The goal of a controller is to handle a request.

Most of the time, it means rendering a web page.


In laws (claws' predecessor), we use a template language that I will call the laws template language from now on.


Laws template language
------------------------

Basically, in laws template language:

- $v: contains the model (all the variables available to the current template)
- $l: represents the layoutProxy object, which gives us a few methods:
    - widget: to render a widget 
    - position: to render all the widgets define at a position 
    - includes: to call a file written in laws template language (we generally use this for common website parts like top, bottom, ...) 
    


Laws elements
------------------------
    
Now in terms of code organization, laws provides us with the following elements:

- layout: represents the page architecture. It will mostly use includes and position calls,
            and we will often put elements that are persistent across all pages in it (like the main menu and the footer for instance).
            It's a file containing laws template language code
                    
- template: represents a widget, it's a file containing laws template language code    


Also, since html pages always have a head and a body, we use an html helper that takes care of the html page architecture
and let us focus on the body tag only. 

This means the layout represents the body tag only (if we want to), we don't need to make the whole html skeleton.
Assets are called by templates using simple static calls.
 



Laws vs Claws implementation
------------------------------

So basically, our job to render a page is to configure the layout and widgets,
and then, call the layout's render method.

In laws, the configuration of layout and widgets is done via laws configuration files.
The idea was that it would then be easy to update the configuration from a backoffice, since we would just need
to update a file to do so.



It turns out that the implementation of passing these configuration files is not optimal, at least the way I see it.

It's hard to extend programmatically this configuration.

I recently had the following case, which gave me the strength to upgrade from laws to claws.

Creating an e-commerce module called Ekom, my layout contains a top horizontal menu and a bottom footer on every page.

Now the customer has an account page.

In the customer's account page, there is a left menu (my invoices, my account, my addresses, ...), 
just below the top horizontal menu and on the right the section corresponding to whatever link the customer clicked in the left menu.


So, this is all part of the Ekom module, and it makes sense that Ekom provides a controller for every link of the left menu.

For instance for the "my invoices" link, we would have a Ekom/MyInvoicesController (for instance).

But then we want to reuse the left menu in the Ekom/MyAddressesController (for instance), so it makes sense that
both the MyInvoicesController and MyAddressesController extend a CustomerController, which provides the left menu (simple factorization here).

Ok, but the left menu will be rendered by its own widget, so this means the following:

- the CustomerController will define the layout, plus the left menu widget 
- the MyInvoicesController will define only the right menu widget


This makes total sense in terms of organization, but to be able to apply such logic easily, we need an object.
In laws, the implementation was clumsy, as we passed a LawsConfig object from render to parent's render method.

This means we are bound to the render method.

The idea with claws is to decouple the object from the render method.

Basically, we would have this:

- the CustomerController pseudo code:
```php

public function render(){

    $menuConf = []; // should be some app logic here

    $this->claws = new Claws();
    $this->claws
        ->setLayout(layout1)
        ->setWidget(position1.leftMenu, ClawsWidget::create()->setTemplate(Ekom/customerAccount/leftMenu/default)->setConf($menuConf))
    $this->prepareClaws();
    parent::renderClaws($this->claws); // we imagine that the renderClaws method exist...
}

```

- the MyInvoicesController pseudo code

```php
class MyInvoicesController extends CustomerController

protected function prepareClaws(){

    $invoicesConf = []; // should be some app logic here

    $this->claws->setWidget(position1.myInvoices, ClawsWidget::create()->setTemplate(Ekom/customerAccount/myInvoices/default)->setConf($invoicesConf))
}

```


So hopefully you get the idea: by using a dedicated Claws object to hold the laws configuration, we gain in flexibility 
and code readability.


Maybe in laws, with LawsConfig, I tried to compensate the lack of good design decisions by adding functionality to the
LawsConfig object (things like ShortCodeProvider, ...).
Now, starting fresh with an empty slate and a clearer vision, in order to make things simpler for the developers
that come after me...


So, that's the idea behind claws: Controller Laws and Widgets.












 


