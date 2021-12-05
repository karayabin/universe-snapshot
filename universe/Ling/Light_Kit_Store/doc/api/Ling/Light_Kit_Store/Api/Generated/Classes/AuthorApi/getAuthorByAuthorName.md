[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\AuthorApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi.md)


AuthorApi::getAuthorByAuthorName
================



AuthorApi::getAuthorByAuthorName — Returns the author row identified by the given author_name.




Description
================


public [AuthorApi::getAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the author row identified by the given author_name.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- author_name

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [AuthorApi::getAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/AuthorApi.php#L170-L184)


See Also
================

The [AuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi.md) class.

Previous method: [getAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorById.md)<br>Next method: [getAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthor.md)<br>

