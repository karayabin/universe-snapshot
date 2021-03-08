[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Kwin\KwinDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Kwin/KwinDocBuilder.md)


KwinDocBuilder::buildDoc
================



KwinDocBuilder::buildDoc — Launch this function to generate the documentation for the Kwin planet.




Description
================


public static [KwinDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Kwin/KwinDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the Kwin planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Kwin/doc



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
See the source code for method [KwinDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Kwin/KwinDocBuilder.php#L45-L207)


See Also
================

The [KwinDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Kwin/KwinDocBuilder.md) class.



