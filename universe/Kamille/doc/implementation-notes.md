Implementation notes
=======================
2017-03-08




A few notes while implementing the kam framework.



Architecture
================

The kam framework doesn't define (purposely) precisely what a Controller is.

Does the Controller exist only in web applications, or does it exist too in console applications? 
I will assume that yes.

If it exists in web applications, does it exist only in the three request listeners model (router, controller, response)?
I will assume that no.



Using the proposed model with three RequestListeners (Router, Controller, Response),
I found out that the Router's returned controller should be a callable (exactly like in symfony).

That's because of the instantiation params that a controller might have.
Imagine the Controller was just passed as a string, and the controller has special instantiation requirements, 
then we would need to create another system to allow that controller to be instantiated correctly.
 
This problem can be easily avoided by delegating the responsibility of instantiating the controller
at the Router (RequestListener) level.

That's we will do in kamille, in order to avoid an extra layer of complexity.

Then at the Controller request listener level, if the controller is not a valid callable, 
we should throw an exception (assuming that passing the controller via the Request is the norm).

Otherwise, we could just inspect/inject the right parameters to the controller, like in symfony,
as it saves some time for the developer and it does not really eat a lot of computer power.
However, I will not implement that, because I'm not sure if it's the right thing to do.

Let me explain.

So, the Request comes into the application.
As said in kam doc, php provides all those super arrays: $_GET, $_POST, $_FILES, $_COOKIE,
$_SESSION.

In kam, we don't attach them to the request, but we might agree on the fact that semantically, 
at least $_GET, $_POST and $_FILES could be part of the request.

In addition to that, the Router adds its own params to the request: let's call those parameters
the urlParams, since they are guessed from the url (but are different from the $_GET).

The urlParams can be thought as params that help making an url prettier.

My doubt is this: if the controller has some params, from which array should they be taken?

- urlParams?
- why not a merged get, post, files, urlParams?
- why not a merged get, post, urlParams?
- why not all params from the request?

Do you see why I'm not sure about auto-injecting params in the controller? That's because I don't know
from which array they should come, and I don't want to induce a conception error that later could be revealed
as a flaw (and everybody using this framework would have to pay my conception error).

So, let the lazy work a little on this one, I will stay neutral: a controller doesn't receive any parameter.
End of the discussion.

Super arrays are easily accessible ($_GET, $_POST, ..., plus the $_SESSION and $_COOKIE, and even $_SERVER).
Now the only missing variables with this approach are the urlParams.

Well, they will be accessible via the WebApplication.

I will make the WebApplication a singleton, since I believe that only one instance of an application should
be available at any moment during a request life cycle.

And, before the request is dispatched, I will say that the Request is always attached to the WebApplication,
so that any object from that point (request listener, controllers, and almost every object in fact) can simply
access the request by doing something like:

```php
$req = WebApplication::inst()->get('request'); 
```

Or this, with a helper, to get auto-completion for the rest of the code (assumging your ide does it):

```php
$req = Z::request(); // returns a HttpRequestInterface 
```





But then I asked myself: rather than passing no arguments to the controller, wouldn't it be better to pass the request?
And the answer is no.
That's because we use super arrays ($_GET, $_POST), and so in this case passing the request is only useful to access
the urlParams, but not everybody wants pretty url. I often prefer "ugly" urls for small internal projects, because it's
faster to develop, and nobody cares about the url (in those kind of projects). So, no: YOU DON'T PASS ANYTHING.

--A CONTROLLER IS JUST A CALLABLE WITHOUT ARGUMENTS, WHICH RETURNS A RESPONSE--



Note: concretely, here is what I get inside a test Controller:

 
```php
$page = Z::getUrlParam('page', null, true); 
```

I created a Z class (in class/Ling) which I intend to use as my goto helper class.
Basically, I try to reduce common developer tasks to one line in this class.




So, now a global picture starts to emerge:

- the router requestListener chooses the Controller and prepares it
- the controller requestListener execute the Controller


One might wonder why we need to separate those request listeners (why not combine them in one)?

