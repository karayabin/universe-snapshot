[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\SqlQuery\SqlQueryDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SqlQuery/SqlQueryDocBuilder.md)


SqlQueryDocBuilder::buildDoc
================



SqlQueryDocBuilder::buildDoc — Launch this function to generate the documentation for the SqlQuery planet.




Description
================


public static [SqlQueryDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SqlQuery/SqlQueryDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the SqlQuery planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/SqlQuery/doc



If htmlMode is true,
then html files will be generated (instead of md files).
You can then browse the result at: http://jindoc/api



This method will also show the documentation report.




Parameters
================


- htmlMode

    


Return values
================

Returns void.


Exceptions thrown
================

- [DocBuilderException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/DocBuilderException.md).&nbsp;







Source Code
===========
See the source code for method [SqlQueryDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/SqlQuery/SqlQueryDocBuilder.php#L44-L202)


See Also
================

The [SqlQueryDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SqlQuery/SqlQueryDocBuilder.md) class.



