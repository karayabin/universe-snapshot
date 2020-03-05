[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)


LightKitAdminListActionHandler::getWhereByRics
================



LightKitAdminListActionHandler::getWhereByRics — rics.




Description
================


protected [LightKitAdminListActionHandler::getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getWhereByRics.md)(array $rics, array $userRics, array &$markers) : string




Returns the where part of an sql query (where keyword excluded) based on the given
rics.
Also feeds the pdo markers array.

It returns a string that looks like this for instance (parenthesis are part of the returned string)):

- (
     (user_id like '1' AND permission_group_id like '5')
     OR (user_id like '3' AND permission_group_id like '4')
     ...
  )


The given rics is an array of ric column names,
whereas the given userRics is an array of items, each of which representing a row and
being an array of (ric) column to value.




Parameters
================


- rics

    

- userRics

    

- markers

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightKitAdminListActionHandler::getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php#L511-L542)


See Also
================

The [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md) class.

Previous method: [getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getInRicsTags.md)<br>Next method: [executeFetchAllRequestByActionId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeFetchAllRequestByActionId.md)<br>

