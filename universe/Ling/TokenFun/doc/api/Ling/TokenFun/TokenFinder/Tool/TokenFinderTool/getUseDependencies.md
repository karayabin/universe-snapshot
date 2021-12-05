[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::getUseDependencies
================



TokenFinderTool::getUseDependencies — Returns an array of use statements' class names found in the given tokens.




Description
================


public static [TokenFinderTool::getUseDependencies](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependencies.md)(array $tokens, ?array $options = []) : array




Returns an array of use statements' class names found in the given tokens.

By default, it doesn't take into account the aliases part if any.

Available options:
- sort: bool = true. If true, the returned array is sorted.
- alias: bool = false. If true, returns an array of items, each of which:
     - 0: class (or func or constant)
     - 1: alias




Parameters
================


- tokens

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TokenFinderTool::getUseDependencies](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L567-L601)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getNamespace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getNamespace.md)<br>Next method: [getUseDependenciesByFolder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByFolder.md)<br>

