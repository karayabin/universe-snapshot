[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\Helper\ClassCookerHelper class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper.md)


ClassCookerHelper::getMethodsBoundaries
================



ClassCookerHelper::getMethodsBoundaries — Returns an array of method => [startLine, endLine].




Description
================


public static [ClassCookerHelper::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md)(string $file, ?array $signatureTags = []) : array




Returns an array of method => [startLine, endLine].

This method will get the startLine and endLine number of every methods it finds.
However, in order for this method to work correctly, the class needs to be formatted in a certain way:

- there must be only one class in the file
- the class ends with a proper } (end curly bracket) on its own line (possibly surrounded with whitespaces)
- the method signature is on its own line, and only one line (not split in multiple lines)
- a method ends with a proper } (end curly bracket) on its own line (possibly surrounded with whitespaces)


$signatureTags: array of desired tags, a tag can be one of the following:
                     - public
                     - protected
                     - private
                     - static




Parameters
================


- file

    

- signatureTags

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ClassCookerHelper::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/Helper/ClassCookerHelper.php#L103-L189)


See Also
================

The [ClassCookerHelper](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper.md) class.

Previous method: [getSectionLineNumber](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getSectionLineNumber.md)<br>Next method: [getTagsByLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getTagsByLine.md)<br>

