[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\SectionComment\SectionCommentDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SectionComment/SectionCommentDocBuilder.md)


SectionCommentDocBuilder::buildDoc
================



SectionCommentDocBuilder::buildDoc — Launch this function to generate the documentation for the SectionComment planet.




Description
================


public static [SectionCommentDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SectionComment/SectionCommentDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the SectionComment planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/SectionComment/doc



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
See the source code for method [SectionCommentDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/SectionComment/SectionCommentDocBuilder.php#L45-L206)


See Also
================

The [SectionCommentDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/SectionComment/SectionCommentDocBuilder.md) class.



