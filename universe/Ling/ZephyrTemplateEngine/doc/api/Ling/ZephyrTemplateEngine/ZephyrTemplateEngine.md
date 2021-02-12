[Back to the Ling/ZephyrTemplateEngine api](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine.md)



The ZephyrTemplateEngine class
================
2019-04-09 --> 2020-12-08






Introduction
============

The ZephyrTemplateEngine class.



Class synopsis
==============


class <span class="pl-k">ZephyrTemplateEngine</span> implements [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine) {

- Properties
    - private array [$errors](#property-errors) ;
    - private string [$directory](#property-directory) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/__construct.md)() : void
    - public [render](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/render.md)(string $resourceId, ?array $variables = []) : false | string
    - public [renderFile](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/renderFile.md)(string $filePath, ?array $variables = []) : false | string
    - public [getErrors](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/getErrors.md)() : array
    - public [setDirectory](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/setDirectory.md)(string $directory) : void
    - protected [interpret](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/interpret.md)(string $___path, array $z) : false | string
    - private [addError](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/addError.md)(string $msg) : void

}




Properties
=============

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    

- <span id="property-directory"><b>directory</b></span>

    This property holds the directory for this instance.
    
    



Methods
==============

- [ZephyrTemplateEngine::__construct](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/__construct.md) &ndash; Builds the ZephyrTemplateEngine instance.
- [ZephyrTemplateEngine::render](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/render.md) &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- [ZephyrTemplateEngine::renderFile](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/renderFile.md) &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- [ZephyrTemplateEngine::getErrors](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/getErrors.md) &ndash; Returns the errors of this instance.
- [ZephyrTemplateEngine::setDirectory](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/setDirectory.md) &ndash; Sets the directory.
- [ZephyrTemplateEngine::interpret](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/interpret.md) &ndash; and returns the resulting html code.
- [ZephyrTemplateEngine::addError](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/addError.md) &ndash; Adds an error to this instance.





Location
=============
Ling\ZephyrTemplateEngine\ZephyrTemplateEngine<br>
See the source code of [Ling\ZephyrTemplateEngine\ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/ZephyrTemplateEngine.php)



