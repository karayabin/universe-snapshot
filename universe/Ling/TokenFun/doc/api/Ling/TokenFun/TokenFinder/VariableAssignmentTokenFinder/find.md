[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\VariableAssignmentTokenFinder class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder.md)


VariableAssignmentTokenFinder::find
================



VariableAssignmentTokenFinder::find — Returns an array of match.




Description
================


public [VariableAssignmentTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/find.md)(array $tokens) : array




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
See the source code for method [VariableAssignmentTokenFinder::find](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/VariableAssignmentTokenFinder.php#L200-L314)


See Also
================

The [VariableAssignmentTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder.md) class.

Previous method: [__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/__construct.md)<br>Next method: [isSkipClass](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder/isSkipClass.md)<br>

