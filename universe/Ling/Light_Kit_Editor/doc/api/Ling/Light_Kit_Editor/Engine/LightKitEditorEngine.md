[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorEngine class
================
2021-03-01 --> 2021-04-09






Introduction
============

The LightKitEditorEngine class.



Class synopsis
==============


class <span class="pl-k">LightKitEditorEngine</span> implements [ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) {

- Properties
    - private [Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md)|null [$storage](#property-storage) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/__construct.md)() : void
    - public [setStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/setStorage.md)([Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Storage/LightKitEditorStorageInterface.md) $storage) : void
    - public [getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/getPageConf.md)(string $pageName) : array | false
    - public [getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/getErrors.md)() : array
    - public [__call](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/__call.md)($function, $arguments) : void
    - private [error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-storage"><b>storage</b></span>

    This property holds the storage for this instance.
    
    



Methods
==============

- [LightKitEditorEngine::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/__construct.md) &ndash; Builds the LightKitEditorEngine instance.
- [LightKitEditorEngine::setStorage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/setStorage.md) &ndash; Sets the storage.
- [LightKitEditorEngine::getPageConf](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/getPageConf.md) &ndash; Returns the page conf array for the given $pageName, or false if a problem occurs.
- [LightKitEditorEngine::getErrors](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/getErrors.md) &ndash; Returns the errors that occurred during the last method call.
- [LightKitEditorEngine::__call](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/__call.md) &ndash; The php magic method to proxy to the corresponding LightKitEditorStorageInterface methods.
- [LightKitEditorEngine::error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Engine/LightKitEditorEngine/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_Editor\Engine\LightKitEditorEngine<br>
See the source code of [Ling\Light_Kit_Editor\Engine\LightKitEditorEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Engine/LightKitEditorEngine.php)



SeeAlso
==============
Previous class: [LkeWebsiteController](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Controller/LkeWebsiteController.md)<br>Next class: [LightKitEditorException](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Exception/LightKitEditorException.md)<br>
