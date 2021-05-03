[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The LightRealformService class
================
2019-10-21 --> 2021-03-22






Introduction
============

The LightRealformService class.



Class synopsis
==============


class <span class="pl-k">LightRealformService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light_Realform\DynamicInjection\RealformDynamicInjectionHandlerInterface[]](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md) [$dynamicInjectionHandlers](#property-dynamicInjectionHandlers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/__construct.md)() : void
    - public [getNugget](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getNugget.md)(string $nuggetId) : array
    - public [getNuggetDirective](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getNuggetDirective.md)(string $nuggetDirectiveId) : array
    - public [getChloroformByConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformByConfiguration.md)(array $formConf) : [Chloroform](https://github.com/lingtalfi/Chloroform)
    - public [executeRealform](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeRealform.md)(string $nuggetId, ?array $options = []) : [RealformResult](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Result/RealformResult.md)
    - public [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerDynamicInjectionHandler.md)(string $identifier, [Ling\Light_Realform\DynamicInjection\RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md) $handler) : void
    - public [getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getDynamicInjectionHandler.md)(string $identifier) : [RealformDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/DynamicInjection/RealformDynamicInjectionHandlerInterface.md)
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getCurrentWebsiteUser](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getCurrentWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - protected [getChloroformField](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformField.md)([Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform) $form, string $type, string $fieldId, ?array $fieldConf = []) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - protected [getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformValidator.md)(string $type, array $validatorConf) : [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md)
    - protected [handleFormSystemA](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/handleFormSystemA.md)(array $nugget, [Ling\Light_Realform\Result\RealformResult](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Result/RealformResult.md) $realformResult, [Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform) $form, ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [executeSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeSuccessHandler.md)(array $nugget, array $data, ?array $options = []) : void
    - public [getFeederDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getFeederDefaultValues.md)(array $nugget, ?array $options = []) : void
    - private [error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/error.md)(string $msg) : void
    - private [getMultiplierByNugget](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getMultiplierByNugget.md)(array $nugget) : string | null
    - private [injectDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/injectDefaultValues.md)(array $nugget, [Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform) $form, ?array $options = []) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dynamicInjectionHandlers"><b>dynamicInjectionHandlers</b></span>

    This property holds the dynamicInjectionHandlers for this instance.
    It's an array of identifier => RealformDynamicInjectionHandlerInterface
    
    Usually the identifier is a plugin name.
    
    



Methods
==============

- [LightRealformService::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/__construct.md) &ndash; Builds the LightRealformService instance.
- [LightRealformService::getNugget](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getNugget.md) &ndash; Returns the configuration nugget based on the given nuggetId.
- [LightRealformService::getNuggetDirective](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getNuggetDirective.md) &ndash; Returns the configuration nugget value based on the given nuggetDirectiveId.
- [LightRealformService::getChloroformByConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformByConfiguration.md) &ndash; Returns the chloroform instance based on the given configuration.
- [LightRealformService::executeRealform](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeRealform.md) &ndash; instance.
- [LightRealformService::registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/registerDynamicInjectionHandler.md) &ndash; Registers a [dynamic injection handler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes-linear.md#dynamic-injection).
- [LightRealformService::getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getDynamicInjectionHandler.md) &ndash; or throws an exception if it's not there.
- [LightRealformService::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/setContainer.md) &ndash; Sets the container.
- [LightRealformService::getCurrentWebsiteUser](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getCurrentWebsiteUser.md) &ndash; Returns the current valid website user, or throws an exception.
- [LightRealformService::getChloroformField](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformField.md) &ndash; Returns a chloroform field.
- [LightRealformService::getChloroformValidator](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getChloroformValidator.md) &ndash; Returns a validator instance.
- [LightRealformService::handleFormSystemA](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/handleFormSystemA.md) &ndash; Performs the "Form handling system A" routine.
- [LightRealformService::executeSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/executeSuccessHandler.md) &ndash; Executes the success handler defined in the given nugget.
- [LightRealformService::getFeederDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getFeederDefaultValues.md) &ndash; Returns the default values from the feeder, based on the given nugget.
- [LightRealformService::error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/error.md) &ndash; Throws an exception.
- [LightRealformService::getMultiplierByNugget](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/getMultiplierByNugget.md) &ndash; Returns the multiplied column found in the given nugget, or null if no multiplier was found.
- [LightRealformService::injectDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformService/injectDefaultValues.md) &ndash; Injects the default values into the given form, based on the given nugget.





Location
=============
Ling\Light_Realform\Service\LightRealformService<br>
See the source code of [Ling\Light_Realform\Service\LightRealformService](https://github.com/lingtalfi/Light_Realform/blob/master/Service/LightRealformService.php)



SeeAlso
==============
Previous class: [LightRealformLateServiceRegistrationInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformLateServiceRegistrationInterface.md)<br>Next class: [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)<br>
