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
----- js-init/
--------- default.js        # can be any name, but it's the same name as a template
----- css/                  # this directory contains the css code blocks to add to the chosen template
--------- default.css       # can be any name, but it's the same name as a template
```


Note: the **widget** directory can be placed anywhere using the **widgetDir** directive of the widget configuration array.


Notes:
- because of this design, a planet can provide multiple Picasso widgets.
- the **js-init** directory contains any [js code block](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md#property-jsCodeBlocks) that you want to inject in your html page.
- the files contained in the **js-init** directory must have the same name than the template being used (with the **.js** extension instead).
- the **css** directory contains any [css code block](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md#property-cssCodeBlocks) that you want to inject in an external css stylesheet.
- the files contained in the **css** directory must have the same name than the template being used (with the **.css** extension instead).




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



Related
========

- [Kit](https://github.com/lingtalfi/Kit): the widget rendering system 
- [Kit_PrototypeWidget](https://github.com/lingtalfi/Kit_PrototypeWidget): another widget type


History Log
=============

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