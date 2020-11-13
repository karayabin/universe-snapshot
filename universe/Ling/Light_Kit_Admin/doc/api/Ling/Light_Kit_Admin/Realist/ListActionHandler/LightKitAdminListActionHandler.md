[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminListActionHandler class
================
2019-05-17 --> 2020-08-21






Introduction
============

The LightKitAdminListActionHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminListActionHandler</span> extends [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light_Realist\ListActionHandler\LightServiceContainerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightServiceContainerInterface.md) [LightRealistBaseListActionHandler::$container](#property-container) ;
    - protected string [LightRealistBaseListActionHandler::$csrfTokenPrefix](#property-csrfTokenPrefix) ;
    - protected string [LightRealistBaseListActionHandler::$pluginName](#property-pluginName) ;

- Methods
    - public [prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false
    - public [execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/execute.md)(string $actionName, array $params) : array
    - protected [executeDeleteRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDeleteRowsListAction.md)(string $actionId, array $params) : array
    - protected [executeRowsToSomethingListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeRowsToSomethingListAction.md)(string $actionId, string $extension, array $params) : array
    - protected [executePrintListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executePrintListAction.md)(string $actionId, array $params) : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/error.md)(string $message) : void
    - protected [getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getInRicsTags.md)(array $rics, array $configuration) : array
    - protected [getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getWhereByRics.md)(array $rics, array $userRics, array &$markers) : string
    - private [executeFetchAllRequestByActionId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeFetchAllRequestByActionId.md)(string $actionId, array $params) : array

- Inherited methods
    - public LightRealistBaseListActionHandler::__construct() : void
    - public LightRealistBaseListActionHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightRealistBaseListActionHandler::decorateGenericActionItemByAssets(string $actionName, array &$item, string $requestId, string $dir, ?array $options = []) : void
    - protected LightRealistBaseListActionHandler::getTableNameByRequestId(string $requestId) : string
    - protected LightRealistBaseListActionHandler::hasMicroPermission(string $microPermission) : bool
    - protected LightRealistBaseListActionHandler::checkMicroPermission(string $microPermission) : void
    - protected LightRealistBaseListActionHandler::getPluginName() : string

}






Methods
==============

- [LightKitAdminListActionHandler::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/prepare.md) &ndash; by a renderer to display that item in the gui).
- [LightKitAdminListActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/execute.md) &ndash; Executes the list action (called via ajax) identified by the given action name and returns the ajax response.
- [LightKitAdminListActionHandler::executeDeleteRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDeleteRowsListAction.md) &ndash; Executes the "delete rows" action and returns the result.
- [LightKitAdminListActionHandler::executeRowsToSomethingListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeRowsToSomethingListAction.md) &ndash; from the browser.
- [LightKitAdminListActionHandler::executePrintListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executePrintListAction.md) &ndash; Executes the "print" action and returns the result.
- [LightKitAdminListActionHandler::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/error.md) &ndash; Throws an error message.
- [LightKitAdminListActionHandler::getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getInRicsTags.md) &ndash; Returns an array containing one [in_rics tag](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist-conception-notes.md#in_rics) per item in the given rics array.
- [LightKitAdminListActionHandler::getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getWhereByRics.md) &ndash; rics.
- [LightKitAdminListActionHandler::executeFetchAllRequestByActionId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeFetchAllRequestByActionId.md) &ndash; Returns the result of the LightRealistService->executeRequestById method.
- LightRealistBaseListActionHandler::__construct &ndash; Builds the LightRealistBaseListActionHandler instance.
- LightRealistBaseListActionHandler::setContainer &ndash; Sets the container.
- LightRealistBaseListActionHandler::decorateGenericActionItemByAssets &ndash; the calling class source file.
- LightRealistBaseListActionHandler::getTableNameByRequestId &ndash; Returns the table name associated with the given requestId.
- LightRealistBaseListActionHandler::hasMicroPermission &ndash; Returns whether the current user is granted the given micro-permission.
- LightRealistBaseListActionHandler::checkMicroPermission &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- LightRealistBaseListActionHandler::getPluginName &ndash; Returns the plugin name for this instance.





Location
=============
Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler<br>
See the source code of [Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php)



SeeAlso
==============
Previous class: [LightKitAdminRealistActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ActionHandler/LightKitAdminRealistActionHandler.md)<br>Next class: [LightKitAdminListGeneralActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.md)<br>
