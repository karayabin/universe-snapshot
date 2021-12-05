[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareGenericActionItem
================



LightRealistService::prepareGenericActionItem — Converts the given item into a [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md) in expanded form.




Description
================


private [LightRealistService::prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareGenericActionItem.md)(array &$item, [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) $actionHandler, string $requestId) : false | null




Converts the given item into a [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md) in expanded form.

Returns false if the item should be discarded (i.e. the user isn't granted access to it).




Parameters
================


- item

    

- actionHandler

    

- requestId

    


Return values
================

Returns false | null.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L933-L948)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [checkCsrfToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfToken.md)<br>Next method: [prepareListItemGroupActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActions.md)<br>

