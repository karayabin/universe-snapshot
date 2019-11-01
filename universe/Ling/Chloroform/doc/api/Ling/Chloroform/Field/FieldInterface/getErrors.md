[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\FieldInterface class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)


FieldInterface::getErrors
================



FieldInterface::getErrors — Returns an array of error messages.




Description
================


abstract public [FieldInterface::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getErrors.md)() : array




Returns an array of error messages.
Each error message is a string.

Errors are only provided after a call to the validates method.

Note: for consistency/simplicity reasons, errors should be only provided by
validators (that's why we don't have an addError method).




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [FieldInterface::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/Field/FieldInterface.php#L72-L72)


See Also
================

The [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) class.

Previous method: [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/validates.md)<br>Next method: [setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/setValue.md)<br>

