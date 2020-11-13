[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::prepareListGeneralActions
================



LightRealistService::prepareListGeneralActions — Parses the given list general action items and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).




Description
================


public [LightRealistService::prepareListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListGeneralActions.md)(array &$items, $requestId) : void




Parses the given list general action items and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).
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
See the source code for method [LightRealistService::prepareListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L774-L784)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [prepareListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListActionGroups.md)<br>Next method: [getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md)<br>

