[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\HotServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver.md)


HotServiceResolver::getService
================



HotServiceResolver::getService — Returns the service (an instance of a class) defined in the given sic block.




Description
================


public [HotServiceResolver::getService](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/getService.md)(array $sicBlock) : false | object | array




Returns the service (an instance of a class) defined in the given sic block.
Or false in the following cases:

- the given array is not a sic block.
- the sic block contains the pass key.


Note: when called internally, this method can also return a callable (i.e. an array of [$o, $methodName]).
That's because a callable can be an argument of a method.




Parameters
================


- sicBlock

    


Return values
================

Returns false | object | array.
False is returned when the given array IS NOT a sic block (or a sic block with the pass key defined)

Exceptions thrown
================

- [SicBlockWillNotResolveException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicBlockWillNotResolveException.md).&nbsp;
When the sic block will not resolve






Source Code
===========
See the source code for method [HotServiceResolver::getService](https://github.com/lingtalfi/SicTools/blob/master/HotServiceResolver.php#L65-L171)


See Also
================

The [HotServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver.md) class.

Previous method: [__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/__construct.md)<br>Next method: [resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveCustomNotation.md)<br>

