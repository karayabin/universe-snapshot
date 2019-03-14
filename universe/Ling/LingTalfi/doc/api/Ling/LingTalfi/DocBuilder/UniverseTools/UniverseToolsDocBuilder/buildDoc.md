[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\UniverseTools\UniverseToolsDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/UniverseTools/UniverseToolsDocBuilder.md)


UniverseToolsDocBuilder::buildDoc
================



UniverseToolsDocBuilder::buildDoc — Launch this function to generate the documentation for the UniverseTools planet.




Description
================


public static [UniverseToolsDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/UniverseTools/UniverseToolsDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the UniverseTools planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/UniverseTools/doc

Including a README.md file, that you should manually put at the root of the DocTools planet directory.
You can then push to github.


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







See Also
================

The [UniverseToolsDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/UniverseTools/UniverseToolsDocBuilder.md) class.



