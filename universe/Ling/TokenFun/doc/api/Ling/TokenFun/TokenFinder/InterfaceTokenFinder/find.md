[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\InterfaceTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder.md)


InterfaceTokenFinder::find
================



InterfaceTokenFinder::find — Returns an array of match.




Description
================


public [InterfaceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [InterfaceTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/InterfaceTokenFinder.php#L31-L73)


See Also
================

The [InterfaceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/InterfaceTokenFinder.md) class.



