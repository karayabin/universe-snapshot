[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareListActionGroups
================



LightRealistService::prepareListActionGroups — Parses the given list action items (aka [toolbar items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item)) and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).




Description
================


public [LightRealistService::prepareListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListActionGroups.md)(array &$items, string $requestId) : void




Parses the given list action items (aka [toolbar items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item)) and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).
If a generic action item is discarded, it won't appear in the resulting list.




Parameters
================


- items

    

- requestId

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::prepareListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L739-L762)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [getListRendererByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListRendererByRequestId.md)<br>Next method: [prepareListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListGeneralActions.md)<br>

