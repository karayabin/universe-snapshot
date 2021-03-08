[Back to the Ling/Light_CsrfSession api](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession.md)



The LightCsrfSessionValidator class
================
2019-11-27 --> 2021-03-05






Introduction
============

The LightCsrfSessionValidator class.



Class synopsis
==============


class <span class="pl-k">LightCsrfSessionValidator</span> extends AbstractValidator implements ValidatorInterface {

- Properties
    - protected Ling\Light\ServiceContainer\LightServiceContainerInterface [$container](#property-container) ;

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/__construct.md)() : void
    - public [test](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/test.md)($value, string $fieldName, Ling\Chloroform\Field\FieldInterface $field, ?string &$error = null) : bool
    - public [setContainer](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/setContainer.md)(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : [LightCsrfSessionValidator](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator.md)

- Inherited methods
    - public static AbstractValidator::create() : Ling\Chloroform\Validator\AbstractValidator
    - public AbstractValidator::toArray() : array
    - public AbstractValidator::setErrorMessage(string $errorMessage, ?string $messageIdentifier = null) : Ling\Chloroform\Validator\AbstractValidator
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

- [LightCsrfSessionValidator::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [LightCsrfSessionValidator::test](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/test.md) &ndash; of the validator.
- [LightCsrfSessionValidator::setContainer](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator/setContainer.md) &ndash; Sets the container.
- AbstractValidator::create &ndash; Builds and returns the instance for this class.
- AbstractValidator::toArray &ndash; Returns the array version of a validator.
- AbstractValidator::setErrorMessage &ndash; Overrides a default error message, and returns this instance (for chaining).
- AbstractValidator::getErrorMessage &ndash; Returns the error message for the called object (this).
- AbstractValidator::getMessages &ndash; Returns an array of the lines of the error messages file for this validator.
- AbstractValidator::getDefaultMessagesDir &ndash; Returns a default/standard location for the messages directory.





Location
=============
Ling\Light_CsrfSession\Chloroform\Validator\LightCsrfSessionValidator<br>
See the source code of [Ling\Light_CsrfSession\Chloroform\Validator\LightCsrfSessionValidator](https://github.com/lingtalfi/Light_CsrfSession/blob/master/Chloroform/Validator/LightCsrfSessionValidator.php)



SeeAlso
==============
Previous class: [LightCsrfSessionField](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField.md)<br>Next class: [LightCsrfSessionService](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService.md)<br>
