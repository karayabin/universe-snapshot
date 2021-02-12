[Back to the Ling/CyclicChainDetector api](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector.md)<br>
[Back to the Ling\CyclicChainDetector\Helper\CyclicChainDetectorHelper class](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper.md)


CyclicChainDetectorHelper::each
================



CyclicChainDetectorHelper::each — Applies the given callable to the given link and every dependency found in it.




Description
================


public static [CyclicChainDetectorHelper::each](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/each.md)([Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) $link, callable $fn) : void




Applies the given callable to the given link and every dependency found in it.

The callable's sole argument is a link.




Parameters
================


- link

    

- fn

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [CyclicChainDetectorHelper::each](https://github.com/lingtalfi/CyclicChainDetector/blob/master/Helper/CyclicChainDetectorHelper.php#L113-L120)


See Also
================

The [CyclicChainDetectorHelper](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper.md) class.

Previous method: [getPathAsString](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getPathAsString.md)<br>

