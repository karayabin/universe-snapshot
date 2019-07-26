[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Form\Chloroform class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)


Chloroform::toArray
================



Chloroform::toArray — Returns the array version (template friendly) of the form.




Description
================


public [Chloroform::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md)() : array




Returns the array version (template friendly) of the form.

The blueprint looks like this:


```yaml
isPosted: bool, whether this form instance was submitted.

notifications:
     -
         type: string, the type of notification (success, info, warning, error)
         msg: string, the message of the notification
errors: a summary of the form errors (for the templates to use).
         It's actually nothing more than the fields errors put altogether here.

fields:
     -
         the array version of the field (see the [FieldInterface->toArray method](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/toArray.md) for more info)

```




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [Chloroform::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Form/Chloroform.php#L275-L311)


See Also
================

The [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) class.

Previous method: [getNotifications](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getNotifications.md)<br>Next method: [createPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/createPostedData.md)<br>

