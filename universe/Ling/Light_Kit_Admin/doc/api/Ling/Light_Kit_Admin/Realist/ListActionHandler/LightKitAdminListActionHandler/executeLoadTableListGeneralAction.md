[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)


LightKitAdminListActionHandler::executeLoadTableListGeneralAction
================



LightKitAdminListActionHandler::executeLoadTableListGeneralAction — which we assume are mostly insert statements.




Description
================


protected [LightKitAdminListActionHandler::executeLoadTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeLoadTableListGeneralAction.md)(string $actionId, array $params) : array




Executes the sql statements found in the given table backup (in the params),
which we assume are mostly insert statements.




Parameters
================


- actionId

    

- params

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitAdminListActionHandler::executeLoadTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php#L647-L695)


See Also
================

The [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md) class.

Previous method: [executeSaveTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeSaveTableListGeneralAction.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/error.md)<br>

