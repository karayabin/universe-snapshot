[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::addParsedInlineFunction
================



ReportInterface::addParsedInlineFunction — Adds the function name and the args of an [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).




Description
================


abstract public [ReportInterface::addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedInlineFunction.md)(string $functionName, array $argsList = []) : void




Adds the function name and the args of an [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).
This is use to collect statistical information about the planet.




Parameters
================


- functionName

    

- argsList

    Resolved args list.


Return values
================

Returns void.








Source Code
===========
See the source code for method [ReportInterface::addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L132-L132)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/setCurrentContext.md)<br>Next method: [addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedBlockLevelTag.md)<br>

