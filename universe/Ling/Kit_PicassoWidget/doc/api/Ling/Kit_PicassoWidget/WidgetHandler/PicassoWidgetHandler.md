[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The PicassoWidgetHandler class
================
2019-04-24 --> 2019-04-30






Introduction
============

The PicassoWidgetHandler class.

This class can render a widget from a widgetConf array.
A widgetConf array has the following structure:

- className: string, the name of the widget class. Example: Ling\Kit_PicassoWidget\Widget\ExamplePicassoWidget
- template: string, the relative path of the template to use.
     A picasso widget always uses a template to displays itself.
     The path is relative to the "widget/templates" directory next to the widget instance
vars: array, an array of variables for the front widget to use



The widget directory
---------------

With the Picasso system, there is always a widget directory next to the Picasso widget class.
This directory has the following structure:


```txt
- widget/
----- templates/            # this directory contains the templates available for this widget
--------- prototype.php     # just an example, can be any name really...
--------- default.php       # just an example, can be any name really...
----- js-init/
--------- default.js        # can be any name, but it's the same name as a template
----- css/                  # this directory contains the css code blocks to add to the chosen template
--------- default.css       # can be any name, but it's the same name as a template
```


The files in the "templates" directory are the available templates for this widget.
The files in the "js-init" directory are automatically loaded as js code blocks via [the HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md).
Those js files are used to initialize the widget. For instance, if your widget displays a lightbox gallery,
it might use a jquery snippet to initialize the gallery.

The files in the "css" directory are automatically loaded as css code blocks via [the HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md).
Those css files shall be compiled into one "widget-compiled.css" (or another name) file by the host application,
so that the css code of widgets can be nicely separated from the html code.



Class synopsis
==============


class <span class="pl-k">PicassoWidgetHandler</span> implements [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) {

- Methods
    - public [handle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/handle.md)(array $widgetConf, Ling\HtmlPageTools\Copilot\HtmlPageCopilot $copilot, array $debug) : string
    - protected [error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/error.md)(string $msg, array $widgetConf, array $debug) : void

}






Methods
==============

- [PicassoWidgetHandler::handle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/handle.md) &ndash; Returns the html code of the widget, according to the widget configuration.
- [PicassoWidgetHandler::error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/error.md) &ndash; Throws an useful error message.





Location
=============
Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler


SeeAlso
==============
Previous class: [PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget.md)<br>
