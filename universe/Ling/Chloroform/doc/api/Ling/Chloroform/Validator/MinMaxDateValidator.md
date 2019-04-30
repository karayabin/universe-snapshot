[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The MinMaxDateValidator class
================
2019-04-10 --> 2019-04-29






Introduction
============

The MinMaxDateValidator class.

The validation depends on the properties set.

If only min is set: validates only if the date given by the user is greater or equal to $min.
If only max is set: validates only if the date given by the user is less than or equal to $max.
If both min and max are set: validates only if the date given by the user is comprised between $min and $max (both included).

This validator also works for datetime and/or time.
The format for a date would be yyyy-mm-dd for instance.



Class synopsis
==============


class <span class="pl-k">MinMaxDateValidator</span> extends [AbstractMinMaxValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator.md) implements ValidatorInterface {

- Inherited properties
    - protected mixed [AbstractMinMaxValidator::$min](#property-min) ;
    - protected mixed [AbstractMinMaxValidator::$max](#property-max) ;
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [setMin](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator/setMin.md)(string $min) : [MinMaxDateValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator.md)
    - public [setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator/setMax.md)(string $max) : [MinMaxDateValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator.md)
    - public [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator/test.md)(?$value, string $fieldName, Ling\Chloroform\Field\FieldInterface $field, string &$error = null) : bool

- Inherited methods
    - public [AbstractMinMaxValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md)() : void
    - public [AbstractMinMaxValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md)() : array
    - public static [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string
    - protected [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md)(bool $identifierAsKey = false) : array

}






Methods
==============

- [MinMaxDateValidator::setMin](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator/setMin.md) &ndash; Sets the min date.
- [MinMaxDateValidator::setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator/setMax.md) &ndash; Sets the max date.
- [MinMaxDateValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator/test.md) &ndash; of the validator.
- [AbstractMinMaxValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [AbstractMinMaxValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md) &ndash; Returns the array version of a validator.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).
- [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md) &ndash; Returns an array of the lines of the error messages file for this validator.





Location
=============
Ling\Chloroform\Validator\MinMaxDateValidator


SeeAlso
==============
Previous class: [MinMaxCharValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxCharValidator.md)<br>Next class: [MinMaxFileSizeValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator.md)<br>
