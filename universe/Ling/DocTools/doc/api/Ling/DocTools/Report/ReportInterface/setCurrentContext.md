[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::setCurrentContext
================



ReportInterface::setCurrentContext — Sets the name of the current context being parsed.




Description
================


abstract public [ReportInterface::setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/setCurrentContext.md)(string $context) : void




Sets the name of the current context being parsed.
So that when we add an error to the report, the context information is already there.

The context is generally a class name or a file name.




Parameters
================


- context

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ReportInterface::setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L120-L120)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Next method: [addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedInlineFunction.md)<br>

