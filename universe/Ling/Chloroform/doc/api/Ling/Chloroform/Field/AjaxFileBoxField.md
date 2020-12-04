[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The AjaxFileBoxField class
================
2019-04-10 --> 2020-12-01






Introduction
============

The AjaxFileBoxField class.

An ajax file box field doesn't work the same way as a traditional file field.

With an ajax file box, the file is uploaded via ajax (thanks to a third-party javascript client)
to a backend upload service.

Now how the backend service handles the response is outside the scope of this class,
however the ajax file box will control the javascript client.

There are many potential js clients, and so we are trying to be as agnostic as we can here.
However, we impose one thing: the javascript client ultimately must come up with either an url (of the uploaded file),
or an array of urls (if the user can upload more than one file).

And so we have one property: maxFile, which control how many files maximum can be uploaded (at once).
If maxFile is 1, the expected value (in the $_POST array) will be a scalar (i.e. a single url).
If maxFile is greater than 1, the expected value in the $_POST array will be an array of urls.

Now depending on the js client, you might want to add some more properties.


An example of js client is the file uploader: https://github.com/lingtalfi/jFileUploader.



Class synopsis
==============


class <span class="pl-k">AjaxFileBoxField</span> extends [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md) implements [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) {

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
    - public static [create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AjaxFileBoxField/create.md)(string $label, ?array $properties = []) : [AjaxFileBoxField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AjaxFileBoxField.md)
    - public [getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AjaxFileBoxField/getFallbackValue.md)() : mixed

- Inherited methods
    - public [AbstractField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/__construct.md)(?array $properties = []) : void
    - public [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md)() : string
    - public [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md)([Ling\Chloroform\Validator\ValidatorInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorInterface.md) $validator) : mixed
    - public [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md)($value) : bool
    - public [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md)() : array
    - public [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md)($value) : [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)
    - public [AbstractField::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getValue.md)() : mixed
    - public [AbstractField::getFormattedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getFormattedValue.md)() : mixed
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

- [AjaxFileBoxField::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AjaxFileBoxField/create.md) &ndash; Builds and returns the instance.
- [AjaxFileBoxField::getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AjaxFileBoxField/getFallbackValue.md) &ndash; Returns the fallback value, which defaults to null.
- [AbstractField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/__construct.md) &ndash; Builds the AbstractField instance.
- [AbstractField::getId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getId.md) &ndash; Returns the field id.
- [AbstractField::addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md) &ndash; Adds a validator to this instance.
- [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md) &ndash; Tests and returns whether every validator attached to this instanced passed.
- [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md) &ndash; Returns an array of error messages.
- [AbstractField::setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md) &ndash; Sets the value for this instance.
- [AbstractField::getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getValue.md) &ndash; Returns the value of the field.
- [AbstractField::getFormattedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getFormattedValue.md) &ndash; Returns the formatted value of this field.
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
Ling\Chloroform\Field\AjaxFileBoxField<br>
See the source code of [Ling\Chloroform\Field\AjaxFileBoxField](https://github.com/lingtalfi/Chloroform/blob/master/Field/AjaxFileBoxField.php)



SeeAlso
==============
Previous class: [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)<br>Next class: [CSRFField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/CSRFField.md)<br>
