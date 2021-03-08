[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)



The LightCsrfSimpleValidator class
================
2019-11-07 --> 2021-03-05






Introduction
============

The LightCsrfSimpleValidator class.



Class synopsis
==============


class <span class="pl-k">LightCsrfSimpleValidator</span> extends [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/__construct.md)() : void
    - public [test](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/test.md)($value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, ?string &$error = null) : bool
    - public [setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [LightCsrfSimpleValidator](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator.md)

- Inherited methods
    - public static AbstractValidator::create() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public AbstractValidator::toArray() : array
    - public AbstractValidator::setErrorMessage(string $errorMessage, ?string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected AbstractValidator::getErrorMessage(string $msgId, array $variables) : string
    - protected AbstractValidator::getMessages(?bool $identifierAsKey = false) : array
    - protected AbstractValidator::getDefaultMessagesDir(string $baseDir) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-messagesDir"><b>messagesDir</b></span>

    This property holds the messagesDir for this instance.
    
    

- <span id="property-customMessages"><b>customMessages</b></span>

    This property holds the customMessages for this instance.
    It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
    
    



Methods
==============

- [LightCsrfSimpleValidator::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [LightCsrfSimpleValidator::test](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/test.md) &ndash; of the validator.
- [LightCsrfSimpleValidator::setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/setContainer.md) &ndash; Sets the container.
- AbstractValidator::create &ndash; Builds and returns the instance for this class.
- AbstractValidator::toArray &ndash; Returns the array version of a validator.
- AbstractValidator::setErrorMessage &ndash; Overrides a default error message, and returns this instance (for chaining).
- AbstractValidator::getErrorMessage &ndash; Returns the error message for the called object (this).
- AbstractValidator::getMessages &ndash; Returns an array of the lines of the error messages file for this validator.
- AbstractValidator::getDefaultMessagesDir &ndash; Returns a default/standard location for the messages directory.





Location
=============
Ling\Light_CsrfSimple\Chloroform\Validator\LightCsrfSimpleValidator<br>
See the source code of [Ling\Light_CsrfSimple\Chloroform\Validator\LightCsrfSimpleValidator](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Chloroform/Validator/LightCsrfSimpleValidator.php)



SeeAlso
==============
Previous class: [LightCsrfSimpleField](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField.md)<br>Next class: [LightCsrfSimpleService](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Service/LightCsrfSimpleService.md)<br>
