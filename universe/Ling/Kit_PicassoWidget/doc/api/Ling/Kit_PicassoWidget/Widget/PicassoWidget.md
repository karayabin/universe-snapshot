[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The PicassoWidget class
================
2019-04-24 --> 2019-04-24






Introduction
============

The PicassoWidget class.



Class synopsis
==============


class <span class="pl-k">PicassoWidget</span> extends [ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine.md) implements [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/UniversalTemplateEngineInterface.php) {

- Properties
    - protected array [$libraries](#property-libraries) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/__construct.md)() : void
    - public [getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md)() : array
    - protected [registerLibrary](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/registerLibrary.md)(string $libraryName, array $css, array $js) : void

- Inherited methods
    - public ZephyrTemplateEngine::render(string $resourceId, array $variables = []) : false | string
    - public ZephyrTemplateEngine::renderFile(string $filePath, array $variables = []) : false | string
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
    
    



Methods
==============

- [PicassoWidget::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/__construct.md) &ndash; Builds the PicassoWidget instance.
- [PicassoWidget::getLibraries](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/getLibraries.md) &ndash; Returns the libraries of this instance.
- [PicassoWidget::registerLibrary](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/PicassoWidget/registerLibrary.md) &ndash; Registers an (external) library that this widget uses.
- ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- ZephyrTemplateEngine::renderFile &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
- ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- ZephyrTemplateEngine::interpret &ndash; and returns the resulting html code.
- ZephyrTemplateEngine::addError &ndash; Adds an error to this instance.





Location
=============
Ling\Kit_PicassoWidget\Widget\PicassoWidget


SeeAlso
==============
Previous class: [PicassoWidgetException](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Exception/PicassoWidgetException.md)<br>Next class: [PicassoWidgetHandler](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md)<br>
