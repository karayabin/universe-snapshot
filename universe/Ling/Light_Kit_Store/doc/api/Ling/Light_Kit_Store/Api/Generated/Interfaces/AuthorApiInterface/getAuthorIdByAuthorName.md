[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\AuthorApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface.md)


AuthorApiInterface::getAuthorIdByAuthorName
================



AuthorApiInterface::getAuthorIdByAuthorName — Returns the id of the lks_author table.




Description
================


abstract public [AuthorApiInterface::getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorIdByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lks_author table.

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

Returns string | mixed.








Source Code
===========
See the source code for method [AuthorApiInterface::getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/AuthorApiInterface.php#L204-L204)


See Also
================

The [AuthorApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface.md) class.

Previous method: [getAuthorsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsKey2Value.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAllIds.md)<br>

