[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\PaypalTools\PaypalToolsDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/PaypalTools/PaypalToolsDocBuilder.md)


PaypalToolsDocBuilder::buildDoc
================



PaypalToolsDocBuilder::buildDoc — Launch this function to generate the documentation for the PaypalTools planet.




Description
================


public static [PaypalToolsDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/PaypalTools/PaypalToolsDocBuilder/buildDoc.md)(?$htmlMode = true) : void




Launch this function to generate the documentation for the PaypalTools planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is true (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/PaypalTools/doc



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
See the source code for method [PaypalToolsDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/PaypalTools/PaypalToolsDocBuilder.php#L45-L206)


See Also
================

The [PaypalToolsDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/PaypalTools/PaypalToolsDocBuilder.md) class.



