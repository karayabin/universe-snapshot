[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorRealformSuccessHandler class
================
2021-03-01 --> 2021-05-31






Introduction
============

The LightKitEditorRealformSuccessHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitEditorRealformSuccessHandler</span> implements [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;
    - private string [$engineType](#property-engineType) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/__construct.md)() : void
    - public [setEngineType](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/setEngineType.md)(string $engineType) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [execute](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/execute.md)(array $data, ?array $options = []) : mixed
    - protected [getBabyYamlRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/getBabyYamlRootDir.md)() : [?string](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/?string.md)
    - private [getStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/getStorage.md)() : [LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md)
    - private [getDataProperty](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/getDataProperty.md)(string $property, array $data) : mixed
    - private [error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-engineType"><b>engineType</b></span>

    This property holds the engineType for this instance.
    
    It can be one of:
    - db
    - babyYaml
    
    
    Defaults to babyYaml.
    
    



Methods
==============

- [LightKitEditorRealformSuccessHandler::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/__construct.md) &ndash; Builds the LightKitEditorRealformSuccessHandler instance.
- [LightKitEditorRealformSuccessHandler::setEngineType](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/setEngineType.md) &ndash; Sets the engineType.
- [LightKitEditorRealformSuccessHandler::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/setContainer.md) &ndash; Sets the light service container interface.
- [LightKitEditorRealformSuccessHandler::execute](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/execute.md) &ndash; Process the given data, and throws an exception if something unexpected happens.
- [LightKitEditorRealformSuccessHandler::getBabyYamlRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/getBabyYamlRootDir.md) &ndash; Returns the babyYaml root directory.
- [LightKitEditorRealformSuccessHandler::getStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/getStorage.md) &ndash; Returns the storage instance to use.
- [LightKitEditorRealformSuccessHandler::getDataProperty](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/getDataProperty.md) &ndash; Returns the property value from the given data, or throws an exception if it doesn't exist.
- [LightKitEditorRealformSuccessHandler::error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_Editor\Light_Realform\SuccessHandler\LightKitEditorRealformSuccessHandler<br>
See the source code of [Ling\Light_Kit_Editor\Light_Realform\SuccessHandler\LightKitEditorRealformSuccessHandler](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler.php)



SeeAlso
==============
Previous class: [LightKitEditorPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_PlanetInstaller/LightKitEditorPlanetInstaller.md)<br>Next class: [LightKitEditorBabyYamlDuelistEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.md)<br>
