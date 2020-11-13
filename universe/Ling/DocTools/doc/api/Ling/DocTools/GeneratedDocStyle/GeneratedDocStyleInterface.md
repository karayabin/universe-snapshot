[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The GeneratedDocStyleInterface class
================
2019-02-21 --> 2020-09-11






Introduction
============

The GeneratedDocStyleInterface interface.

See the [generated documentation styles](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/generated-documentation-styles.md) page for more info.



Class synopsis
==============


abstract class <span class="pl-k">GeneratedDocStyleInterface</span>  {

- Methods
    - abstract public [getClassUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getClassUrl.md)(string $planetName, string $generatedClassBaseUrl, string $className) : string
    - abstract public [getMethodUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getMethodUrl.md)(string $planetName, string $generatedClassBaseUrl, string $className, string $methodName) : string
    - abstract public [getPlanetPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getPlanetPageRelativePath.md)(string $planetName) : string
    - abstract public [getClassPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getClassPageRelativePath.md)(string $planetName, string $className) : string
    - abstract public [getMethodPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getMethodPageRelativePath.md)(string $planetName, string $className, string $methodName) : string

}






Methods
==============

- [GeneratedDocStyleInterface::getClassUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getClassUrl.md) &ndash; Returns the class url.
- [GeneratedDocStyleInterface::getMethodUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getMethodUrl.md) &ndash; Returns the method url.
- [GeneratedDocStyleInterface::getPlanetPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getPlanetPageRelativePath.md) &ndash; Returns the relative path to the planet documentation page.
- [GeneratedDocStyleInterface::getClassPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getClassPageRelativePath.md) &ndash; Returns the relative path to the class documentation page.
- [GeneratedDocStyleInterface::getMethodPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface/getMethodPageRelativePath.md) &ndash; Returns the relative path to the method documentation page.





Location
=============
Ling\DocTools\GeneratedDocStyle\GeneratedDocStyleInterface<br>
See the source code of [Ling\DocTools\GeneratedDocStyle\GeneratedDocStyleInterface](https://github.com/lingtalfi/DocTools/blob/master/GeneratedDocStyle/GeneratedDocStyleInterface.php)



SeeAlso
==============
Previous class: [DefaultGeneratedDocStyle](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle.md)<br>Next class: [GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface.md)<br>
