[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\SiteApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi.md)


SiteApi::delete
================



SiteApi::delete — Deletes the site rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [SiteApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the site rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [SiteApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/SiteApi.php#L330-L334)


See Also
================

The [SiteApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi.md) class.

Previous method: [updateSite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi/updateSite.md)<br>Next method: [deleteSiteById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi/deleteSiteById.md)<br>

