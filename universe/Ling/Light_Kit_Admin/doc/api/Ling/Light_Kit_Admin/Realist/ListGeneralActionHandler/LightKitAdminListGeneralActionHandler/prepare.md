[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.md)


LightKitAdminListGeneralActionHandler::prepare
================



LightKitAdminListGeneralActionHandler::prepare — by a renderer to display that item in the gui).




Description
================


public [LightKitAdminListGeneralActionHandler::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false




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
See the source code for method [LightKitAdminListGeneralActionHandler::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.php#L28-L68)


See Also
================

The [LightKitAdminListGeneralActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.md) class.

Next method: [execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/execute.md)<br>

