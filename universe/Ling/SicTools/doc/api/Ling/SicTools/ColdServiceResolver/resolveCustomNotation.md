[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\ColdServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)


ColdServiceResolver::resolveCustomNotation
================



ColdServiceResolver::resolveCustomNotation — Parses the given value as a custom notation and returns the interpreted result.




Description
================


protected [ColdServiceResolver::resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/resolveCustomNotation.md)($value, ?$isCustomNotation = false) : mixed




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


Note: inside this method, you can create your own code blocks and add them to the stack.
See the examples in the documentation for more details.




Parameters
================


- value

    

- isCustomNotation

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [ColdServiceResolver::resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/ColdServiceResolver.php#L290-L293)


See Also
================

The [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md) class.

Previous method: [addServiceCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addServiceCode.md)<br>Next method: [addCodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addCodeBlock.md)<br>

