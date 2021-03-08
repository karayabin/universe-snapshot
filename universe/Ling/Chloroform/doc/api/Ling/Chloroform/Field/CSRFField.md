[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The CSRFField class
================
2019-04-10 --> 2021-03-05






Introduction
============

The CSRFField class.



Class synopsis
==============


class <span class="pl-k">CSRFField</span> extends [HiddenField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField.md) implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) {

- Properties
    - protected string [$csrfIdentifier](#property-csrfIdentifier) ;
    - protected [Ling\CSRFTools\CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) [$csrfProtector](#property-csrfProtector) ;
    - private bool [$_tokenCreated](#property-_tokenCreated) ;

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
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/__construct.md)(?array $properties = []) : void
    - public [setCsrfIdentifier](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/setCsrfIdentifier.md)(string $csrfIdentifier) : [CSRFField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField.md)
    - public [getCsrfIdentifier](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/getCsrfIdentifier.md)() : string
    - public [setCsrfProtector](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/setCsrfProtector.md)([Ling\CSRFTools\CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) $csrfProtector) : [CSRFField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField.md)
    - public [getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/getValue.md)() : mixed
    - protected [getCsrfProtector](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/getCsrfProtector.md)() : [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md)

- Inherited methods
    - public static [HiddenField::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField/create.md)(string $id, ?array $properties = []) : [HiddenField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField.md)
    - public [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md)() : string
    - public [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md)([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md)($value) : bool
    - public [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md)() : array
    - public [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md)($value) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::getFormattedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getFormattedValue.md)() : mixed
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




Properties
=============

- <span id="property-csrfIdentifier"><b>csrfIdentifier</b></span>

    This property holds the csrfIdentifier for this instance.
    
    The [Csrf identifier](https://github.com/lingtalfi/CSRFTools#a-quick-word-about-concurrent-csrf-tokens).
    
    

- <span id="property-csrfProtector"><b>csrfProtector</b></span>

    This property holds the csrfProtector for this instance.
    
    

- <span id="property-_tokenCreated"><b>_tokenCreated</b></span>

    This property holds the _tokenCreated for this instance.
    It's an internal variable that I use to keep track of whether the token
    was already created.
    
    

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

- [CSRFField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/__construct.md) &ndash; Builds the AbstractField instance.
- [CSRFField::setCsrfIdentifier](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/setCsrfIdentifier.md) &ndash; Sets the csrfIdentifier.
- [CSRFField::getCsrfIdentifier](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/getCsrfIdentifier.md) &ndash; Returns the csrfIdentifier of this instance.
- [CSRFField::setCsrfProtector](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/setCsrfProtector.md) &ndash; Sets the csrfProtector.
- [CSRFField::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/getValue.md) &ndash; Returns the value of the field.
- [CSRFField::getCsrfProtector](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField/getCsrfProtector.md) &ndash; Returns the csrf protector instance.
- [HiddenField::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField/create.md) &ndash; Builds the HiddenField instance and returns it.
- [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md) &ndash; Returns the field id.
- [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md) &ndash; Adds a validator to this instance.
- [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md) &ndash; Tests and returns whether every validator attached to this instanced passed.
- [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md) &ndash; Returns an array of error messages.
- [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md) &ndash; Sets the value for this instance.
- [AbstractField::getFormattedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getFormattedValue.md) &ndash; Returns the formatted value of this field.
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
Ling\Chloroform\Field\CSRFField<br>
See the source code of [Ling\Chloroform\Field\CSRFField](https://github.com/lingtalfi/Chloroform/blob/master/Field/CSRFField.php)



SeeAlso
==============
Previous class: [AjaxFileBoxField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AjaxFileBoxField.md)<br>Next class: [CheckboxField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CheckboxField.md)<br>
