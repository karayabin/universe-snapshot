Light Diary
========
2019-04-04



Summary
===========
- [Intuition](#intuition)
- [Todo one](#todo-one)
- [Implementation session one](#implementation-session-one)
    - [General thinking about how to add functionality without extra cost](#general-thinking-about-how-to-add-functionality-without-extra-cost)
    - [Router with simple functions](#router-with-simple-functions)




Intuition
=============
2019-04-04

I was about to create the Jin framework, but then I realized that I didn't like that it forced me to use certain features.
Then, learning python in parallel, I stumbled upon a web framework called Flask, and I really liked the approach where
basically the "Hello World" with Flask would literally take 10 lines of code.

It turns out that more often than not, I just need to throw a website out of my head, with no features but just displaying pages,
and all the frameworks I've done so far would do that in an overkilled manner.

So by seeing Flask in action I had this aha moment where now I know "exactly" what I want: a framework that doesn't decide
anything for me, but just provides me with some pre-built components that I can add if I want to.

With this approach, I'm able to estimate for myself the performance cost/development ease, and not let the framework decide for me.

So, I will be starting the Light framework, hoping that it's the last web framework (I always say that, but hopefully this time
it's the right one). 


Light because it's pure, and because it can be added in layers.


Note: I'll give up on Jin, and Light replaces Jin.



Todo one
==========
2019-04-04


Rather than creating a company sized road map, since I'm an individual developing, I'll organize my work in smaller increments.
I will create todo sections like this one, as I need them. Each todo section will capture the work I plan to do in the next few days,
that's about how far I can see ahead in the future to be honest.

However, I've got a plan: I'll basically copy Flask, and adapt it for php.

Now why not use Python's Flask directly.

I can see how Python looks more promising than php, but I've so much more experience with php, I don't feel comfortable with python yet (I'm just 
a beginner), while I feel that I can do anything with php. So basically, I'll have more control with php.

Anyway, let's go...


- general thinking about how to add functionality without extra cost
- router with simple functions
- option one for router: annotations (@app.router( /home, [GET, POST] ))
- option two for router: a baby yaml file (easier to organize multiple routes)
- template language: jinja
- template language option: simple php template system (zeus)
- orm (sql alchemy)
- error handler system: default = 500 internal server error
- error handler annotations: @app.errorhandler( 404 ) 
- debug mode: to see through errors






Implementation session one
=================
2019-04-04

 
As one can guess, this is the implementation session corresponding to the [Todo-one](#todo-one) section.
I'll put down my notes here. It's personal.



General thinking about how to add functionality without extra cost
-----------
2019-04-04


The thing that costs (almost) nothing is a condition.

And so my idea about this problem is that an object should have some options that get unleashed only if they are set.
For instance, let's say I want to use the annotation system for routes, I would need to activate the option manually.

Here is a prototype of what I've in mind, which would be the general approach for adding features in the Light framework
(or at least one idea):

```php
$light = new Light(__DIR__);
$light->setOption("use_annotation", true); // by default, it's false


/**
* @app.router( /home ) 
*/
function home(){
    return "Hello world";
}

```

By default, all options would be turned off (that's actually a very important point).
That would be the general philosophy/approach across the whole Light implementation: provide nothing but the bare minimum,
and let the users add "easing layers" if they want them.



The other main way of adding thing would be through a service container.
I thought about the costs (creating the service container every time, but this can be alleviated with a static container)
vs the practical benefit, and I believe it's worth using one, because it can be used at every single level of the application.

For instance, in the Light application, we will need a method to show the internal server page (in case an error occurs
and the debug mode is false).
We can obviously create a default internal server page, but what's important is how do we let users customize their own
pages?

Inheritance is a possibility, but it's not very convenient, because then we would end up with a million Light sub-classes,
that doesn't sound good.

The most practical way I can think of is using services.
For instance, in the showInternalServerErrorPage method of the Light class, we could basically do something like this:

```php
protected function showInternalServerErrorPage(){
    if( $this->services->has("internalErrorHandler") ){
        $this->services->get("internalErrorHandler")->printPage(); // or whatever method this service has
    }
    elseif($this->services->has("anotherHandlerForThisProblem")){
        // ...
    }
    else{
        // default handling
        $response = new HttpResponse("
            <h1>Internal server error</h1>
            <p>The server encountered an internal error misconfiguration and was unable to complete your request.</p>", 500);
        $response->send();
    }
}
```

With this technique, we combine delegate the handling to the developer, meaning everythin becomes possible.
Plus, it combines well with the if approach, so that we create multiple types of handling rapidly just for the cost of one if
(the has method should be very cheap too in terms of performances). 





Router with simple functions
-----------------
2019-04-04

By that I meant that we should be able to use simple php functions if we want to, just like in Flask.

I'll create some HttpRequest and HttpResponse objects, and create a basic Light instance, before I can try thinking about implementing
the routing system...

Note: I believe the HttpRequest and HttpResponse objects are too important to be ignored. They won't cost a lot, and they
tend to create a sense of structure in the framework already, I think I can have them in any application I'll create,
even the simplest ones, that's okay with me.  


Since I'm designing the Light instance, I need to think about the error handling right away.
Here is the little system I thought about:

The application runs and catch every exceptions thrown.
Every Light exception has a code (string, not the int code provided by default php exceptions)
attached to it, and so when the exception is caught, registered handlers try to match
the code of the exception. 
If none of them succeeds, then the 500 internal message response is thrown, unless the debug mode
is on, in which case the debug page is shown.
If a error handler succeeds, it provides the response.

Note: not all exceptions are worth being handled (other than showing the debug page), and so if
an exception doesn't have a code (which should be the case for most exceptions), then we will
not be able to handle those exceptions (that's a good thing, because we didn't need to create
a code for that exception).


Now I need to think about a way to incorporate the services container inside the Light application.
Perhaps the most flexible and intuitive approach is simply:

```php
$light->setContainer($container);
```

But this would make the hello world more verbose already...
Well, let's just say that the services container is optional, and that the Light application will just live well without it,
but would be "enhanced" with it. So ok for the setContainer method.
Let's use the setServicesContainer method instead (more precise).

I will re-use the OctopusServiceContainerInterface from the [Octopus](https://github.com/lingtalfi/Octopus) planet,
since some fair amount of work has been done already (we might still need to add the has method and some other things maybe...).

Plus, Octopus has two flavours already (red and blue), which gives the user some options already.

Now I will have to redo the way services are injected into the container.
In my Jin implementation, the idea of environment (prod|dev|...) was inherent to the system, that's something I don't want anymore,
I now tend to think that we don't need to differentiate environments.

So I need a simple method to inject services into the container.
I like the idea of combining babyYaml files, and the idea of having plugin files seems almost mandatory.
But let's adapt this idea a bit, and instead of plugins, I prefer to install planets (this saves me to create a plugin system,
and the planet installation system works already). 
We could use the post_install capabilities of the uni-tool to create those "plugin files".

So basically, I think it's safe to assume that we could have a directory containing all services' babyYaml files, for instance:


```txt
- my_app/
----- config/
--------- services/
--------- ... all files in here are merged/combined and form the services array, which is injected into the service container.
```

I know that it's a decision I'm taking here for everybody, and I said I would try to avoid doing that as much as possible,
but the services container being a primitive object, I'm not sure if I have other options here.
Let's just say that's my recommended way of doing things, but the user can always use her own ways, the rendez-vous point
being the setServicesContainer method.

So in my case, I would want something like this:


```php
$appDir = __DIR__ . "/..";
$container = ServiceContainerHelper::getInstance($appDir); 

$light = new Light();
$light->setServiceContainer( $container ); // let's make Service singular
```

I envision something like this:

- Ling\Light\ServiceContainer\ServiceContainerHelper (for the path)

Or

- Ling\Light\Helper\ServiceContainerHelper (for the path)


And the getInstance method would expect the following:

- the **config/services/** directory, containing all byml files 
- a **cache/LightServiceContainer.php** file for the blue octopus. If the file exists, it should be used,
        otherwise it would be created by default.
        If the user wants a red octopus, the getInstance method should have option.
        
        If the user uses a blue octopus, and the container file exists, there are two cases:
        
        - either we try to recreate it if some changes in the services configuration has been detected
        (in an dev environment)
        
        - or we skip this part (because it costs too much), and we just use the frozen container as is if the
        file exists (in a prod environment).
        
        It seems that we need some dev/prod separation after all, at least for that.
        So I'll create a Helper/EnvironmentHelper object with an isDev method.
        
        I like the idea of having the default environment to be prod, and override as dev using
        the server's variable (because it's hard to accidentally change it), like APPLICATION_ENVIRONMENT=dev.
        So I'll do that, and systems that need some kind of environment will take their environment
        from whatever they want; they can use my Helper/EnvironmentHelper if they like it.
        
        In fact, I'll put all those awkward objects which I believe make sense in the Helper directory.
        Those will represent some of my personal implementation choices I didn't know elsewhere to put them.
        Those are optional and alternatives can be created on a per user basis.
         
         
The installed planets would always created config/services/ byml files which name doesn't start with underscore,
so that the app maintainer can safely create a service conf file which name start with an underscore (like _app)
to put all her services in it. 


While I'm at the service container: how do we overwrite "plugins" configuration?

An idea that attracts me is the one of creating a zzz.byml file in the config/services, and to override the configuration
services from there. The benefits of doing so are:

- we don't touch the original services config files, which might be rewritten every time plugin planets are re-imported
- the zzz naming ensures that the file is read last, thus overriding any other files.
- we don't need to create a special system (like a separate variables injection like in Jin, or an dedicated override system),
    we just re-use what's already there at our advantage

So, quite tricky, but quite simple really.



Ok, now with the routing system.
I believe there are three main steps in every routing system:

- registering the routes
- finding the matching route
- interpreting the matching route to get our html view



About finding the matching route, I can re-use the RouterInterface system, which basically
matches the route against a HttpRequest.

Now there are multiple "vectors" against which an HttpRequest can be compared.
The default router provided should use the uri and the method (get, post), which are the most
common. The default router would provide only static matching for uri.

For dynamic routes, I should create a plugin planet: Light_DynamicRouter,
in which I can re-use the RoutineRouter from Jin, which basically uses all vectors (ip, GET, POST,
port, ..., plus features a complex pattern matching syntax for uri).
The Light_DynamicRouter should also provide more simple pattern matching syntaxes, so that
the user can choose a dynamic router depending on the route complexity she needs.



### Plugin subscribing to other plugins

For the service container, a question that arose was: how does a plugin/planet subscribe to a service 
provided by another plugin planet.
It occurred to me that the way I like to resolve this problem is by using array branching, long before 
the services are compiled.

I was thinking about this:

In the SicTool planet, a SicFileCombinerUtil, which would have the ability to parse this kind of syntax:

```yaml
$autoInit.method:
    - abcdef
    
```

The idea being: any key that starts with a dollar will be stored in memory and injected later.
This simple mechanism allows for lazy subscription between services of different planets, as long as a planet
knows the service it wants to subscribe to.

However, there is one drawback: the code gets more abstract, and so less simple in a way, because you don't know,
when you call a service, what's exactly in your array (unless you dump the services configuration, which should
be a tool's option by the way).

So I would generally advise against using this technique, however, if it's inevitable, I would recommend this 
array branching implementation, because it's very cheap and logical. 
    
An idea which would use this object would be an initializer service, which would be called by the Light application
at the very beginning of the run method, just after the HttpRequest is created.

There are so many services that could be created at that moment that I believe it's a better idea
to delegate all the service instantiation to plugins rather than doing an if block per service.

Examples of services which could be using that initializer hook could be:

- logging the http request (like a custom apache log)
- configuring a whole website (for instance a blog, or e-commerce) by adding the necessary error handlers 
    and routes to the Light instance...
- adding just an error handler for the 404 error (the Light code error triggered when no route matches).

As we can see, the need for adding error handlers potentially overlaps between plugins, which
makes this initializer idea an even better candidate.



... 
TODO: next, make the Light_DynamicRouter plugin (extending the default Light Router)
         
    
     















