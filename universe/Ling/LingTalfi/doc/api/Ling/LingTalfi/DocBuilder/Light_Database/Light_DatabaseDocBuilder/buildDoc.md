[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Light_Database\Light_DatabaseDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Database/Light_DatabaseDocBuilder.md)


Light_DatabaseDocBuilder::buildDoc
================



Light_DatabaseDocBuilder::buildDoc — Launch this function to generate the documentation for the Light_Database planet.




Description
================


public static [Light_DatabaseDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Database/Light_DatabaseDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the Light_Database planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Light_Database/doc



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
See the source code for method [Light_DatabaseDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Light_Database/Light_DatabaseDocBuilder.php#L45-L211)


See Also
================

The [Light_DatabaseDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Database/Light_DatabaseDocBuilder.md) class.



