[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The BaseRealformHandler class
================
2019-10-21 --> 2020-03-10






Introduction
============

The BaseRealformHandler class.
A helper to implement a realform handler, using my organization techniques.



Class synopsis
==============


abstract class <span class="pl-k">BaseRealformHandler</span> implements [RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected string [$confDir](#property-confDir) ;
    - protected array [$confCache](#property-confCache) ;
    - protected string [$id](#property-id) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setId](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/setId.md)(string $id) : mixed
    - public [getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getFormHandler.md)(?array $configuration = null) : [Chloroform](https://github.com/lingtalfi/Chloroform)
    - public [getConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getConfiguration.md)() : array
    - public [getSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getSuccessHandler.md)() : [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)
    - public [setConfDir](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/setConfDir.md)(string $confDir) : void
    - protected [getDefaultFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getDefaultFormHandler.md)() : [Chloroform](https://github.com/lingtalfi/Chloroform)
    - protected [getChloroformField](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getChloroformField.md)([Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform) $form, string $type, string $fieldId, ?array $fieldConf = []) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - protected [getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getChloroformValidator.md)(string $type, array $validatorConf) : [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md)
    - protected [getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getDataTransformer.md)($value) : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md)
    - protected [error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-confDir"><b>confDir</b></span>

    This property holds the confDir for this instance.
    
    

- <span id="property-confCache"><b>confCache</b></span>

    This property holds the confCache for this instance.
    It's an array of id => configuration array
    
    

- <span id="property-id"><b>id</b></span>

    This property holds the realform id for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [BaseRealformHandler::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/__construct.md) &ndash; Builds the BaseRealformHandler instance.
- [BaseRealformHandler::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/setContainer.md) &ndash; Sets the light service container interface.
- [BaseRealformHandler::setId](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/setId.md) &ndash; Sets the realform id.
- [BaseRealformHandler::getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getFormHandler.md) &ndash; Returns a chloroform instance configured based on the realform id.
- [BaseRealformHandler::getConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getConfiguration.md) &ndash; Returns the realform configuration based on the realform id.
- [BaseRealformHandler::getSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getSuccessHandler.md) &ndash; Returns the success handler for this instance.
- [BaseRealformHandler::setConfDir](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/setConfDir.md) &ndash; Sets the confDir.
- [BaseRealformHandler::getDefaultFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getDefaultFormHandler.md) &ndash; Returns a default chloroform instance.
- [BaseRealformHandler::getChloroformField](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getChloroformField.md) &ndash; Returns a chloroform field.
- [BaseRealformHandler::getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getChloroformValidator.md) &ndash; Returns a validator instance.
- [BaseRealformHandler::getDataTransformer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/getDataTransformer.md) &ndash; Returns a dataTransformer instance.
- [BaseRealformHandler::error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler/error.md) &ndash; Throws an exception with the given message.





Location
=============
Ling\Light_Realform\Handler\BaseRealformHandler<br>
See the source code of [Ling\Light_Realform\Handler\BaseRealformHandler](https://github.com/lingtalfi/Light_Realform/blob/master/Handler/BaseRealformHandler.php)



SeeAlso
==============
Previous class: [RealformHandlerAliasHelperInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/AliasHelper/RealformHandlerAliasHelperInterface.md)<br>Next class: [RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md)<br>
