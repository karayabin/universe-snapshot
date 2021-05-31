[Back to the Ling/CyclicChainDetector api](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector.md)



The Link class
================
2021-01-21 --> 2021-05-31






Introduction
============

The Link class.
Represents a unidirectional dependency.



Class synopsis
==============


class <span class="pl-k">Link</span>  {

- Properties
    - public string [$name](#property-name) ;
    - protected [Ling\CyclicChainDetector\Link[]](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) [$dependencies](#property-dependencies) ;
    - protected [Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md)|null [$source](#property-source) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/__construct.md)(string $name) : void
    - public [addDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/addDependency.md)([Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) $link) : void
    - public [getDependencies](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencies.md)() : [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md)
    - public [getSource](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getSource.md)() : [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) | null
    - public [hasDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/hasDependency.md)(string $name) : bool
    - public [getDependencyByName](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencyByName.md)(string $name, ?array $options = []) : [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) | null

}




Properties
=============

- <span id="property-name"><b>name</b></span>

    The name of the link
    
    

- <span id="property-dependencies"><b>dependencies</b></span>

    The direct dependencies of the link.
    
    It's an array of links.
    
    

- <span id="property-source"><b>source</b></span>

    This source of this link instance.
    This only applies to dependency links (otherwise it's null).
    
    



Methods
==============

- [Link::__construct](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/__construct.md) &ndash; Builds the Link instance.
- [Link::addDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/addDependency.md) &ndash; Adds the link as a dependency of the current instance.
- [Link::getDependencies](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencies.md) &ndash; Returns the dependencies of this instance.
- [Link::getSource](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getSource.md) &ndash; Returns the source of this instance.
- [Link::hasDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/hasDependency.md) &ndash; Returns whether the current link has a direct dependency to the given name.
- [Link::getDependencyByName](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencyByName.md) &ndash; Returns the link dependency with the given name if it exists, or null otherwise.





Location
=============
Ling\CyclicChainDetector\Link<br>
See the source code of [Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/Link.php)



SeeAlso
==============
Previous class: [CyclicChainDetectorHelper](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper.md)<br>