That's because if I change my mind and say that a Controller could be set as a string instead of a callable, I can:
I just need to change the convention, not the system. In other words, I anticipate some evolution of the object.


So, again, here is how it works so far in kamille:

- Router (RequestListener):   Request.controller, ?Request.urlParams
- Controller (RequestListener):   Request.response (uses the controller previously set to generate the response)
- Response (RequestListener):   just execute the response previously set



Okay, but how do we handle exceptions?

Aha.


First of all, let's just have a quick refresher on exceptions.
An exception is generally thrown when something bad happens.

An exception can sometimes be thrown and catch as a mechanism to signal something (the throw system
is useful to override a lot of "if branching" conditions).
 
Then, from where can an exception be thrown?

For the WebApplication, it can be thrown inside a controller, or during the dispatch loop (the loop on 
which the request is thrown, and intercepted by request listeners)
Since I like simplicity, here is what I will implement:
the WebApplication will have one exception catch block (only one).
And when it catches it, it will delegate the handling to an external callback.

With this system, we could for instance choose to display the exception trace (if in dev environment),
or to display a fallback page (if in prod environment).


If an exception is caught, that means that the other objects (probably controllers or request listeners)
didn't caught it, which means it's really an exception (a true exception at the application level),
so it's appropriate to use one (and just one) external fallback handler for that.


Since there are lot of fancy terms, let me recap all this again, so here is the final basic architecture 
in kamille:



