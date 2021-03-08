Ling/Light_CsrfSession
================
2019-11-27 --> 2021-03-05




Table of contents
===========

- [LightCsrfSessionField](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField.md) &ndash; The LightCsrfSessionField class
    - [LightCsrfSessionField::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField/__construct.md) &ndash; Builds the AbstractField instance.
    - [LightCsrfSessionField::getValue](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField/getValue.md) &ndash; Returns the value of the field.
    - [LightCsrfSessionField::setContainer](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField/setContainer.md) &ndash; Sets the container.
    - HiddenField::create &ndash; Builds the HiddenField instance and returns it.
    - AbstractField::getId &ndash; Returns the field id.
    - AbstractField::addValidator &ndash; Adds a validator to this instance.
    - AbstractField::validates &ndash; Tests and returns whether every validator attached to this instanced passed.
    - AbstractField::getErrors &ndash; Returns an array of error messages.
    - AbstractField::setValue &ndash; Sets the value for this instance.
    - AbstractField::getFormattedValue &ndash; Returns the formatted value of this field.
    - AbstractField::getFallbackValue &ndash; Returns the fallback value, which defaults to null.
    - AbstractField::toArray &ndash; Returns the array representation of the field.
    - AbstractField::hasVeryImportantData &ndash; Returns whether this field contains very important data.
    - AbstractField::getDataTransformer &ndash; Returns the data transformer of this field if any, or null otherwise.
    - AbstractField::setDataTransformer &ndash; Sets the dataTransformer for this field.
    - AbstractField::setProperties &ndash; Sets the properties of this field.
    - AbstractField::setProperty &ndash; Sets a property to this field.
    - AbstractField::setId &ndash; Sets the id.
    - AbstractField::setFallbackValue &ndash; Sets the fallbackValue.
    - AbstractField::setLabel &ndash; Sets the label.
    - AbstractField::setHint &ndash; Sets the hint.
    - AbstractField::setErrorName &ndash; Sets the errorName.
    - AbstractField::setHasVeryImportantData &ndash; Sets whether this field has very important data.
- [LightCsrfSessionValidator](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator.md) &ndash; The LightCsrfSessionValidator class.
    - [LightCsrfSessionValidator::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
    - [LightCsrfSessionValidator::test](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/test.md) &ndash; of the validator.
    - [LightCsrfSessionValidator::setContainer](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/setContainer.md) &ndash; Sets the container.
    - AbstractValidator::create &ndash; Builds and returns the instance for this class.
    - AbstractValidator::toArray &ndash; Returns the array version of a validator.
    - AbstractValidator::setErrorMessage &ndash; Overrides a default error message, and returns this instance (for chaining).
- [LightCsrfSessionService](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService.md) &ndash; The LightCsrfSessionService class.
    - [LightCsrfSessionService::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/__construct.md) &ndash; Builds the LightCsrfSessionService instance.
    - [LightCsrfSessionService::getToken](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/getToken.md) &ndash; Returns the csrf token value stored in the session.
    - [LightCsrfSessionService::isValid](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/isValid.md) &ndash; Returns whether the given token is valid.
    - [LightCsrfSessionService::setSalt](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/setSalt.md) &ndash; Sets the salt.


Dependencies
============
- [Chloroform](https://github.com/lingtalfi/Chloroform)
- [Light](https://github.com/lingtalfi/Light)


