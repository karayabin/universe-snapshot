The DocToolInterpreter class
================
2019-02-21 --> 2019-02-25




Introduction
============

The DocToolInterpreter class is a helper tool to interpret the docTool markup language.



Class synopsis
==============


class <span class="pl-k">DocToolInterpreter</span> implements [NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) {

- Properties
    - protected array [$keyword2UrlMap](#property-keyword2UrlMap) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/__construct.md)() : void
    - public [resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveInlineTags.md)(string $string, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : string
    - public [interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/interpretBlockLevelTags.md)(array $tags, [DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) $comment, array $info, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - public [setKeyword2UrlMap](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/setKeyword2UrlMap.md)(array $keyword2UrlMap) : void
    - protected [resolveInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveInlineFunction.md)(?$functionName, array $argsList, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : false | string
    - protected static [resolveArgsList](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveArgsList.md)(string $argsList) : array

}




Properties
=============

- <span id="property-keyword2UrlMap"><b>keyword2UrlMap</b></span>

    This property holds a map of keyword => url.
    This is used to resolve [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds the array of className and/or className::methodName => url.
    
    



Methods
==============

- [DocToolInterpreter::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/__construct.md) &ndash; Builds the DocToolInterpreter instance.
- [DocToolInterpreter::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveInlineTags.md) &ndash; Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.
- [DocToolInterpreter::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/interpretBlockLevelTags.md) &ndash; Interprets the given $tags, and potentially configures the $comment accordingly.
- [DocToolInterpreter::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [DocToolInterpreter::setKeyword2UrlMap](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/setKeyword2UrlMap.md) &ndash; Sets the keyword2UrlMap.
- [DocToolInterpreter::resolveInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveInlineFunction.md) &ndash; Resolves an inline function and returns the result.
- [DocToolInterpreter::resolveArgsList](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveArgsList.md) &ndash; Returns an array representing the resolved $argsList string passed to the method.




Location
=============
DocTools\Interpreter\DocToolInterpreter