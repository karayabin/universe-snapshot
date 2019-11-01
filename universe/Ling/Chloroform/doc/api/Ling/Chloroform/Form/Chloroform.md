[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The Chloroform class
================
2019-04-10 --> 2019-11-01






Introduction
============

The Chloroform class.



Class synopsis
==============


class <span class="pl-k">Chloroform</span>  {

- Properties
    - protected [Ling\Chloroform\Field\FieldInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) [$fields](#property-fields) ;
    - protected [Ling\Chloroform\FormNotification\FormNotificationInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md) [$notifications](#property-notifications) ;
    - private array [$_postedData](#property-_postedData) ;
    - protected string [$formId](#property-formId) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/__construct.md)() : void
    - public [setFormId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/setFormId.md)(string $formId) : void
    - public [isPosted](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/isPosted.md)() : bool
    - public [getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getPostedData.md)() : array
    - public [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/validates.md)() : bool
    - public [getVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getVeryImportantData.md)() : array
    - public [executeDataTransformers](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/executeDataTransformers.md)(array &$postedData) : void
    - public [getFields](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getFields.md)() : [FieldInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public [getField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getField.md)(string $fieldId) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public [injectValues](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/injectValues.md)(array $values) : void
    - public [addField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addField.md)([Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, ?array $validators = []) : void
    - public [addNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addNotification.md)([Ling\Chloroform\FormNotification\FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md) $notification) : void
    - public [getNotifications](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getNotifications.md)() : [FormNotificationInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md)
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md)() : array
    - private [getFieldPostedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getFieldPostedValue.md)([Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, array $postedData) : mixed | null

}




Properties
=============

- <span id="property-fields"><b>fields</b></span>

    This property holds the fields for this instance.
    
    

- <span id="property-notifications"><b>notifications</b></span>

    This property holds the notifications for this instance.
    
    

- <span id="property-_postedData"><b>_postedData</b></span>

    This property holds the _postedData for this instance.
    It's a cached data used to improve performances.
    
    

- <span id="property-formId"><b>formId</b></span>

    This property holds the formId for this instance.
    This is helpful if your page contains multiple forms, to differentiate
    which form was actually submitted.
    
    



Methods
==============

- [Chloroform::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/__construct.md) &ndash; Builds the Chloroform instance.
- [Chloroform::setFormId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/setFormId.md) &ndash; Sets the formId.
- [Chloroform::isPosted](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/isPosted.md) &ndash; Returns whether this form instance was posted.
- [Chloroform::getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getPostedData.md) &ndash; Returns an array of posted data (for this instance).
- [Chloroform::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/validates.md) &ndash; Returns whether all fields attached to this form validate.
- [Chloroform::getVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getVeryImportantData.md) &ndash; Returns the [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data) of a form.
- [Chloroform::executeDataTransformers](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/executeDataTransformers.md) &ndash; Execute the data transformers (see the [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) for more details) on the given postedData.
- [Chloroform::getFields](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getFields.md) &ndash; Returns the fields of this instance.
- [Chloroform::getField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getField.md) &ndash; Returns the field which id is given.
- [Chloroform::injectValues](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/injectValues.md) &ndash; Inject the given values in the corresponding fields.
- [Chloroform::addField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addField.md) &ndash; Adds a field to this instance.
- [Chloroform::addNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addNotification.md) &ndash; Adds a notification to this instance.
- [Chloroform::getNotifications](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getNotifications.md) &ndash; Returns the notifications of this instance.
- [Chloroform::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md) &ndash; Returns the array version (template friendly) of the form.
- [Chloroform::getFieldPostedValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getFieldPostedValue.md) &ndash; Returns the field posted value for the given field and posted data.





Location
=============
Ling\Chloroform\Form\Chloroform<br>
See the source code of [Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/Form/Chloroform.php)



SeeAlso
==============
Previous class: [TimeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/TimeField.md)<br>Next class: [ErrorFormNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/ErrorFormNotification.md)<br>
