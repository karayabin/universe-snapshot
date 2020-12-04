[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The DateField class
================
2019-04-10 --> 2020-12-01






Introduction
============

The DateField class.

Let the user enter a date.

The value format is yyyy-mm-dd (the mysql format for date).



Class synopsis
==============


class <span class="pl-k">DateField</span> extends [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md) implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) {

- Inherited properties
    - protected string [AbstractField::$id](#property-id) ;
    - protected string [AbstractField::$label](#property-label) ;
    - protected string [AbstractField::$hint](#property-hint) ;
    - protected string [AbstractField::$errorName](#property-errorName) ;
    - protected mixed|null [AbstractField::$value](#property-value) ;
    - protected mixed|null [AbstractField::$fallbackValue](#property-fallbackValue) ;
    - protected array [AbstractField::$errors](#property-errors) ;
    - protected [Ling\Chloroform\Validator\ValidatorInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) [AbstractField::$validators](#property-validators) ;
    - protected array [AbstractField::$properties](#property-properties) ;
    - protected bool [AbstractField::$hasVeryImportantData](#property-hasVeryImportantData) ;
    - protected [Ling\Chloroform\DataTransformer\DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) [AbstractField::$dataTransformer](#property-dataTransformer) ;

- Methods
    - public static [create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField/create.md)(string $label, ?array $properties = []) : [DateField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField.md)
    - public [getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField/getValue.md)() : mixed
    - public [getFormattedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField/getFormattedValue.md)() : mixed

- Inherited methods
    - public [AbstractField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/__construct.md)(?array $properties = []) : void
    - public [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md)() : string
    - public [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md)([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md)($value) : bool
    - public [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md)() : array
    - public [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md)($value) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getFallbackValue.md)() : mixed
    - public [AbstractField::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/toArray.md)() : array
    - public [AbstractField::hasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/hasVeryImportantData.md)() : bool
    - public [AbstractField::getDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getDataTransformer.md)() : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null
    - public [AbstractField::setDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setDataTransformer.md)([Ling\Chloroform\DataTransformer\DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) $dataTransformer) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public [AbstractField::setProperties](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setProperties.md)(array $properties) : void
    - public [AbstractField::setProperty](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setProperty.md)(string $name, $value) : void
    - public [AbstractField::setId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setId.md)(string $id) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::setFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setFallbackValue.md)($fallbackValue) : void
    - public [AbstractField::setLabel](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setLabel.md)(string $label) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::setHint](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setHint.md)(string $hint) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::setErrorName](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setErrorName.md)(string $errorName) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::setHasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setHasVeryImportantData.md)(bool $hasVeryImportantData) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - protected [AbstractField::addError](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addError.md)(string $errorMessage) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)

}






Methods
==============

- [DateField::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField/create.md) &ndash; Builds and returns the instance.
- [DateField::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField/getValue.md) &ndash; Returns the value of the field.
- [DateField::getFormattedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateField/getFormattedValue.md) &ndash; Returns the formatted value of this field.
- [AbstractField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/__construct.md) &ndash; Builds the AbstractField instance.
- [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md) &ndash; Returns the field id.
- [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md) &ndash; Adds a validator to this instance.
- [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md) &ndash; Tests and returns whether every validator attached to this instanced passed.
- [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md) &ndash; Returns an array of error messages.
- [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md) &ndash; Sets the value for this instance.
- [AbstractField::getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getFallbackValue.md) &ndash; Returns the fallback value, which defaults to null.
- [AbstractField::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/toArray.md) &ndash; Returns the array representation of the field.
- [AbstractField::hasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/hasVeryImportantData.md) &ndash; Returns whether this field contains [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- [AbstractField::getDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getDataTransformer.md) &ndash; Returns the data transformer of this field if any, or null otherwise.
- [AbstractField::setDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setDataTransformer.md) &ndash; Sets the dataTransformer for this field.
- [AbstractField::setProperties](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setProperties.md) &ndash; Sets the properties of this field.
- [AbstractField::setProperty](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setProperty.md) &ndash; Sets a property to this field.
- [AbstractField::setId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setId.md) &ndash; Sets the id.
- [AbstractField::setFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setFallbackValue.md) &ndash; Sets the fallbackValue.
- [AbstractField::setLabel](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setLabel.md) &ndash; Sets the label.
- [AbstractField::setHint](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setHint.md) &ndash; Sets the hint.
- [AbstractField::setErrorName](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setErrorName.md) &ndash; Sets the errorName.
- [AbstractField::setHasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setHasVeryImportantData.md) &ndash; Sets whether this field has [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- [AbstractField::addError](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addError.md) &ndash; Adds an error message to this instance.





Location
=============
Ling\Chloroform\Field\DateField<br>
See the source code of [Ling\Chloroform\Field\DateField](https://github.com/lingtalfi/Chloroform/blob/master/Field/DateField.php)



SeeAlso
==============
Previous class: [ColorField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/ColorField.md)<br>Next class: [DateTimeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateTimeField.md)<br>
