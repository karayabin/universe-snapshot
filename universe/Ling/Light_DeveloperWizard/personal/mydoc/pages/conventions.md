Conventions
===============
2020-07-09 -> 2020-07-30




Here are some conventions used by the developer wizard.


- [Basic service](#basic-service)
- [Basic Exception](#basic-exception)
- [Ling Standard Service 01](#ling-standard-service-01)
- [getFactory method](#getfactory-method)
- [logDebug method](#logdebug-method)
- [Standard service configuration file](#standard-service-configuration-file)
- [ldw standard available options in docBlock](#ldw-standard-available-options-in-docblock)



Basic service
------------
2020-07-09 -> 2020-07-23



It's composed of:
 
- a service class
- an exception class
- a config file
 
 

The path to the service class is: 

- ${planetDir}/Service/${tightPlanetName}Service.php


The path to the exception class is:

- ${planetDir}/Exception/${tightPlanetName}Exception.php


The path to the config file is:

- ${appDir}/config/services/${serviceName}.byml




With:

- planetDir, the path to the planet directory
- tightPlanetName, the planet name, with underscores removed
- appDir, the absolute path to the application directory
- serviceName, the name of the service. Since we're using [Light](https://github.com/lingtalfi/Light),
    it's derived from the planet name, we basically remove the "Light_" prefix, and we take the remaining part,
    set it to a
    [humanized](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#humanflatcase)
    [snake case](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#snakecase)
    with the underscore as the separator instead of the space, and that's our service name.



The [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) class naming convention is used.


The generated class has the following:


### properties

- protected container
- protected options 

### methods

- public setContainer
- public setOptions
- private error (throws the exception "${planetName}/Exception/${tightPlanetName}Exception" )



The **options** property's comment is a [ldw-standard-available-options-in-docblock](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#ldw-standard-available-options-in-docblock).



Basic exception
----------
2020-07-30


A basic exception class, as defined in the [Basic service](#basic-service).





Ling Standard Service 01
--------------
2020-07-27


See the [conception notes of Ling Standard Service 01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/pages/conception-notes.md#ling-standard-service-01) for more details.  
    




getFactory method
------------
2020-07-21


This is a pattern that I found and use for services which use the [LingBreezeGenerator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md) generator. It's for service classes.

The service class has a **factory** property, which defaults to null, and is used as a cache for the **getFactory** method
that goes along with it.

So the class has the public **getFactory** method, which returns that custom factory, and creates it if necessary.

Note: this task applies only on a service class that already has a container property, such as a **standard service** for instance.

The exact name of the factory class is the one used in the [generate-breeze-api task](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#generate-breeze-api),
something like: CustomLightTaskSchedulerApiFactory.






logDebug method
------------
2020-07-09 -> 2020-07-21


This is a pattern that I found and use. It's for services.

The service has an **useDebug** boolean option, which defaults to false.

It also has a public **logDebug** method, which sends a message to a dedicated logger, but only if **useDebug** is set to true.

For the logger, the [Light_Logger](https://github.com/lingtalfi/Light_Logger) is used under the hood,
and we write the message to a file named after the service. The channel to which messages are sent to is also named
after the service.

The exact log file path is: ${appDir}/log/${serviceName}_debug.txt
The exact channel is: ${serviceName}.debug


Standard service configuration file
--------------
2020-07-13 -> 2020-08-06


A standard service configuration file is divided in sections:


- the **main** section, at the top
- the **hooks** section, optional, in the middle
- the **others** section, optional, at the bottom (this is experimental as for now)


The **main** section is where the service instance is defined.
The **hooks** section is where the service hooks are defined.
The **others** section is where other things related to the service are defined, such as external variable declaration for instance.

Visually, sections are separated from each other by a banner comment, which looks exactly like this for the **hooks** section:

```yaml
# --------------------------------------
# hooks
# --------------------------------------
```

The **banner comment** is mandatory for the **hooks** and **others** section if they contain anything.
The **main** section doesn't have a **banner comment**.



In the **hooks** section, hooks must be defined using the **methods_collection** method rather than the **setMethods** method.
This is because **methods_collection** plays more nicely with other plugins (while **setMethods** overrides whatever was previously set).






ldw standard available options in docBlock
--------------
2020-07-13


The docBlock comment for a class property, or method parameter, has the following bit of sentence in its comments: "Available options are:".
This is called the **cue**, and is used by some of our tools to automate things (i.e. adding options to a file via programming).

The **cue** is followed by a carriage return, and then the list of **individual option comments**, each of which starting with 
a dash, followed by a space, followed by the name of the option, followed by a colon, followed by the comment for that option.


So for instance, the following class property is a valid **ldw standard available options in docBlock**:


```php

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     * - useDebug: bool, whether to enable the debug log
     *
     * See the @page(Light_Train conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;

``` 













  











