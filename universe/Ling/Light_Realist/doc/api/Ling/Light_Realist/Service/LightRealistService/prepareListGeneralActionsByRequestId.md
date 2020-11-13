[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareListGeneralActionsByRequestId
================



LightRealistService::prepareListGeneralActionsByRequestId — Returns the prepared "action items" array representing the "general actions" for the list identified by the given requestId.




Description
================


public [LightRealistService::prepareListGeneralActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListGeneralActionsByRequestId.md)($requestId) : void




Returns the prepared "action items" array representing the "general actions" for the list identified by the given requestId.

For more information about "action items", see the [realist action items document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/action-items.md).
For more information about "general actions", see the [realist list-actions document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md).

By default, we use the "generic action item" format, which is explained in the "request declaration",
using the "list_item_group_actions" property.


See more about that format in the [realist generic action item section](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/action-items.md#generic-action-item).
See the [request declaration document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/request-declaration.md) for more details.




Parameters
================


- requestId

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::prepareListGeneralActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L678-L693)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [prepareListItemGroupActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActionsByRequestId.md)<br>Next method: [getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md)<br>

