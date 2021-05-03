[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Service\LightKitEditorService class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md)


LightKitEditorService::registerWebsite
================



LightKitEditorService::registerWebsite — Registers a website.




Description
================


public [LightKitEditorService::registerWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/registerWebsite.md)(array $website, ?array $options = []) : void




Registers a website.

See the [Light_Kit_Editor conception notes](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/conception-notes.md) for more details.


Available options are:

- ignoreDuplicate: bool=true. If false and a website with the same identifier is found, an exception will be thrown.
     If true (and a website with same identifier found), then the method will just do nothing silently.




Parameters
================


- website

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitEditorService::registerWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Service/LightKitEditorService.php#L189-L234)


See Also
================

The [LightKitEditorService](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md) class.

Previous method: [renderPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/renderPage.md)<br>Next method: [getWebsites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsites.md)<br>

