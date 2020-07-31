[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\ParentClassNameTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ParentClassNameTokenFinder.md)


ParentClassNameTokenFinder::find
================



ParentClassNameTokenFinder::find — Returns an array of match.




Description
================


public [ParentClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ParentClassNameTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [ParentClassNameTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/ParentClassNameTokenFinder.php#L32-L69)


See Also
================

The [ParentClassNameTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ParentClassNameTokenFinder.md) class.



