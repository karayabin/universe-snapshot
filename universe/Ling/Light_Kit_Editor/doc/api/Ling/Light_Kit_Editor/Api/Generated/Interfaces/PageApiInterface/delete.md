[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface.md)


PageApiInterface::delete
================



PageApiInterface::delete — Deletes the page rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [PageApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the page rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [PageApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/PageApiInterface.php#L275-L275)


See Also
================

The [PageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface.md) class.

Previous method: [updatePage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/updatePage.md)<br>Next method: [deletePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface/deletePageById.md)<br>

