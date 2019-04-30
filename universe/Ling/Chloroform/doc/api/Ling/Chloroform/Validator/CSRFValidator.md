[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The CSRFValidator class
================
2019-04-10 --> 2019-04-29






Introduction
============

The CSRFValidator class.


It validates only if the user typed at least $min character(s) in a text field.



Class synopsis
==============


class <span class="pl-k">CSRFValidator</span> extends [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) implements ValidatorInterface {

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CSRFValidator/test.md)(?$value, string $fieldName, Ling\Chloroform\Field\FieldInterface $field, string &$error = null) : bool

- Inherited methods
    - public [AbstractValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/__construct.md)() : void
    - public static [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [AbstractValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/toArray.md)() : array
    - public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string
    - protected [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md)(bool $identifierAsKey = false) : array

}






Methods
==============

- [CSRFValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CSRFValidator/test.md) &ndash; of the validator.
- [AbstractValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/toArray.md) &ndash; Returns the array version of a validator.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).
- [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md) &ndash; Returns an array of the lines of the error messages file for this validator.





Location
=============
Ling\Chloroform\Validator\CSRFValidator


SeeAlso
==============
Previous class: [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)<br>Next class: [CustomValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator.md)<br>
