[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\DocBuilder\DocBuilder class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md)


DocBuilder::prepare
================



DocBuilder::prepare — Prepares the doc builder instance.




Description
================


abstract public [DocBuilder::prepare](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/prepare.md)(array $settings = []) : void




Prepares the doc builder instance.
After the call to this method, you should be able to call the showReport method and/or
the buildDoc method directly.

The content of this method should generally:

- define a parser (class parser or planet parser).
- use the setReport method to define a parser report (DocTools\Report\ReportInterface).

- trigger the parser to obtain the info object (DocTools\Info\InfoInterface) and fill the report.
     The info object should be stored and re-used in the buildDoc method.




Parameters
================


- settings

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [DocBuilder::prepare](https://github.com/lingtalfi/DocTools/blob/master/DocBuilder/DocBuilder.php#L76-L76)


See Also
================

The [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md) class.

Next method: [buildDoc](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/buildDoc.md)<br>

