[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The MinMaxItemValidator class
================
2019-04-10 --> 2020-02-21






Introduction
============

The MinMaxItemValidator class.

This class validates how many items the user chose.
It works with fields returning arrays (or null if nothing was set or no items was chosen).



The validation depends on the properties set.

If only min is set: validates only if the number of items chosen by the user is greater or equal to $min.
If only max is set: validates only if the number of items chosen by the user is less than or equal to $max.
If both min and max are set: validates only if the number of items chosen by the user is comprised between $min and $max (both included).



Class synopsis
==============


class <span class="pl-k">MinMaxItemValidator</span> extends [AbstractMinMaxValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator.md) implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Inherited properties
    - protected mixed [AbstractMinMaxValidator::$min](#property-min) ;
    - protected mixed [AbstractMinMaxValidator::$max](#property-max) ;
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [setMin](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/setMin.md)(int $min) : [MinMaxItemValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator.md)
    - public [setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/setMax.md)(int $max) : [MinMaxItemValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator.md)
    - public [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/test.md)($value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, ?string &$error = null) : bool

- Inherited methods
    - public [AbstractMinMaxValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md)() : void
    - public [AbstractMinMaxValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md)() : array
    - public static [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, ?string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string
    - protected [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md)(?bool $identifierAsKey = false) : array
    - protected [AbstractValidator::getDefaultMessagesDir](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getDefaultMessagesDir.md)(string $baseDir) : string

}






Methods
==============

- [MinMaxItemValidator::setMin](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/setMin.md) &ndash; Sets the min.
- [MinMaxItemValidator::setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/setMax.md) &ndash; Sets the max.
- [MinMaxItemValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/test.md) &ndash; of the validator.
- [AbstractMinMaxValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [AbstractMinMaxValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md) &ndash; Returns the array version of a validator.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).
- [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md) &ndash; Returns an array of the lines of the error messages file for this validator.
- [AbstractValidator::getDefaultMessagesDir](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getDefaultMessagesDir.md) &ndash; Returns a default/standard location for the messages directory.





Location
=============
Ling\Chloroform\Validator\MinMaxItemValidator<br>
See the source code of [Ling\Chloroform\Validator\MinMaxItemValidator](https://github.com/lingtalfi/Chloroform/blob/master/Validator/MinMaxItemValidator.php)



SeeAlso
==============
Previous class: [MinMaxFileSizeValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator.md)<br>Next class: [MinMaxNumberValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxNumberValidator.md)<br>
