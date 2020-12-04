[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)<br>
[Back to the Ling\Light_Kit_Admin_UserData\Light_Kit_Admin\Duplicator\LightKitAdminUserDataDuplicator class](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_Kit_Admin/Duplicator/LightKitAdminUserDataDuplicator.md)


LightKitAdminUserDataDuplicator::onInsertAfter
================



LightKitAdminUserDataDuplicator::onInsertAfter — Is executed after a row is duplicated.




Description
================


public [LightKitAdminUserDataDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_Kit_Admin/Duplicator/LightKitAdminUserDataDuplicator/onInsertAfter.md)(string $mainTable, string $table, array $oldRow, array $newRow, ?$lastInsertId = null) : void




Is executed after a row is duplicated.
It's a hook for devs.




Parameters
================


- mainTable

    

- table

    

- oldRow

    

- newRow

    

- lastInsertId

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitAdminUserDataDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Light_Kit_Admin/Duplicator/LightKitAdminUserDataDuplicator.php#L18-L27)


See Also
================

The [LightKitAdminUserDataDuplicator](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_Kit_Admin/Duplicator/LightKitAdminUserDataDuplicator.md) class.



