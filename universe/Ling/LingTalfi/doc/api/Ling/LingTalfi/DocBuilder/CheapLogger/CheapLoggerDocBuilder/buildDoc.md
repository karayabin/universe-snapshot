[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\CheapLogger\CheapLoggerDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/CheapLogger/CheapLoggerDocBuilder.md)


CheapLoggerDocBuilder::buildDoc
================



CheapLoggerDocBuilder::buildDoc — Launch this function to generate the documentation for the CheapLogger planet.




Description
================


public static [CheapLoggerDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/CheapLogger/CheapLoggerDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the CheapLogger planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/CheapLogger/doc



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
See the source code for method [CheapLoggerDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/CheapLogger/CheapLoggerDocBuilder.php#L45-L206)


See Also
================

The [CheapLoggerDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/CheapLogger/CheapLoggerDocBuilder.md) class.



