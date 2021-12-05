[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The RepresentativeColumnFinderUtil class
================
2019-10-24 --> 2021-06-28






Introduction
============

The RepresentativeColumnFinderUtil class.
A tool to find the [representative column](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/conception-notes.md#the-representative-column).



Class synopsis
==============


class <span class="pl-k">RepresentativeColumnFinderUtil</span>  {

- Properties
    - protected array [$commonMatches](#property-commonMatches) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/__construct.md)() : void
    - public [findRepresentativeColumn](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/findRepresentativeColumn.md)(string $table) : string
    - public [setCommonMatches](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/setCommonMatches.md)(array $commonMatches) : void
    - public [setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-commonMatches"><b>commonMatches</b></span>

    This property holds the commonMatches for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [RepresentativeColumnFinderUtil::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/__construct.md) &ndash; Builds the RepresentativeColumnFinderUtil instance.
- [RepresentativeColumnFinderUtil::findRepresentativeColumn](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/findRepresentativeColumn.md) &ndash; Returns the [representative column](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/conception-notes.md#the-representative-column) from the given table name.
- [RepresentativeColumnFinderUtil::setCommonMatches](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/setCommonMatches.md) &ndash; Sets the commonMatches.
- [RepresentativeColumnFinderUtil::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_RealGenerator\Util\RepresentativeColumnFinderUtil<br>
See the source code of [Ling\Light_RealGenerator\Util\RepresentativeColumnFinderUtil](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Util/RepresentativeColumnFinderUtil.php)



SeeAlso
==============
Previous class: [LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md)<br>
