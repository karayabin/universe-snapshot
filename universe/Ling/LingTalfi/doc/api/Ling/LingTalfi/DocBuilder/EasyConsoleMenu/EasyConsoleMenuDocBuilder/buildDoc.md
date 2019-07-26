[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\EasyConsoleMenu\EasyConsoleMenuDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/EasyConsoleMenu/EasyConsoleMenuDocBuilder.md)


EasyConsoleMenuDocBuilder::buildDoc
================



EasyConsoleMenuDocBuilder::buildDoc — Launch this function to generate the documentation for the EasyConsoleMenu planet.




Description
================


public static [EasyConsoleMenuDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/EasyConsoleMenu/EasyConsoleMenuDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the EasyConsoleMenu planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/EasyConsoleMenu/doc



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
See the source code for method [EasyConsoleMenuDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/EasyConsoleMenu/EasyConsoleMenuDocBuilder.php#L44-L205)


See Also
================

The [EasyConsoleMenuDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/EasyConsoleMenu/EasyConsoleMenuDocBuilder.md) class.



