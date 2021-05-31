Ling/CyclicChainDetector
================
2021-01-21 --> 2021-05-31




Table of contents
===========

- [CyclicChainDetectorUtil](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil.md) &ndash; The CyclicChainDetectorUtil class.
    - [CyclicChainDetectorUtil::__construct](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/__construct.md) &ndash; Builds the CyclicChainDetectorUtil instance.
    - [CyclicChainDetectorUtil::setCallback](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/setCallback.md) &ndash; Sets the callback.
    - [CyclicChainDetectorUtil::hasCyclicError](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/hasCyclicError.md) &ndash; Returns the cyclicError of this instance.
    - [CyclicChainDetectorUtil::addDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/addDependency.md) &ndash; Adds a dependency link.
    - [CyclicChainDetectorUtil::addDependencies](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/addDependencies.md) &ndash; Adds the given dependencies as links.
    - [CyclicChainDetectorUtil::getLinks](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/getLinks.md) &ndash; Returns the links of this instance.
    - [CyclicChainDetectorUtil::reset](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil/reset.md) &ndash; Removes all the links from the chain.
- [CyclicChainDetectorHelper](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper.md) &ndash; The CyclicChainDetectorHelper class.
    - [CyclicChainDetectorHelper::debugLinks](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/debugLinks.md) &ndash; Prints a human readable version of the links contained in the given chain.
    - [CyclicChainDetectorHelper::getSourceNamesByLink](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getSourceNamesByLink.md) &ndash; Returns the source names, recursively, from the given link up to the original link.
    - [CyclicChainDetectorHelper::getPathAsString](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/getPathAsString.md) &ndash; Returns a human readable version of the chain the given link was found in, from the source down to the link (but not further down).
    - [CyclicChainDetectorHelper::each](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Helper/CyclicChainDetectorHelper/each.md) &ndash; Applies the given callable to the given link and every dependency found in it.
- [Link](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link.md) &ndash; The Link class.
    - [Link::__construct](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/__construct.md) &ndash; Builds the Link instance.
    - [Link::addDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/addDependency.md) &ndash; Adds the link as a dependency of the current instance.
    - [Link::getDependencies](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencies.md) &ndash; Returns the dependencies of this instance.
    - [Link::getSource](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getSource.md) &ndash; Returns the source of this instance.
    - [Link::hasDependency](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/hasDependency.md) &ndash; Returns whether the current link has a direct dependency to the given name.
    - [Link::getDependencyByName](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/Link/getDependencyByName.md) &ndash; Returns the link dependency with the given name if it exists, or null otherwise.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)


