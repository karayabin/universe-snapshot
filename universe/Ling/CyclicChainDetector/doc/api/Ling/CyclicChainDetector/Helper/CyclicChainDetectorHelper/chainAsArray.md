[Back to the Ling/CyclicChainDetector api](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector.md)<br>
[Back to the Ling\CyclicChainDetector\Helper\CyclicChainDetectorHelper class](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper.md)


CyclicChainDetectorHelper::chainAsArray
================



CyclicChainDetectorHelper::chainAsArray — Returns an array of all chain's members, grouped by links, and ordered by decreasing age (i.e.




Description
================


public static [CyclicChainDetectorHelper::chainAsArray](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/chainAsArray.md)([Ling\CyclicChainDetector\CyclicChainDetectorUtil](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil.md) $util) : array




Returns an array of all chain's members, grouped by links, and ordered by decreasing age (i.e. oldest first).
It's an array of linkItem (one for each link of the chain), each of which is an array being the result of the linkAsArray method.




Parameters
================


- util

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [CyclicChainDetectorHelper::chainAsArray](https://github.com/lingtalfi/CyclicChainDetector/blob/master/Helper/CyclicChainDetectorHelper.php#L76-L84)


See Also
================

The [CyclicChainDetectorHelper](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper.md) class.

Previous method: [linkAsArray](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/linkAsArray.md)<br>

