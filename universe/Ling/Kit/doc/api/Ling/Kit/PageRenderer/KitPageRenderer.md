[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)



The KitPageRenderer class
================
2019-04-24 --> 2020-08-10






Introduction
============

The KitPageRenderer class.


The configuration for a given page looks like this:

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


See more details in the [page configuration array](https://github.com/lingtalfi/Kit/blob/master/README.md#the-kit-configuration-array) document.



Class synopsis
==============


class <span class="pl-k">KitPageRenderer</span> implements [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) {

- Properties
    - protected [Ling\Kit\WidgetHandler\WidgetHandlerInterface[]](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) [$widgetHandlers](#property-widgetHandlers) ;
    - protected array [$pageConf](#property-pageConf) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [$copilot](#property-copilot) ;
    - protected bool [$strictMode](#property-strictMode) ;
    - protected callable [$errorHandler](#property-errorHandler) ;
    - protected array [$zones](#property-zones) ;
    - protected array [$widgetsCount](#property-widgetsCount) ;
    - protected string [$layoutRootDir](#property-layoutRootDir) ;
    - protected [Ling\Kit\WidgetConfDecorator\WidgetConfDecoratorInterface[]](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md) [$widgetConfDecorators](#property-widgetConfDecorators) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/__construct.md)() : void
    - public [countWidgets](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/countWidgets.md)(string $zoneName) : int
    - public [setPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setPageConf.md)(array $pageConf) : void
    - public [setStrictMode](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setStrictMode.md)(bool $strictMode) : [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)
    - public [setErrorHandler](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setErrorHandler.md)(callable $errorHandler) : void
    - public [registerWidgetHandler](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/registerWidgetHandler.md)(string $type, [Ling\Kit\WidgetHandler\WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) $handler) : void
    - public [setLayoutRootDir](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setLayoutRootDir.md)(string $layoutRootDir) : [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)
    - public [addWidgetConfDecorator](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/addWidgetConfDecorator.md)([Ling\Kit\WidgetConfDecorator\WidgetConfDecoratorInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md) $decorator) : void
    - public [printPage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printPage.md)() : void
    - public [printZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printZone.md)(string $zoneName) : void
    - protected [captureZones](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZones.md)() : void
    - protected [captureZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZone.md)(string $zoneName, array $widgets) : void
    - protected [getHtmlPageCopilot](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/getHtmlPageCopilot.md)() : [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)

}




Properties
=============

- <span id="property-widgetHandlers"><b>widgetHandlers</b></span>

    This property holds the widgetHandlers for this instance.
    It's an array of type => WidgetHandlerInterface
    
    

- <span id="property-pageConf"><b>pageConf</b></span>

    This property holds the pageConf for this instance.
    See more about the array structure in the [page configuration array](https://github.com/lingtalfi/Kit/blob/master/README.md#the-kit-configuration-array) section.
    
    

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

- [KitPageRenderer::__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/__construct.md) &ndash; Builds the KitPageRenderer instance.
- [KitPageRenderer::countWidgets](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/countWidgets.md) &ndash; Returns the number of widgets for a given zone.
- [KitPageRenderer::setPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setPageConf.md) &ndash; Sets the pageConf.
- [KitPageRenderer::setStrictMode](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setStrictMode.md) &ndash; Sets the strictMode.
- [KitPageRenderer::setErrorHandler](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setErrorHandler.md) &ndash; Sets the errorHandler.
- [KitPageRenderer::registerWidgetHandler](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/registerWidgetHandler.md) &ndash; Registers a widget handler for the given (widget) type.
- [KitPageRenderer::setLayoutRootDir](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setLayoutRootDir.md) &ndash; Sets the layoutRootDir.
- [KitPageRenderer::addWidgetConfDecorator](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/addWidgetConfDecorator.md) &ndash; Adds a widget configuration decorator to this instance.
- [KitPageRenderer::printPage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printPage.md) &ndash; Prints the page.
- [KitPageRenderer::printZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printZone.md) &ndash; Prints a zone.
- [KitPageRenderer::captureZones](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZones.md) &ndash; Captures the zones defined in the configuration and stores them temporarily.
- [KitPageRenderer::captureZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZone.md) &ndash; The working horse method behind captureZones.
- [KitPageRenderer::getHtmlPageCopilot](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/getHtmlPageCopilot.md) &ndash; Returns an HtmlPageCopilot instance.





Location
=============
Ling\Kit\PageRenderer\KitPageRenderer<br>
See the source code of [Ling\Kit\PageRenderer\KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/PageRenderer/KitPageRenderer.php)



SeeAlso
==============
Previous class: [KitException](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/Exception/KitException.md)<br>Next class: [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md)<br>
