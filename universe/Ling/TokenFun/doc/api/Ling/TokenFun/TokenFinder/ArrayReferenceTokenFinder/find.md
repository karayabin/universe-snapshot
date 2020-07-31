[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\ArrayReferenceTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder.md)


ArrayReferenceTokenFinder::find
================



ArrayReferenceTokenFinder::find — Returns an array of match.




Description
================


public [ArrayReferenceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [ArrayReferenceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/ArrayReferenceTokenFinder.php#L30-L62)


See Also
================

The [ArrayReferenceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder.md) class.



