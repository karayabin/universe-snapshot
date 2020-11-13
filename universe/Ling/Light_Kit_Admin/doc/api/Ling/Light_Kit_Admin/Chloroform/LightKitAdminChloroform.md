[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminChloroform class
================
2019-05-17 --> 2020-08-21






Introduction
============

The LightKitAdminChloroform class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminChloroform</span> extends [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)  {

- Inherited properties
    - protected [Ling\Chloroform\Field\FieldInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) [Chloroform::$fields](#property-fields) ;
    - protected [Ling\Chloroform\FormNotification\FormNotificationInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md) [Chloroform::$notifications](#property-notifications) ;
    - protected string [Chloroform::$formId](#property-formId) ;
    - protected array [Chloroform::$properties](#property-properties) ;
    - protected string [Chloroform::$mode](#property-mode) ;
    - protected string|null [Chloroform::$jsCode](#property-jsCode) ;
    - protected string|null [Chloroform::$cssId](#property-cssId) ;
    - protected array [Chloroform::$validationErrors](#property-validationErrors) ;

- Methods
    - public [prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Chloroform/LightKitAdminChloroform/prepare.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - public Chloroform::__construct() : void
    - public Chloroform::setFormId(string $formId) : void
    - public Chloroform::isPosted() : bool
    - public Chloroform::getPostedData() : array
    - public Chloroform::validates(?bool $injectValue = true) : bool
    - public Chloroform::getValidationErrors() : array
    - public Chloroform::getVeryImportantData() : array
    - public Chloroform::executeDataTransformers(array &$postedData) : void
    - public Chloroform::getFields() : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public Chloroform::getField(string $fieldId) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public Chloroform::getMode() : string
    - public Chloroform::injectValues(array $values) : void
    - public Chloroform::addField([Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, ?array $validators = []) : void
    - public Chloroform::addNotification([Ling\Chloroform\FormNotification\FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md) $notification) : void
    - public Chloroform::getNotifications() : [FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md)
    - public Chloroform::setProperty(string $key, $value) : void
    - public Chloroform::setMode(string $mode) : void
    - public Chloroform::setJsCode(string $jsCode) : void
    - public Chloroform::setCssId(string $cssId) : void
    - public Chloroform::hasProperty(string $key) : bool
    - public Chloroform::getProperty(string $key, ?$default = null) : mixed
    - public Chloroform::getJsCode() : string
    - public Chloroform::getCssId() : string | null
    - public Chloroform::toArray() : array
    - private Chloroform::getFieldPostedValue([Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, array $postedData) : mixed | null

}






Methods
==============

- [LightKitAdminChloroform::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Chloroform/LightKitAdminChloroform/prepare.md) &ndash; Prepares this instance.
- Chloroform::__construct &ndash; Builds the Chloroform instance.
- Chloroform::setFormId &ndash; Sets the formId.
- Chloroform::isPosted &ndash; Returns whether this form instance was posted.
- Chloroform::getPostedData &ndash; Returns an array of posted data (for this instance).
- Chloroform::validates &ndash; Returns whether all fields attached to this form validate.
- Chloroform::getValidationErrors &ndash; Returns the validationErrors of this instance.
- Chloroform::getVeryImportantData &ndash; Returns the [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data) of a form.
- Chloroform::executeDataTransformers &ndash; Execute the data transformers (see the [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) for more details) on the given postedData.
- Chloroform::getFields &ndash; Returns the fields of this instance.
- Chloroform::getField &ndash; Returns the field which id is given.
- Chloroform::getMode &ndash; Returns the mode of this instance.
- Chloroform::injectValues &ndash; Inject the given values in the corresponding fields.
- Chloroform::addField &ndash; Adds a field to this instance.
- Chloroform::addNotification &ndash; Adds a notification to this instance.
- Chloroform::getNotifications &ndash; Returns the notifications of this instance.
- Chloroform::setProperty &ndash; Sets a property.
- Chloroform::setMode &ndash; Sets the mode.
- Chloroform::setJsCode &ndash; Sets the jsCode.
- Chloroform::setCssId &ndash; Sets the cssId.
- Chloroform::hasProperty &ndash; Returns whether the property identified by the given key exists.
- Chloroform::getProperty &ndash; Returns the value of the property identified by the given key, or the default value otherwise.
- Chloroform::getJsCode &ndash; Returns the jsCode of this instance.
- Chloroform::getCssId &ndash; Returns the cssId of this instance.
- Chloroform::toArray &ndash; Returns the array version (template friendly) of the form.
- Chloroform::getFieldPostedValue &ndash; Returns the field posted value for the given field and posted data.





Location
=============
Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroform<br>
See the source code of [Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroform](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Chloroform/LightKitAdminChloroform.php)



SeeAlso
==============
Previous class: [LightKitAdminGeneralBullsheeter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter.md)<br>Next class: [LightKitAdminChloroformRendererUtil](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Chloroform/LightKitAdminChloroformRendererUtil.md)<br>
