[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\ColdServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)


ColdServiceResolver::resolveArgs
================



ColdServiceResolver::resolveArgs — Returns the given $args array, but with services resolved recursively (based on the sic notation).




Description
================


private [ColdServiceResolver::resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveArgs.md)(array $args) : array




Returns the given $args array, but with services resolved recursively (based on the sic notation).

When a service is encountered, it is resolved in the "background" (on another stack's location),
and a reference (unique variable name bound to that service) is used instead, so that the caller can use
that reference as a method's argument.




Parameters
================


- args

    


Return values
================

Returns array.








See Also
================

The [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md) class.

Previous method: [getUniqueVariableName](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getUniqueVariableName.md)<br>Next method: [argsToString](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/argsToString.md)<br>

