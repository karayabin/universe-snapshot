[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\ClassNameTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder.md)


ClassNameTokenFinder::find
================



ClassNameTokenFinder::find — Returns an array of match.




Description
================


public [ClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [ClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/ClassNameTokenFinder.php#L69-L110)


See Also
================

The [ClassNameTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder.md) class.

Previous method: [setIncludeInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ClassNameTokenFinder/setIncludeInterface.md)<br>

