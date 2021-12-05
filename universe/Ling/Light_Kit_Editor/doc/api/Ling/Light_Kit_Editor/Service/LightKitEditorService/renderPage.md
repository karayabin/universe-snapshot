[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Service\LightKitEditorService class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md)


LightKitEditorService::renderPage
================



LightKitEditorService::renderPage — Renders the page identified by the given arguments.




Description
================


public [LightKitEditorService::renderPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/renderPage.md)(string $websiteId, string $pageId, ?array $pageOptions = [], ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Renders the page identified by the given arguments.


The pageOptions are forwarded to the (kit_page_renderer)->renderPage method.

Available options are:
- before: callback to trigger before the page is rendered




Parameters
================


- websiteId

    

- pageId

    

- pageOptions

    

- options

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [LightKitEditorService::renderPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Service/LightKitEditorService.php#L180-L252)


See Also
================

The [LightKitEditorService](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md) class.

Previous method: [getMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getMultiStorageApi.md)<br>Next method: [registerWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/registerWebsite.md)<br>

