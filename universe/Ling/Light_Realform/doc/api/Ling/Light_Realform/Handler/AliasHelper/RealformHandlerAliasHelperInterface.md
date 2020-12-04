[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The RealformHandlerAliasHelperInterface class
================
2019-10-21 --> 2020-12-01






Introduction
============

The RealformHandlerAliasHelperInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">RealformHandlerAliasHelperInterface</span>  {

- Methods
    - abstract public [getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface/getChloroformValidator.md)(string $type, array $validatorConf, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) | null
    - abstract public [getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface/getDataTransformer.md)(string $alias, array $params, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null

}






Methods
==============

- [RealformHandlerAliasHelperInterface::getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface/getChloroformValidator.md) &ndash; Returns a configured validator instance, based on the given type and validatorConf array.
- [RealformHandlerAliasHelperInterface::getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface/getDataTransformer.md) &ndash; Returns the data transformer instance based on the given alias and parameters.





Location
=============
Ling\Light_Realform\Handler\AliasHelper\RealformHandlerAliasHelperInterface<br>
See the source code of [Ling\Light_Realform\Handler\AliasHelper\RealformHandlerAliasHelperInterface](https://github.com/lingtalfi/Light_Realform/blob/master/Handler/AliasHelper/RealformHandlerAliasHelperInterface.php)



SeeAlso
==============
Previous class: [BaseRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/BaseRealformHandlerAliasHelper.md)<br>Next class: [RealformRendererInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Renderer/RealformRendererInterface.md)<br>
