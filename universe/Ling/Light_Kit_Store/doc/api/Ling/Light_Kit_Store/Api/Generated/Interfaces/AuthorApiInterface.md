[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The AuthorApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The AuthorApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">AuthorApiInterface</span>  {

- Methods
    - abstract public [insertAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/insertAuthor.md)(array $author, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/insertAuthors.md)(array $authors, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthor.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthors.md)($where, ?array $markers = []) : array
    - abstract public [getAuthorsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getAuthorsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getAuthorsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorIdByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAllIds.md)() : array
    - abstract public [updateAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/updateAuthorById.md)(int $id, array $author, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/updateAuthorByAuthorName.md)(string $author_name, array $author, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/updateAuthor.md)(array $author, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorById.md)(int $id) : void
    - abstract public [deleteAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorByAuthorName.md)(string $author_name) : void
    - abstract public [deleteAuthorByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorByIds.md)(array $ids) : void
    - abstract public [deleteAuthorByAuthorNames](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorByAuthorNames.md)(array $author_names) : void

}






Methods
==============

- [AuthorApiInterface::insertAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/insertAuthor.md) &ndash; Inserts the given author in the database.
- [AuthorApiInterface::insertAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/insertAuthors.md) &ndash; Inserts the given author rows in the database.
- [AuthorApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [AuthorApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [AuthorApiInterface::getAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorById.md) &ndash; Returns the author row identified by the given id.
- [AuthorApiInterface::getAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorByAuthorName.md) &ndash; Returns the author row identified by the given author_name.
- [AuthorApiInterface::getAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthor.md) &ndash; Returns the author row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApiInterface::getAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthors.md) &ndash; Returns the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApiInterface::getAuthorsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApiInterface::getAuthorsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsColumns.md) &ndash; Returns a subset of the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApiInterface::getAuthorsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorsKey2Value.md) &ndash; Returns an array of $key => $value from the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApiInterface::getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAuthorIdByAuthorName.md) &ndash; Returns the id of the lks_author table.
- [AuthorApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/getAllIds.md) &ndash; Returns an array of all author ids.
- [AuthorApiInterface::updateAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/updateAuthorById.md) &ndash; Updates the author row identified by the given id.
- [AuthorApiInterface::updateAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/updateAuthorByAuthorName.md) &ndash; Updates the author row identified by the given author_name.
- [AuthorApiInterface::updateAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/updateAuthor.md) &ndash; Updates the author row.
- [AuthorApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/delete.md) &ndash; Deletes the author rows matching the given where conditions, and returns the number of deleted rows.
- [AuthorApiInterface::deleteAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorById.md) &ndash; Deletes the author identified by the given id.
- [AuthorApiInterface::deleteAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorByAuthorName.md) &ndash; Deletes the author identified by the given author_name.
- [AuthorApiInterface::deleteAuthorByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorByIds.md) &ndash; Deletes the author rows identified by the given ids.
- [AuthorApiInterface::deleteAuthorByAuthorNames](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface/deleteAuthorByAuthorNames.md) &ndash; Deletes the author rows identified by the given author_names.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Interfaces\AuthorApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Interfaces\AuthorApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/AuthorApiInterface.php)



SeeAlso
==============
Previous class: [UserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi.md)<br>Next class: [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md)<br>
