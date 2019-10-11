[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::checkCsrfTokenByGenericActionItem
================



LightRealistService::checkCsrfTokenByGenericActionItem — Performs the csrf validation if necessary (i.e.




Description
================


public [LightRealistService::checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfTokenByGenericActionItem.md)(array $item, array $params) : void




Performs the csrf validation if necessary (i.e. if the csrf_token key is defined in the [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md) configuration),
and throws an exception in case of a csrf validation failure.

The params array originates from the user (i.e. not trusted).




Parameters
================


- item

    

- params

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L726-L736)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md)<br>Next method: [getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getSqlColumnsByRequestDeclaration.md)<br>

