[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LightKitPageRenderer class
================
2019-04-25 --> 2019-04-25






Introduction
============

The LightKitPageRenderer class.



Class synopsis
==============


class <span class="pl-k">LightKitPageRenderer</span> extends [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)  {

- Properties
    - protected string [$applicationDir](#property-applicationDir) ;
    - protected [Ling\Kit\ConfStorage\ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) [$confStorage](#property-confStorage) ;

- Inherited properties
    - protected [Ling\Kit\WidgetHandler\WidgetHandlerInterface[]](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) [KitPageRenderer::$widgetHandlers](#property-widgetHandlers) ;
    - protected array [KitPageRenderer::$pageConf](#property-pageConf) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [KitPageRenderer::$copilot](#property-copilot) ;
    - protected bool [KitPageRenderer::$strictMode](#property-strictMode) ;
    - protected callable [KitPageRenderer::$errorHandler](#property-errorHandler) ;
    - protected array [KitPageRenderer::$zones](#property-zones) ;
    - protected string [KitPageRenderer::$layoutRootDir](#property-layoutRootDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/__construct.md)() : void
    - public [setConfStorage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setConfStorage.md)([Ling\Kit\ConfStorage\ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) $confStorage) : [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)
    - public [configure](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/configure.md)(array $settings) : void
    - public [renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md)(string $pageName) : string

- Inherited methods
    - public KitPageRenderer::setPageConf(array $pageConf) : void
    - public KitPageRenderer::setStrictMode(bool $strictMode) : [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)
    - public KitPageRenderer::setErrorHandler(callable $errorHandler) : void
    - public KitPageRenderer::registerWidgetHandler(string $type, [Ling\Kit\WidgetHandler\WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) $handler) : void
    - public KitPageRenderer::setLayoutRootDir(string $layoutRootDir) : [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)
    - public KitPageRenderer::printPage() : void
    - public KitPageRenderer::printZone(string $zoneName) : void
    - protected KitPageRenderer::captureZones() : void

}




Properties
=============

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the applicationDir for this instance.
    
    

- <span id="property-confStorage"><b>confStorage</b></span>

    This property holds the confStorage for this instance.
    
    

- <span id="property-widgetHandlers"><b>widgetHandlers</b></span>

    This property holds the widgetHandlers for this instance.
    It's an array of type => WidgetHandlerInterface
    
    

- <span id="property-pageConf"><b>pageConf</b></span>

    This property holds the pageConf for this instance.
    See more about the array structure in the [page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) section.
    
    

- <span id="property-copilot"><b>copilot</b></span>

    This property holds the copilot for this instance.
    
    

- <span id="property-strictMode"><b>strictMode</b></span>

    This property holds the strictMode for this instance.
    
    If true, a widget exception is not caught.
    If false, a widget exception is caught and the errorHandler is called (use the setErrorHandler method
    to define the errorHandler).
    
    

- <span id="property-errorHandler"><b>errorHandler</b></span>

    This property holds the errorHandler for this instance.
    
    The error handler will receive the widget exception and return an error message to display
    instead of the widget html code.
    
    The errorHandler is only called if the strictMode is set to false.
    
    The signature of the errorHandler is the following:
    
    
    
    errorHandler ( \Exception $e, array widgetConf, array debug  ): string
    
    - The debug array contains the following:
         - page: the label of the page containing the widget
         - zone: the name of the zone containing the widget
    
    
    Note: if no error handler is defined, this class will use a default handling mechanism instead.
    
    

- <span id="property-zones"><b>zones</b></span>

    This property holds the zones for this instance.
    It's an array of zoneName => zone html code.
    
    

- <span id="property-layoutRootDir"><b>layoutRootDir</b></span>

    This property holds the layoutRootDir for this instance.
    The path to the directory containing all layouts used by this instance.
    Generally, you can set this to your app directory.
    
    



Methods
==============

- [LightKitPageRenderer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/__construct.md) &ndash; Builds the LightKitPageRenderer instance.
- [LightKitPageRenderer::setConfStorage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setConfStorage.md) &ndash; Sets the confStorage.
- [LightKitPageRenderer::configure](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/configure.md) &ndash; Configures thi instance.
- [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md) &ndash; Renders the given page.
- KitPageRenderer::setPageConf &ndash; Sets the pageConf.
- KitPageRenderer::setStrictMode &ndash; Sets the strictMode.
- KitPageRenderer::setErrorHandler &ndash; Sets the errorHandler.
- KitPageRenderer::registerWidgetHandler &ndash; Registers a widget handler for the given (widget) type.
- KitPageRenderer::setLayoutRootDir &ndash; Sets the layoutRootDir.
- KitPageRenderer::printPage &ndash; Prints the page.
- KitPageRenderer::printZone &ndash; Prints a zone.
- KitPageRenderer::captureZones &ndash; Captures the zones defined in the configuration and stores them temporarily.





Location
=============
Ling\Light_Kit\PageRenderer\LightKitPageRenderer


SeeAlso
==============
Previous class: [LightKitException](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Exception/LightKitException.md)<br>
