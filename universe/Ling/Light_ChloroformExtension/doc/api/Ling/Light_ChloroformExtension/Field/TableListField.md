[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)



The TableListField class
================
2019-11-18 --> 2019-12-09






Introduction
============

The TableListField class.
See more in the [TableListField conception notes](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#tablelistfield)



Class synopsis
==============


class <span class="pl-k">TableListField</span> extends [SelectField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md) implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md), [FormAwareFieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FormAwareFieldInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected bool [$isPrepared](#property-isPrepared) ;
    - protected [Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) [$form](#property-form) ;

- Inherited properties
    - protected array [SelectField::$items](#property-items) ;
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
    - public [__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/__construct.md)(?array $properties = []) : void
    - public [setForm](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setForm.md)([Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) $form) : void
    - public [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md)
    - public [toArray](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/toArray.md)() : array
    - private [prepareItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/prepareItems.md)() : void

- Inherited methods
    - public static SelectField::create(string $label, ?array $properties = []) : [SelectField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md)
    - public SelectField::setItems(array $items) : [SelectField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md)
    - public AbstractField::getId() : string
    - public AbstractField::addValidator([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public AbstractField::validates($value) : bool
    - public AbstractField::getErrors() : array
    - public AbstractField::setValue($value) : Ling\Chloroform\Field\AbstractField
    - public AbstractField::getValue() : mixed
    - public AbstractField::getFallbackValue() : mixed
    - public AbstractField::hasVeryImportantData() : bool
    - public AbstractField::getDataTransformer() : [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) | null
    - public AbstractField::setDataTransformer([Ling\Chloroform\DataTransformer\DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) $dataTransformer) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
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
    
    

- <span id="property-isPrepared"><b>isPrepared</b></span>

    This property holds the isPrepared for this instance.
    
    

- <span id="property-form"><b>form</b></span>

    This property holds the form for this instance.
    
    

- <span id="property-items"><b>items</b></span>

    This property holds the items for this instance.
    
    This is an array which can have one of two forms:
    
    - a simple select, in which case the array is an array of value => option label
    - a select with group (optgroup tag), in which case it's an array of group label => simple select array
    
    

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

- [TableListField::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/__construct.md) &ndash; Builds the AbstractField instance.
- [TableListField::setForm](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setForm.md) &ndash; Sets the form instance.
- [TableListField::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setContainer.md) &ndash; Sets the container.
- [TableListField::toArray](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/toArray.md) &ndash; Returns the array representation of the field.
- [TableListField::prepareItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/prepareItems.md) &ndash; Prepares this class to be exported with the toArray method.
- SelectField::create &ndash; Builds and returns the instance.
- SelectField::setItems &ndash; Sets the items.
- AbstractField::getId &ndash; Returns the field id.
- AbstractField::addValidator &ndash; Adds a validator to this instance.
- AbstractField::validates &ndash; Tests and returns whether every validator attached to this instanced passed.
- AbstractField::getErrors &ndash; Returns an array of error messages.
- AbstractField::setValue &ndash; Sets the value for this instance.
- AbstractField::getValue &ndash; Returns the value of the field.
- AbstractField::getFallbackValue &ndash; Returns the fallback value, which defaults to null.
- AbstractField::hasVeryImportantData &ndash; Returns whether this field contains [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- AbstractField::getDataTransformer &ndash; Returns the data transformer of this field if any, or null otherwise.
- AbstractField::setDataTransformer &ndash; Sets the dataTransformer for this field.
- AbstractField::setId &ndash; Sets the id.
- AbstractField::setFallbackValue &ndash; Sets the fallbackValue.
- AbstractField::setLabel &ndash; Sets the label.
- AbstractField::setHint &ndash; Sets the hint.
- AbstractField::setErrorName &ndash; Sets the errorName.
- AbstractField::setHasVeryImportantData &ndash; Sets whether this field has [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- AbstractField::addError &ndash; Adds an error message to this instance.





Location
=============
Ling\Light_ChloroformExtension\Field\TableListField<br>
See the source code of [Ling\Light_ChloroformExtension\Field\TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableListField.php)



SeeAlso
==============
Previous class: [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)<br>Next class: [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md)<br>
