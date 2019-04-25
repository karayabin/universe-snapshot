[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Light_ReverseRouter\Light_ReverseRouterDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ReverseRouter/Light_ReverseRouterDocBuilder.md)


Light_ReverseRouterDocBuilder::buildDoc
================



Light_ReverseRouterDocBuilder::buildDoc — Launch this function to generate the documentation for the Light_ReverseRouter planet.




Description
================


public static [Light_ReverseRouterDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ReverseRouter/Light_ReverseRouterDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the Light_ReverseRouter planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Light_ReverseRouter/doc



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

The [Light_ReverseRouterDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ReverseRouter/Light_ReverseRouterDocBuilder.md) class.



