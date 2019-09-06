[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The EasyLightPicassoWidget class
================
2019-04-24 --> 2019-08-30






Introduction
============

The EasyLightPicassoWidget class.

This class can help if you are working with the Light framework, using Light_Kit.

The idea of this class is to provide all available syntactic sugar, so that the developer who extend this class
has all for free (at the cost of perhaps a small performance cost, if not all features are used).

This includes:

- access to the light service container (to all all services)
- access to the light kit page renderer (to call sub-zones for instance)



Class synopsis
==============


class <span class="pl-k">EasyLightPicassoWidget</span> extends [WidgetConfAwarePicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget.md) implements [WidgetConfAwarePicassoWidgetInterface](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md), [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/UniversalTemplateEngineInterface.php), [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md) {

- Properties
    - protected [Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) [$kitPageRenderer](#property-kitPageRenderer) ;

- Inherited properties
    - protected array [WidgetConfAwarePicassoWidget::$widgetConf](#property-widgetConf) ;
    - protected array [PicassoWidget::$libraries](#property-libraries) ;
    - protected array [PicassoWidget::$attr](#property-attr) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [PicassoWidget::$copilot](#property-copilot) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/__construct.md)() : void
    - public [setKitPageRenderer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/setKitPageRenderer.md)([Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) $renderer) : void
    - public [getKitPageRenderer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/getKitPageRenderer.md)() : [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) | null
    - protected [getContainer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

- Inherited methods
    - public [WidgetConfAwarePicassoWidget::setWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/setWidgetConf.md)(array $widgetConf) : void
    - public [WidgetConfAwarePicassoWidget::getWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/getWidgetConf.md)() : array
    - public [PicassoWidget::getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md)() : array
    - public [PicassoWidget::setCopilot](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/setCopilot.md)([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - public [PicassoWidget::renderFile](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/renderFile.md)(string $filePath, array $variables = []) : false | string
    - public [PicassoWidget::prepare](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/prepare.md)(array &$widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - protected [PicassoWidget::getAttributesHtml](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getAttributesHtml.md)(bool $excludeClass = true) : string
    - protected [PicassoWidget::getCssClass](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getCssClass.md)() : string
    - protected [PicassoWidget::registerLibrary](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/registerLibrary.md)(string $libraryName, array $css, array $js) : void
    - public ZephyrTemplateEngine::render(string $resourceId, array $variables = []) : false | string
    - public ZephyrTemplateEngine::getErrors() : array
    - public ZephyrTemplateEngine::setDirectory(string $directory) : void
    - protected ZephyrTemplateEngine::interpret(string $___path, array $z) : false | string
    - private ZephyrTemplateEngine::addError(string $msg) : void

}




Properties
=============

- <span id="property-kitPageRenderer"><b>kitPageRenderer</b></span>

    This property holds the kitPageRenderer for this instance.
    
    

- <span id="property-widgetConf"><b>widgetConf</b></span>

    This property holds the widgetConf for this instance.
    
    

- <span id="property-libraries"><b>libraries</b></span>

    This property holds the libraries for this instance.
    
    It's an array of library name => assets.
    
    Assets is the following array:
    
    - css: array of css urls
    - js: array of js urls
    
    

- <span id="property-attr"><b>attr</b></span>

    This property holds the attr for this instance.
    This is an array of html attributes to add to the widget's outer tag.
    
    For instance:
    - id: my_id
    - class: my_class1 my_class2
    - data-example-value: 668
    
    

- <span id="property-copilot"><b>copilot</b></span>

    This property holds the copilot for this instance.
    Sometimes, templates might need to access the copilot directly,
    hence the existence of this property.
    
    



Methods
==============

- [EasyLightPicassoWidget::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/__construct.md) &ndash; Builds the EasyPicassoWidget instance.
- [EasyLightPicassoWidget::setKitPageRenderer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/setKitPageRenderer.md) &ndash; Sets the KitPageRenderer instance.
- [EasyLightPicassoWidget::getKitPageRenderer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/getKitPageRenderer.md) &ndash; 
- [EasyLightPicassoWidget::getContainer](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget/getContainer.md) &ndash; Returns a light service container instance.
- [WidgetConfAwarePicassoWidget::setWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/setWidgetConf.md) &ndash; Sets the widget configuration.
- [WidgetConfAwarePicassoWidget::getWidgetConf](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget/getWidgetConf.md) &ndash; Returns the widget configuration.
- [PicassoWidget::getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md) &ndash; Returns the libraries of this instance.
- [PicassoWidget::setCopilot](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/setCopilot.md) &ndash; Sets the copilot.
- [PicassoWidget::renderFile](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/renderFile.md) &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- [PicassoWidget::prepare](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/prepare.md) &ndash; Prepares the widget according to the given widget configuration.
- [PicassoWidget::getAttributesHtml](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getAttributesHtml.md) &ndash; Returns the string of html attributes defined in the widget attributes (attr property in the [widget configuration array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array)).
- [PicassoWidget::getCssClass](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getCssClass.md) &ndash; 
- [PicassoWidget::registerLibrary](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/registerLibrary.md) &ndash; Registers an (external) library that this widget uses.
- ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
- ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- ZephyrTemplateEngine::interpret &ndash; and returns the resulting html code.
- ZephyrTemplateEngine::addError &ndash; Adds an error to this instance.





Location
=============
Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget<br>
See the source code of [Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/Widget/EasyLightPicassoWidget.php)



SeeAlso
==============
Previous class: [VariableDescriptionFileGeneratorUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil.md)<br>Next class: [PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget.md)<br>
