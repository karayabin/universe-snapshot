[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The ClassCooker class
================
2020-07-21 --> 2021-05-31






Introduction
============

The ClassCooker class.



Class synopsis
==============


class <span class="pl-k">ClassCooker</span>  {

- Properties
    - private string [$file](#property-file) ;

- Methods
    - public static [create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/create.md)() : static
    - public [setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/setFile.md)($file) : [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)
    - public [addContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addContent.md)(string $content, ?array $options = []) : void
    - public [addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addMethod.md)($methodName, $content, ?array $options = []) : false | void
    - public [addProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addProperty.md)(string $name, string $content, ?array $options = []) : void
    - public [addUseStatements](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addUseStatements.md)($useStatements) : void
    - public [getMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodContent.md)($methodName, ?$includeWrap = true) : bool | string
    - public [getMethodSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodSignature.md)($methodName) : bool | string
    - public [getClassName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassName.md)() : string
    - public [getMethods](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethods.md)(?array $signatureTags = []) : array
    - public [getMethodBoundariesByName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodBoundariesByName.md)(string $methodName) : bool | mixed
    - public [getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBoundaries.md)(?array $signatureTags = []) : array
    - public [hasMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasMethod.md)(string $method) : bool
    - public [hasParent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasParent.md)() : bool
    - public [getParentSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getParentSymbol.md)() : false | string
    - public [getMethodsBasicInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBasicInfo.md)() : array
    - public [getClassStartLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassStartLine.md)() : int
    - public [getClassFirstEmptyLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassFirstEmptyLine.md)() : int | false
    - public [getClassLastLineInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassLastLineInfo.md)() : array
    - public [hasProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasProperty.md)(string $propertyName) : bool
    - public [hasUseStatement](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasUseStatement.md)(string $useStatementClass) : bool
    - public [hasUseStatementSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasUseStatementSymbol.md)(string $symbol) : bool
    - public [removeMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/removeMethod.md)(string $methodName) : false | int
    - public [updateMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateMethodContent.md)(string $methodName, callable $updator) : false | int
    - public [updateClassSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateClassSignature.md)(callable $fn) : void
    - public [addParentClass](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addParentClass.md)(string $parentName) : void
    - public [updatePropertyComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updatePropertyComment.md)(string $propertyName, callable $fn, ?array $options = []) : void
    - protected [error](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/error.md)($msg) : void
    - private [getLines](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getLines.md)() : array | false
    - private [getTagsByLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getTagsByLine.md)(string $line) : array
    - private [checkBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/checkBoundaries.md)($startLine, $endLine) : bool
    - private [getInnerContentByMethodSlice](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getInnerContentByMethodSlice.md)(array $slice, ?array &$originalWrappers = []) : string

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    Path to the file containing the class.
    
    



Methods
==============

- [ClassCooker::create](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/create.md) &ndash; Creates a new instance of this class, and returns it.
- [ClassCooker::setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/setFile.md) &ndash; Sets the file to work with.
- [ClassCooker::addContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addContent.md) &ndash; Adds a string to the class.
- [ClassCooker::addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addMethod.md) &ndash; Adds the given method(s) to a class if it doesn't exist.
- [ClassCooker::addProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addProperty.md) &ndash; Adds a property to the current class.
- [ClassCooker::addUseStatements](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addUseStatements.md) &ndash; Adds the given use statement(s) to the class, if it doesn't exist.
- [ClassCooker::getMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodContent.md) &ndash; Returns the method content, by default including the signature and the wrapping curly brackets.
- [ClassCooker::getMethodSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodSignature.md) &ndash; Returns the given method' signature, or false if the method doesn't exist.
- [ClassCooker::getClassName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassName.md) &ndash; Returns the class name of the current class (i.e.
- [ClassCooker::getMethods](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethods.md) &ndash; Return an array of all the method signatures of the current class.
- [ClassCooker::getMethodBoundariesByName](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodBoundariesByName.md) &ndash; Get the boundaries for a given method.
- [ClassCooker::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBoundaries.md) &ndash; Proxy to the [ClassCookerHelper::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md) method.
- [ClassCooker::hasMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasMethod.md) &ndash; Returns whether the class contains the given method.
- [ClassCooker::hasParent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasParent.md) &ndash; Returns whether the current class has a parent.
- [ClassCooker::getParentSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getParentSymbol.md) &ndash; Returns the parent symbol if any, or false otherwise.
- [ClassCooker::getMethodsBasicInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getMethodsBasicInfo.md) &ndash; Returns an array of propertyName => informationItem about the class methods, in the order they appear in the class file.
- [ClassCooker::getClassStartLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassStartLine.md) &ndash; Returns the number of the start line of the class.
- [ClassCooker::getClassFirstEmptyLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassFirstEmptyLine.md) &ndash; Returns the number of the first empty line found after the class declaration, or false if there is no empty line.
- [ClassCooker::getClassLastLineInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassLastLineInfo.md) &ndash; Returns an array containing information related to the end of the class.
- [ClassCooker::hasProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasProperty.md) &ndash; Returns whether the current class contains the given property.
- [ClassCooker::hasUseStatement](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasUseStatement.md) &ndash; Returns whether the current class contains an use statement which references the given useStatementClass.
- [ClassCooker::hasUseStatementSymbol](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasUseStatementSymbol.md) &ndash; Returns whether the given symbol is defined in the use statements.
- [ClassCooker::removeMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/removeMethod.md) &ndash; or does nothing and returns false if the method was not found.
- [ClassCooker::updateMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateMethodContent.md) &ndash; Updates the inner content of a method, using a callable.
- [ClassCooker::updateClassSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateClassSignature.md) &ndash; Updates the class signature using the given callable.
- [ClassCooker::addParentClass](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addParentClass.md) &ndash; Adds a parent class to the current service class.
- [ClassCooker::updatePropertyComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updatePropertyComment.md) &ndash; Updates the [docblock comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/docblock-comment.md) of the given property (if there is one), using the given callable.
- [ClassCooker::error](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/error.md) &ndash; Throws an exception.
- [ClassCooker::getLines](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getLines.md) &ndash; Returns an array containing the lines of the class file.
- [ClassCooker::getTagsByLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getTagsByLine.md) &ndash; Returns the tags found in the given line.
- [ClassCooker::checkBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/checkBoundaries.md) &ndash; Checks that the boundaries are safe to work with, and throws an exception if that's not the case.
- [ClassCooker::getInnerContentByMethodSlice](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getInnerContentByMethodSlice.md) &ndash; Returns the inner content of a method by using a slice.





Location
=============
Ling\ClassCooker\ClassCooker<br>
See the source code of [Ling\ClassCooker\ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php)



SeeAlso
==============
Next class: [ClassCookerException](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Exception/ClassCookerException.md)<br>
