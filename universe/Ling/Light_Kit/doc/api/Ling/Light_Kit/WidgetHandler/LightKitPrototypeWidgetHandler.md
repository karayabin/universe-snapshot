[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LightKitPrototypeWidgetHandler class
================
2019-04-25 --> 2021-07-08






Introduction
============

The LightKitPrototypeWidgetHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitPrototypeWidgetHandler</span> extends [PrototypeWidgetHandler](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md) implements [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md), [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) {

- Properties
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [PrototypeWidgetHandler::$rootDir](#property-rootDir) ;
    - protected [Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) [PrototypeWidgetHandler::$kitPageRenderer](#property-kitPageRenderer) ;

- Methods
    - public [getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public [setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [getControllerVar](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/getControllerVar.md)(string $key, ?$default = null) : void
    - protected [getControllerVars](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/getControllerVars.md)() : array

- Inherited methods
    - public PrototypeWidgetHandler::__construct() : void
    - public PrototypeWidgetHandler::setKitPageRenderer([Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) $renderer) : void
    - public PrototypeWidgetHandler::setRootDir(string $rootDir) : [PrototypeWidgetHandler](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md)
    - public PrototypeWidgetHandler::process(array &$widgetConf, array $debug) : void
    - public PrototypeWidgetHandler::render(array $widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, array $debug) : string
    - protected PrototypeWidgetHandler::getCopilot() : [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)
    - protected PrototypeWidgetHandler::error(string $msg, array $widgetConf, array $debug) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    The root dir containing all templates.
    
    

- <span id="property-kitPageRenderer"><b>kitPageRenderer</b></span>

    This property holds the kitPageRenderer for this instance.
    
    



Methods
==============

- [LightKitPrototypeWidgetHandler::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/getContainer.md) &ndash; Returns the container of this instance.
- [LightKitPrototypeWidgetHandler::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/setContainer.md) &ndash; Sets the container.
- [LightKitPrototypeWidgetHandler::getControllerVar](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/getControllerVar.md) &ndash; Returns the value of the global variable set in the "controller" namespace, with the given key.
- [LightKitPrototypeWidgetHandler::getControllerVars](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPrototypeWidgetHandler/getControllerVars.md) &ndash; Returns the values of the global variables set in the "controller" namespace.
- PrototypeWidgetHandler::__construct &ndash; Builds the PrototypeWidgetHandler instance.
- PrototypeWidgetHandler::setKitPageRenderer &ndash; Sets the KitPageRenderer instance.
- PrototypeWidgetHandler::setRootDir &ndash; Sets the rootDir.
- PrototypeWidgetHandler::process &ndash; Process the widget.
- PrototypeWidgetHandler::render &ndash; Returns the html code of the widget, according to the widget configuration.
- PrototypeWidgetHandler::getCopilot &ndash; Returns the instance of the copilot.
- PrototypeWidgetHandler::error &ndash; Throws an useful error message.





Location
=============
Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler<br>
See the source code of [Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler](https://github.com/lingtalfi/Light_Kit/blob/master/WidgetHandler/LightKitPrototypeWidgetHandler.php)



SeeAlso
==============
Previous class: [LightKitPicassoWidgetHandler](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler.md)<br>
