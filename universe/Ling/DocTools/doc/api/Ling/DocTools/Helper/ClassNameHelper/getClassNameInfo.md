[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Helper\ClassNameHelper class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/ClassNameHelper.md)


ClassNameHelper::getClassNameInfo
================



ClassNameHelper::getClassNameInfo — Returns an array of info corresponding to the given $className, or returns false if the url cannot be found.




Description
================


public static [ClassNameHelper::getClassNameInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/ClassNameHelper/getClassNameInfo.md)(string $className, [\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) $class, array $generatedItems2Url, array $includeReferences, ?&$useStatementFound = null) : false | array




Returns an array of info corresponding to the given $className, or returns false if the url cannot be found.

The array structure is:

- 0: class short name
- 1: class long name
- 2: url to the generated documentation


This method will first resolve the given class name, which is a class name written in a doc comment file,
meaning it can have multiple forms:

- a fully qualified class name, starting with a backslash, for instance \Exception, \Ling\Bat\BatException
- an explicit class name alias defined in the use statements at the top of the class file
- an implicit class name alias using the namespace of the class
- an class name alias defined in a parent class (happens when the class uses the "@implementation" or "@overrides" tags).

When the class name is resolved, this method then look whether it's in the given $generatedItems2Url array.
If it is, it returns the array described above, if not it returns false.




Parameters
================


- className

    

- class

    

- generatedItems2Url

    

- includeReferences

    Array of long class names referenced by the "@implementation" or "@overrides" tags, if used at all.

- useStatementFound

    If the method returns false, but a use statement was matching, then this use statement (which is a class long name)
will feed the $useStatementFound argument.


Return values
================

Returns false | array.








Source Code
===========
See the source code for method [ClassNameHelper::getClassNameInfo](https://github.com/lingtalfi/DocTools/blob/master/Helper/ClassNameHelper.php#L54-L193)


See Also
================

The [ClassNameHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/ClassNameHelper.md) class.



