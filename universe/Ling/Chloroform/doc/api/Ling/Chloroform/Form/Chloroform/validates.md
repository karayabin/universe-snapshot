[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Form\Chloroform class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)


Chloroform::validates
================



Chloroform::validates — Returns whether all fields attached to this form validate.




Description
================


public [Chloroform::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/validates.md)(?bool $injectValue = true) : bool




Returns whether all fields attached to this form validate.

A field validates if all its validators validate.
By default, if no validator exists, a field validates.


Note: by default the form will also inject the postedData values to the corresponding fields,
unless the injectValue flag is set to false.




Parameters
================


- injectValue

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [Chloroform::validates](https://github.com/lingtalfi/Chloroform/blob/master/Form/Chloroform.php#L196-L221)


See Also
================

The [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) class.

Previous method: [getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getPostedData.md)<br>Next method: [getValidationErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getValidationErrors.md)<br>

