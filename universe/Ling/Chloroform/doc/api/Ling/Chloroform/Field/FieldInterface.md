[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The FieldInterface class
================
2019-04-10 --> 2019-07-26






Introduction
============

The FieldInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">FieldInterface</span>  {

- Methods
    - abstract public [getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getId.md)() : string
    - abstract public [addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/addValidator.md)([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - abstract public [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/validates.md)(array $postedData, bool $injectValues = true) : bool
    - abstract public [getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getErrors.md)() : array
    - abstract public [setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/setValue.md)(?$value) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - abstract public [getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getValue.md)() : mixed
    - abstract public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/toArray.md)() : array

}






Methods
==============

- [FieldInterface::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getId.md) &ndash; Returns the field id.
- [FieldInterface::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/addValidator.md) &ndash; Adds a validator to this instance.
- [FieldInterface::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/validates.md) &ndash; Tests and returns whether every validator attached to this instanced passed.
- [FieldInterface::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getErrors.md) &ndash; Returns an array of error messages.
- [FieldInterface::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/setValue.md) &ndash; Sets the value for this instance.
- [FieldInterface::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getValue.md) &ndash; Returns the value of the field.
- [FieldInterface::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/toArray.md) &ndash; Returns the array representation of the field.





Location
=============
Ling\Chloroform\Field\FieldInterface<br>
See the source code of [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/Field/FieldInterface.php)



SeeAlso
==============
Previous class: [DateTimeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateTimeField.md)<br>Next class: [FileField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FileField.md)<br>
