[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Light_Kit_Demo\Light_Kit_DemoDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Kit_Demo/Light_Kit_DemoDocBuilder.md)


Light_Kit_DemoDocBuilder::buildDoc
================



Light_Kit_DemoDocBuilder::buildDoc — Launch this function to generate the documentation for the Light_Kit_Demo planet.




Description
================


public static [Light_Kit_DemoDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Kit_Demo/Light_Kit_DemoDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the Light_Kit_Demo planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Light_Kit_Demo/doc



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
See the source code for method [Light_Kit_DemoDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Light_Kit_Demo/Light_Kit_DemoDocBuilder.php#L44-L199)


See Also
================

The [Light_Kit_DemoDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_Kit_Demo/Light_Kit_DemoDocBuilder.md) class.



