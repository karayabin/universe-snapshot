[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LightKitCssFileGenerator class
================
2019-04-25 --> 2021-04-09






Introduction
============

The LightKitCssFileGenerator class.

With this class, the identifier is treated as a page name.



Class synopsis
==============


class <span class="pl-k">LightKitCssFileGenerator</span> implements [CssFileGeneratorInterface](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface.md) {

- Properties
    - protected string [$rootDir](#property-rootDir) ;
    - protected string [$defaultIdentifier](#property-defaultIdentifier) ;
    - protected string [$format](#property-format) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator/__construct.md)(string $rootDir, ?string $format = null) : void
    - public [generate](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator/generate.md)([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, ?string $identifier = null) : string

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    This is the web root directory.
    
    

- <span id="property-defaultIdentifier"><b>defaultIdentifier</b></span>

    This property holds the defaultIdentifier for this instance.
    The default identifier to use.
    
    

- <span id="property-format"><b>format</b></span>

    This property holds the format for this instance.
    The format of the css web relative path when the identifier is passed.
    
    The default value is:
    
    - css/tmp/$identifier-compiled-widgets.css
    
    You can use the "$identifier" tag to reference the value of the given $identifier (see the generate method of this class).
    Note: a common practice is to pass the page name aas the identifier.
    
    



Methods
==============

- [LightKitCssFileGenerator::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator/__construct.md) &ndash; Builds the LightKitCssFileGenerator instance.
- [LightKitCssFileGenerator::generate](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator/generate.md) &ndash; and returns the url to this css file.





Location
=============
Ling\Light_Kit\CssFileGenerator\LightKitCssFileGenerator<br>
See the source code of [Ling\Light_Kit\CssFileGenerator\LightKitCssFileGenerator](https://github.com/lingtalfi/Light_Kit/blob/master/CssFileGenerator/LightKitCssFileGenerator.php)



SeeAlso
==============
Previous class: [ThemeTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ThemeTransformer.md)<br>Next class: [LightKitException](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Exception/LightKitException.md)<br>
