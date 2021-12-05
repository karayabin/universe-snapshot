[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\AuthorApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi.md)


AuthorApi::getAuthorIdByAuthorName
================



AuthorApi::getAuthorIdByAuthorName — Returns the id of the lks_author table.




Description
================


public [AuthorApi::getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorIdByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




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
See the source code for method [AuthorApi::getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/AuthorApi.php#L272-L287)


See Also
================

The [AuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi.md) class.

Previous method: [getAuthorsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsKey2Value.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAllIds.md)<br>

