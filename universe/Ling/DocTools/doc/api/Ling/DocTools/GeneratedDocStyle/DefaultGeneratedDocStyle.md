[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The DefaultGeneratedDocStyle class
================
2019-02-21 --> 2021-05-31






Introduction
============

The DefaultGeneratedDocStyle class.



Class synopsis
==============


class <span class="pl-k">DefaultGeneratedDocStyle</span> implements [GeneratedDocStyleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md) {

- Properties
    - protected string [$extension](#property-extension) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/__construct.md)() : void
    - public [setExtension](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/setExtension.md)(string $extension) : void
    - public [getClassUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getClassUrl.md)(string $planetName, string $generatedClassBaseUrl, string $className) : string
    - public [getMethodUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getMethodUrl.md)(string $planetName, string $generatedClassBaseUrl, string $className, string $methodName) : string
    - public [getPlanetPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getPlanetPageRelativePath.md)(string $planetName) : string
    - public [getClassPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getClassPageRelativePath.md)(string $planetName, string $className) : string
    - public [getMethodPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getMethodPageRelativePath.md)(string $planetName, string $className, string $methodName) : string

}




Properties
=============

- <span id="property-extension"><b>extension</b></span>

    This property holds the file extension for all generated files (default=md).
    
    



Methods
==============

- [DefaultGeneratedDocStyle::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/__construct.md) &ndash; Builds the DefaultGeneratedDocStyle instance.
- [DefaultGeneratedDocStyle::setExtension](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/setExtension.md) &ndash; Sets the extension.
- [DefaultGeneratedDocStyle::getClassUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getClassUrl.md) &ndash; Returns the class url.
- [DefaultGeneratedDocStyle::getMethodUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getMethodUrl.md) &ndash; Returns the method url.
- [DefaultGeneratedDocStyle::getPlanetPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getPlanetPageRelativePath.md) &ndash; Returns the relative path to the planet documentation page.
- [DefaultGeneratedDocStyle::getClassPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getClassPageRelativePath.md) &ndash; Returns the relative path to the class documentation page.
- [DefaultGeneratedDocStyle::getMethodPageRelativePath](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/DefaultGeneratedDocStyle/getMethodPageRelativePath.md) &ndash; Returns the relative path to the method documentation page.





Location
=============
Ling\DocTools\GeneratedDocStyle\DefaultGeneratedDocStyle<br>
See the source code of [Ling\DocTools\GeneratedDocStyle\DefaultGeneratedDocStyle](https://github.com/lingtalfi/DocTools/blob/master/GeneratedDocStyle/DefaultGeneratedDocStyle.php)



SeeAlso
==============
Previous class: [PlanetParserException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/PlanetParserException.md)<br>Next class: [GeneratedDocStyleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md)<br>
