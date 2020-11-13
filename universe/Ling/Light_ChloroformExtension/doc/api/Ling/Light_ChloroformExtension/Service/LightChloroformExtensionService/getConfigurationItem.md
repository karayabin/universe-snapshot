[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md)


LightChloroformExtensionService::getConfigurationItem
================



LightChloroformExtensionService::getConfigurationItem — Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) corresponding to the given identifier.




Description
================


public [LightChloroformExtensionService::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getConfigurationItem.md)(string $identifier) : array




Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) corresponding to the given identifier.
The identifier is either the nuggetId or the nuggetDirectiveId.

See the [Light_ChloroformExtension conception notes](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md) for more details.
See the [Light_Nugget conception notes](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- identifier

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightChloroformExtensionService::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Service/LightChloroformExtensionService.php#L46-L64)


See Also
================

The [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md)<br>Next method: [getTableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListService.md)<br>

