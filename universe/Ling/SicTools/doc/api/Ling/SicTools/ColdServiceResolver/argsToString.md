[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\ColdServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)


ColdServiceResolver::argsToString
================



ColdServiceResolver::argsToString — Returns the "inline php code" version of the passed array of arguments.




Description
================


private [ColdServiceResolver::argsToString](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/argsToString.md)(array $realArgs) : string | array | null




Returns the "inline php code" version of the passed array of arguments.
All encoded variables (with the encode method) are also decoded (unquoted so that they get evaluated by php as variables and not strings).




Parameters
================


- realArgs

    


Return values
================

Returns string | array | null.








Source Code
===========
See the source code for method [ColdServiceResolver::argsToString](https://github.com/lingtalfi/SicTools/blob/master/ColdServiceResolver.php#L401-L405)


See Also
================

The [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md) class.

Previous method: [resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveArgs.md)<br>

