[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\ClassCooker class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)


ClassCooker::getMethodsBasicInfo
================



ClassCooker::getMethodsBasicInfo — Returns an array of propertyName => informationItem about the class methods, in the order they appear in the class file.




Description
================


public [ClassCooker::getMethodsBasicInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBasicInfo.md)() : array




Returns an array of propertyName => informationItem about the class methods, in the order they appear in the class file.

Each information item is an array with the following structure:

- name: string, the method name
- isPublic: bool
- isProtected: bool
- isPrivate: bool
- isStatic: bool
- isFinal: bool
- isAbstract: bool
- docComment: string|false, the doc comment's content if any, or false otherwise
- startLine: int, the line where the method starts, this includes the docComment if any
- endLine: int, the line where the method ends




Parameters
================

This method has no parameters.


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ClassCooker::getMethodsBasicInfo](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php#L545-L591)


See Also
================

The [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) class.

Previous method: [getParentSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getParentSymbol.md)<br>Next method: [getClassStartLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassStartLine.md)<br>

