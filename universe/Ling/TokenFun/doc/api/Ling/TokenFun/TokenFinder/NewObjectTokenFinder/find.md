[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\NewObjectTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder.md)


NewObjectTokenFinder::find
================



NewObjectTokenFinder::find — Returns an array of match.




Description
================


public [NewObjectTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [NewObjectTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/NewObjectTokenFinder.php#L37-L77)


See Also
================

The [NewObjectTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder.md) class.

Next method: [parseParenthesis](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/NewObjectTokenFinder/parseParenthesis.md)<br>

