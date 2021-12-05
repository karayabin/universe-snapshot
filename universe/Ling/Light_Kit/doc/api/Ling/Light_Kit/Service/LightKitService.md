[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LightKitService class
================
2019-04-25 --> 2021-07-08






Introduction
============

The LightKitService class.



Class synopsis
==============


class <span class="pl-k">LightKitService</span> extends [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md) implements [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) {

- Inherited properties
    - protected string [LightKitPageRenderer::$applicationDir](#property-applicationDir) ;
    - protected [Ling\Kit\ConfStorage\ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) [LightKitPageRenderer::$confStorage](#property-confStorage) ;
    - protected string [LightKitPageRenderer::$pageName](#property-pageName) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitPageRenderer::$container](#property-container) ;
    - protected [Ling\Light_Kit\ConfigurationTransformer\ConfigurationTransformerInterface[]](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ConfigurationTransformerInterface.md) [LightKitPageRenderer::$pageConfTransformers](#property-pageConfTransformers) ;
    - protected [Ling\Kit\WidgetHandler\WidgetHandlerInterface[]](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) [KitPageRenderer::$widgetHandlers](#property-widgetHandlers) ;
    - protected array [KitPageRenderer::$pageConf](#property-pageConf) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [KitPageRenderer::$copilot](#property-copilot) ;
    - protected bool [KitPageRenderer::$strictMode](#property-strictMode) ;
    - protected callable [KitPageRenderer::$errorHandler](#property-errorHandler) ;
    - protected array [KitPageRenderer::$zones](#property-zones) ;
    - protected array [KitPageRenderer::$widgetsCount](#property-widgetsCount) ;
    - protected string [KitPageRenderer::$layoutRootDir](#property-layoutRootDir) ;
    - protected [Ling\Kit\WidgetConfDecorator\WidgetConfDecoratorInterface[]](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md) [KitPageRenderer::$widgetConfDecorators](#property-widgetConfDecorators) ;

- Inherited methods
    - public [LightKitPageRenderer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/__construct.md)() : void
    - public [LightKitPageRenderer::setConfStorage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setConfStorage.md)([Ling\Kit\ConfStorage\ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) $confStorage) : [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)
    - public [LightKitPageRenderer::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightKitPageRenderer::addPageConfigurationTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/addPageConfigurationTransformer.md)([Ling\Light_Kit\ConfigurationTransformer\ConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ConfigurationTransformerInterface.md) $transformer) : void
    - public [LightKitPageRenderer::configure](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/configure.md)(array $settings) : void
    - public [LightKitPageRenderer::getControllerVar](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getControllerVar.md)(string $key, ?$default = null) : void
    - public [LightKitPageRenderer::getControllerVars](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getControllerVars.md)() : array
    - public [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md)(string $pageName, ?array $options = []) : string
    - public [LightKitPageRenderer::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected [LightKitPageRenderer::getHtmlPageCopilot](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getHtmlPageCopilot.md)() : [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)
    - public KitPageRenderer::countWidgets(string $zoneName) : int
    - public KitPageRenderer::setPageConf(array $pageConf) : void
    - public KitPageRenderer::setStrictMode(bool $strictMode) : [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)
    - public KitPageRenderer::setErrorHandler(callable $errorHandler) : void
    - public KitPageRenderer::registerWidgetHandler(string $type, [Ling\Kit\WidgetHandler\WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) $handler) : void
    - public KitPageRenderer::setLayoutRootDir(string $layoutRootDir) : [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)
    - public KitPageRenderer::addWidgetConfDecorator([Ling\Kit\WidgetConfDecorator\WidgetConfDecoratorInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md) $decorator) : void
    - public KitPageRenderer::printPage() : void
    - public KitPageRenderer::printZone(string $zoneName) : void
    - protected KitPageRenderer::captureZones() : void
    - protected KitPageRenderer::captureZone(string $zoneName, array $widgets) : void

}






Methods
==============

- [LightKitPageRenderer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/__construct.md) &ndash; Builds the LightKitPageRenderer instance.
- [LightKitPageRenderer::setConfStorage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setConfStorage.md) &ndash; Sets the confStorage.
- [LightKitPageRenderer::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setContainer.md) &ndash; Sets the container.
- [LightKitPageRenderer::addPageConfigurationTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/addPageConfigurationTransformer.md) &ndash; Adds a ConfigurationTransformerInterface to this instance.
- [LightKitPageRenderer::configure](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/configure.md) &ndash; Configures thi instance.
- [LightKitPageRenderer::getControllerVar](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getControllerVar.md) &ndash; Returns the value of the global variable set in the "controller" namespace, with the given key.
- [LightKitPageRenderer::getControllerVars](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getControllerVars.md) &ndash; Returns the values of the global variables set in the "controller" namespace.
- [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md) &ndash; Renders the given page.
- [LightKitPageRenderer::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getContainer.md) &ndash; Returns a light service container instance.
- [LightKitPageRenderer::getHtmlPageCopilot](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getHtmlPageCopilot.md) &ndash; Returns an HtmlPageCopilot instance.
- KitPageRenderer::countWidgets &ndash; Returns the number of widgets for a given zone.
- KitPageRenderer::setPageConf &ndash; Sets the pageConf.
- KitPageRenderer::setStrictMode &ndash; Sets the strictMode.
- KitPageRenderer::setErrorHandler &ndash; Sets the errorHandler.
- KitPageRenderer::registerWidgetHandler &ndash; Registers a widget handler for the given (widget) type.
- KitPageRenderer::setLayoutRootDir &ndash; Sets the layoutRootDir.
- KitPageRenderer::addWidgetConfDecorator &ndash; Adds a widget configuration decorator to this instance.
- KitPageRenderer::printPage &ndash; Prints the page.
- KitPageRenderer::printZone &ndash; Prints a zone.
- KitPageRenderer::captureZones &ndash; Captures the zones defined in the configuration and stores them temporarily.
- KitPageRenderer::captureZone &ndash; The working horse method behind captureZones.





Location
=============
Ling\Light_Kit\Service\LightKitService<br>
See the source code of [Ling\Light_Kit\Service\LightKitService](https://github.com/lingtalfi/Light_Kit/blob/master/Service/LightKitService.php)



SeeAlso
==============
Previous class: [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)<br>Next class: [LightKitPicassoWidgetHandler](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler.md)<br>
