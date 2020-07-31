[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\ClassCooker class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)


ClassCooker::addMethod
================



ClassCooker::addMethod — Adds the given method(s) to a class if it doesn't exist.




Description
================


public [ClassCooker::addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addMethod.md)($methodName, $content, ?array $options = []) : false | void




Adds the given method(s) to a class if it doesn't exist.

By default, it's appended at the end of the class, but you can decide to put it after a given method, using
the afterMethod option.

By default if the method already exists, an exception will be thrown.
You can change this behaviour using the throwEx option.


Available options are:
- afterMethod: string, the name of the method after which you wish to add the new method
- throwEx: bool=true, whether to throw an exception if the given methodName already exists in the class.
     If false and the method already exists, the method will return false.




Parameters
================


- methodName

    

- content

    

- options

    


Return values
================

Returns false | void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ClassCooker::addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php#L200-L211)


See Also
================

The [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) class.

Previous method: [addContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addContent.md)<br>Next method: [addProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addProperty.md)<br>

