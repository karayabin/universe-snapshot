[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Service\LightKitEditorService class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md)


LightKitEditorService::getWebsiteByIdentifier
================



LightKitEditorService::getWebsiteByIdentifier — Returns the info for the website identified by the given identifier.




Description
================


public [LightKitEditorService::getWebsiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsiteByIdentifier.md)(string $identifier, ?array $options = []) : array | false




Returns the info for the website identified by the given identifier.
Throws an [handy exception](https://github.com/lingtalfi/TheBar/blob/master/discussions/handy-exception.md) by default if something wrong occurs.
If the throwEx option is set to false and the website is not found, returns false.


Available options are:
- throwEx: bool=true. Whether to throw an exception if the website is not found.
     If false, and the website is not found, the method returns false.




Parameters
================


- identifier

    

- options

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightKitEditorService::getWebsiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Service/LightKitEditorService.php#L383-L400)


See Also
================

The [LightKitEditorService](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md) class.

Previous method: [getWebsites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsites.md)<br>Next method: [getFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getFactory.md)<br>

