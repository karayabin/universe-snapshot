[Back to the Ling/CyclicChainDetector api](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector.md)



The CyclicChainDetectorHelper class
================
2021-01-21 --> 2021-05-31






Introduction
============

The CyclicChainDetectorHelper class.



Class synopsis
==============


class <span class="pl-k">CyclicChainDetectorHelper</span>  {

- Methods
    - public static [debugLinks](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/debugLinks.md)([Ling\CyclicChainDetector\CyclicChainDetectorUtil](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil.md) $util) : void
    - private static [debugLink](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/debugLink.md)([Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) $link, ?int $indent = 0, ?string $br = 
) : void
    - public static [getSourceNamesByLink](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getSourceNamesByLink.md)([Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) $link) : array
    - public static [getPathAsString](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getPathAsString.md)([Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) $link) : string
    - public static [each](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/each.md)([Ling\CyclicChainDetector\Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) $link, callable $fn) : void

}






Methods
==============

- [CyclicChainDetectorHelper::debugLinks](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/debugLinks.md) &ndash; Prints a human readable version of the links contained in the given chain.
- [CyclicChainDetectorHelper::debugLink](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/debugLink.md) &ndash; Prints a human readable version of the given link.
- [CyclicChainDetectorHelper::getSourceNamesByLink](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getSourceNamesByLink.md) &ndash; Returns the source names, recursively, from the given link up to the original link.
- [CyclicChainDetectorHelper::getPathAsString](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getPathAsString.md) &ndash; Returns a human readable version of the chain the given link was found in, from the source down to the link (but not further down).
- [CyclicChainDetectorHelper::each](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/each.md) &ndash; Applies the given callable to the given link and every dependency found in it.





Location
=============
Ling\CyclicChainDetector\Helper\CyclicChainDetectorHelper<br>
See the source code of [Ling\CyclicChainDetector\Helper\CyclicChainDetectorHelper](https://github.com/lingtalfi/CyclicChainDetector/blob/master/Helper/CyclicChainDetectorHelper.php)



SeeAlso
==============
Previous class: [CyclicChainDetectorUtil](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil.md)<br>Next class: [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md)<br>
