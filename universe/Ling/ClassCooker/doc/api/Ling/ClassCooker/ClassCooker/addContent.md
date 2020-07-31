[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\ClassCooker class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)


ClassCooker::addContent
================



ClassCooker::addContent — Adds a string to the class.




Description
================


public [ClassCooker::addContent](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addContent.md)(string $content, ?array $options = []) : void




Adds a string to the class.
The string can be any string that fits in a class: a method, multiple methods, a property, some comments, etc...

By default, the string is appended at the end of the class.
You can define the location where you want to add the string with the options.


Available options are:
- firstMethod: bool=false, if true, the string will be appended as the first method
- beforeMethod: string, the method before which to append the string
- afterMethod: string, the method after which to append the string

- beforeProperty: string, the property before which to append the string
- afterProperty: string, the property after which to append the string

- classStart: bool=false, the string will be appended at the beginning of the class


Note: in most of the cases, you want the content to end up with the PHP_EOL char,
otherwise this might lead to unexpected/weird results.




Parameters
================


- content

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ClassCooker::addContent](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php#L82-L174)


See Also
================

The [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) class.

Previous method: [setFile](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/setFile.md)<br>Next method: [addMethod](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addMethod.md)<br>

