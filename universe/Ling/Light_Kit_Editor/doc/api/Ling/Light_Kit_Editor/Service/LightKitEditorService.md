[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorService class
================
2021-03-01 --> 2021-08-03






Introduction
============

The LightKitEditorService class.



Class synopsis
==============


class <span class="pl-k">LightKitEditorService</span>  {

- Properties
    - protected [Ling\Light_Kit_Editor\Api\Custom\CustomLightKitEditorApiFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/CustomLightKitEditorApiFactory.md) [$factory](#property-factory) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;
    - private string [$defaultWebsiteIdentifier](#property-defaultWebsiteIdentifier) ;
    - private string|null [$theme](#property-theme) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setDefaultWebsiteIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/setDefaultWebsiteIdentifier.md)(string $defaultWebsiteIdentifier) : void
    - public [getDefaultWebsiteIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getDefaultWebsiteIdentifier.md)() : string
    - public [getTheme](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getTheme.md)() : string | null
    - public [getMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getMultiStorageApi.md)() : [LkeMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LkeMultiStorageApi.md)
    - public [renderPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/renderPage.md)(string $websiteId, string $pageId, ?array $pageOptions = [], ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [registerWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/registerWebsite.md)(array $website, ?array $options = []) : void
    - public [unregisterWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/unregisterWebsite.md)(string $websiteIdentifier) : void
    - public [getWebsites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsites.md)() : array
    - public [getWebsiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsiteByIdentifier.md)(string $identifier, ?array $options = []) : array | false
    - public [getFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getFactory.md)() : [CustomLightKitEditorApiFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/CustomLightKitEditorApiFactory.md)
    - private [error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/error.md)(string $msg, ?int $code = null) : void
    - private [getWebsiteFile](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsiteFile.md)() : string

}




Properties
=============

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-defaultWebsiteIdentifier"><b>defaultWebsiteIdentifier</b></span>

    This property holds the defaultWebsiteIdentifier for this instance.
    
    

- <span id="property-theme"><b>theme</b></span>

    The theme actually used when rendering a page.
    This is only set when you call our renderPage method.
    Otherwise, it's null.
    
    



Methods
==============

- [LightKitEditorService::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/__construct.md) &ndash; Builds the LightKitEditorService instance.
- [LightKitEditorService::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/setContainer.md) &ndash; Sets the container.
- [LightKitEditorService::setDefaultWebsiteIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/setDefaultWebsiteIdentifier.md) &ndash; Sets the defaultWebsiteIdentifier.
- [LightKitEditorService::getDefaultWebsiteIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getDefaultWebsiteIdentifier.md) &ndash; Returns the defaultWebsiteIdentifier of this instance.
- [LightKitEditorService::getTheme](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getTheme.md) &ndash; Returns the theme actually used while rendering the page.
- [LightKitEditorService::getMultiStorageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getMultiStorageApi.md) &ndash; Returns a multi storage api.
- [LightKitEditorService::renderPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/renderPage.md) &ndash; Renders the page identified by the given arguments.
- [LightKitEditorService::registerWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/registerWebsite.md) &ndash; Registers a website.
- [LightKitEditorService::unregisterWebsite](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/unregisterWebsite.md) &ndash; Unregisters a website.
- [LightKitEditorService::getWebsites](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsites.md) &ndash; Returns the list of registered websites.
- [LightKitEditorService::getWebsiteByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsiteByIdentifier.md) &ndash; Returns the info for the website identified by the given identifier.
- [LightKitEditorService::getFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [LightKitEditorService::error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/error.md) &ndash; Throws an exception.
- [LightKitEditorService::getWebsiteFile](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService/getWebsiteFile.md) &ndash; Returns the location of the website file.





Location
=============
Ling\Light_Kit_Editor\Service\LightKitEditorService<br>
See the source code of [Ling\Light_Kit_Editor\Service\LightKitEditorService](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Service/LightKitEditorService.php)



SeeAlso
==============
Previous class: [LightKitEditorBabyYamlDuelistEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.md)<br>Next class: [LightKitEditorAbstractStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorAbstractStorage.md)<br>
