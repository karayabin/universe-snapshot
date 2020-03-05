[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The LingGitPhpPlanetDocBuilder class
================
2019-02-21 --> 2020-03-02






Introduction
============

The LingGitPhpPlanetDocBuilder class.
Creates a documentation for a planet, in php.net doc style.

A summary page is created for the planet,
a page is created for every class,
a page is created for every method.

The generated structure is the "default" one given in [the generated documentation styles page](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/generated-documentation-styles.md).


See the [LingGitPhpPlanetDocBuilder tutorial](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/tutorial-linggitphpplanetdocbuilder.md) for more details about how this class was built.



Class synopsis
==============


class <span class="pl-k">LingGitPhpPlanetDocBuilder</span> extends [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md)  {

- Properties
    - protected string [$projectStartDate](#property-projectStartDate) ;
    - protected string [$projectRepoUrl](#property-projectRepoUrl) ;
    - protected string [$planetDir](#property-planetDir) ;
    - protected string [$generatedClassBaseDir](#property-generatedClassBaseDir) ;
    - protected string [$insertsBaseDir](#property-insertsBaseDir) ;
    - protected string|null [$copyModuleSrc](#property-copyModuleSrc) ;
    - protected string|null [$copyModuleDst](#property-copyModuleDst) ;
    - protected array [$copyModuleOptions](#property-copyModuleOptions) ;
    - private [Ling\DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md) [$_planetInfo](#property-_planetInfo) ;
    - private array [$_generatedItems2Url](#property-_generatedItems2Url) ;
    - private [Ling\DocTools\GeneratedDocStyle\GeneratedDocStyleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md) [$_generatedDocStyle](#property-_generatedDocStyle) ;
    - private [Ling\DocTools\Translator\MarkdownTranslatorInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/MarkdownTranslatorInterface.md)|null [$_markdownTranslator](#property-_markdownTranslator) ;
    - private [Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) [$_interpreter](#property-_interpreter) ;
    - private string [$_generatedClassBaseUrl](#property-_generatedClassBaseUrl) ;
    - private string [$_mode](#property-_mode) ;

- Inherited properties
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [DocBuilder::$report](#property-report) ;

- Methods
    - public [prepare](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/prepare.md)(?array $settings = []) : void
    - public [buildDoc](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildDoc.md)() : void
    - private [buildPlanetPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildPlanetPage.md)() : void
    - private [buildClassPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildClassPage.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $classInfo) : void
    - private [buildMethodPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildMethodPage.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $classInfo, [Ling\DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) $methodInfo) : void

- Inherited methods
    - public [DocBuilder::showReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/showReport.md)() : void
    - public [DocBuilder::getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/getReport.md)() : [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)
    - protected [DocBuilder::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void

}




Properties
=============

- <span id="property-projectStartDate"><b>projectStartDate</b></span>

    This property holds the project start date for this instance.
    The date in mysql format (2019-02-21).
    
    

- <span id="property-projectRepoUrl"><b>projectRepoUrl</b></span>

    This property holds the projectRepoUrl for this instance.
    It's the github repo url.
    
    

- <span id="property-planetDir"><b>planetDir</b></span>

    This property holds the planet directory setting.
    
    

- <span id="property-generatedClassBaseDir"><b>generatedClassBaseDir</b></span>

    This property holds the generated classes base directory setting.
    
    

- <span id="property-insertsBaseDir"><b>insertsBaseDir</b></span>

    This property holds the inserts base directory setting.
    
    

- <span id="property-copyModuleSrc"><b>copyModuleSrc</b></span>

    This property holds the [copy module](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md) source for this instance.
    
    

- <span id="property-copyModuleDst"><b>copyModuleDst</b></span>

    This property holds the [copy module](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md) destination for this instance.
    
    

- <span id="property-copyModuleOptions"><b>copyModuleOptions</b></span>

    This property holds the [copy module](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md) options for this instance.
    
    

- <span id="property-_planetInfo"><b>_planetInfo</b></span>

    This property holds a reference to the planetInfo created during the prepare method.
    It will be used by the buildDoc method.
    It's an internal variable and shouldn't be used outside this class.
    
    

- <span id="property-_generatedItems2Url"><b>_generatedItems2Url</b></span>

    This internal property holds the array of class name and/or className::methodName => url.
    
    

- <span id="property-_generatedDocStyle"><b>_generatedDocStyle</b></span>

    This internal property holds the DocTools\GeneratedDocStyle\GeneratedDocStyleInterface instance.
    
    

- <span id="property-_markdownTranslator"><b>_markdownTranslator</b></span>

    This internal property holds the markdown translator instance (DocTools\Translator\MarkdownTranslatorInterface)
    for this instance.
    
    If set, the markdown code will be translated.
    If not set, the markdown code will remain as is.
    
    A translator might be useful for testing/debugging purposes.
    But in prod, the intent of this class is to upload to github which uses markdown.
    
    

- <span id="property-_interpreter"><b>_interpreter</b></span>

    This internal property holds the notation interpreter (DocTools\Interpreter\NotationInterpreterInterface) for this instance.
    
    

- <span id="property-_generatedClassBaseUrl"><b>_generatedClassBaseUrl</b></span>

    This property holds the generatedClassBaseUrl for this instance.
    
    

- <span id="property-_mode"><b>_mode</b></span>

    This property holds the mode for this instance (html or md).
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the parser report.
    
    



Methods
==============

- [LingGitPhpPlanetDocBuilder::prepare](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/prepare.md) &ndash; Prepares the doc builder instance.
- [LingGitPhpPlanetDocBuilder::buildDoc](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildDoc.md) &ndash; and according to the writeMode property.
- [LingGitPhpPlanetDocBuilder::buildPlanetPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildPlanetPage.md) &ndash; Builds the planet page.
- [LingGitPhpPlanetDocBuilder::buildClassPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildClassPage.md) &ndash; Builds a class page.
- [LingGitPhpPlanetDocBuilder::buildMethodPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildMethodPage.md) &ndash; Builds a method page.
- [DocBuilder::showReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/showReport.md) &ndash; Displays the report.
- [DocBuilder::getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/getReport.md) &ndash; Returns the report instance.
- [DocBuilder::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/setReport.md) &ndash; Sets the report object.





Location
=============
Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder<br>
See the source code of [Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.php)



SeeAlso
==============
Previous class: [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md)<br>Next class: [BadWidgetConfigurationException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/BadWidgetConfigurationException.md)<br>
