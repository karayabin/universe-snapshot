[Back to the Ling/Kit_PrototypeWidget api](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget.md)



The PrototypeWidgetHandler class
================
2019-04-25 --> 2019-08-29






Introduction
============

The PrototypeWidgetHandler class.

This class will render a widget from a file called template (i.e. it will just render the file content as is).

First, you need to configure the handler by defining the base directory containing all templates.
You do so by calling the setRootDir method. Generally you would use the application directory as the base for all templates.

Then, from your [widget configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array), simply add the template property with the value representing the
relative template file to include (relative to the base dir).

So for instance here is a widget configuration array (assuming that you have registered the widget with type=prototype):

```yaml
type: prototype
template: templates/test/widget_one.html
```



Class synopsis
==============


class <span class="pl-k">PrototypeWidgetHandler</span> implements [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md), KitPageRendererAwareInterface {

- Properties
    - protected string [$rootDir](#property-rootDir) ;
    - protected Ling\Kit\PageRenderer\KitPageRendererInterface [$kitPageRenderer](#property-kitPageRenderer) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/__construct.md)() : void
    - public [setKitPageRenderer](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/setKitPageRenderer.md)(Ling\Kit\PageRenderer\KitPageRendererInterface $renderer) : void
    - public [setRootDir](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/setRootDir.md)(string $rootDir) : [PrototypeWidgetHandler](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md)
    - public [handle](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/handle.md)(array $widgetConf, Ling\HtmlPageTools\Copilot\HtmlPageCopilot $copilot, array $debug) : string
    - protected [error](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/error.md)(string $msg, array $widgetConf, array $debug) : void

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    The root dir containing all templates.
    
    

- <span id="property-kitPageRenderer"><b>kitPageRenderer</b></span>

    This property holds the kitPageRenderer for this instance.
    
    



Methods
==============

- [PrototypeWidgetHandler::__construct](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/__construct.md) &ndash; Builds the PrototypeWidgetHandler instance.
- [PrototypeWidgetHandler::setKitPageRenderer](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/setKitPageRenderer.md) &ndash; Sets the KitPageRenderer instance.
- [PrototypeWidgetHandler::setRootDir](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/setRootDir.md) &ndash; Sets the rootDir.
- [PrototypeWidgetHandler::handle](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/handle.md) &ndash; Returns the html code of the widget, according to the widget configuration.
- [PrototypeWidgetHandler::error](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/error.md) &ndash; Throws an useful error message.





Location
=============
Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler<br>
See the source code of [Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/WidgetHandler/PrototypeWidgetHandler.php)



SeeAlso
==============
Previous class: [PrototypeWidgetException](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/Exception/PrototypeWidgetException.md)<br>
