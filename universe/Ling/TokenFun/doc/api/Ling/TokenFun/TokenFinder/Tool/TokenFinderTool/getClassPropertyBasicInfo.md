[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::getClassPropertyBasicInfo
================



TokenFinderTool::getClassPropertyBasicInfo — Returns an array of basic information for every class properties of the given class.




Description
================


public static [TokenFinderTool::getClassPropertyBasicInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassPropertyBasicInfo.md)(string $className) : array




Returns an array of basic information for every class properties of the given class.
The variable names are used as indexes.

Note: the given class must be reachable by the auto-loaders.



Each basic info array contains the following:

- varName: string, the variable name
- hasDocComment: bool, whether this property has a docblock comment attached to it (it's a comment that starts with slash double asterisk)
- doComment: string, the docblock comment if any (an empty string otherwise)
- isPublic: bool, whether the property's visibility is public
- isProtected: bool, whether the property's visibility is protected
- isPrivate: bool, whether the property's visibility is private
- isStatic: bool, whether the property is declared as static
- content: string, the whole property declaration, as written in the file, including the multi-line comments if any
- startLine: int, the line number at which the property "block" (i.e. including the doc block comment if any) starts
- endLine: int, the line number at which the property "block" ends
- commentStartLine: int, the line number at which the doc bloc comment starts, or false if there is no block comment
- commentEndLine: int, the line number at which the doc bloc comment ends, or false if there is no block comment




Parameters
================


- className

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TokenFinderTool::getClassPropertyBasicInfo](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L119-L188)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getClassNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassNames.md)<br>Next method: [getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getParentClassName.md)<br>

