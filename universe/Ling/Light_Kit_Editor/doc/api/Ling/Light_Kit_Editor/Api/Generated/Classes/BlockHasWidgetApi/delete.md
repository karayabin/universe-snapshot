[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\BlockHasWidgetApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi.md)


BlockHasWidgetApi::delete
================



BlockHasWidgetApi::delete — Deletes the blockHasWidget rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [BlockHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the blockHasWidget rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [BlockHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/BlockHasWidgetApi.php#L277-L281)


See Also
================

The [BlockHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi.md) class.

Previous method: [updateBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/updateBlockHasWidget.md)<br>Next method: [deleteBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetById.md)<br>

