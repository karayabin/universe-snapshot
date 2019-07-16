Kit_PicassoWidget
===========
2019-04-24



A type of widget for the [kit](https://github.com/lingtalfi/Kit) system.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Kit_PicassoWidget
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/conception-notes.md)  
- [The Picasso widget array](#the-picasso-widget-array)
- [The Picasso file structure](#the-picasso-file-structure)
- [Example code](#example-code)
    - [File structure:](#file-structure)
- [A concrete skin example](#the-picasso-file-structure)
- [Related](#related)    
- [History Log](#history-log)



The Picasso widget array
----------

So, here is the configuration array for the picasso widget:

```yaml
className: $theClassName        # for instance Ling\MyFirstPicassoWidget\MyFirstPicassoWidget 
?widgetDir: $widgetDir          # absolute path to the widget directory. If not set, the widget directory is a directory named "widget" found next to the file containing the widget class.
                                # If set, and the path is relative (i.e. not starting with a slash),
                                # then the path is relative to the widgetBaseDir (set using the setWidgetBaseDir method of the PicassoWidgetHandler class)
template: $templateName         # for instance: default.php, or prototype.php. This is the path to the template file, relative to the $widgetDir/templates directory
# The css skin to use. 
# If the skin property doesn't exist, it defaults to the template name. 
# If it's defined, it indicates which skin to use.
# If null, this means use no skin at all (the user probably wants to take care of the css by herself)
?skin: null  
# The js init file to use. 
# If not defined, it defaults to the template name. 
# If it's defined, it indicates the js init file to use.
# If null, this means use no js init file at all (the user probably wants to take care of the js by herself)
?js: null  
?vars:                          # An array of variables to pass to the template
    my_value: 667 
    ?attr:                          # An array of html attributes to add to the widget's outer tag
        id: my_id
        class: my_class my_class2
        data-example-value: 668

``` 


Note: this merges with the widget array defined in the [kit configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array).


Reminder: to use the Picasso widget, don't forget to add the type property:
 
```yaml
type: picasso
```

And to register the PicassoWidgetHandler:


```php
$kit = new KitPageRenderer();
// ...
$kit->registerWidgetHandler('picasso', new PicassoWidgetHandler());
// ...
```



The Picasso file structure
----------

The Picasso file structure is contained in a **widget** directory, which by default is named **widget**, and resides right next to the class file (the
file containing the class defined in the Picasso widget array via the **className** property).

Here is the **widget** directory structure:

```txt
- widget/
----- templates/            # this directory contains the templates available to this widget
--------- prototype.php     # just an example, can be any name really...
--------- default.php       # just an example, can be any name really...
----- js/
--------- default.js        # can be any name, but if it's the same name as a template, it's loaded automatically
--------- default.js.php    # use this instead of default.js to turn the file into a dynamic js nugget (i.e. you can leverage the power of php to write your js files)
----- css/                  # this directory contains the css code blocks to add to the chosen template
--------- default.css       # can be any name, but if it's the same name as the chosen template, it's loaded automatically
--------- default.css.php   # use this instead of default.css to turn the file into a dynamic css nugget
```


Note: the **widget** directory can be placed anywhere using the **widgetDir** directive of the widget configuration array.


Notes:
- because of this design, a planet can provide multiple Picasso widgets.
- the **js** directory contains any [js code block](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md#property-jsCodeBlocks) that you want to inject in your html page.
- the files contained in the **js-init** directory must have the same name than the template being used (with the **.js** or **.js.php** extension instead). If the **.js.php** extension is used, it's [dynamic nugget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/conception-notes.md#dynamic-nuggets).
- the **css** directory contains any [css code block](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md#property-cssCodeBlocks) that you want to inject in an external css stylesheet.
- the files contained in the **css** directory must have the same name than the template being used (with the **.css** or **.css.php** extension instead). If the **.css.php** extension is used, it's [dynamic nugget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/conception-notes.md#dynamic-nuggets).




Example code
---------

This is not a production code, just a sample code to quickly get started.

 

```php


// file:  /komin/jin_site_demo/www/index.php


Class ZeroWidget extends PicassoWidget{
    public function __construct()
    {
        parent::__construct();
        $this->registerLibrary("ck", [], [
            "https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js",
        ]);
    }
}


$pageConfFile = "/komin/jin_site_demo/www/tmp/page.byml";
$pageConf = BabyYamlUtil::readFile($pageConfFile);


$layoutDir = "/komin/jin_site_demo/www/tmp/layouts";
$kit = new KitPageRenderer();
$kit->setLayoutRootDir($layoutDir);
$kit->registerWidgetHandler('picasso', new PicassoWidgetHandler());
$kit->setPageConf($pageConf);

$kit->printPage();
```

Page configuration:

```yaml

label: page one
layout: looplab.php
layout_vars: []
zones:
    zone_one:
        -
            name: widget_one
            type: picasso
            active: true
            className: ZeroWidget
            template: default.php
            ?skin: null
            ?js: null
            ?vars:  
                my_value: 668
                ?attr:
                    id: my_id
                    class: my_class my_class2
                    data-example-value: 668
                
```


### File structure:


```yaml
- /komin/jin_site_demo/www/
----- index.php
----- widget/
--------- templates/
------------- default.php       # contains the string "Hello World".
----- tmp/
--------- css/
--------- img/              
--------- layouts/looplab.php   # the layout template: the html skeleton of the page, it contains the top and bottom part,
                                # and the calls to the printZone method. The $this variable inside this file
                                # represents the current KitPageRenderer instance.
                                # So for instance, you can access the copilot using $this->copilot
                                # -------
--------- page.byml             # this configuration file could be anywhere else really
```


Note: the **widget** directory is (by default) declared next to the file where the
Widget class was declared (**index.php** in this very particular case).




A concrete skin example
==============

To use a skin, we recommend the following approach:

- add the skin to your widget configuration, AND as a css class as well. 
- then create your skin file, using the skin css class to write your rules  


Here is an example widget configuration array using the **looplab-dark** skin that I want to create:

```yaml

# ...
-
    name: looplab_monochrome_header
    type: picasso
    className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabMonoChromeHeaderWidget
    widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabMonoChromeHeaderWidget
    template: default.php
    skin: looplab-dark
    vars:
        attr:
            class: looplab-dark
        title: Explore
        text: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente doloribus ut iure itaque quibusdam rem accusantium deserunt reprehenderit sunt minus.
        button_url: '#'
        button_class: btn btn-outline-secondary
        button_text: Find Out More
```
                
                
Notice that I've written my **looplab-dark** skin in two different locations:

- **skin**, to indicate that I want to include the skin file (named **looplab-dark.css** or **looplab-dark.css.php** in the **widget** dir)
- **vars.attr.class**, to simply add the **looplab-dark** css class to my widget's container tag 


Then, in my widget dir (in this case: **templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabMonoChromeHeaderWidget**),
I create my skin file: **css/looplab-dark.css**, with the following content (for instance):


```css
.kit-bwl-monochrome_header.looplab-dark {
    background: #333;
    color: #fff;
}
```

Note: the **kit-bwl-monochrome_header** is hardcoded in the template, so I can always rely on it.

By combining the widget's default class and the skin class, I can apply style on a widget instance basis rather than on a widget type.
In other words, I can add the **looplab_monochrome_header** widget multiple times in my page, each time with a different skin.
 





                
                

Related
========

- [Kit](https://github.com/lingtalfi/Kit): the widget rendering system 
- [Kit_PrototypeWidget](https://github.com/lingtalfi/Kit_PrototypeWidget): another widget type
- [Light_Kit_BootstrapWidgetLibrary](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary): a widget library for the [Light framework](https://github.com/lingtalfi/Light), using picasso widgets


History Log
=============

- 1.28.0 -- 2019-07-11

    - add EasyLightPicassoWidget::getKitPageRenderer method

- 1.27.0 -- 2019-07-04

    - add EasyLightPicassoWidget class
    
- 1.26.3 -- 2019-07-04

    - update the concept of dynamic data extraction in the conception notes
    
- 1.26.2 -- 2019-07-03

    - adding the concept of dynamic data extraction in the conception notes again (updated wrong file last time)
    
- 1.26.1 -- 2019-07-03

    - adding the concept of dynamic data extraction in the conception notes
    
- 1.26.0 -- 2019-05-17

    - add the js var to the picasso widget array
    
- 1.25.0 -- 2019-05-17

    - update PicassoWidgetHandler, now can pass the KitPageRendererInterface to widgets so that they can print zones
    
- 1.24.0 -- 2019-05-16

    - update PicassoWidgetHandler, now passes the copilot to the widget instances automatically
    
- 1.23.0 -- 2019-05-13

    - update widget structure, js-init directory becomes js directory
    
- 1.22.0 -- 2019-05-13

    - update VariableDescriptionFileGeneratorUtil now generate more convoluted examples
    
- 1.21.0 -- 2019-05-13

    - update VariableDescriptionDocWriterUtil now add "back to top" links

- 1.20.1 -- 2019-05-13

    - fix VariableDescriptionFileGeneratorUtil setting default value of null for arrays
    
- 1.20.0 -- 2019-05-13

    - update VariableDescriptionDocWriterUtil, now lists the presets

- 1.19.0 -- 2019-05-10

    - update PicassoWidget->prepare method, now can transform the widget configuration array
    
- 1.18.1 -- 2019-05-10

    - fix VariableDescriptionDocWriterUtil no carriage return after long example (typo)
    
- 1.18.0 -- 2019-05-06

    - update VariableDescriptionDocWriterUtil, now example accepts array value
    
- 1.17.0 -- 2019-05-06

    - update VariableDescriptionFileGeneratorUtil, now the default value for string is set with the actual value being used 
    
- 1.16.0 -- 2019-05-03

    - add the PicassoWidget->prepare method 
    
- 1.15.0 -- 2019-05-03

    - update VariableDescriptionDocWriterUtil now lists the skins and templates
    
- 1.14.1 -- 2019-05-03

    - update documentation
    
- 1.14.0 -- 2019-05-03

    - update VariableDescriptionFileGeneratorUtil, now the renderExample method indents the code with four spaces.
    
- 1.13.0 -- 2019-05-03

    - update VariableDescriptionFileGeneratorUtil, now adds a specific description for attr variable.
    
- 1.12.0 -- 2019-05-03

    - add VariableDescriptionFileGeneratorUtil
    
- 1.11.0 -- 2019-05-03

    - update PicassoWidgetHandler: now handles dynamic nuggets
    - update PicassoWidgetHandler: add constructor option $showJsNuggetHeaders
    
- 1.10.0 -- 2019-05-02

    - update PicassoWidgetHandler: add constructor option $showCssNuggetHeaders
    
- 1.9.0 -- 2019-05-02

    - update widget configuration array: attr is now part of the vars
    
- 1.8.0 -- 2019-05-02

    - add the skin concept (and implementation)
    
- 1.7.0 -- 2019-05-02

    - add VariableDescriptionDocWriterUtil
    
- 1.6.0 -- 2019-04-30

    - add WidgetConfAwarePicassoWidgetInterface interface
    - reintroducting the vars property into the widget configuration array
    
- 1.5.0 -- 2019-04-30

    - add the widget base dir concept (and implementation)
    
- 1.4.0 -- 2019-04-30

    - add the widgetDir directive to the widget configuration array
    
- 1.3.0 -- 2019-04-30

    - remove vars property from the widget configuration array
    
- 1.2.0 -- 2019-04-30

    - add attr property to the widget configuration array
    
- 1.1.0 -- 2019-04-29

    - update PicassoWidgetHandler, now handles css code blocks
    
- 1.0.0 -- 2019-04-24

    - initial commit