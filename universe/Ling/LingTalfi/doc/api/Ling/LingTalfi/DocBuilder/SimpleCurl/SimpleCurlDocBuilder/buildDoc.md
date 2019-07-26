[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\SimpleCurl\SimpleCurlDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SimpleCurl/SimpleCurlDocBuilder.md)


SimpleCurlDocBuilder::buildDoc
================



SimpleCurlDocBuilder::buildDoc — Launch this function to generate the documentation for the SimpleCurl planet.




Description
================


public static [SimpleCurlDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SimpleCurl/SimpleCurlDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the SimpleCurl planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/SimpleCurl/doc



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
See the source code for method [SimpleCurlDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/SimpleCurl/SimpleCurlDocBuilder.php#L44-L199)


See Also
================

The [SimpleCurlDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SimpleCurl/SimpleCurlDocBuilder.md) class.



