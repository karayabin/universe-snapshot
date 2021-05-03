[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareListItemGroupActionsByRequestId
================



LightRealistService::prepareListItemGroupActionsByRequestId — Returns the prepared "action items" array representing the "list item group actions" for the list identified by the given requestId.




Description
================


public [LightRealistService::prepareListItemGroupActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActionsByRequestId.md)(string $requestId, ?string $format = null) : array




Returns the prepared "action items" array representing the "list item group actions" for the list identified by the given requestId.

For more information about "action items", see the [realist action items document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md).
For more information about "list item group actions", see the [realist list-actions document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md).

By default, we use the "generic action item" format, which is explained in the "request declaration",
using the "list_item_group_actions" property.


See more about that format in the [realist generic action item section](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md#generic-action-item).
See the [request declaration document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md) for more details.




Parameters
================


- requestId

    

- format

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::prepareListItemGroupActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L618-L628)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [getListRendererByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListRendererByRequestId.md)<br>Next method: [prepareListGeneralActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListGeneralActionsByRequestId.md)<br>

