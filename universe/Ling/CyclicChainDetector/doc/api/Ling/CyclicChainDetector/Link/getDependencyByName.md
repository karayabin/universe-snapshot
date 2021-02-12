[Back to the Ling/CyclicChainDetector api](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector.md)<br>
[Back to the Ling\CyclicChainDetector\Link class](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md)


Link::getDependencyByName
================



Link::getDependencyByName — Returns the link dependency with the given name if it exists, or null otherwise.




Description
================


public [Link::getDependencyByName](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencyByName.md)(string $name, ?array $options = []) : [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) | null




Returns the link dependency with the given name if it exists, or null otherwise.
The search is recursive.

Available options are:

- last: bool=false. If true, search for the last dependency found instead of the first one.




Parameters
================


- name

    

- options

    


Return values
================

Returns [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) | null.








Source Code
===========
See the source code for method [Link::getDependencyByName](https://github.com/lingtalfi/CyclicChainDetector/blob/master/Link.php#L115-L135)


See Also
================

The [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) class.

Previous method: [hasDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/hasDependency.md)<br>

