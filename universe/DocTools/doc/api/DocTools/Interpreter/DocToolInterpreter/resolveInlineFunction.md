[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\Interpreter\DocToolInterpreter class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter.md)


DocToolInterpreter::resolveInlineFunction
================



DocToolInterpreter::resolveInlineFunction — Resolves an inline function and returns the result.




Description
================


protected [DocToolInterpreter::resolveInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveInlineFunction.md)(?$functionName, array $argsList, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : false | string




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







See Also
================

The [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter.md) class.

Previous method: [setKeyword2UrlMap](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/setKeyword2UrlMap.md)<br>Next method: [resolveArgsList](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/resolveArgsList.md)<br>

