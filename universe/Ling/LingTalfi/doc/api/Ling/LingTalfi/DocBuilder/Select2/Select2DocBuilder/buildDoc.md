[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\Select2\Select2DocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Select2/Select2DocBuilder.md)


Select2DocBuilder::buildDoc
================



Select2DocBuilder::buildDoc — Launch this function to generate the documentation for the Select2 planet.




Description
================


public static [Select2DocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Select2/Select2DocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the Select2 planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/Select2/doc



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
See the source code for method [Select2DocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/Select2/Select2DocBuilder.php#L45-L206)


See Also
================

The [Select2DocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/Select2/Select2DocBuilder.md) class.



