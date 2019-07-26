[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The PicassoWidgetHandler class
================
2019-04-24 --> 2019-07-24






Introduction
============

The PicassoWidgetHandler class.

This class can render a widget from a widgetConf array.
A widgetConf array has the following structure:

```yaml
- className: string, the name of the widget class. Example: Ling\Kit_PicassoWidget\Widget\ExamplePicassoWidget
- ?widgetDir: string, the path to the widget directory. If not set, the widget directory is a directory named "widget" found next to the file containing the widget class.
             If set, and the path is relative (i.e. not starting with a slash),
             then the path is relative to the widgetBaseDir (set using the setWidgetBaseDir method of this class)
- template: string, the relative path of the template to use.
     A picasso widget always uses a template to displays itself.
     The path is relative to the "$widgetDir/templates" directory.
- vars: an array of variables to pass to the widget template
    - ?attr: an array of html attributes to add on the widget's outer tag. Example:
         - id: my_id
         - class: my_class my_class2
         - data-example-value: 668
```




The widget directory
---------------

With the Picasso system, we use a widget directory.
By default, the widget directory is next to the Picasso widget class file.
It can be changed using the **widgetDir** property of the widget configuration array.

This directory has the following structure:


```txt
- widget/
----- templates/            # this directory contains the templates available for this widget
--------- prototype.php     # just an example, can be any name really...
--------- default.php       # just an example, can be any name really...
----- js/                   # this directory contains the js nuggets
                            # If the js file has the same name as the template, it will be loaded automatically.
                            # For instance, if the selected template is default.php, and there is a
                            # js nugget named default.js or default.js.php (same as default.js but allows php code inside)
                            # in the js directory, then this nugget will be loaded automatically as a js code block.
--------- default.js        # an example js nugget.
----- css/                  # this directory contains the css nuggets to add to the chosen template.
----- css/                  # if the css nugget has the same name as the template, then it will be loaded automatically (same mechanism as the js nuggets).
--------- default.css       # an example css nugget.
```


The files in the "templates" directory are the available templates for this widget.
The files in the "js" directory are automatically loaded as js code blocks via [the HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md).
Those are also called js nuggets.

Those js files are used to initialize the widget. For instance, if your widget displays a lightbox gallery,
it might use a jquery snippet to initialize the gallery.
If you need the power of php in your js file, just add the php extension (for instance default.js.php).

The files in the "css" directory are automatically loaded as css code blocks via [the HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md).
Those css files shall be compiled into one "widget-compiled.css" (or another name) file by the host application,
so that the css code of widgets can be nicely separated from the html code.
Those css blocks are sometimes called css nuggets.



Class synopsis
==============


class <span class="pl-k">PicassoWidgetHandler</span> implements [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md), [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md) {

- Properties
    - protected string [$widgetBaseDir](#property-widgetBaseDir) ;
    - protected bool [$showCssNuggetHeaders](#property-showCssNuggetHeaders) ;
    - protected bool [$showJsNuggetHeaders](#property-showJsNuggetHeaders) ;
    - protected [Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) [$kitPageRenderer](#property-kitPageRenderer) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/__construct.md)(array $options = []) : void
    - public [setKitPageRenderer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/setKitPageRenderer.md)([Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) $renderer) : void
    - public [setWidgetBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/setWidgetBaseDir.md)(string $widgetBaseDir) : void
    - public [handle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/handle.md)(array $widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, array $debug) : string
    - protected [error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/error.md)(string $msg, array $widgetConf, array $debug) : void

}




Properties
=============

- <span id="property-widgetBaseDir"><b>widgetBaseDir</b></span>

    This property holds the widgetBaseDir for this instance.
    This is the absolute path to the widget base directory,
    which is used when the widgetConf specifies a relative widgetDir property.
    See more information in the class description.
    
    

- <span id="property-showCssNuggetHeaders"><b>showCssNuggetHeaders</b></span>

    This property holds the showCssNuggetHeaders for this instance.
    Whether or not to show some headers along with the css nuggets (aka css code blocks).
    This might be useful for debugging, if you print all your nuggets in a compiled file,
    to better spot the provenance for each nugget.
    
    

- <span id="property-showJsNuggetHeaders"><b>showJsNuggetHeaders</b></span>

    This property holds the showJsNuggetHeaders for this instance.
    Whether or not to show some headers along with the js nuggets (aka js init code blocks).
    
    This might be useful for debugging.
    
    

- <span id="property-kitPageRenderer"><b>kitPageRenderer</b></span>

    This property holds the kitPageRenderer for this instance.
    
    



Methods
==============

- [PicassoWidgetHandler::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/__construct.md) &ndash; Builds the PicassoWidgetHandler instance.
- [PicassoWidgetHandler::setKitPageRenderer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/setKitPageRenderer.md) &ndash; Sets the KitPageRenderer instance.
- [PicassoWidgetHandler::setWidgetBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/setWidgetBaseDir.md) &ndash; Sets the widgetBaseDir.
- [PicassoWidgetHandler::handle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/handle.md) &ndash; Returns the html code of the widget, according to the widget configuration.
- [PicassoWidgetHandler::error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/error.md) &ndash; Throws an useful error message.





Location
=============
Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler<br>
See the source code of [Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/WidgetHandler/PicassoWidgetHandler.php)



SeeAlso
==============
Previous class: [WidgetConfAwarePicassoWidgetInterface](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md)<br>
