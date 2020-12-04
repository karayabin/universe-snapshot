[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminListActionHandler class
================
2019-05-17 --> 2020-12-01






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
    - public [doWeShowTrigger](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/doWeShowTrigger.md)(string $actionId, string $requestId) : bool
    - public [prepareListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/prepareListAction.md)(string $actionId, string $requestId, array &$listAction) : void
    - public [execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/execute.md)(string $actionId, ?array $params = []) : array
    - protected [executeDeleteRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDeleteRowsListAction.md)(string $actionId, array $params) : array
    - protected [executeDuplicateRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDuplicateRowsListAction.md)(array $params) : array
    - protected [executeRowsToSomethingListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeRowsToSomethingListAction.md)(string $actionId, string $extension, array $params) : array
    - protected [executePrintListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executePrintListAction.md)(string $actionId, array $params) : array
    - protected [executeGenerateRandomRowsListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeGenerateRandomRowsListGeneralAction.md)(string $actionId, array $params) : array
    - protected [executeSaveTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeSaveTableListGeneralAction.md)(string $actionId, array $params) : array
    - protected [executeLoadTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeLoadTableListGeneralAction.md)(string $actionId, array $params) : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/error.md)(string $message) : void
    - protected [getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getInRicsTags.md)(array $rics, array $configuration) : array
    - protected [getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getWhereByRics.md)(array $rics, array $userRics, array &$markers) : string
    - private [executeFetchAllRequestByActionId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeFetchAllRequestByActionId.md)(string $actionId, array $params) : array
    - private [getParam](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getParam.md)(string $name, array $params) : mixed
    - private [getTableBackupDir](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getTableBackupDir.md)(string $table) : string
    - private [selectiveMerge](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/selectiveMerge.md)(array $arr1, array $arr2, array $keys) : array

- Inherited methods
    - public LightRealistBaseListActionHandler::__construct() : void
    - public LightRealistBaseListActionHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightRealistBaseListActionHandler::decorateGenericActionItemByAssets(string $actionName, array &$item, string $dir, ?array $options = []) : void
    - protected LightRealistBaseListActionHandler::getTableNameByRequestId(string $requestId) : string
    - protected LightRealistBaseListActionHandler::getPlanetIdByRequestId(string $requestId) : string
    - protected LightRealistBaseListActionHandler::hasMicroPermission(string $microPermission) : bool
    - protected LightRealistBaseListActionHandler::checkMicroPermission(string $microPermission) : void
    - protected LightRealistBaseListActionHandler::getPluginName() : string

}






Methods
==============

- [LightKitAdminListActionHandler::doWeShowTrigger](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/doWeShowTrigger.md) &ndash; Returns whether we should display the trigger of the action identified by actionId to the current user.
- [LightKitAdminListActionHandler::prepareListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/prepareListAction.md) &ndash; Prepares the given listAction for the given actionId.
- [LightKitAdminListActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/execute.md) &ndash; Executes the list action (called via ajax) identified by the given action id and returns the ajax response in alcp format.
- [LightKitAdminListActionHandler::executeDeleteRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDeleteRowsListAction.md) &ndash; Executes the "delete rows" action and returns the result.
- [LightKitAdminListActionHandler::executeDuplicateRowsListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeDuplicateRowsListAction.md) &ndash; Duplicates the row(s) identified via the given rics (via params), and returns an [alcp](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) response.
- [LightKitAdminListActionHandler::executeRowsToSomethingListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeRowsToSomethingListAction.md) &ndash; from the browser.
- [LightKitAdminListActionHandler::executePrintListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executePrintListAction.md) &ndash; Executes the "print" action and returns the result.
- [LightKitAdminListActionHandler::executeGenerateRandomRowsListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeGenerateRandomRowsListGeneralAction.md) &ndash; Executes the generate random rows list general action and returns the result.
- [LightKitAdminListActionHandler::executeSaveTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeSaveTableListGeneralAction.md) &ndash; Saves the table data in the form of inserts statements, and put the resulting sql file in the user assets.
- [LightKitAdminListActionHandler::executeLoadTableListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeLoadTableListGeneralAction.md) &ndash; which we assume are mostly insert statements.
- [LightKitAdminListActionHandler::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/error.md) &ndash; Throws an error message.
- [LightKitAdminListActionHandler::getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getInRicsTags.md) &ndash; Returns an array containing one [in_rics tag](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist-conception-notes.md#in_rics) per item in the given rics array.
- [LightKitAdminListActionHandler::getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getWhereByRics.md) &ndash; rics.
- [LightKitAdminListActionHandler::executeFetchAllRequestByActionId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/executeFetchAllRequestByActionId.md) &ndash; Returns the result of the LightRealistService->executeRequestById method.
- [LightKitAdminListActionHandler::getParam](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getParam.md) &ndash; Returns the value of the parameter  which name is given, from the given params array.
- [LightKitAdminListActionHandler::getTableBackupDir](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getTableBackupDir.md) &ndash; Returns the backup symbolic directory for the given table.
- [LightKitAdminListActionHandler::selectiveMerge](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/selectiveMerge.md) &ndash; Merges the values of arr2 in arr1, but only if the key (of arr2) is in keys; then return the result.
- LightRealistBaseListActionHandler::__construct &ndash; Builds the LightRealistBaseListActionHandler instance.
- LightRealistBaseListActionHandler::setContainer &ndash; Sets the container.
- LightRealistBaseListActionHandler::decorateGenericActionItemByAssets &ndash; the calling class source file.
- LightRealistBaseListActionHandler::getTableNameByRequestId &ndash; Returns the table name associated with the given requestId.
- LightRealistBaseListActionHandler::getPlanetIdByRequestId &ndash; Returns the planetId name associated with the given requestId.
- LightRealistBaseListActionHandler::hasMicroPermission &ndash; Returns whether the current user is granted the given micro-permission.
- LightRealistBaseListActionHandler::checkMicroPermission &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- LightRealistBaseListActionHandler::getPluginName &ndash; Returns the plugin name for this instance.





Location
=============
Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler<br>
See the source code of [Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php)



SeeAlso
==============
Previous class: [LightKitAdminRealformHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realform/Handler/LightKitAdminRealformHandler.md)<br>Next class: [LightKitAdminRealistListItemRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListItemRenderer.md)<br>
