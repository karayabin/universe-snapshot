[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\ColdServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)


ColdServiceResolver::getServicePhpCode
================



ColdServiceResolver::getServicePhpCode — Returns the php code (based on the given sic block) to put in the body of your service container's method.




Description
================


public [ColdServiceResolver::getServicePhpCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getServicePhpCode.md)(array $sicBlock) : false | string




Returns the php code (based on the given sic block) to put in the body of your service container's method.
When executed in this context, the code instantiates and returns the service.


Returns false in the following cases:

- the given array is not a sic block (including if the sic block contains the pass key).




Parameters
================


- sicBlock

    


Return values
================

Returns false | string.
False is returned when the given array IS NOT a sic block (or a sic block with the pass key defined)







See Also
================

The [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md) class.

Previous method: [__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/__construct.md)<br>Next method: [addServiceCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addServiceCode.md)<br>

