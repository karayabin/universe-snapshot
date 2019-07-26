[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The PicassoWidget class
================
2019-04-24 --> 2019-07-24






Introduction
============

The PicassoWidget class.



Class synopsis
==============


class <span class="pl-k">PicassoWidget</span> extends [ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine.md) implements [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/UniversalTemplateEngineInterface.php) {

- Properties
    - protected array [$libraries](#property-libraries) ;
    - protected array [$attr](#property-attr) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [$copilot](#property-copilot) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/__construct.md)() : void
    - public [getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md)() : array
    - public [setCopilot](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/setCopilot.md)([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - public [renderFile](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/renderFile.md)(string $filePath, array $variables = []) : false | string
    - public [prepare](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/prepare.md)(array &$widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - protected [getAttributesHtml](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getAttributesHtml.md)(bool $excludeClass = true) : string
    - protected [getCssClass](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getCssClass.md)() : string
    - protected [registerLibrary](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/registerLibrary.md)(string $libraryName, array $css, array $js) : void

- Inherited methods
    - public ZephyrTemplateEngine::render(string $resourceId, array $variables = []) : false | string
    - public ZephyrTemplateEngine::getErrors() : array
    - public ZephyrTemplateEngine::setDirectory(string $directory) : void
    - protected ZephyrTemplateEngine::interpret(string $___path, array $z) : false | string
    - private ZephyrTemplateEngine::addError(string $msg) : void

}




Properties
=============

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

- [PicassoWidget::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/__construct.md) &ndash; Builds the PicassoWidget instance.
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
Ling\Kit_PicassoWidget\Widget\PicassoWidget<br>
See the source code of [Ling\Kit_PicassoWidget\Widget\PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/Widget/PicassoWidget.php)



SeeAlso
==============
Previous class: [EasyLightPicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget.md)<br>Next class: [WidgetConfAwarePicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidget.md)<br>
