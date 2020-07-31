[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\TokenFinderInterface class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md)


TokenFinderInterface::find
================



TokenFinderInterface::find — Returns an array of match.




Description
================


abstract public [TokenFinderInterface::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface/find.md)(array $tokens) : array




Returns an array of match.
Every match is an array with the following entries:

- 0: int startIndex, the index at which the pattern starts
- 1: int endIndex, the index at which the pattern ends
- ...: extra numbers can be added, depending on the concrete class




Parameters
================


- tokens

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TokenFinderInterface::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/TokenFinderInterface.php#L28-L28)


See Also
================

The [TokenFinderInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/TokenFinderInterface.md) class.



