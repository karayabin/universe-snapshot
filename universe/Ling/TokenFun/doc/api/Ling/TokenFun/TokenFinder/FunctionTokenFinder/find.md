[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\FunctionTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder.md)


FunctionTokenFinder::find
================



FunctionTokenFinder::find — Returns an array of match.




Description
================


public [FunctionTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [FunctionTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/FunctionTokenFinder.php#L27-L65)


See Also
================

The [FunctionTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/FunctionTokenFinder.md) class.



