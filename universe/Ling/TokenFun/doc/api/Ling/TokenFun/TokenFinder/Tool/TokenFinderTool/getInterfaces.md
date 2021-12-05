[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::getInterfaces
================



TokenFinderTool::getInterfaces — Returns the interfaces found in the given tokens.




Description
================


public static [TokenFinderTool::getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getInterfaces.md)(array $tokens, ?$fullName = true) : array




Returns the interfaces found in the given tokens.

It returns the names of the implemented interfaces (search for the "CCC implements XXX" expression) if any,
and include the full name if $fullName is set to true.

When fullName is true, it tries to see if there is a use statement matching
the interface class name, and returns it if it exists.
Otherwise, it just prepends the namespace (if no use statement matched the interface class name).

Note: as for now it doesn't take into account the "as" alias (i.e. use My\Class as Something)




Parameters
================


- tokens

    

- fullName

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TokenFinderTool::getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L311-L350)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassSignatureInfo.md)<br>Next method: [getMethodsInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getMethodsInfo.md)<br>

