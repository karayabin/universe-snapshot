[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The BaseRealformHandlerAliasHelper class
================
2019-10-21 --> 2020-12-08






Introduction
============

The BaseRealformHandlerAliasHelper class.



Class synopsis
==============


class <span class="pl-k">BaseRealformHandlerAliasHelper</span> implements [RealformHandlerAliasHelperInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface.md) {

- Methods
    - public [getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/BaseRealformHandlerAliasHelper/getChloroformValidator.md)(string $type, array $validatorConf, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) | null
    - public [getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/BaseRealformHandlerAliasHelper/getDataTransformer.md)(string $alias, array $params, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null

}






Methods
==============

- [BaseRealformHandlerAliasHelper::getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/BaseRealformHandlerAliasHelper/getChloroformValidator.md) &ndash; Returns a configured validator instance, based on the given type and validatorConf array.
- [BaseRealformHandlerAliasHelper::getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/BaseRealformHandlerAliasHelper/getDataTransformer.md) &ndash; Returns the data transformer instance based on the given alias and parameters.





Location
=============
Ling\Light_Realform\Handler\AliasHelper\BaseRealformHandlerAliasHelper<br>
See the source code of [Ling\Light_Realform\Handler\AliasHelper\BaseRealformHandlerAliasHelper](https://github.com/lingtalfi/Light_Realform/blob/master/Handler/AliasHelper/BaseRealformHandlerAliasHelper.php)



SeeAlso
==============
Previous class: [RealformFeederInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformFeederInterface.md)<br>Next class: [RealformHandlerAliasHelperInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface.md)<br>
