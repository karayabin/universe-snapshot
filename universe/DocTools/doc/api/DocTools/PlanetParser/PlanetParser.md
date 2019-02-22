The PlanetParser class
================
2019-02-21 --> 2019-02-22




Introduction
============

The PlanetParser class.

It will parse every classes of a planet and return a PlanetInfo object.


The planet parser speaks markdown language only.
The html conversion is done by the client at a later step if necessary.



Class synopsis
==============


class <span style="color: orange;">PlanetParser</span> implements [GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/GenericParser/GenericParserInterface.md) {

- Properties
    - protected [DocTools\ClassParser\ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParserInterface.md) [$classParser](#property-classParser) ;
    - protected [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) [$report](#property-report) ;
    - protected bool [$resolveInlineTags](#property-resolveInlineTags) ;
    - protected [DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) [$notationInterpreter](#property-notationInterpreter) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/__construct.md)() : void
    - public [parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/parse.md)(string $planetDir) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md)
    - public [setClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setClassParser.md)([DocTools\ClassParser\ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParserInterface.md) $classParser) : void
    - public [getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/getReport.md)() : [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) | null
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setReport.md)([DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report) : void
    - public [setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setResolveInlineTags.md)(bool $resolveInlineTags) : void
    - public [setNotationInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setNotationInterpreter.md)([DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) $notationInterpreter) : void

}




Properties
=============

- <span id="property-classParser"><b>classParser</b></span>

    This property holds a [ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParserInterface.md) instance.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the parser report for this instance.
    The report will only be available after the parse method has been called.
    
    

- <span id="property-resolveInlineTags"><b>resolveInlineTags</b></span>

    This property holds whether [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) should be resolved.
    The default value is true.
    
    

- <span id="property-notationInterpreter"><b>notationInterpreter</b></span>

    This property holds the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) interpreter for this instance.
    
    The docTool interpreter is used to resolve the inline functions of the docTool language.
    
    



Methods
==============

- [PlanetParser::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/__construct.md) &ndash; Builds the PlanetParser instance.
- [PlanetParser::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/parse.md) &ndash; and creates a PlanetReport (retrieved using the getReport method).
- [PlanetParser::setClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setClassParser.md) &ndash; Sets the class parser.
- [PlanetParser::getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/getReport.md) &ndash; Returns the report.
- [PlanetParser::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setReport.md) &ndash; Sets the report.
- [PlanetParser::setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setResolveInlineTags.md) &ndash; Sets the resolveInlineTags.
- [PlanetParser::setNotationInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser/setNotationInterpreter.md) &ndash; Sets the notation interpreter.




Location
=============
DocTools\PlanetParser\PlanetParser