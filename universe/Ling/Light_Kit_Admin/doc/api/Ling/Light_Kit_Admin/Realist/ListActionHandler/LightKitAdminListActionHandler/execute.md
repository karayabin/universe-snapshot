[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)


LightKitAdminListActionHandler::execute
================



LightKitAdminListActionHandler::execute — Executes the list action (called via ajax) identified by the given action id and returns the ajax response in alcp format.




Description
================


public [LightKitAdminListActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/execute.md)(string $actionId, ?array $params = []) : array




Executes the list action (called via ajax) identified by the given action id and returns the ajax response in alcp format.
See more about [alcp protocol](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md).




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
See the source code for method [LightKitAdminListActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php#L173-L242)


See Also
================

The [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md) class.

Previous method: [prepareListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/prepareListAction.md)<br>Next method: [executeDeleteRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDeleteRowsListAction.md)<br>

