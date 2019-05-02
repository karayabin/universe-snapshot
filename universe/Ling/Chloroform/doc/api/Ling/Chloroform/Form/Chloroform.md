[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The Chloroform class
================
2019-04-10 --> 2019-04-30






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

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/__construct.md)() : void
    - public [isPosted](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/isPosted.md)() : bool
    - public [getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getPostedData.md)() : array
    - public [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/validates.md)() : bool
    - public [getFields](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getFields.md)() : [FieldInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public [getField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getField.md)(string $fieldId) : [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)
    - public [injectValues](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/injectValues.md)(array $values) : void
    - public [addField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addField.md)([Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, array $validators = []) : void
    - public [addNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addNotification.md)([Ling\Chloroform\FormNotification\FormNotificationInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md) $notification) : void
    - public [getNotifications](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getNotifications.md)() : [FormNotificationInterface[]](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/FormNotificationInterface.md)
    - public [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md)() : array
    - protected [createPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/createPostedData.md)() : array

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
    
    



Methods
==============

- [Chloroform::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/__construct.md) &ndash; Builds the Chloroform instance.
- [Chloroform::isPosted](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/isPosted.md) &ndash; Returns whether this form instance was posted.
- [Chloroform::getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getPostedData.md) &ndash; Returns an array of posted data.
- [Chloroform::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/validates.md) &ndash; Returns whether all fields attached to this form validate.
- [Chloroform::getFields](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getFields.md) &ndash; Returns the fields of this instance.
- [Chloroform::getField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getField.md) &ndash; Returns the field which id is given.
- [Chloroform::injectValues](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/injectValues.md) &ndash; Inject the given values in the corresponding fields.
- [Chloroform::addField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addField.md) &ndash; Adds a field to this instance.
- [Chloroform::addNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/addNotification.md) &ndash; Adds a notification to this instance.
- [Chloroform::getNotifications](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getNotifications.md) &ndash; Returns the notifications of this instance.
- [Chloroform::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md) &ndash; Returns the array version (template friendly) of the form.
- [Chloroform::createPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/createPostedData.md) &ndash; Creates and returns the postedData array, as defined in [the postedData section](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-posted-data).





Location
=============
Ling\Chloroform\Form\Chloroform


SeeAlso
==============
Previous class: [TimeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/TimeField.md)<br>Next class: [ErrorFormNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/ErrorFormNotification.md)<br>
