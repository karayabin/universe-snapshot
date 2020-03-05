[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ClassParser class
================
2019-02-21 --> 2020-03-02






Introduction
============

The ClassParser class is a generic implementation of the ClassParserInterface.

Quick example:
```php
$baseUrl = "http://mysite/doc/api";
$report = new HtmlReport();
$parser = new ClassParser();
$interpreter = new DocToolInterpreter();
$interpreter->setAvailableClassNames(["DocTools\Widget\ClassSynopsis\ClassSynopsisWidget"]);
$interpreter->setGeneratedClassBaseUrl($baseUrl);
$parser->setGeneratedClassBaseUrl($baseUrl);
$parser->setReport($report);
$parser->setDocToolInterpreter($interpreter);
$classInfo = $parser->parse("DocTools\Widget\ClassSynopsis\ClassSynopsisWidget");
az($classInfo);
```



Class synopsis
==============


class <span class="pl-k">ClassParser</span> implements [ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md), [GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface.md) {

- Properties
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [$report](#property-report) ;
    - protected bool [$resolveInlineTags](#property-resolveInlineTags) ;
    - protected [Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) [$notationInterpreter](#property-notationInterpreter) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;
    - protected [\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) [$_reflectionClass](#property-_reflectionClass) ;
    - protected string [$_method](#property-_method) ;
    - protected [\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) [$_expandReflectionClass](#property-_expandReflectionClass) ;
    - protected string [$_expandMethod](#property-_expandMethod) ;
    - protected array [$_useStatements](#property-_useStatements) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/__construct.md)() : void
    - public [parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/parse.md)(string $className) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)
    - public [setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setResolveInlineTags.md)(bool $resolveInlineTags) : void
    - public [getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getReport.md)() : [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void
    - public [setNotationlInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setNotationlInterpreter.md)([Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) $notationInterpreter) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - protected [parseDocComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/parseDocComment.md)(string $rawComment, string $elementType, string $elementId) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md)
    - protected [getPropertySignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getPropertySignature.md)([\ReflectionProperty](http://php.net/manual/en/class.reflectionproperty.php) $property) : string
    - protected [getMethodSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getMethodSignature.md)([\ReflectionMethod](http://php.net/manual/en/class.reflectionmethod.php) $method) : string
    - protected [getClassSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getClassSignature.md)([\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) $class) : string
    - protected [getMethodVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getMethodVisibility.md)([\ReflectionMethod](http://php.net/manual/en/class.reflectionmethod.php) $method) : string
    - protected [getPropertyVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getPropertyVisibility.md)([\ReflectionProperty](http://php.net/manual/en/class.reflectionproperty.php) $property) : string
    - private [trimLines](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/trimLines.md)(array $lines) : array
    - private [expandIncludes](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/expandIncludes.md)(string $rawContent, ?&$resolved = false, ?array &$includeReferences = []) : string
    - private [getTagDescriptionByContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getTagDescriptionByContent.md)(string $content) : string

}




Properties
=============

- <span id="property-report"><b>report</b></span>

    This property holds the parser report for this instance.
    The report will only be available after the parse method has been called.
    
    

- <span id="property-resolveInlineTags"><b>resolveInlineTags</b></span>

    This property holds whether [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) should be resolved.
    The default value is true.
    
    

- <span id="property-notationInterpreter"><b>notationInterpreter</b></span>

    This property holds the docTool markup language interpreter for this instance.
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds the array of className and/or className::methodName => url.
    
    

- <span id="property-_reflectionClass"><b>_reflectionClass</b></span>

    This property holds the \Reflection instance of the class currently being parsed.
    It's an internal property, as denoted with the underscore prefix.
    
    

- <span id="property-_method"><b>_method</b></span>

    This property holds the name of the method currently being parsed.
    
    It's an internal property, as denoted with the underscore prefix.
    
    

- <span id="property-_expandReflectionClass"><b>_expandReflectionClass</b></span>

    This property holds the _expandReflectionClass for this instance.
    It's an internal variable used to help the expandIncludes method.
    
    

- <span id="property-_expandMethod"><b>_expandMethod</b></span>

    This property holds the _expandMethod for this instance.
    It's an internal variable used to help the expandIncludes method.
    
    

- <span id="property-_useStatements"><b>_useStatements</b></span>

    This property holds the array of use statements found in the class file..
    
    It's an internal property, as denoted with the underscore prefix.
    
    



Methods
==============

- [ClassParser::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/__construct.md) &ndash; Builds the ClassParser instance.
- [ClassParser::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/parse.md) &ndash; Returns a ClassInfo object from the given $className.
- [ClassParser::setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setResolveInlineTags.md) &ndash; Sets the resolveInlineTags.
- [ClassParser::getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getReport.md) &ndash; Returns the report of this instance.
- [ClassParser::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setReport.md) &ndash; Sets the report.
- [ClassParser::setNotationlInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setNotationlInterpreter.md) &ndash; Sets the notationInterpreter.
- [ClassParser::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [ClassParser::parseDocComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/parseDocComment.md) &ndash; Parses the raw doc comment and returns a DocTools\Info\CommentInfo object.
- [ClassParser::getPropertySignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getPropertySignature.md) &ndash; Returns the property signature, without the ending punctuation symbol.
- [ClassParser::getMethodSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getMethodSignature.md) &ndash; Returns the method signature.
- [ClassParser::getClassSignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getClassSignature.md) &ndash; Returns the class signature.
- [ClassParser::getMethodVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getMethodVisibility.md) &ndash; Returns the visibility of the method.
- [ClassParser::getPropertyVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getPropertyVisibility.md) &ndash; Returns the visibility of the property.
- [ClassParser::trimLines](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/trimLines.md) &ndash; from the very beginning or from the very end of that array.
- [ClassParser::expandIncludes](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/expandIncludes.md) &ndash; Expands the @implementation and/or @overrides tags in the raw content recursively, and returns the result.
- [ClassParser::getTagDescriptionByContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getTagDescriptionByContent.md) &ndash; Returns the tag description from the given $content.





Location
=============
Ling\DocTools\ClassParser\ClassParser<br>
See the source code of [Ling\DocTools\ClassParser\ClassParser](https://github.com/lingtalfi/DocTools/blob/master/ClassParser/ClassParser.php)



SeeAlso
==============
Next class: [ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md)<br>
