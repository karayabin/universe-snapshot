Kit
===========
2019-04-24 -> 2021-03-05



A system to render widgets in an html page.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Kit
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Kit
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Kit/blob/master/doc/pages/conception-notes.md)
- [The concepts used by Kit](#the-concepts-used-by-kit)
- [The kit configuration array](#the-kit-configuration-array)
    - [A Babyyaml implementation of the kit configuration array](#a-babyyaml-implementation-of-the-kit-configuration-array)
- [Related](#related)
- [History Log](#history-log)


The concepts used by Kit
================

Kit is a system to render widgets in an html page.

It uses the following concepts:

- page
- layout
- zone
- widget



The page is the biggest container, it contains everything and represents an html page.

A page uses a layout, which is like the html skeleton of the page. 

A layout is a php file, which content looks like an html file, but which includes zones.


Note: the layout file also uses the [HtmlPageRenderer](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md) from the [HtmlPageTools planet](https://github.com/lingtalfi/HtmlPageTools) to
render the top and bottom of the html page. And so Kit borrows [the concept of top and bottom](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md#the-top-and-bottom-concept) too.


A zone is like a placeholder for widgets. The developer will attach widgets to a zone.
She can attach as many widgets as she wants.

And so, by assigning the widgets to the different zones of the layout, she composes the html page.


The widget is the smallest unit in Kit: it's an html code block representing an identifiable element on the html page.

For instance, a menu nav bar, or a list of blog posts, or an advertising in a side bar, ...


The kit configuration array
============

To actually render a page, we need to pass a configuration array to the KitPageRenderer object.

In this document, I will use the [BabyYaml](https://github.com/lingtalfi/BabyYaml) notation for representing arrays (for readability purpose).


Here is the configuration for a given page (variables are preceded with the dollar symbol):

```yaml

label: $pageLabel                           # The human name for the page. It is used in error messages.                 
layout: $layoutRelPath                      # The relative path to the layout file for this page. The path is relative to a root which shall be defined in the general configuration of kit.
layout_vars: []                             # optional, an array of layout vars that will be accessible to the layout (a layout might be configured to some degree by such variables, depending on the layout)

title: This is the title of the page        # optional but strongly recommended, the seo title (the title tag)
description: <                              # optional but strongly recommended, the seo description (the meta description tag)
    This is the description of the page
>
bodyClass: theme-dark

zones:
    $zoneName:                              # note: the zone name is called from the layout file 
        -                                   # this array is the widget configuration array
            name: $widgetName               # the widget name
            type: $widgetType               # the widget type
            ?active: $bool                  # whether to use the widget, defaults to true
            ...                             # any other configuration value that you want           
            
```


Important note: due to some implementation details, when a zone is configured in the zone section, all the widgets 
contained in that zone will be processed, even if you don't use them in your layout. 
So, make sure that your layout uses all the zones defined in this configuration array, otherwise you would process widgets
that aren't actually used (waste of performance).




A Babyyaml implementation of the kit configuration array
-------

As we've seen, the kit configuration array represents a page.

If we use BabyYaml to store the array, we can simply create one configuration file per page, with the name of the configuration
file being the name of the page.

For instance, we could have a kit directory with the following structure:

```txt
- kit/
----- config.byml       # a general kit configuration file. Note: I'm not sure about that, maybe we don't need it.
----- pages/
--------- page_one.byml
--------- page_two.byml
--------- page_three.byml
```


But, what a third-party plugin named **MyPlugin_One** wants to add some widgets to the page_one page configuration?

In this implementation, we resolve this problem by creating a directory with the name of the page, and third-party
plugins can put their addition into it. By convention, the addition of a third-party plugin will be named after it 
(to make it easier to spot where the configuration comes from).

So for instance the following structure might resolve the problem described above:


```txt
- kit/
----- pages/
--------- page_one.byml
--------- page_two.byml
--------- page_three.byml
--------- page_one/
------------- MyPlugin_One.byml
------------- ...

```

How exactly are the additional files merged to the page configuration file is described in more details
in the [BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md) class.





Related
========

- [Kit_PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget): a widget type 
- [Kit_PrototypeWidget](https://github.com/lingtalfi/Kit_PrototypeWidget): a widget type 





History Log
=============

- 1.12.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.12.4 -- 2021-03-02

    - update ConfStorageInterface->getPageConf signature with php8 notation
  
- 1.12.3 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.12.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.12.1 -- 2020-08-10

    - fix KitPageRenderer->printPage not throwing exception if the layout is not a file 
    
- 1.12.0 -- 2019-11-25

    - update BabyYamlConfStorage->getPageConf, now accepts variables for _parent path 
    
- 1.11.1 -- 2019-08-30

    - move KitPageRenderer->getNewHtmlPageCopilot to getHtmlPageCopilot 
    
- 1.11.0 -- 2019-08-30

    - add KitPageRenderer->getNewHtmlPageCopilot method
    
- 1.10.0 -- 2019-07-29

    - add BabyYamlConfStorage->getPageConf parent trick for devs
    
- 1.9.0 -- 2019-07-25

    - update KitPageRenderer, now understands the bodyClass page configuration property
    
- 1.8.0 -- 2019-07-18

    - update BabyYamlConfStorage, can now handle multiple plugins writing to the same page configuration file
    
- 1.7.4 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.7.3 -- 2019-07-11

    - add KitPageRendererInterface::countWidgets method  
    
- 1.7.2 -- 2019-05-17

    - fix KitPageRenderer not handling printZone robustly  
    
- 1.7.1 -- 2019-05-17

    - fix KitPageRendererAwareInterface not using KitPageRendererInterface  
    
- 1.7.0 -- 2019-05-17

    - add KitPageRendererInterface  
    
- 1.6.0 -- 2019-05-17

    - add KitPageRendererAwareInterface  
    
- 1.5.1 -- 2019-05-15

    - update documentation for widget conf decorators  
    
- 1.5.0 -- 2019-04-30

    - add the idea (with commented implementation) for widget conf decorators  
    
- 1.4.0 -- 2019-04-26

    - add title and description to the kit configuration array 
    
- 1.3.0 -- 2019-04-25

    - add ConfStorageInterface
    
- 1.2.0 -- 2019-04-24

    - fix KitPageRenderer->printPage calling top and bottom parts BEFORE the widgets configuring the Copilot
    
- 1.1.0 -- 2019-04-24

    - add debug array to WidgetHandlerInterface->handle
    - fix typo in KitPageRenderer
    
- 1.0.0 -- 2019-04-24

    - initial commit