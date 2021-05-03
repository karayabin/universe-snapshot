[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomSiteApiInterface class
================
2021-03-01 --> 2021-04-09






Introduction
============

The CustomSiteApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomSiteApiInterface</span> implements [SiteApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface.md) {

- Inherited methods
    - abstract public [SiteApiInterface::insertSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/insertSite.md)(array $site, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [SiteApiInterface::insertSites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/insertSites.md)(array $sites, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [SiteApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [SiteApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [SiteApiInterface::getSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [SiteApiInterface::getSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [SiteApiInterface::getSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSite.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [SiteApiInterface::getSites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSites.md)($where, ?array $markers = []) : array
    - abstract public [SiteApiInterface::getSitesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSitesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [SiteApiInterface::getSitesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSitesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [SiteApiInterface::getSitesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSitesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [SiteApiInterface::getSiteIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [SiteApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getAllIds.md)() : array
    - abstract public [SiteApiInterface::updateSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/updateSiteById.md)(int $id, array $site, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [SiteApiInterface::updateSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/updateSiteByIdentifier.md)(string $identifier, array $site, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [SiteApiInterface::updateSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/updateSite.md)(array $site, ?$where = null, ?array $markers = []) : void
    - abstract public [SiteApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [SiteApiInterface::deleteSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteById.md)(int $id) : void
    - abstract public [SiteApiInterface::deleteSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteByIdentifier.md)(string $identifier) : void
    - abstract public [SiteApiInterface::deleteSiteByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteByIds.md)(array $ids) : void
    - abstract public [SiteApiInterface::deleteSiteByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteByIdentifiers.md)(array $identifiers) : void

}






Methods
==============

- [SiteApiInterface::insertSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/insertSite.md) &ndash; Inserts the given site in the database.
- [SiteApiInterface::insertSites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/insertSites.md) &ndash; Inserts the given site rows in the database.
- [SiteApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [SiteApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [SiteApiInterface::getSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteById.md) &ndash; Returns the site row identified by the given id.
- [SiteApiInterface::getSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteByIdentifier.md) &ndash; Returns the site row identified by the given identifier.
- [SiteApiInterface::getSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSite.md) &ndash; Returns the site row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [SiteApiInterface::getSites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSites.md) &ndash; Returns the site rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [SiteApiInterface::getSitesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSitesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [SiteApiInterface::getSitesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSitesColumns.md) &ndash; Returns a subset of the site rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [SiteApiInterface::getSitesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSitesKey2Value.md) &ndash; Returns an array of $key => $value from the site rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [SiteApiInterface::getSiteIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getSiteIdByIdentifier.md) &ndash; Returns the id of the lke_site table.
- [SiteApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/getAllIds.md) &ndash; Returns an array of all site ids.
- [SiteApiInterface::updateSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/updateSiteById.md) &ndash; Updates the site row identified by the given id.
- [SiteApiInterface::updateSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/updateSiteByIdentifier.md) &ndash; Updates the site row identified by the given identifier.
- [SiteApiInterface::updateSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/updateSite.md) &ndash; Updates the site row.
- [SiteApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/delete.md) &ndash; Deletes the site rows matching the given where conditions, and returns the number of deleted rows.
- [SiteApiInterface::deleteSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteById.md) &ndash; Deletes the site identified by the given id.
- [SiteApiInterface::deleteSiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteByIdentifier.md) &ndash; Deletes the site identified by the given identifier.
- [SiteApiInterface::deleteSiteByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteByIds.md) &ndash; Deletes the site rows identified by the given ids.
- [SiteApiInterface::deleteSiteByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/SiteApiInterface/deleteSiteByIdentifiers.md) &ndash; Deletes the site rows identified by the given identifiers.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomSiteApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomSiteApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomSiteApiInterface.php)



SeeAlso
==============
Previous class: [CustomPageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageHasBlockApiInterface.md)<br>Next class: [CustomWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomWidgetApiInterface.md)<br>
