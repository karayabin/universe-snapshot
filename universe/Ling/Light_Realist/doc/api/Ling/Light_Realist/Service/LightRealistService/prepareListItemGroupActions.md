[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareListItemGroupActions
================



LightRealistService::prepareListItemGroupActions — Parses the given list action items (aka [toolbar items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item)) and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).




Description
================


private [LightRealistService::prepareListItemGroupActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActions.md)(array &$items, [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) $actionHandler, string $requestId) : void




Parses the given list action items (aka [toolbar items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item)) and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).
If a generic action item is discarded, it won't appear in the resulting list.




Parameters
================


- items

    

- actionHandler

    

- requestId

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::prepareListItemGroupActions](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L964-L983)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareGenericActionItem.md)<br>

