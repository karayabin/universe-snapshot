[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::removePhpComments
================



TokenFinderTool::removePhpComments — Removes the php comments from the given valid php string, and returns the result.




Description
================


public static [TokenFinderTool::removePhpComments](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/removePhpComments.md)(string $str, ?bool $preserveWhiteSpace = true) : string




Removes the php comments from the given valid php string, and returns the result.

Note: a valid php string must start with <?php.

If the preserveWhiteSpace option is true, it will replace the comments with some whitespaces, so that
the line numbers are preserved.




Parameters
================


- str

    

- preserveWhiteSpace

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [TokenFinderTool::removePhpComments](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L656-L706)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getUseDependenciesByReflectionClasses](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getUseDependenciesByReflectionClasses.md)<br>

