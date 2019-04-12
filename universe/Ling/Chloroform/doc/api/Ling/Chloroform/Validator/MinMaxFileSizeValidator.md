[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The MinMaxFileSizeValidator class
================
2019-04-10 --> 2019-04-12






Introduction
============

The MinMaxFileSizeValidator class.

This class validates the size of the posted file (usually in $_FILES).



The validation depends on the properties set.

If only min is set: validates only if the file size is greater or equal to $min.
If only max is set: validates only if the file size is less than or equal to $max.
If both min and max are set: validates only if the file size is comprised between $min and $max (both included).



The min and max values can be either a number or a human string representing the file size,
as recognized by the [ConvertTool::convertHumanSizeToBytes](https://github.com/lingtalfi/Bat/blob/master/ConvertTool.md#converthumansizetobytes) method (from the [Bat planet](https://github.com/lingtalfi/Bat)).
So for instance, you can use the "2M" notation to represent two mega-bytes.



Class synopsis
==============


class <span class="pl-k">MinMaxFileSizeValidator</span> extends [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected mixed [$min](#property-min) ;
    - protected mixed [$max](#property-max) ;

- Inherited properties
    - protected string [AbstractValidator::$messagesDir](#property-messagesDir) ;
    - protected array [AbstractValidator::$customMessages](#property-customMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/__construct.md)() : void
    - public [setMin](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/setMin.md)(?$min) : [MinMaxFileSizeValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator.md)
    - public [setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/setMax.md)(?$max) : [MinMaxFileSizeValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator.md)
    - public [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/test.md)(?$value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, string &$error = null) : bool

- Inherited methods
    - public static [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md)() : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)
    - protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string

}




Properties
=============

- <span id="property-min"><b>min</b></span>

    This property holds the min for this instance.
    
    

- <span id="property-max"><b>max</b></span>

    This property holds the max for this instance.
    
    

- <span id="property-messagesDir"><b>messagesDir</b></span>

    This property holds the messagesDir for this instance.
    
    

- <span id="property-customMessages"><b>customMessages</b></span>

    This property holds the customMessages for this instance.
    It's an array of message identifier => (symbolic) error message (i.e. symbolic means with tags).
    
    



Methods
==============

- [MinMaxFileSizeValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/__construct.md) &ndash; Builds the AbstractValidator instance.
- [MinMaxFileSizeValidator::setMin](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/setMin.md) &ndash; Sets the min.
- [MinMaxFileSizeValidator::setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/setMax.md) &ndash; Sets the max.
- [MinMaxFileSizeValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxFileSizeValidator/test.md) &ndash; of the validator.
- [AbstractValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/create.md) &ndash; Builds and returns the instance for this class.
- [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md) &ndash; Overrides a default error message, and returns this instance (for chaining).
- [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md) &ndash; Returns the error message for the called object (this).





Location
=============
Ling\Chloroform\Validator\MinMaxFileSizeValidator


SeeAlso
==============
Previous class: [MinMaxDateValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxDateValidator.md)<br>Next class: [MinMaxItemValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator.md)<br>
