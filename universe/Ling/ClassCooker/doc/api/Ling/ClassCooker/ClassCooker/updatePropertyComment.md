[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\ClassCooker class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)


ClassCooker::updatePropertyComment
================



ClassCooker::updatePropertyComment — Updates the [docblock comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/docblock-comment.md) of the given property (if there is one), using the given callable.




Description
================


public [ClassCooker::updatePropertyComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/updatePropertyComment.md)(string $propertyName, callable $fn, ?array $options = []) : void




Updates the [docblock comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/docblock-comment.md) of the given property (if there is one), using the given callable.

The given callable takes the old comment as input, and must return the new comment.

This method will return false if the property doesn't exist or if it doesn't have a block comment.

Otherwise it returns true.


Available options are:
- guessExtraSpacing: bool=true, when the comment is extracted from its class, it's stripped.
     Therefore, when we paste it back in place, the whitespaces before and after the comment are removed and
     it results in an ugly file (although functional).
     To remedy this, this method makes a guess about what those whitespaces were, basically adding
     4 spaces before the comment, and a PHP_EOL after.
     You can disable this behaviour to have complete control over that extra-spacing.




Parameters
================


- propertyName

    

- fn

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ClassCooker::updatePropertyComment](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php#L929-L957)


See Also
================

The [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) class.

Previous method: [addParentClass](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addParentClass.md)<br>Next method: [error](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/error.md)<br>

