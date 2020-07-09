Ling/Light_ChloroformExtension
================
2019-11-18 --> 2020-06-04




Table of contents
===========

- [LightChloroformExtensionAjaxHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler.md) &ndash; The LightChloroformExtensionAjaxHandler class.
    - [LightChloroformExtensionAjaxHandler::handle](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler/handle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
    - ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
    - ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- [LightChloroformExtensionException](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Exception/LightChloroformExtensionException.md) &ndash; The LightChloroformExtensionException class.
- [BaseTableListFieldConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/BaseTableListFieldConfigurationHandler.md) &ndash; The BaseTableListFieldConfigurationHandler class.
    - [BaseTableListFieldConfigurationHandler::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/BaseTableListFieldConfigurationHandler/__construct.md) &ndash; Builds the LightKitAdminTableListConfigurationHandler instance.
    - [BaseTableListFieldConfigurationHandler::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/BaseTableListFieldConfigurationHandler/getConfigurationItem.md) &ndash; Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) corresponding to the given identifier.
    - [BaseTableListFieldConfigurationHandler::setConfigurationFile](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/BaseTableListFieldConfigurationHandler/setConfigurationFile.md) &ndash; Sets the configurationFile(s).
- [TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface.md) &ndash; The TableListFieldConfigurationHandlerInterface interface.
    - [TableListFieldConfigurationHandlerInterface::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListFieldConfigurationHandlerInterface/getConfigurationItem.md) &ndash; Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) corresponding to the given identifier.
- [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) &ndash; The TableListService.
    - [TableListService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/__construct.md) &ndash; Builds the TableListService instance.
    - [TableListService::getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md) &ndash; Returns the number of items/rows of the query associated with the defined pluginId.
    - [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md) &ndash; Returns an array of rows based on the defined pluginId.
    - [TableListService::getLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getLabel.md) &ndash; Returns the formatted label of the column, based on the given raw value.
    - [TableListService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md) &ndash; Sets the container.
    - [TableListService::setConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setConfigurationHandler.md) &ndash; Sets the configurationHandler.
    - [TableListService::setPluginId](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setPluginId.md) &ndash; Sets the pluginId.
    - [TableListService::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getConfigurationItem.md) &ndash; Returns the [table list configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) referenced by the given pluginId.
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
    - [LightChloroformExtensionService::registerTableListConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/registerTableListConfigurationHandler.md) &ndash; Registers a table list configuration handler for the given plugin name.
    - [LightChloroformExtensionService::getTableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListService.md) &ndash; Returns the table list service based on the given table list identifier.
    - [LightChloroformExtensionService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md) &ndash; Sets the container.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [Chloroform](https://github.com/lingtalfi/Chloroform)


