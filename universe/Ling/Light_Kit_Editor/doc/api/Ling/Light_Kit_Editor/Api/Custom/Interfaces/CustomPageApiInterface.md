[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomPageApiInterface class
================
2021-03-01 --> 2021-08-03






Introduction
============

The CustomPageApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPageApiInterface</span> implements [PageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface.md) {

- Methods
    - abstract public [getAllWidgetsByPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface/getAllWidgetsByPage.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed

- Inherited methods
    - abstract public [PageApiInterface::insertPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/insertPage.md)(array $page, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PageApiInterface::insertPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/insertPages.md)(array $pages, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PageApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [PageApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [PageApiInterface::getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageApiInterface::getPageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageApiInterface::getPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPage.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageApiInterface::getPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPages.md)($where, ?array $markers = []) : array
    - abstract public [PageApiInterface::getPagesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PageApiInterface::getPagesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PageApiInterface::getPagesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPagesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PageApiInterface::getPageIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getPageIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [PageApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/getAllIds.md)() : array
    - abstract public [PageApiInterface::updatePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePageById.md)(int $id, array $page, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PageApiInterface::updatePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePageByIdentifier.md)(string $identifier, array $page, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PageApiInterface::updatePage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePage.md)(array $page, ?$where = null, ?array $markers = []) : void
    - abstract public [PageApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PageApiInterface::deletePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageById.md)(int $id) : void
    - abstract public [PageApiInterface::deletePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIdentifier.md)(string $identifier) : void
    - abstract public [PageApiInterface::deletePageByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIds.md)(array $ids) : void
    - abstract public [PageApiInterface::deletePageByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageByIdentifiers.md)(array $identifiers) : void
    - abstract public [PageApiInterface::deletePageBySiteId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageBySiteId.md)(int $siteId) : void

}






Methods
==============

- [CustomPageApiInterface::getAllWidgetsByPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface/getAllWidgetsByPage.md) &ndash; Returns all rows owned by the page identified by the given identifier.
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
Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomPageApiInterface.php)



SeeAlso
==============
Previous class: [CustomBlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomBlockHasWidgetApiInterface.md)<br>Next class: [CustomPageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageHasBlockApiInterface.md)<br>
