[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\DocBuilder\PlanetSitemap\PlanetSitemapDocBuilder class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/PlanetSitemap/PlanetSitemapDocBuilder.md)


PlanetSitemapDocBuilder::buildDoc
================



PlanetSitemapDocBuilder::buildDoc — Launch this function to generate the documentation for the PlanetSitemap planet.




Description
================


public static [PlanetSitemapDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/PlanetSitemap/PlanetSitemapDocBuilder/buildDoc.md)($htmlMode = false) : void




Launch this function to generate the documentation for the PlanetSitemap planet.
(based on the LingGitPhpPlanetDocBuilder doc builder.

If htmlMode is false (the default),
this method will generate all files in md format in the following directory:

- /myphp/universe/PlanetSitemap/doc

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







Source Code
===========
See the source code for method [PlanetSitemapDocBuilder::buildDoc](https://github.com/lingtalfi/LingTalfi/blob/master/DocBuilder/PlanetSitemap/PlanetSitemapDocBuilder.php#L51-L206)


See Also
================

The [PlanetSitemapDocBuilder](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/DocBuilder/PlanetSitemap/PlanetSitemapDocBuilder.md) class.



