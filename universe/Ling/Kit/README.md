Kit
===========
2019-04-24



A system to render widgets in an html page.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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

label: $pageLabel               # The human name for the page. It is used in error messages.                 
layout: $layoutRelPath          # The relative path to the layout file for this page. The path is relative to a root which shall be defined in the general configuration of kit.
layout_vars: []                 # an array of layout vars that will be accessible to the layout (a layout might be configured to some degree by such variables, depending on the layout)
zones:
    $zoneName:                  # note: the zone name is called from the layout file 
        -   
            name: $widgetName       # the widget name
            type: $widgetType       # the widget type
            ?active: $bool          # whether to use the widget, defaults to true
            ...                     # any other configuration value that you want 
            
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


Related
========

- [Kit_PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget): a widget type 





History Log
=============

- 1.2.0 -- 2019-04-24

    - fix KitPageRenderer->printPage calling top and bottom parts BEFORE the widgets configuring the Copilot
    
- 1.1.0 -- 2019-04-24

    - add debug array to WidgetHandlerInterface->handle
    - fix typo in KitPageRenderer
    
- 1.0.0 -- 2019-04-24

    - initial commit