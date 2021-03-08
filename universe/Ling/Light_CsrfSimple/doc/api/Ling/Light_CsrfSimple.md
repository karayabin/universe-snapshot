Ling/Light_CsrfSimple
================
2019-11-07 --> 2021-03-05




Table of contents
===========

- [LightCsrfSimpleField](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField.md) &ndash; The LightCsrfSimpleField class.
    - [LightCsrfSimpleField::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/__construct.md) &ndash; Builds the AbstractField instance.
    - [LightCsrfSimpleField::getValue](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/getValue.md) &ndash; Returns the value of the field.
    - [LightCsrfSimpleField::setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/setContainer.md) &ndash; Sets the container.
    - HiddenField::create &ndash; Builds the HiddenField instance and returns it.
    - AbstractField::getId &ndash; Returns the field id.
    - AbstractField::addValidator &ndash; Adds a validator to this instance.
    - AbstractField::validates &ndash; Tests and returns whether every validator attached to this instanced passed.
    - AbstractField::getErrors &ndash; Returns an array of error messages.
    - AbstractField::setValue &ndash; Sets the value for this instance.
    - AbstractField::getFormattedValue &ndash; Returns the formatted value of this field.
    - AbstractField::getFallbackValue &ndash; Returns the fallback value, which defaults to null.
    - AbstractField::toArray &ndash; Returns the array representation of the field.
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
- [LightCsrfSimpleValidator](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator.md) &ndash; The LightCsrfSimpleValidator class.
    - [LightCsrfSimpleValidator::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
    - [LightCsrfSimpleValidator::test](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/test.md) &ndash; of the validator.
    - [LightCsrfSimpleValidator::setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/setContainer.md) &ndash; Sets the container.
    - AbstractValidator::create &ndash; Builds and returns the instance for this class.
    - AbstractValidator::toArray &ndash; Returns the array version of a validator.
    - AbstractValidator::setErrorMessage &ndash; Overrides a default error message, and returns this instance (for chaining).
- [LightCsrfSimpleService](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService.md) &ndash; The LightCsrfSimpleService class.
    - [LightCsrfSimpleService::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/__construct.md) &ndash; Builds the LightCsrfSimpleService instance.
    - [LightCsrfSimpleService::onRouteFound](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/onRouteFound.md) &ndash; This is a callable to execute when the **Light.on_route_found** event is fired.
    - [LightCsrfSimpleService::getToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getToken.md) &ndash; Returns the csrf token value stored in the new slot.
    - [LightCsrfSimpleService::getOldToken](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/getOldToken.md) &ndash; Returns the csrf token value stored in the old slot.
    - [LightCsrfSimpleService::regenerate](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/regenerate.md) &ndash; Regenerates a new token, and moves the replaced token to the old slot.
    - [LightCsrfSimpleService::isValid](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/isValid.md) &ndash; Returns whether the given token is valid.
    - [LightCsrfSimpleService::setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService/setContainer.md) &ndash; Sets the container.


Dependencies
============
- [Chloroform](https://github.com/lingtalfi/Chloroform)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)


