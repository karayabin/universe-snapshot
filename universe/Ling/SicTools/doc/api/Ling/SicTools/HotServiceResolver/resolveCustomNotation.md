[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\HotServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver.md)


HotServiceResolver::resolveCustomNotation
================



HotServiceResolver::resolveCustomNotation — Parses the given value as a custom notation and returns the interpreted result.




Description
================


protected [HotServiceResolver::resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveCustomNotation.md)($value, ?&$isCustomNotation = false) : mixed




Parses the given value as a custom notation and returns the interpreted result.

One of two cases happens:

- the given value is recognized as a custom notation:
     - the isCustomNotation flag is set to true (by the implementor)
     - the method returns the interpreted custom value

- the given value is NOT recognized as a custom notation:
     - the isCustomNotation flag is left to false (by default)
     - the method's return will be ignored


This mechanism allows us to create new notations based either on strings or arrays, for instance:

- @service(my.service)           # would call a service




Parameters
================


- value

    

- isCustomNotation

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [HotServiceResolver::resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/HotServiceResolver.php#L222-L225)


See Also
================

The [HotServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver.md) class.

Previous method: [getService](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/getService.md)<br>Next method: [resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveArgs.md)<br>

