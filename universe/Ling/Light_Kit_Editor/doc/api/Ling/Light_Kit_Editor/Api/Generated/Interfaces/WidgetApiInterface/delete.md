[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\WidgetApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface.md)


WidgetApiInterface::delete
================



WidgetApiInterface::delete — Deletes the widget rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [WidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the widget rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [WidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/WidgetApiInterface.php#L321-L321)


See Also
================

The [WidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface.md) class.

Previous method: [updateWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidget.md)<br>Next method: [deleteWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetById.md)<br>

