Ling/Light_ChloroformExtension
================
2019-11-18 --> 2021-03-05




Table of contents
===========

- [LightChloroformExtensionAjaxHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler.md) &ndash; The LightChloroformExtensionAjaxHandler class.
    - [LightChloroformExtensionAjaxHandler::doHandle](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler/doHandle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
    - BaseLightAjaxHandler::handle &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
    - ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
    - ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- [LightChloroformExtensionException](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Exception/LightChloroformExtensionException.md) &ndash; The LightChloroformExtensionException class.
- [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) &ndash; The TableListService.
    - [TableListService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/__construct.md) &ndash; Builds the TableListService instance.
    - [TableListService::setNugget](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setNugget.md) &ndash; Sets the nugget.
    - [TableListService::getNugget](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNugget.md) &ndash; Returns the nugget of this instance.
    - [TableListService::getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md) &ndash; Returns the number of items/rows of the query associated with the defined pluginId.
    - [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md) &ndash; Returns an array of rows based on the defined nugget.
    - [TableListService::getValueToLabels](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getValueToLabels.md) &ndash; Returns the formatted value => label(s) for the given value(s).
    - [TableListService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md) &ndash; Sets the container.
- [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md) &ndash; The TableListField class.
    - [TableListField::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/__construct.md) &ndash; Builds the AbstractField instance.
    - [TableListField::setForm](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setForm.md) &ndash; Sets the form instance.
    - [TableListField::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setContainer.md) &ndash; Sets the container.
    - [TableListField::toArray](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/toArray.md) &ndash; Returns the array representation of the field.
    - SelectField::create &ndash; Builds and returns the instance.
    - SelectField::setItems &ndash; Sets the items.
    - AbstractField::getId &ndash; Returns the field id.
    - AbstractField::addValidator &ndash; Adds a validator to this instance.
    - AbstractField::validates &ndash; Tests and returns whether every validator attached to this instanced passed.
    - AbstractField::getErrors &ndash; Returns an array of error messages.
    - AbstractField::setValue &ndash; Sets the value for this instance.
    - AbstractField::getValue &ndash; Returns the value of the field.
    - AbstractField::getFormattedValue &ndash; Returns the formatted value of this field.
    - AbstractField::getFallbackValue &ndash; Returns the fallback value, which defaults to null.
    - AbstractField::hasVeryImportantData &ndash; Returns whether this field contains [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
    - AbstractField::getDataTransformer &ndash; Returns the data transformer of this field if any, or null otherwise.
    - AbstractField::setDataTransformer &ndash; Sets the dataTransformer for this field.
    - AbstractField::setProperties &ndash; Sets the properties of this field.
    - AbstractField::setProperty &ndash; Sets a property to this field.
    - AbstractField::setId &ndash; Sets the id.
    - AbstractField::setFallbackValue &ndash; Sets the fallbackValue.
    - AbstractField::setLabel &ndash; Sets the label.
    - AbstractField::setHint &ndash; Sets the hint.
    - AbstractField::setErrorName &ndash; Sets the errorName.
    - AbstractField::setHasVeryImportantData &ndash; Sets whether this field has [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md) &ndash; The LightChloroformExtensionService class.
    - [LightChloroformExtensionService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md) &ndash; Builds the LightChloroformExtensionService instance.
    - [LightChloroformExtensionService::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getConfigurationItem.md) &ndash; Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) corresponding to the given identifier.
    - [LightChloroformExtensionService::getTableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListService.md) &ndash; Returns the table list service based on the given table list identifier or directive id.
    - [LightChloroformExtensionService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md) &ndash; Sets the container.


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [Chloroform](https://github.com/lingtalfi/Chloroform)
- [Light](https://github.com/lingtalfi/Light)
- [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission)
- [Light_Nugget](https://github.com/lingtalfi/Light_Nugget)
- [Light_Realform](https://github.com/lingtalfi/Light_Realform)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)


