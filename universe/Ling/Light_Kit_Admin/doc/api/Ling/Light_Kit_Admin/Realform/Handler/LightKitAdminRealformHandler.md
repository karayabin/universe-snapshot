[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminRealformHandler class
================
2019-05-17 --> 2019-12-17






Introduction
============

The LightKitAdminRealformHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminRealformHandler</span> extends [BaseRealformHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface.md) {

- Inherited properties
    - protected string [BaseRealformHandler::$confDir](#property-confDir) ;
    - protected array [BaseRealformHandler::$confCache](#property-confCache) ;
    - protected string [BaseRealformHandler::$id](#property-id) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseRealformHandler::$container](#property-container) ;

- Inherited methods
    - public BaseRealformHandler::__construct() : void
    - public BaseRealformHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public BaseRealformHandler::setId(string $id) : mixed
    - public BaseRealformHandler::getFormHandler(?array $configuration = null) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)
    - public BaseRealformHandler::getConfiguration() : array
    - public BaseRealformHandler::getSuccessHandler() : Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface
    - public BaseRealformHandler::setConfDir(string $confDir) : void
    - protected BaseRealformHandler::getDefaultFormHandler() : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)
    - protected BaseRealformHandler::getChloroformField([Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) $form, string $type, string $fieldId, ?array $fieldConf = []) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - protected BaseRealformHandler::getChloroformValidator(string $type, array $validatorConf) : Ling\Chloroform\Validator\ValidatorInterface
    - protected BaseRealformHandler::getDataTransformer($value) : Ling\Chloroform\DataTransformer\DataTransformerInterface
    - protected BaseRealformHandler::error(string $msg) : void

}






Methods
==============

- BaseRealformHandler::__construct &ndash; Builds the BaseRealformHandler instance.
- BaseRealformHandler::setContainer &ndash; Sets the light service container interface.
- BaseRealformHandler::setId &ndash; Sets the realform id.
- BaseRealformHandler::getFormHandler &ndash; Returns a chloroform instance configured based on the realform id.
- BaseRealformHandler::getConfiguration &ndash; Returns the realform configuration based on the realform id.
- BaseRealformHandler::getSuccessHandler &ndash; Returns the success handler for this instance.
- BaseRealformHandler::setConfDir &ndash; Sets the confDir.
- BaseRealformHandler::getDefaultFormHandler &ndash; Returns a default chloroform instance.
- BaseRealformHandler::getChloroformField &ndash; Returns a chloroform field.
- BaseRealformHandler::getChloroformValidator &ndash; Returns a validator instance.
- BaseRealformHandler::getDataTransformer &ndash; Returns a dataTransformer instance.
- BaseRealformHandler::error &ndash; Throws an exception with the given message.





Location
=============
Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler<br>
See the source code of [Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realform/Handler/LightKitAdminRealformHandler.php)



SeeAlso
==============
Previous class: [LightKitAdminPageConfigurationTransformer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/PageConfigurationTransformer/LightKitAdminPageConfigurationTransformer.md)<br>Next class: [LightKitAdminRealistActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ActionHandler/LightKitAdminRealistActionHandler.md)<br>
