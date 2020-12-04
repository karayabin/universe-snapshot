Light_Kit
===========
2019-04-25 -> 2020-11-27



Use the [Kit system](https://github.com/lingtalfi/Kit) into your [Light](https://github.com/lingtalfi/Light) applications.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [What's the goal?](#whats-the-goal)
- [How does it work?](#how-does-it-work)
- [BabyYaml page configuration files](#babyyaml-page-configuration-files)
- [Calling a page from your Light controller](#calling-a-page-from-your-light-controller)
- [The html_page_copilot service](#the-html_page_copilot-service)
- [Conception notes](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md)
- [Events](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/events.md)
- [History Log](#history-log)



What's the goal?
============
The goal is to let you do something like this with your Light app:


```php

$light = new Light();

$light->registerRoute("/", function (LightServiceContainerInterface $service) {
    return $service->get("kit")->renderPage('page_one');
});

```

So basically, you delegate the rendering logic to the kit service provided by this planet, which leverages the [Kit system](https://github.com/lingtalfi/Kit).



How does it work?
==========


Here is the service file provided by Light_Kit.

You don't have to change anything, but I will explain it anyway just in case:



```yaml
# file path: your_light_app/config/services/Light_Kit.byml
kit:
    instance: Ling\Light_Kit\PageRenderer\LightKitPageRenderer
    methods:
        configure:
            settings:
                application_dir: ${app_dir}
        setConfStorage:
            -
                instance: Ling\Kit\ConfStorage\BabyYamlConfStorage
                methods:
                    setRootDir:
                        rootDir: ${app_dir}/config/data
        setContainer:
            container: @container()

    methods_collection:
        -
            method: addPageConfigurationTransformer
            args:
                -
                    instance: Ling\Light_Kit\PageConfigurationTransformer\DynamicVariableTransformer
        -
            method: addPageConfigurationTransformer
            args:
                -
                    instance: Ling\Light_Kit\PageConfigurationTransformer\LightExecuteNotationResolver


        -
            method: registerWidgetHandler
            args:
                - picasso
                -
                    instance: Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler
                    constructor_args:
                        options:
                            showCssNuggetHeaders: true
                            showJsNuggetHeaders: true
                    methods:
                        setWidgetBaseDir:
                            dir: ${app_dir}
        -
            method: registerWidgetHandler
            args:
                - prototype
                -
                    instance: Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler
                    methods:
                        setRootDir:
                            appDir: ${app_dir}


kit_css_file_generator:
    instance: Ling\Light_Kit\CssFileGenerator\LightKitCssFileGenerator
    constructor_args:
        rootDir: ${app_dir}/www
        format: css/tmp/$identifier-compiled-widgets.css

```

Note: this file is injected automatically in your light app when you import the planet.


So basically, Light_Kit provides the **kit** service, and the **kit_css_file_generator** service.
 
The **kit** service configuration is stored in babyYaml files (see the setConfStorage method).

If you want to use a storage on your own, you can simply replace the BabyYamlConfStorage with one of your own (for instance,
a database based storage).

Also, the **kit** service will interpret two types of widgets by default:

- [picasso widgets](https://github.com/lingtalfi/Kit_PicassoWidget)
- [prototype widgets](https://github.com/lingtalfi/Kit_PrototypeWidget)


Again, if you want to add your own widget types, you can add your own widget handlers using the [lazy override feature](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md#lazy-override-variables) of 
the [sic combiner](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md).
 
For instance the following code will register a widget handler with type **fancy**:



```yaml
# file path example: your_app/config/services/_zzz.byml
$kit.methods_collection:
    -
        method: registerWidgetHandler
        args:
            - fancy
            -
                instance: My\Kit_FancyWidget\WidgetHandler\FancyWidgetHandler
                methods:
                    setRootDir:
                        appDir: ${app_dir}
  
```



What about the **kit_css_file_generator** service.

This service is designed to be used inside a layout script. It basically allows you to create a css file concatenating
all the css nuggets (aka css code blocks) provided by the widgets (collected during the parsing phase of the renderer).
This file is created on the fly and can be referenced immediately as a stylesheet url (the href attribute of a link tag inside your head tag).

 







So now that the services are configured, we need to add pages.

Because we are using the babyYaml storage, this is done via page configuration files.




BabyYaml page configuration files
===========

A page configuration file is a [babyYaml](https://github.com/lingtalfi/BabyYaml) file which contains the [page configuration array defined in kit](https://github.com/lingtalfi/Kit).

Each file contains the configuration for one given page.

All page configuration files are located in the root dir defined in the service configuration (the setRootDir method of the BabyYamlConfStorage instance),
which defaults to: **config/data** (note: in this document, all relative paths are relative to the light app root dir, unless otherwise specified).


So for instance we have this kind of structure:

```txt
- config/data/
----- Light_Plugin_One/kit/
--------- page_one.byml
--------- page_two.byml
----- Light_Plugin_Two/data_for_kit/
--------- page_one.byml
--------- page_two.byml
``` 



Now the name of the file without the **.byml** extension is the actual page name.



Now in some cases the same page configuration might be updated by multiple plugins.
For instance, imagine the dashboard of an admin website, with some weather widget, or some stat widget brought by different plugins.


The babyYaml way used by **Light_Kit** is to have a folder named like the page, inside of which plugins can put their own additions.
Those added files must be in babyYaml format, and the idea is that they will be merged with the main configuration file.

So for instance for the **page_one** page of the **Light_Plugin_one** plugin, we could have this:

```txt
- config/data/
----- Light_Plugin_One/kit/
--------- page_one.byml
--------- page_one/
------------- Light_Plugin_ABC.byml
------------- Light_Plugin_DEF.byml
--------- page_two.byml
--------- ...
```

In the above example, the **Light_Plugin_ABC.byml** file (for instance) contain the configuration bits that the **Light_Plugin_ABC** plugin
wants to add to the **page_one** page configuration.


How exactly the files are merged is defined inside the [BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md) class.



Calling a page from your Light controller
===========

So now that we know where the pages are located, we can simply call them from our Light controllers.



```php

$light = new Light();
$light->registerRoute("/", function (LightServiceContainerInterface $service) {
    return $service->get("kit")->renderPage('page_one');
});

```

 
The html_page_copilot service
============

All participants of the Light_Kit rendering framework can use the [**html_page_copilot** service](https://github.com/lingtalfi/Light_HtmlPageCopilot)
to access the htmlPageCopilot instance (and inject their assets on the main page). 











History Log
=============

- 1.17.0 -- 2020-11-27

    - removed LazyReferenceResolver in favor of LightExecuteNotationResolver
    
- 1.16.0 -- 2019-12-16

    - update plugin to accommodate new Light service container

- 1.15.0 -- 2019-12-10

    - update PageConfUpdator->updateWidget, the second argument now can be a callable instead of just an array
    
- 1.14.0 -- 2019-11-25

    - update LightKitPageRenderer->renderPage, now passes dynamic variables to confStorage is necessary
    
- 1.13.0 -- 2019-11-07

    - update LightKitPageRenderer, now dispatches the Light_Kit.on_page_conf_ready event
    
- 1.12.2 -- 2019-10-29

    - fix PageConfUpdator not recognizing name property
    
- 1.12.1 -- 2019-08-30

    - fix LightKitPageRenderer->getHtmlPageCopilot not setting the copilot property
    
- 1.12.0 -- 2019-08-30

    - update LightKitPageRenderer, now uses the html_page_copilot service
    
- 1.11.0 -- 2019-08-14

    - change service configuration to accommodate light new application recommended structure philosophy
    
- 1.10.0 -- 2019-08-13

    - change default config path to config/data/Light_Kit/pages
    
- 1.9.0 -- 2019-08-09

    - now MethodCallResolver->resolve can handle services calls
    
- 1.8.2 -- 2019-08-09

    - update MethodCallResolver documentation
    
- 1.8.1 -- 2019-07-29

    - fix potential bad commit
    
- 1.8.0 -- 2019-07-29

    - add PageConfUpdator->updateWidget method, and revisit page updator conception notes
    
- 1.7.2 -- 2019-07-26

    - fix typo
    
- 1.7.1 -- 2019-07-26

    - fix PageConfUpdator merging using ams algo instead of array_replace_recursive
    
- 1.7.0 -- 2019-07-25

    - add PageConfUpdator
    
- 1.6.4 -- 2019-07-18

    - update documentation for multiple plugins writing to the same babyYaml page configuration file
    
- 1.6.3 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.6.2 -- 2019-07-15

    - add documentation for lazy reference resolver
    
- 1.6.1 -- 2019-07-11

    - fix RouteResolver using inexisting router service
    
- 1.6.0 -- 2019-07-11

    - LazyReferenceResolver now implements LightServiceContainerAwareInterface
    - add RouteResolver
    
- 1.5.2 -- 2019-07-04

    - fix LazyReferenceResolver bad array references
    
- 1.5.1 -- 2019-07-04

    - fix LazyReferenceResolver having az references (forgot to remove them)
    
- 1.5.0 -- 2019-07-04

    - added LazyReferenceResolver
    
- 1.4.0 -- 2019-05-15

    - added the concept of [dynamic variables](https://github.com/lingtalfi/Light_Kit/tree/master/doc/pages/conception-notes.md#dynamic-variables) for LightKitPageRenderer
    
- 1.3.0 -- 2019-05-03

    - update service file, now aware of the showJsNuggetHeaders option
    
- 1.2.0 -- 2019-05-02

    - update service file, now aware of the showCssNuggetHeaders option
    
- 1.1.0 -- 2019-05-02

    - add LightKitCssFileGenerator
    - update LightKitPageRenderer, now is container aware
    
- 1.0.0 -- 2019-04-25

    - initial commit