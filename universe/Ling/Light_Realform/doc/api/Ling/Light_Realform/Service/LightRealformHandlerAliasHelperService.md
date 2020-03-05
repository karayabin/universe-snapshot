[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The LightRealformHandlerAliasHelperService class
================
2019-10-21 --> 2020-02-28






Introduction
============

The LightRealformHandlerAliasHelperService class.



Class synopsis
==============


class <span class="pl-k">LightRealformHandlerAliasHelperService</span>  {

- Properties
    - protected [Ling\Light_Realform\Handler\AliasHelper\RealformHandlerAliasHelperInterface[]](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface.md) [$aliasHelpers](#property-aliasHelpers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/__construct.md)() : void
    - public [registerRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/registerRealformHandlerAliasHelper.md)(string $pluginName, [Ling\Light_Realform\Handler\AliasHelper\RealformHandlerAliasHelperInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface.md) $helper) : void
    - public [getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/getChloroformValidator.md)(string $type, array $validatorConf) : [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) | null
    - public [getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/getDataTransformer.md)(string $alias, ?array $params = []) : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-aliasHelpers"><b>aliasHelpers</b></span>

    This property holds the aliasHelpers for this instance.
    It's an array of pluginName => RealformHandlerAliasHelperInterface.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightRealformHandlerAliasHelperService::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/__construct.md) &ndash; Builds the LightRealformHandlerAliasHelperService instance.
- [LightRealformHandlerAliasHelperService::registerRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/registerRealformHandlerAliasHelper.md) &ndash; Registers a realform handler alias helper.
- [LightRealformHandlerAliasHelperService::getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/getChloroformValidator.md) &ndash; Returns a configured validator instance, based on the given type and validatorConf.
- [LightRealformHandlerAliasHelperService::getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/getDataTransformer.md) &ndash; Returns a configured dataTransformer instance, based on the given alias and parameters.
- [LightRealformHandlerAliasHelperService::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Realform\Service\LightRealformHandlerAliasHelperService<br>
See the source code of [Ling\Light_Realform\Service\LightRealformHandlerAliasHelperService](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformHandlerAliasHelperService.php)



SeeAlso
==============
Previous class: [LightRealformRoutineTwo](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo.md)<br>Next class: [LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService.md)<br>