[![kamille-basic-architecture.jpg](https://s19.postimg.org/oelcy20df/kamille_basic_architecture.jpg)](https://postimg.org/image/d28rg9rof/)


- the Request enters the application (via the handleRequest method of the WebApplication, in this case)
- the Request is thrown on a dispatch loop, which contains a certain number of request listeners along the way
    - in kamille, we start with three request listeners: Router, Controller and Response
- The best case scenario is the following:
    - the Request passes through the Router request listener, find a controller, and then attaches that controller to the request 
        - The router request listener role is to choose the controller; it can also prepare the controller (instantiate it)
    - Then the Request passes through the Controller request listener. This object searches the controller in the Request parameters.
        If found, the controller request listener executes the controller, which must return an HttpResponse.
        The Controller request listener attaches the returned Response to the Request.
    - Then the Request passes through the last request listener: the Response request listener.
           The Response request listener searches the Response in the Request parameters.
           If found, the Response request listener executes the response, which produces the intended visual feedback 
           for the user who originated the Request in the first place.
           
           
           
           
        
        









Services, Modules - Hooks
================

Note: the implementation part has now moved to [kaminos](https://github.com/lingtalfi/kaminos) (at the application level rather than
at the framework level, but this text remains here for reference).



... 
Another way to see it, is that a container is an empty shell, to which modules can attach services.

Developers can also attach services by hand (but then we need to be careful not to replace those methods by automated 
processes).

By attaching, I mean that the code is injected into the class.

So the Container class, in the end, is composed of multiple methods from various modules.


In kamille, I want to test this approach/idea where the hooks are symbolized by a "Hooks" class,
which is basically the same idea as a container: an shell that is fed by modules, except for one thing:

the module author creates the method in advance, and instead of creating whole methods, the subscriber
just composes the body of the method.

It seems only natural that it's the module author's responsibility to provide a way for "hookers" (sorry if that
doesn't translate well) to hook into their modules.
 
With the power of convention, we can provide ONE generalized way of hooking into a class.

For instance, a hook class should end with the "Hooks" suffix,
and a hook must only be a "public static method".


But then we can choose between at least two models:

- do we create only ONE "Hooks" class at the application level, to which all modules would subscribe
- or does every module have the ability to provide its own "Hooks" class

The first idea has been tried with Saas (nullos admin).
Now with kamille I want to try the idea of ONE centralized Hooks class, because I believe centralization is
a good thing. Here are a few things I have notice that occur with ONE centralized Hooks class:

- easier to list all hooks
- easier to find/create hooks
- (watch out for) collisions
- multiple providers can provide the same hook (although we probably won't need this ability, it's an interesting one)




Let me share the two models with an image:


[![comparison-of-two-hooks-systems.jpg](https://s19.postimg.org/p5vyfw2ub/comparison_of_two_hooks_systems.jpg)](https://postimg.org/image/qxoxasm73/)




So, in kamille we use the centralized model.
By convention, to avoid name collision, we will use this simple technique (which might avoid most
collisions, but is not the ultimate solution):

- the methods in this "Hooks" class are "public static"
- the method names follow this scheme: ClassName_methodName
        where ClassName represents the short name of the class, and
        methodName is the method name
        

        

        
        
X class, really?
======================
2017-03-11
        
        
I was thinking about the pros and cons of using a X service container class.
        
I found out the following:
        
        
Cons and pros
----------

Using the X class directly inside a method breaks good oop principles: it creates a hard dependency,
as you can see in the example code below:




```php
    // excerpt from StaticPageRouter
        
    public function match(HttpRequestInterface $request)
    {
        $uri = $request->uri(false);
        $uri2Page = $this->uri2Page;
        Hooks::StaticPageRouter_feedUri2PageArray($uri2Page);
        if (array_key_exists($uri, $uri2Page)) {
            $page = $uri2Page[$uri];

            $o = X::StaticPageRouter_getStaticPageController();

            return [
                [$o, 'handlePage'],
                [
                    'page' => $page,
                ],
            ];
        }
    }
```
        
It means that now if you want to use the StaticPageRouter, you must also have an X class and a Hooks class,
and they must have the StaticPageRouter_getStaticPageController and StaticPageRouter_feedUri2PageArray methods respectively,
other wise you'll get an error.

Ouch, that sounds like a bad idea, doesn't it?

Well, you'll see that maybe not later.

Let's reduce the problem to one line (and ignore hooks, which problematic is a slightly different),
so here is our "bad code?" again:
        
        
```php
    public function match(HttpRequestInterface $request)
    {
        $o = X::StaticPageRouter_getStaticPageController();
    }
```     

A code that wouldn't break good oop principles would look like this:


```php
    private $staticPageController;
    

    public function setStaticPageController(ControllerInterface $controller)
    {
        $this->staticPageController = $controller;
        return $this;
    }
    
    public function match(HttpRequestInterface $request)
    {
        $o = $this->staticPageController;
    }
``` 
   
   
Is the dependency removed? nope.
Do we have more flexibility as to choose which controller is going to be used? nope.   
   
I mean, at some point, you have to assume your dependencies.
   
Does the "good code?" require more typing? yep.
   
As a user, the only difference I see is that with the bad code, the creator of the method decided to use
X for faster development. The problem is that now anybody who wants to use the class needs to configure the X class.

With the "good code" version, you have the option to not use X, but rather anything you like.
So, at this moment of the comparison, it's just a matter of choice.


Now if you had to debug this method, with the bad code, you can --with the help of your ide-- click 
the X::StaticPageRouter_getStaticPageController method and access directly the culprit code.

With the good code, the debugging might be elsewhere; since you can set the controller from anywhere, I cannot
say right now how you would debug it, you need to take one step back and identify exactly which controller was used.

I'm not saying that it is a bad thing, or an inferior/superior method compared to the "bad code", I have 
no opinion on that.


So far, "bad code" gives us faster development and transparency at the cost of breaking good oop principles.


"Your code depends on some object, deal with it.",
Well, in that case I'm going to delegate the dependency to the X class.

That's all it is about.


Another con is that the X class provides static methods, which means basically that you want to use X for 
a singletony class, because you cannot get two different instances from the same static call (actually 
you can use some tricks but that's not the point), so that's perhaps the most important point:
 being aware of what you are doing when you do something like this:

        
```php
    // basically, this class shall be instantiated/used only once for the current process
    // i.e. don't create two parallel instance of this class and use them, unless the controller 
    // doesn't need to be instance specific (i.e. it's a general method)
    public function match(HttpRequestInterface $request)
    {
        $o = X::StaticPageRouter_getStaticPageController();
    }
```     

So, this risk is another consequence of breaking oop good principles.


Testing
----------
I can hear some people say: apart from this comparison, the "bad code?" is harder to test.
 
Right, but how much harder?

I figured out (although I didn't implement anything yet), that to test such a code, we only need to things:

- an autoloader that loads an XTest class rather than a X class, when in test environment
- a helper that scans the code and creates the corresponding method empty shells, so that dependencies are honored

So, I testing doesn't sound like a problem to me.



Mini conclusion
---------------
So be careful if you use X, it's not for everyone.
If you start to use X, then you will benefit faster (simpler?) development, and auto-completion redirection for free.
But then, if somebody needs to code after you, he's stuck with the X dependency, is that what you want?

That's not for me to say.

I will confess that in kamille (this framework), I will not hesitate to use X (and Hooks) wherever I feel like it.
That's because that's how it was suggested in kam.
However, you will always be able to recreate non X versions if you like, so don't blame me and don't wine: it's 
always possible to get EXACTLY what you want.

   
   
   
Super services: Xlog, Xpdo
-------------
Some services are common to multiple objects, like paradigms in oop conception.
I call them super services.

- log
- database access
- ...?


So if you decide to go along with the X philosophy, here is the code you would probably write to write the log.


```php
X::log()->log("ppp", "info");
```

The idea behind Xlog is to shorten this one liner to this:
   
   
```php
Xlog::log("ppp", "info");
```

It might seem like a very tiny improvement, but remember that this is a common service, which means you will type 
this a lot. So, in kamille I decided to create one class per super service.

Makes the calls easier.

In kamille, the Services directory is in the userland side, which means you can add/remove the super services
as you want.
 
 
By convention in kamille we use Xlog as the logger.

Of course, Xlog is just an empty container in which you can put any log logic you might need, but the access to this
logic is done via the Xlog call.

Then, I personally will use Xpdo as my database access tool, and I will put it in the Services directory for your convenience.
But if you want to use another service, that's fine too.



   
        
        
        
        
        
MVC
==========
2017-03-10





Widget names
-----------------

In the kam documentation, we found the following snippet:

```php
<?php $l->widget('maincontent'); ?>
```

which represents the inner of a layout template.

We can see that the layout template calls a widget (the maincontent widget in this case).
 
So this means that widget have names.

Now the question on which I want to focus now is the following:

should the name of the widget be given by the widget itself, or by the user that uses the widget?

The short answer is: by the user that uses the widget.

The reason why is that you could use the same widget in different contexts (for instance a displayAd widget),
and only you (the user) knows the difference between two different contexts.
  
So you (the user) could name it: RightColumnDisplayAd widget OR BottomDisplayAd widget,
but the widget itself couldn't make that choice by itself (or it would be complicated, which is something
I want to avoid at all costs).


So, the name of the widget is chosen by the user.

And so, the layout has the following method signature:

```php
bindWidget($name, WidgetInterface $widget)
```



Renderer
-----------------


So the Layout and the Widget have the same problematic: they need to render a template.

I want to use this [pattern](https://github.com/lingtalfi/loader-renderer-pattern/blob/master/loader-renderer.pattern.md)
as the rendering pattern, because it gives us flexibility.

So, that being established, let's focus on the uninterpreted state of the pattern.
  
  
That uninterpreted state is a state which needs to be interpreted by an interpreter (called renderer).

Concretely, the code inside the uninterpreted template could be php, smarty code, twig code, any code,
or even just a simple html code with tags.

We generally use a language (like php or twig) because it offers more power to the template creator: more ways
to dispose the variables in that ocean of html code, basically.

But which language should we use? (that's my main question)

I personally prefer to use php, because I already know this language.
We could also use an universal renderer, which would delegate the task to a more specific renderer, based on the file
extension. 

I believe than choosing for the others, in this case, is a conception error.
I don't want to force anybody to use the php language, nor do I want to force anybody to use an universal renderer 
(although it seems to be a reasonable solution).

The reason why I don't want to choose the universal renderer is that maybe the user knows that she only want to use php.
(As I already said, I personally would prefer this option over an universal renderer, because it's easier to setup).

Just because we can doesn't mean we should.




Loader
----------

My loader returns false in case of failure.
I thought about it: in case of failure, should it throw an exception, do nothing, return false?

I thought that if we use an object that tries multiple loader (universal loader) depending on some parameters,
it would be easier to just test for the false state, rather than catching exceptions.

Plus, you can still throw exceptions if you want.





Layout
-----------

So the loader transforms a template name to an uninterpreted content.
Then the layout method: render is called with the variables passed to it.

The variables shouldn't have any special form, because the user of the layout shouldn't have
any special knowledge of how the layout is made.

So, a simple array is the most simple way of passing variables (I assume).

But then there is the renderer.
The renderer's role is to take the uninterpreted content and the variables, and return the rendered content.

So, what's noticeable is that the uninterpreted template content and the variables have to work together.

What I mean by that is that for instance the uninterpreted content could contain a code like this:


```php
Hello $v->world
```

or this:

```php
Hello {world}
```

But we agreed that the variables should be only passed as an array (so that the user doesn't need to know the internal details).

So the relationship I'm trying to point out is the agreement between the uninterpreted template and the variables.

The variables have to be transposed, from an array, to this form which is interpreted inside the template.

For instance, transposed from $a['world'] to $v->world, or from $a['world'] to {world}.
 
It seems only logical that the renderer is the one object responsible for making the transposition of variables.
 

In the case of the layout, we've seen earlier (or in kam?) that the following code should be available:
 
 
```php
$l->widget('topmenu');
```


So, essentially this means that the l variable has to be created by the Layout object, and passed, via a simple array,
to the renderer.

But my question is the following: how it the l variable passed from the Layout to the Renderer?

Do we simply create an l entry in the array of variables passed to the render method?

Or do we create a mechanism that injects the Layout object into the Renderer, so that the Renderer can choose
for itself how to create this variable.

Also, is the l variable a requirement, or just an example implementation?
Could we use another variable name, for instance: r, or even another mechanism of calling widgets?

As with before, I prefer not to choose here, or at least I prefer that the user can choose what she wants.

If the Renderer is of type LayoutRendererInterface, then the Layout will automatically inject itself into that
Renderer. And so, the Renderer will choose for itself what's better.

Delegating this choice to the Renderer gives us more flexibility.
I will create such a Renderer which will make accessible the $l variable, so that the $l->widget() call becomes possible.

Concretely, it allows me to create the following method in the Layout:


```php
function getWidget(widgetName)
```

This method will throw an exception if the widget is not set, or it could return false (I don't know yet, I need to think
again...). But the point is that if I throw an exception from the Layout, I still can use an object that will encapsulate
the call to the getWidget method and catch the possible exception when it occurs, and returns an empty string,
so that if ONE widget fails rendering, the Layout can still be renderered.


 
 
 
Widget Communication
---------------------
2017-03-12

Should widget communicate with each other?

No, unless supervised by the Controller.
The widgets are just dumb things.

The Controller ONLY has the overview of how widgets are interlaced together.
So, the Controller ONLY should take the decision of creating a communication bridge between widgets if necessary.



Rendering an html page with a title and some assets
--------------------------------------------

How do you render an html page?

There are many ways to render an html page, but if we had only one, it would be simpler to develop.

So, let me lead the way and give a version, then see if it fits your beliefs.



So, there is an HtmlLayout object, responsible for displaying the whole html page (i.e. the head and the body).

Then we have an HtmlBodyLayout object, responsible for displaying only the html body.

The HtmlBodyLayout is the object to which the widgets will be bound to.

At rendering time, the HtmlLayout will render the HtmlBodyLayout content and buffer its output,
then it will display the html head, and then display the buffered body content.

While the HtmlBodyLayout is rendered, widgets can directly call the HtmlPageHelper object, a singleton helper that allows
configuration of the head, and other things, like for instance: displaying the js scripts at the bottom of the body,
or choosing the body tag attributes.

The HtmlPageHelper provides method to set/update the title, description, keywords, assets, ...

Note: HtmlPageHelper partially handles assets dependencies (for instance if many widgets use jquery: it provides mechanisms
to ensure that only one jquery lib would be loaded).



 
 


A themable application
============================

As discussed before, the notion of theme is the ability to change the design of a page in one click.
With the MVC implementation of kamille, it concretely means changing the template of the layout and changing
the template of the widgets.

At the level application, it makes only sense that all pages of the application can be changed in one click.

To allow this, I suggest that the application (probably web application) provides a "theme" parameter,
which should spread across the whole system. 








And then the "daily" blog
==============================



Static Object Router
==========================
2017-03-16


Today I added a static object router.
Like the static page router, it's a router based on a simple map (an array is used to make the correspondence 
between the uri and a controller string).

At some point in the conception, I wondered: why don't I simply return a controller instance from the 
StaticObjectRouter object, so that I can control how the instance is already configured.

And then the answer appeared: the router loops through all instances of the array. Imagine if all instances of 
potential controllers were instantiated: that would be a fair waste of performances. Passing string is much cheaper
and much adapted. 

 
Now to keep the flexibility of choosing the controller method, we also pass the method in the string.
 
The format of that controller string will be: 

- My\MyController:method




Now what's the benefit of using StaticObjectRouter vs the older StaticPageRouter?

Well, first in some cases the StaticPageRouter will be more adapted, so do not confound old with bad or deprecated,
it has just been created before.

Now, with the StaticObjectRouter  cheaper by one step (in terms of architectural steps).
Here is how both objects compare together:

- StaticPageRouter: 
    - 1. find page 
    - 2. execute the page and capture the output 
    - 3. create the http response
    
- StaticObjectRouter: 
    - 1. find controller
    - 2. execute the controller (and returns the supposedly returned http response) 


So, basically, we potentially don't need to capture (buffer) the output with the StaticObjectRouter, although
we still can if we want.

So, not a huge win, but if you are a performance freak, that's something you'll appreciate.
In the end, the overall system architecture wins by having more routers to choose from.







Exceptions
================
2017-03-20


There are at least two different uses for exceptions:

- exceptions thrown when something exceptional occurs (that's the default usage of exceptions)
- exceptions thrown as signals (meant to be caught in the first place)
 
 
 
UserErrorException
------------------
Today, I implemented an UserErrorException and I thought the reasoning behind it was interesting.

An UserErrorException belongs to the second type of exceptions: the signal type.
It basically carries an user error. For instance, the user forgot to setup some value, and so the program goes wrong.

In this case, we want to display a message to the user: "Hey, you forgot to set this value (blabla), please try again...".
So basically, we just need the exception message, but we don't really need the debug trace in this case.

That said we could have chosen other mechanisms to bubble up such an error.
So why choosing an exception?
Because exceptions have this unique ability to jump over blocks of code, which makes the development faster:
just throw an (user error) exception when something goes wrong, and you know that it will be caught and display
as an error message to the user.







Controllers
================
2017-04-03

In a web application, Controllers are responsible for returning the appropriate http response to a given http request.

Controllers will be brought by modules in the first place, but then how does the user override them.

It's semantically wrong to tell the user to directly update the modules files.

Therefore the following idea will/has been implemented, via KamilleModule: all modules controllers are "copied" to 
the **app/class-controllers** directory, where the user can potentially edit them (because it's userland, not moduleland).

For instance, to override a Soap controller from module Hamburger, which is originally should be here:

- app/class-modules/Hamburger/Controller/SoapController.php


Will be copied (and adapted) here:

- app/class-controllers/Hamburger/SoapController.php


So modules themselves should use the userland version internally.
This simple overriding mechanism choice was made to keep the application simple. 



Note that theme purposely don't depend on the theme.

 








 






