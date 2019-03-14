[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\CliTools\CliToolsDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/CliTools/CliToolsDocBuilder.md)


CliToolsDocBuilder::buildDoc
================



CliToolsDocBuilder::buildDoc — Launch this function to generate the documentation for the CliTools planet.




Description
================


public static [CliToolsDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/CliTools/CliToolsDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the CliTools planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/CliTools/doc

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

The [CliToolsDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/CliTools/CliToolsDocBuilder.md) class.



