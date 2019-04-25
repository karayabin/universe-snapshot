[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The AbstractMinMaxValidator class
================
2019-04-10 --> 2019-04-18






Introduction
============

The AbstractMinMaxValidator class.



Class synopsis
==============


abstract class <span class="pl-k">AbstractMinMaxValidator</span> extends [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected mixed [$min](#property-min) ;
    - protected mixed [$max](#property-max) ;

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md)() : void
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md)() : array

- Inherited methods
    - public static [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string
    - protected [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md)(bool $identifierAsKey = false) : array
    - abstract public [ValidatorInterface::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface/test.md)(?$value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, string &$error = null) : bool

}




Properties
=============

- <span id="property-min"><b>min</b></span>

    This property holds the min for this instance.
    The actual type depends on the concrete class, it might be an int or a string.
    
    

- <span id="property-max"><b>max</b></span>

    This property holds the max for this instance.
    The actual type depends on the concrete class, it might be an int or a string.
    
    

- <span id="property-messagesDir"><b>messagesDir</b></span>

    This property holds the messagesDir for this instance.
    
    

- <span id="property-customMessages"><b>customMessages</b></span>

    This property holds the customMessages for this instance.
    It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
    
    



Methods
==============

- [AbstractMinMaxValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [AbstractMinMaxValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md) &ndash; Returns the array version of a validator.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).
- [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md) &ndash; Returns an array of the lines of the error messages file for this validator.
- [ValidatorInterface::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface/test.md) &ndash; of the validator.





Location
=============
Ling\Chloroform\Validator\AbstractMinMaxValidator


SeeAlso
==============
Previous class: [ChloroformRendererInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Renderer/ChloroformRendererInterface.md)<br>Next class: [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)<br>
