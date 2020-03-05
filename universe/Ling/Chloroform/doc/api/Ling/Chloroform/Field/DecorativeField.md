[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The DecorativeField class
================
2019-04-10 --> 2020-02-21






Introduction
============

The DecorativeField class.

The idea of this class is to encode for any type of decorative element of the form.
Rather than creating one class per type of decorative element, this class can represent
any type of decorative element.

This is done via the deco_type property of this class.


We recommend the following types, however you are free to create your owns:

- hr: a separator



Class synopsis
==============


class <span class="pl-k">DecorativeField</span> implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) {

- Properties
    - private static int [$cpt](#property-cpt) = 1 ;
    - protected string [$decorationType](#property-decorationType) ;
    - protected array [$decorationOptions](#property-decorationOptions) ;
    - protected string [$id](#property-id) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/__construct.md)(?array $properties = []) : void
    - public [getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getId.md)() : string
    - public [addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/addValidator.md)([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public [setDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/setDataTransformer.md)([Ling\Chloroform\DataTransformer\DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) $dataTransformer) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/validates.md)($value) : bool
    - public [getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getErrors.md)() : array
    - public [setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/setValue.md)($value) : [DecorativeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField.md)
    - public [getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getValue.md)() : mixed
    - public [getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getFallbackValue.md)() : mixed
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/toArray.md)() : array
    - public [hasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/hasVeryImportantData.md)() : bool
    - public [getDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getDataTransformer.md)() : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null
    - public [getDecorationType](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getDecorationType.md)() : string
    - public [getDecorationOptions](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getDecorationOptions.md)() : array

}




Properties
=============

- <span id="property-cpt"><b>cpt</b></span>

    This property holds the cpt for this instance.
    
    

- <span id="property-decorationType"><b>decorationType</b></span>

    This property holds the decoration type for this instance.
    
    

- <span id="property-decorationOptions"><b>decorationOptions</b></span>

    This property holds the decorationOptions for this instance.
    
    

- <span id="property-id"><b>id</b></span>

    This property holds the id for this instance.
    
    



Methods
==============

- [DecorativeField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/__construct.md) &ndash; Builds the DecorativeField instance.
- [DecorativeField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getId.md) &ndash; Returns the field id.
- [DecorativeField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/addValidator.md) &ndash; Adds a validator to this instance.
- [DecorativeField::setDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/setDataTransformer.md) &ndash; Sets the dataTransformer for this field.
- [DecorativeField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/validates.md) &ndash; Tests and returns whether every validator attached to this instanced passed.
- [DecorativeField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getErrors.md) &ndash; Returns an array of error messages.
- [DecorativeField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/setValue.md) &ndash; Sets the value for this instance.
- [DecorativeField::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getValue.md) &ndash; Returns the value of the field.
- [DecorativeField::getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getFallbackValue.md) &ndash; Returns the fallback value, which defaults to null.
- [DecorativeField::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/toArray.md) &ndash; Returns the array representation of the field.
- [DecorativeField::hasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/hasVeryImportantData.md) &ndash; Returns whether this field contains [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- [DecorativeField::getDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getDataTransformer.md) &ndash; Returns the data transformer of this field if any, or null otherwise.
- [DecorativeField::getDecorationType](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getDecorationType.md) &ndash; Returns the type of this instance.
- [DecorativeField::getDecorationOptions](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getDecorationOptions.md) &ndash; Returns the decorationOptions of this instance.





Location
=============
Ling\Chloroform\Field\DecorativeField<br>
See the source code of [Ling\Chloroform\Field\DecorativeField](https://github.com/lingtalfi/Chloroform/blob/master/Field/DecorativeField.php)



SeeAlso
==============
Previous class: [DateTimeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DateTimeField.md)<br>Next class: [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)<br>
