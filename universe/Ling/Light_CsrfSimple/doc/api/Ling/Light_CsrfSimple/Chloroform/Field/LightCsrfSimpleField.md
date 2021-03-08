[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)



The LightCsrfSimpleField class
================
2019-11-07 --> 2021-03-05






Introduction
============

The LightCsrfSimpleField class.



Class synopsis
==============


class <span class="pl-k">LightCsrfSimpleField</span> extends [HiddenField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField.md) implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

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
    - public [__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/__construct.md)(?array $properties = []) : void
    - public [getValue](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/getValue.md)() : mixed
    - public [setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [LightCsrfSimpleField](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField.md)

- Inherited methods
    - public static HiddenField::create(string $id, ?array $properties = []) : [HiddenField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField.md)
    - public AbstractField::getId() : string
    - public AbstractField::addValidator([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public AbstractField::validates($value) : bool
    - public AbstractField::getErrors() : array
    - public AbstractField::setValue($value) : Ling\Chloroform\Field\AbstractField
    - public AbstractField::getFormattedValue() : mixed
    - public AbstractField::getFallbackValue() : mixed
    - public AbstractField::toArray() : array
    - public AbstractField::hasVeryImportantData() : bool
    - public AbstractField::getDataTransformer() : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null
    - public AbstractField::setDataTransformer([Ling\Chloroform\DataTransformer\DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) $dataTransformer) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public AbstractField::setProperties(array $properties) : void
    - public AbstractField::setProperty(string $name, $value) : void
    - public AbstractField::setId(string $id) : Ling\Chloroform\Field\AbstractField
    - public AbstractField::setFallbackValue($fallbackValue) : void
    - public AbstractField::setLabel(string $label) : Ling\Chloroform\Field\AbstractField
    - public AbstractField::setHint(string $hint) : Ling\Chloroform\Field\AbstractField
    - public AbstractField::setErrorName(string $errorName) : Ling\Chloroform\Field\AbstractField
    - public AbstractField::setHasVeryImportantData(bool $hasVeryImportantData) : Ling\Chloroform\Field\AbstractField
    - protected AbstractField::addError(string $errorMessage) : Ling\Chloroform\Field\AbstractField

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

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
    
    

- <span id="property-fallbackValue"><b>fallbackValue</b></span>

    This property holds the fallbackValue for this instance.
    
    

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    An array of error messages (each being a string).
    
    

- <span id="property-validators"><b>validators</b></span>

    This property holds the validators for this instance.
    
    An array of ValidatorInterface.
    
    

- <span id="property-properties"><b>properties</b></span>

    This property holds the properties for this instance.
    
    

- <span id="property-hasVeryImportantData"><b>hasVeryImportantData</b></span>

    This property holds the hasVeryImportantData for this instance.
    
    

- <span id="property-dataTransformer"><b>dataTransformer</b></span>

    This property holds the dataTransformer for this instance.
    
    



Methods
==============

- [LightCsrfSimpleField::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/__construct.md) &ndash; Builds the AbstractField instance.
- [LightCsrfSimpleField::getValue](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/getValue.md) &ndash; Returns the value of the field.
- [LightCsrfSimpleField::setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/setContainer.md) &ndash; Sets the container.
- HiddenField::create &ndash; Builds the HiddenField instance and returns it.
- AbstractField::getId &ndash; Returns the field id.
- AbstractField::addValidator &ndash; Adds a validator to this instance.
- AbstractField::validates &ndash; Tests and returns whether every validator attached to this instanced passed.
- AbstractField::getErrors &ndash; Returns an array of error messages.
- AbstractField::setValue &ndash; Sets the value for this instance.
- AbstractField::getFormattedValue &ndash; Returns the formatted value of this field.
- AbstractField::getFallbackValue &ndash; Returns the fallback value, which defaults to null.
- AbstractField::toArray &ndash; Returns the array representation of the field.
- AbstractField::hasVeryImportantData &ndash; Returns whether this field contains [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- AbstractField::getDataTransformer &ndash; Returns the data transformer of this field if any, or null otherwise.
- AbstractField::setDataTransformer &ndash; Sets the dataTransformer for this field.
- AbstractField::setProperties &ndash; Sets the properties of this field.
- AbstractField::setProperty &ndash; Sets a property to this field.
- AbstractField::setId &ndash; Sets the id.
- AbstractField::setFallbackValue &ndash; Sets the fallbackValue.
- AbstractField::setLabel &ndash; Sets the label.
- AbstractField::setHint &ndash; Sets the hint.
- AbstractField::setErrorName &ndash; Sets the errorName.
- AbstractField::setHasVeryImportantData &ndash; Sets whether this field has [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- AbstractField::addError &ndash; Adds an error message to this instance.





Location
=============
Ling\Light_CsrfSimple\Chloroform\Field\LightCsrfSimpleField<br>
See the source code of [Ling\Light_CsrfSimple\Chloroform\Field\LightCsrfSimpleField](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Chloroform/Field/LightCsrfSimpleField.php)



SeeAlso
==============
Next class: [LightCsrfSimpleValidator](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator.md)<br>
