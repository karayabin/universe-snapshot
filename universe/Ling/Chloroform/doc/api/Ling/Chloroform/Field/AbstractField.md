[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The AbstractField class
================
2019-04-10 --> 2019-04-18






Introduction
============

The AbstractField class.



Class synopsis
==============


abstract class <span class="pl-k">AbstractField</span> implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) {

- Properties
    - protected string [$id](#property-id) ;
    - protected string [$label](#property-label) ;
    - protected string [$hint](#property-hint) ;
    - protected string [$errorName](#property-errorName) ;
    - protected mixed|null [$value](#property-value) ;
    - protected array [$errors](#property-errors) ;
    - protected [Ling\Chloroform\Validator\ValidatorInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) [$validators](#property-validators) ;
    - protected array [$properties](#property-properties) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/__construct.md)(array $properties = []) : void
    - public [getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md)() : string
    - public [addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md)([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md)(array $postedData, bool $injectValues = true) : bool
    - public [getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md)() : array
    - public [setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md)(?$value) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getValue.md)() : mixed
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/toArray.md)() : array
    - public [setId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setId.md)(string $id) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [setLabel](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setLabel.md)(string $label) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [setHint](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setHint.md)(string $hint) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [setErrorName](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setErrorName.md)(string $errorName) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - protected [addError](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addError.md)(string $errorMessage) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)

}




Properties
=============

- <span id="property-id"><b>id</b></span>

    This property holds the id for this instance.
    It's the field id.
    
    

- <span id="property-label"><b>label</b></span>

    This property holds the label for this instance.
    Usually, the label text is displayed in an html label tag.
    
    

- <span id="property-hint"><b>hint</b></span>

    This property holds the hint for this instance.
    Usually, the hint text is displayed in some sort of html placeholder.
    
    

- <span id="property-errorName"><b>errorName</b></span>

    This property holds the errorName for this instance.
    How this field should be referenced in error messages.
    This should be a lower case string (formatting will be done on the fly).
    
    

- <span id="property-value"><b>value</b></span>

    This property holds the value for this instance.
    
    

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    An array of error messages (each being a string).
    
    

- <span id="property-validators"><b>validators</b></span>

    This property holds the validators for this instance.
    
    An array of ValidatorInterface.
    
    

- <span id="property-properties"><b>properties</b></span>

    This property holds the properties for this instance.
    
    



Methods
==============

- [AbstractField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/__construct.md) &ndash; Builds the AbstractField instance.
- [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md) &ndash; Returns the field id.
- [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md) &ndash; Adds a validator to this instance.
- [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md) &ndash; Tests and returns whether every validator attached to this instanced passed.
- [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md) &ndash; Returns an array of error messages.
- [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md) &ndash; Sets the value for this instance.
- [AbstractField::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getValue.md) &ndash; Returns the value of the field.
- [AbstractField::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/toArray.md) &ndash; Returns the array representation of the field.
- [AbstractField::setId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setId.md) &ndash; Sets the id.
- [AbstractField::setLabel](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setLabel.md) &ndash; Sets the label.
- [AbstractField::setHint](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setHint.md) &ndash; Sets the hint.
- [AbstractField::setErrorName](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setErrorName.md) &ndash; Sets the errorName.
- [AbstractField::addError](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addError.md) &ndash; Adds an error message to this instance.





Location
=============
Ling\Chloroform\Field\AbstractField


SeeAlso
==============
Previous class: [ChloroformException](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Exception/ChloroformException.md)<br>Next class: [CSRFField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField.md)<br>
