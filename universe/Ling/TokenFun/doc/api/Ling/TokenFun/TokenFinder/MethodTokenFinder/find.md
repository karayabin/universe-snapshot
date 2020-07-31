[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\MethodTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder.md)


MethodTokenFinder::find
================



MethodTokenFinder::find — Returns an array of match.




Description
================


public [MethodTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [MethodTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/MethodTokenFinder.php#L38-L152)


See Also
================

The [MethodTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/MethodTokenFinder.md) class.



