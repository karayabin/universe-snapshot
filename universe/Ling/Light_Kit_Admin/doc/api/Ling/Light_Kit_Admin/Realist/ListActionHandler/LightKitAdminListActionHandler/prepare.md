[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)


LightKitAdminListActionHandler::prepare
================



LightKitAdminListActionHandler::prepare — by a renderer to display that item in the gui).




Description
================


public [LightKitAdminListActionHandler::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false




Decorates the given [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md) identified by the given action name (which will be used
by a renderer to display that item in the gui).

If the handler discards the item (typically because the user doesn't have the right
to execute it), then this method returns false.




Parameters
================


- actionName

    

- genericActionItem

    

- requestId

    


Return values
================

Returns null | false.








Source Code
===========
See the source code for method [LightKitAdminListActionHandler::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php#L27-L57)


See Also
================

The [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md) class.

Next method: [execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/execute.md)<br>

