[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::getParentClassName
================



TokenFinderTool::getParentClassName — Returns the parent class name, or false if no parent was found.




Description
================


public static [TokenFinderTool::getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getParentClassName.md)(array $tokens, ?$fullName = true) : string | false




Returns the parent class name, or false if no parent was found.
If $fullName is set to true, the fullName of the parent is returned.


When fullName is true, it tries to see if there is a use statement matching
the parent class name, and returns it if it exists.
Otherwise, it just prepends the namespace (if no use statement matched the parent class name).

Note: as for now it doesn't take into account the "as" alias (i.e. use My\Class as Something)




Parameters
================


- tokens

    

- fullName

    


Return values
================

Returns string | false.








Source Code
===========
See the source code for method [TokenFinderTool::getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L209-L241)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getClassPropertyBasicInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassPropertyBasicInfo.md)<br>Next method: [getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassSignatureInfo.md)<br>

