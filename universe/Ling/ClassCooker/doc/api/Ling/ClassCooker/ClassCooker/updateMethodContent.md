[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\ClassCooker class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)


ClassCooker::updateMethodContent
================



ClassCooker::updateMethodContent — Updates the inner content of a method, using a callable.




Description
================


public [ClassCooker::updateMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateMethodContent.md)(string $methodName, callable $updator) : false | int




Updates the inner content of a method, using a callable.

The callable signature is:
- fn ( string innerContent ): string

It returns the updated method content.




Parameters
================


- methodName

    

- updator

    


Return values
================

Returns false | int.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ClassCooker::updateMethodContent](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php#L778-L816)


See Also
================

The [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) class.

Previous method: [removeMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/removeMethod.md)<br>Next method: [updateClassSignature](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updateClassSignature.md)<br>

