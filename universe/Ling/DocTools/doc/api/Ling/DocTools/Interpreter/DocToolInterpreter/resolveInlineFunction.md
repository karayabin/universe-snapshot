[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Interpreter\DocToolInterpreter class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md)


DocToolInterpreter::resolveInlineFunction
================



DocToolInterpreter::resolveInlineFunction — Resolves an inline function and returns the result.




Description
================


protected [DocToolInterpreter::resolveInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/resolveInlineFunction.md)(?$functionName, array $argsList, [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : false | string




Resolves an inline function and returns the result.

False is returned if the inline function is not recognized.
Null is returned if the inline function is recognized but couldn't be resolved.



Note: you can override this method to implement your own functions.
This method by default uses the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).




Parameters
================


- functionName

    

- argsList

    

- report

    


Return values
================

Returns false | string.


Exceptions thrown
================

- [DocToolsException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/DocToolsException.md).&nbsp;







See Also
================

The [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md) class.

Previous method: [setKeyword2UrlMap](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/setKeyword2UrlMap.md)<br>Next method: [resolveArgsList](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/resolveArgsList.md)<br>

