[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\ClassSignatureTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassSignatureTokenFinder.md)


ClassSignatureTokenFinder::find
================



ClassSignatureTokenFinder::find — Returns an array of match.




Description
================


public [ClassSignatureTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassSignatureTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [ClassSignatureTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/ClassSignatureTokenFinder.php#L23-L69)


See Also
================

The [ClassSignatureTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassSignatureTokenFinder.md) class.



