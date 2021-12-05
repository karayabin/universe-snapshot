[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorPageRenderer class
================
2021-03-01 --> 2021-06-22






Introduction
============

The LightKitEditorPageRenderer class.

To use this class properly,
call the init method after instantiation.



Class synopsis
==============


class <span class="pl-k">LightKitEditorPageRenderer</span> extends [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md) implements [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) {

- Properties
    - private bool [$_isInitialized](#property-_isInitialized) ;

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

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Kit/Page_Renderer/LightKitEditorPageRenderer/__construct.md)() : void
    - public [init](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Kit/Page_Renderer/LightKitEditorPageRenderer/init.md)(?array $options = []) : void

- Inherited methods
    - public LightKitPageRenderer::setConfStorage([Ling\Kit\ConfStorage\ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) $confStorage) : [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)
    - public LightKitPageRenderer::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightKitPageRenderer::addPageConfigurationTransformer([Ling\Light_Kit\ConfigurationTransformer\ConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ConfigurationTransformerInterface.md) $transformer) : void
    - public LightKitPageRenderer::configure(array $settings) : void
    - public LightKitPageRenderer::renderPage(string $pageName, ?array $options = []) : string
    - public LightKitPageRenderer::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightKitPageRenderer::getHtmlPageCopilot() : [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)
    - public KitPageRenderer::countWidgets(string $zoneName) : int
    - public KitPageRenderer::setPageConf(array $pageConf) : void
    - public KitPageRenderer::setStrictMode(bool $strictMode) : Ling\Kit\PageRenderer\KitPageRenderer
    - public KitPageRenderer::setErrorHandler(callable $errorHandler) : void
    - public KitPageRenderer::registerWidgetHandler(string $type, [Ling\Kit\WidgetHandler\WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) $handler) : void
    - public KitPageRenderer::setLayoutRootDir(string $layoutRootDir) : Ling\Kit\PageRenderer\KitPageRenderer
    - public KitPageRenderer::addWidgetConfDecorator([Ling\Kit\WidgetConfDecorator\WidgetConfDecoratorInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md) $decorator) : void
    - public KitPageRenderer::printPage() : void
    - public KitPageRenderer::printZone(string $zoneName) : void
    - protected KitPageRenderer::captureZones() : void
    - protected KitPageRenderer::captureZone(string $zoneName, array $widgets) : void

}




Properties
=============

- <span id="property-_isInitialized"><b>_isInitialized</b></span>

    This property holds the _isInitialized for this instance.
    
    

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the applicationDir for this instance.
    
    

- <span id="property-confStorage"><b>confStorage</b></span>

    This property holds the confStorage for this instance.
    
    

- <span id="property-pageName"><b>pageName</b></span>

    This property holds the pageName for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-pageConfTransformers"><b>pageConfTransformers</b></span>

    This property holds the array of pageConfTransformers for this instance.
    
    

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
    
    

- <span id="property-widgetsCount"><b>widgetsCount</b></span>

    This property holds the number of widgets per zone for this instance.
    
    

- <span id="property-layoutRootDir"><b>layoutRootDir</b></span>

    This property holds the layoutRootDir for this instance.
    The path to the directory containing all layouts used by this instance.
    Generally, you can set this to your app directory.
    
    

- <span id="property-widgetConfDecorators"><b>widgetConfDecorators</b></span>

    This property holds the widgetConfDecorators for this instance.
    It's an array of WidgetConfDecoratorInterface instances.
    
    



Methods
==============

- [LightKitEditorPageRenderer::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Kit/Page_Renderer/LightKitEditorPageRenderer/__construct.md) &ndash; Builds the LightKitEditorPageRenderer instance.
- [LightKitEditorPageRenderer::init](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Kit/Page_Renderer/LightKitEditorPageRenderer/init.md) &ndash; Initializes this instance.
- LightKitPageRenderer::setConfStorage &ndash; Sets the confStorage.
- LightKitPageRenderer::setContainer &ndash; Sets the container.
- LightKitPageRenderer::addPageConfigurationTransformer &ndash; Adds a ConfigurationTransformerInterface to this instance.
- LightKitPageRenderer::configure &ndash; Configures thi instance.
- LightKitPageRenderer::renderPage &ndash; Renders the given page.
- LightKitPageRenderer::getContainer &ndash; Returns a light service container instance.
- LightKitPageRenderer::getHtmlPageCopilot &ndash; Returns an HtmlPageCopilot instance.
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
Ling\Light_Kit_Editor\Light_Kit\Page_Renderer\LightKitEditorPageRenderer<br>
See the source code of [Ling\Light_Kit_Editor\Light_Kit\Page_Renderer\LightKitEditorPageRenderer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Light_Kit/Page_Renderer/LightKitEditorPageRenderer.php)



SeeAlso
==============
Previous class: [WebsiteRootTransformer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Kit/ConfigurationTransformer/WebsiteRootTransformer.md)<br>Next class: [LightKitEditorPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_PlanetInstaller/LightKitEditorPlanetInstaller.md)<br>
