[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The PasswordValidator class
================
2019-04-10 --> 2019-08-05






Introduction
============

The PasswordValidator class.



Class synopsis
==============


class <span class="pl-k">PasswordValidator</span> extends [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected int [$nbDigits](#property-nbDigits) ;
    - protected int [$nbAlpha](#property-nbAlpha) ;
    - protected int [$nbAlphaLower](#property-nbAlphaLower) ;
    - protected int [$nbAlphaUpper](#property-nbAlphaUpper) ;
    - protected int [$nbSpecial](#property-nbSpecial) ;

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/__construct.md)() : void
    - public [setNbDigits](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbDigits.md)(int $nbDigits) : [PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md)
    - public [setNbAlpha](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbAlpha.md)(int $nbAlpha) : [PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md)
    - public [setNbAlphaLower](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbAlphaLower.md)(int $nbAlphaLower) : [PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md)
    - public [setNbAlphaUpper](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbAlphaUpper.md)(int $nbAlphaUpper) : [PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md)
    - public [setNbSpecial](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbSpecial.md)(int $nbSpecial) : [PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md)
    - public [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/test.md)(?$value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, string &$error = null) : bool
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/toArray.md)() : array
    - private [count](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/count.md)(array $chars) : array

- Inherited methods
    - public static [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string
    - protected [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md)(bool $identifierAsKey = false) : array

}




Properties
=============

- <span id="property-nbDigits"><b>nbDigits</b></span>

    This property holds the minimum number of digits that the password should contain.
    If null, there is no restriction.
    
    

- <span id="property-nbAlpha"><b>nbAlpha</b></span>

    This property holds the minimum number of alphabetical chars (letters) that the password should contain.
    If null, there is no restriction.
    
    

- <span id="property-nbAlphaLower"><b>nbAlphaLower</b></span>

    This property holds the minimum number of lower case alphabetical chars (letters) that the password should contain.
    If null, there is no restriction.
    
    

- <span id="property-nbAlphaUpper"><b>nbAlphaUpper</b></span>

    This property holds the minimum number of upper case alphabetical chars (letters) that the password should contain.
    If null, there is no restriction.
    
    

- <span id="property-nbSpecial"><b>nbSpecial</b></span>

    This property holds the minimum number of special chars (not letters nor numbers) that the password should contain.
    If null, there is no restriction.
    
    

- <span id="property-messagesDir"><b>messagesDir</b></span>

    This property holds the messagesDir for this instance.
    
    

- <span id="property-customMessages"><b>customMessages</b></span>

    This property holds the customMessages for this instance.
    It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
    
    



Methods
==============

- [PasswordValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [PasswordValidator::setNbDigits](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbDigits.md) &ndash; Sets the nbDigits.
- [PasswordValidator::setNbAlpha](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbAlpha.md) &ndash; Sets the nbAlpha.
- [PasswordValidator::setNbAlphaLower](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbAlphaLower.md) &ndash; Sets the nbAlphaLower.
- [PasswordValidator::setNbAlphaUpper](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbAlphaUpper.md) &ndash; Sets the nbAlphaUpper.
- [PasswordValidator::setNbSpecial](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/setNbSpecial.md) &ndash; Sets the nbSpecial.
- [PasswordValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/test.md) &ndash; of the validator.
- [PasswordValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/toArray.md) &ndash; Returns the array version of a validator.
- [PasswordValidator::count](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/count.md) &ndash; the given string contains.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).
- [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md) &ndash; Returns an array of the lines of the error messages file for this validator.





Location
=============
Ling\Chloroform\Validator\PasswordValidator<br>
See the source code of [Ling\Chloroform\Validator\PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/Validator/PasswordValidator.php)



SeeAlso
==============
Previous class: [PasswordConfirmValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordConfirmValidator.md)<br>Next class: [RequiredDateValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/RequiredDateValidator.md)<br>
