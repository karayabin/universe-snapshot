[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Light_ZephyrTemplate\Light_ZephyrTemplateDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ZephyrTemplate/Light_ZephyrTemplateDocBuilder.md)


Light_ZephyrTemplateDocBuilder::buildDoc
================



Light_ZephyrTemplateDocBuilder::buildDoc — Launch this function to generate the documentation for the Light_ZephyrTemplate planet.




Description
================


public static [Light_ZephyrTemplateDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ZephyrTemplate/Light_ZephyrTemplateDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the Light_ZephyrTemplate planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Light_ZephyrTemplate/doc



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
See the source code for method [Light_ZephyrTemplateDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Light_ZephyrTemplate/Light_ZephyrTemplateDocBuilder.php#L44-L202)


See Also
================

The [Light_ZephyrTemplateDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Light_ZephyrTemplate/Light_ZephyrTemplateDocBuilder.md) class.



