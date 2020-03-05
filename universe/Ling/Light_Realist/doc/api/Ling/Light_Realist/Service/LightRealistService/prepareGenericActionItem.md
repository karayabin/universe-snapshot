[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareGenericActionItem
================



LightRealistService::prepareGenericActionItem — Converts the given item into a [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).




Description
================


private [LightRealistService::prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareGenericActionItem.md)(array &$item, array $handlers, string $requestId) : bool




Converts the given item into a [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).
Returns false if the item should be discarded (i.e. the user isn't granted access to it).




Parameters
================


- item

    

- handlers

    

- requestId

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L914-L926)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [checkCsrfToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfToken.md)<br>Next method: [convertCsrfTokenByItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/convertCsrfTokenByItem.md)<br>

