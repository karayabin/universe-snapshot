[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LightKitPicassoWidgetHandler class
================
2019-04-25 --> 2021-04-09






Introduction
============

The LightKitPicassoWidgetHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitPicassoWidgetHandler</span> extends [PicassoWidgetHandler](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md) implements [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md), [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) {

- Properties
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [PicassoWidgetHandler::$widgetBaseDir](#property-widgetBaseDir) ;
    - protected bool [PicassoWidgetHandler::$showCssNuggetHeaders](#property-showCssNuggetHeaders) ;
    - protected bool [PicassoWidgetHandler::$showJsNuggetHeaders](#property-showJsNuggetHeaders) ;
    - protected [Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) [PicassoWidgetHandler::$kitPageRenderer](#property-kitPageRenderer) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/__construct.md)(?array $options = []) : void
    - public [getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public [setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - public PicassoWidgetHandler::setKitPageRenderer([Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) $renderer) : void
    - public PicassoWidgetHandler::setWidgetBaseDir(string $widgetBaseDir) : void
    - public PicassoWidgetHandler::process(array &$widgetConf, array $debug) : void
    - public PicassoWidgetHandler::render(array $widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, array $debug) : string
    - protected PicassoWidgetHandler::error(string $msg, array $widgetConf, array $debug) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

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

- [LightKitPicassoWidgetHandler::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/__construct.md) &ndash; Builds the LightKitPicassoWidgetHandler instance.
- [LightKitPicassoWidgetHandler::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/getContainer.md) &ndash; Returns the container of this instance.
- [LightKitPicassoWidgetHandler::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/setContainer.md) &ndash; Sets the container.
- PicassoWidgetHandler::setKitPageRenderer &ndash; Sets the KitPageRenderer instance.
- PicassoWidgetHandler::setWidgetBaseDir &ndash; Sets the widgetBaseDir.
- PicassoWidgetHandler::process &ndash; Process the widget.
- PicassoWidgetHandler::render &ndash; Returns the html code of the widget, according to the widget configuration.
- PicassoWidgetHandler::error &ndash; Throws an useful error message.





Location
=============
Ling\Light_Kit\WidgetHandler\LightKitPicassoWidgetHandler<br>
See the source code of [Ling\Light_Kit\WidgetHandler\LightKitPicassoWidgetHandler](https://github.com/lingtalfi/Light_Kit/blob/master/WidgetHandler/LightKitPicassoWidgetHandler.php)



SeeAlso
==============
Previous class: [LightKitService](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Service/LightKitService.md)<br>
