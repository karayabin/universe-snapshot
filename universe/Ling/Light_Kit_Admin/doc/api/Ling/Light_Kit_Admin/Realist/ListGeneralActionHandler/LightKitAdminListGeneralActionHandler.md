[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminListGeneralActionHandler class
================
2019-05-17 --> 2020-07-07






Introduction
============

The LightKitAdminListGeneralActionHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminListGeneralActionHandler</span> extends [LightRealistBaseListGeneralActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightRealistListGeneralActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light_Realist\ListGeneralActionHandler\LightServiceContainerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightServiceContainerInterface.md) [LightRealistBaseListGeneralActionHandler::$container](#property-container) ;
    - protected string [LightRealistBaseListGeneralActionHandler::$csrfTokenPrefix](#property-csrfTokenPrefix) ;
    - protected string [LightRealistBaseListGeneralActionHandler::$pluginName](#property-pluginName) ;

- Methods
    - public [prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false
    - public [execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/execute.md)(string $actionName, array $params) : array
    - protected [executeGenerateRandomRowsListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/executeGenerateRandomRowsListGeneralAction.md)(string $actionId, array $params) : array
    - protected [executeSaveTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/executeSaveTableListGeneralAction.md)(string $actionId, array $params) : array
    - protected [executeLoadTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/executeLoadTableListGeneralAction.md)(string $actionId, array $params) : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/error.md)(string $message) : void

- Inherited methods
    - public LightRealistBaseListGeneralActionHandler::__construct() : void
    - public LightRealistBaseListGeneralActionHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightRealistBaseListGeneralActionHandler::decorateGenericActionItemByAssets(string $actionName, array &$item, string $requestId, string $dir, ?array $options = []) : void
    - protected LightRealistBaseListGeneralActionHandler::getTableNameByRequestId(string $requestId) : string
    - protected LightRealistBaseListGeneralActionHandler::hasMicroPermission(string $microPermission) : bool
    - protected LightRealistBaseListGeneralActionHandler::checkMicroPermission(string $microPermission) : void
    - protected LightRealistBaseListGeneralActionHandler::getPluginName() : string

}






Methods
==============

- [LightKitAdminListGeneralActionHandler::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/prepare.md) &ndash; by a renderer to display that item in the gui).
- [LightKitAdminListGeneralActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/execute.md) &ndash; Executes the list general action (called via ajax) identified by the given action name and returns the ajax response.
- [LightKitAdminListGeneralActionHandler::executeGenerateRandomRowsListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/executeGenerateRandomRowsListGeneralAction.md) &ndash; Executes the generate random rows list general action and returns the result.
- [LightKitAdminListGeneralActionHandler::executeSaveTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/executeSaveTableListGeneralAction.md) &ndash; Saves the table data in the form of inserts statements, and put the resulting sql file in the user assets.
- [LightKitAdminListGeneralActionHandler::executeLoadTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/executeLoadTableListGeneralAction.md) &ndash; which we assume are mostly insert statements.
- [LightKitAdminListGeneralActionHandler::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler/error.md) &ndash; Throws an error message.
- LightRealistBaseListGeneralActionHandler::__construct &ndash; Builds the LightRealistBaseListActionHandler instance.
- LightRealistBaseListGeneralActionHandler::setContainer &ndash; Sets the container.
- LightRealistBaseListGeneralActionHandler::decorateGenericActionItemByAssets &ndash; the calling class source file.
- LightRealistBaseListGeneralActionHandler::getTableNameByRequestId &ndash; Returns the table name associated with the given requestId.
- LightRealistBaseListGeneralActionHandler::hasMicroPermission &ndash; Returns whether the current user is granted the given micro-permission.
- LightRealistBaseListGeneralActionHandler::checkMicroPermission &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- LightRealistBaseListGeneralActionHandler::getPluginName &ndash; Returns the plugin name for this instance.





Location
=============
Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler<br>
See the source code of [Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.php)



SeeAlso
==============
Previous class: [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)<br>Next class: [LightKitAdminRealistListRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListRenderer.md)<br>
