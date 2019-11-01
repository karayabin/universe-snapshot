[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The CustomValidator class
================
2019-04-10 --> 2019-11-01






Introduction
============

The CustomValidator class.
You can use this class to create custom validators.



Class synopsis
==============


class <span class="pl-k">CustomValidator</span> implements [ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) {

- Properties
    - protected callable [$testCallback](#property-testCallback) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/__construct.md)(callable $testCallback) : void
    - public static [create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/create.md)(callable $testCallback) : [CustomValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator.md)
    - public [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/test.md)($value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, ?string &$error = null) : bool
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/toArray.md)() : array

}




Properties
=============

- <span id="property-testCallback"><b>testCallback</b></span>

    This property holds the testCallback for this instance.
    
    It's a callable to execute, which should return whether the test passes (true) or not (false).
    The callable has the same signature as the test method of this class.
    
    



Methods
==============

- [CustomValidator::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/__construct.md) &ndash; Builds the CustomValidator instance.
- [CustomValidator::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/create.md) &ndash; Builds and returns the CustomValidator instance.
- [CustomValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/test.md) &ndash; of the validator.
- [CustomValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CustomValidator/toArray.md) &ndash; Returns the array version of a validator.





Location
=============
Ling\Chloroform\Validator\CustomValidator<br>
See the source code of [Ling\Chloroform\Validator\CustomValidator](https://github.com/lingtalfi/Chloroform/blob/master/Validator/CustomValidator.php)



SeeAlso
==============
Previous class: [CSRFValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/CSRFValidator.md)<br>Next class: [FileMimeTypeValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/FileMimeTypeValidator.md)<br>
