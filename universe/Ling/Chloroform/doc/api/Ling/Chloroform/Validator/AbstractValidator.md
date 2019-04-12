[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The AbstractValidator class
================
2019-04-10 --> 2019-04-12






Introduction
============

The AbstractValidator class.

A helper class that most validators will extend (except for the CustomValidator).



Class synopsis
==============


abstract class <span class="pl-k">AbstractValidator</span> implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected string [$messagesDir](#property-messagesDir) ;
    - protected array [$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string

- Inherited methods
    - abstract public [ValidatorInterface::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface/test.md)(?$value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, string &$error = null) : bool

}




Properties
=============

- <span id="property-messagesDir"><b>messagesDir</b></span>

    This property holds the messagesDir for this instance.
    
    

- <span id="property-customMessages"><b>customMessages</b></span>

    This property holds the customMessages for this instance.
    It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
    
    



Methods
==============

- [AbstractValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).
- [ValidatorInterface::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface/test.md) &ndash; of the validator.





Location
=============
Ling\Chloroform\Validator\AbstractValidator


SeeAlso
==============
Previous class: [FieldHelper](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper.md)<br>Next class: [CSRFValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CSRFValidator.md)<br>
