[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The PlanetParser class
================
2019-02-21 --> 2019-04-18






Introduction
============

The PlanetParser class.

It will parse every classes of a planet and return a PlanetInfo object.


The planet parser speaks markdown language only.
The html conversion is done by the client at a later step if necessary.



Class synopsis
==============


class <span class="pl-k">PlanetParser</span> implements [GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface.md) {

- Properties
    - protected [Ling\DocTools\ClassParser\ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md) [$classParser](#property-classParser) ;
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [$report](#property-report) ;
    - protected bool [$resolveInlineTags](#property-resolveInlineTags) ;
    - protected [Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) [$notationInterpreter](#property-notationInterpreter) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/__construct.md)() : void
    - public [parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/parse.md)(string $planetDir) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)
    - public [setClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setClassParser.md)([Ling\DocTools\ClassParser\ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md) $classParser) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - public [getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/getReport.md)() : [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) | null
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void
    - public [setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setResolveInlineTags.md)(bool $resolveInlineTags) : void
    - public [setNotationInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setNotationInterpreter.md)([Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) $notationInterpreter) : void

}




Properties
=============

- <span id="property-classParser"><b>classParser</b></span>

    This property holds a [ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md) instance.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the parser report for this instance.
    The report will only be available after the parse method has been called.
    
    

- <span id="property-resolveInlineTags"><b>resolveInlineTags</b></span>

    This property holds whether [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) should be resolved.
    The default value is true.
    
    

- <span id="property-notationInterpreter"><b>notationInterpreter</b></span>

    This property holds the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) interpreter for this instance.
    
    The docTool interpreter is used to resolve the inline functions of the docTool language.
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds the array of className and/or className::methodName => url.
    
    



Methods
==============

- [PlanetParser::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/__construct.md) &ndash; Builds the PlanetParser instance.
- [PlanetParser::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/parse.md) &ndash; and creates a PlanetReport (retrieved using the getReport method).
- [PlanetParser::setClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setClassParser.md) &ndash; Sets the class parser.
- [PlanetParser::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [PlanetParser::getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/getReport.md) &ndash; Returns the report.
- [PlanetParser::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setReport.md) &ndash; Sets the report.
- [PlanetParser::setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setResolveInlineTags.md) &ndash; Sets the resolveInlineTags.
- [PlanetParser::setNotationInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser/setNotationInterpreter.md) &ndash; Sets the notation interpreter.





Location
=============
Ling\DocTools\PlanetParser\PlanetParser


SeeAlso
==============
Previous class: [PageUtil](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Page/PageUtil.md)<br>Next class: [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md)<br>
