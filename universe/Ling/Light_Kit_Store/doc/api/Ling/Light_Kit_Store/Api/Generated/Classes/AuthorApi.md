[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The AuthorApi class
================
2021-04-06 --> 2021-08-02






Introduction
============

The AuthorApi class.



Class synopsis
==============


class <span class="pl-k">AuthorApi</span> extends [CustomLightKitStoreBaseApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomLightKitStoreBaseApi.md) implements [AuthorApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/AuthorApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/__construct.md)() : void
    - public [insertAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/insertAuthor.md)(array $author, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/insertAuthors.md)(array $authors, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/fetch.md)(?array $components = []) : array
    - public [getAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthor.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthors.md)($where, ?array $markers = []) : array
    - public [getAuthorsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getAuthorsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getAuthorsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorIdByAuthorName.md)(string $author_name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAllIds.md)() : array
    - public [updateAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/updateAuthorById.md)(int $id, array $author, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/updateAuthorByAuthorName.md)(string $author_name, array $author, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/updateAuthor.md)(array $author, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorById.md)(int $id) : void
    - public [deleteAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorByAuthorName.md)(string $author_name) : void
    - public [deleteAuthorByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorByIds.md)(array $ids) : void
    - public [deleteAuthorByAuthorNames](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorByAuthorNames.md)(array $author_names) : void
    - protected [getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getDefaultValues.md)() : array
    - protected [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/fetchRoutine.md)(string &$q, array &$markers, array $components, ?array $options = []) : array

- Inherited methods
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [AuthorApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/__construct.md) &ndash; Builds the AuthorApi instance.
- [AuthorApi::insertAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/insertAuthor.md) &ndash; Inserts the given author in the database.
- [AuthorApi::insertAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/insertAuthors.md) &ndash; Inserts the given author rows in the database.
- [AuthorApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [AuthorApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [AuthorApi::getAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorById.md) &ndash; Returns the author row identified by the given id.
- [AuthorApi::getAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorByAuthorName.md) &ndash; Returns the author row identified by the given author_name.
- [AuthorApi::getAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthor.md) &ndash; Returns the author row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApi::getAuthors](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthors.md) &ndash; Returns the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApi::getAuthorsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApi::getAuthorsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsColumns.md) &ndash; Returns a subset of the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApi::getAuthorsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorsKey2Value.md) &ndash; Returns an array of $key => $value from the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [AuthorApi::getAuthorIdByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAuthorIdByAuthorName.md) &ndash; Returns the id of the lks_author table.
- [AuthorApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getAllIds.md) &ndash; Returns an array of all author ids.
- [AuthorApi::updateAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/updateAuthorById.md) &ndash; Updates the author row identified by the given id.
- [AuthorApi::updateAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/updateAuthorByAuthorName.md) &ndash; Updates the author row identified by the given author_name.
- [AuthorApi::updateAuthor](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/updateAuthor.md) &ndash; Updates the author row.
- [AuthorApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/delete.md) &ndash; Deletes the author rows matching the given where conditions, and returns the number of deleted rows.
- [AuthorApi::deleteAuthorById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorById.md) &ndash; Deletes the author identified by the given id.
- [AuthorApi::deleteAuthorByAuthorName](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorByAuthorName.md) &ndash; Deletes the author identified by the given author_name.
- [AuthorApi::deleteAuthorByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorByIds.md) &ndash; Deletes the author rows identified by the given ids.
- [AuthorApi::deleteAuthorByAuthorNames](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/deleteAuthorByAuthorNames.md) &ndash; Deletes the author rows identified by the given author_names.
- [AuthorApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/getDefaultValues.md) &ndash; Returns the array of default values for this instance.
- [AuthorApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Classes\AuthorApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Classes\AuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/AuthorApi.php)



SeeAlso
==============
Previous class: [CustomUserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.md)<br>Next class: [InvoiceApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/InvoiceApi.md)<br>
