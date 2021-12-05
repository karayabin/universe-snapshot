[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The PageApiInterface class
================
2021-03-01 --> 2021-08-03






Introduction
============

The PageApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PageApiInterface</span>  {

- Methods
    - abstract public [insertPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/insertPage.md)(array $page, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/insertPages.md)(array $pages, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPage.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPages.md)($where, ?array $markers = []) : array
    - abstract public [getPagesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getPagesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getPagesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getPageIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getAllIds.md)() : array
    - abstract public [updatePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePageById.md)(int $id, array $page, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updatePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePageByIdentifier.md)(string $identifier, array $page, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updatePage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePage.md)(array $page, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deletePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageById.md)(int $id) : void
    - abstract public [deletePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIdentifier.md)(string $identifier) : void
    - abstract public [deletePageByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIds.md)(array $ids) : void
    - abstract public [deletePageByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIdentifiers.md)(array $identifiers) : void
    - abstract public [deletePageBySiteId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageBySiteId.md)(int $siteId) : void

}






Methods
==============

- [PageApiInterface::insertPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/insertPage.md) &ndash; Inserts the given page in the database.
- [PageApiInterface::insertPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/insertPages.md) &ndash; Inserts the given page rows in the database.
- [PageApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PageApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PageApiInterface::getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageById.md) &ndash; Returns the page row identified by the given id.
- [PageApiInterface::getPageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageByIdentifier.md) &ndash; Returns the page row identified by the given identifier.
- [PageApiInterface::getPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPage.md) &ndash; Returns the page row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApiInterface::getPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPages.md) &ndash; Returns the page rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApiInterface::getPagesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApiInterface::getPagesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesColumns.md) &ndash; Returns a subset of the page rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApiInterface::getPagesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesKey2Value.md) &ndash; Returns an array of $key => $value from the page rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApiInterface::getPageIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageIdByIdentifier.md) &ndash; Returns the id of the lke_page table.
- [PageApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getAllIds.md) &ndash; Returns an array of all page ids.
- [PageApiInterface::updatePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePageById.md) &ndash; Updates the page row identified by the given id.
- [PageApiInterface::updatePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePageByIdentifier.md) &ndash; Updates the page row identified by the given identifier.
- [PageApiInterface::updatePage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePage.md) &ndash; Updates the page row.
- [PageApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/delete.md) &ndash; Deletes the page rows matching the given where conditions, and returns the number of deleted rows.
- [PageApiInterface::deletePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageById.md) &ndash; Deletes the page identified by the given id.
- [PageApiInterface::deletePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIdentifier.md) &ndash; Deletes the page identified by the given identifier.
- [PageApiInterface::deletePageByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIds.md) &ndash; Deletes the page rows identified by the given ids.
- [PageApiInterface::deletePageByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIdentifiers.md) &ndash; Deletes the page rows identified by the given identifiers.
- [PageApiInterface::deletePageBySiteId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageBySiteId.md) &ndash; Deletes the page rows having the given site id.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/PageApiInterface.php)



SeeAlso
==============
Previous class: [BlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface.md)<br>Next class: [PageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface.md)<br>
