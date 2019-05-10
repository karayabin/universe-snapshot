Light_Kit
===========
2019-04-25



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
                        rootDir: ${app_dir}/config/kit/pages
        setContainer:
            container: @container()

    methods_collection:
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
which defaults to: **config/kit/pages** (note: in this document, all relative paths are relative to the light app root dir, unless otherwise specified).


So for instance we have this kind of structure:

```txt
- config/kit/pages/
----- page_one.byml
----- page_two.byml
----- ...
----- $pluginName/                  # for instance $pluginName = Light_Kit_MySite
--------- page_three.byml
--------- page_xxx.byml
``` 



Now the name of the file without the **.byml** extension is the actual page name.

Note: 



Calling a page from your Light controller
===========

So now that we know where the pages are located, we can simply call them from our Light controllers.



```php

$light = new Light();
$light->registerRoute("/", function (LightServiceContainerInterface $service) {
    return $service->get("kit")->renderPage('page_one');
});

```

 












History Log
=============

- 1.3.0 -- 2019-05-03

    - update service file, now aware of the showJsNuggetHeaders option
    
- 1.2.0 -- 2019-05-02

    - update service file, now aware of the showCssNuggetHeaders option
    
- 1.1.0 -- 2019-05-02

    - add LightKitCssFileGenerator
    - update LightKitPageRenderer, now is container aware
    
- 1.0.0 -- 2019-04-25

    - initial commit