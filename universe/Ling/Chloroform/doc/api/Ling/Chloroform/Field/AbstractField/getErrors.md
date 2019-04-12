[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\AbstractField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)


AbstractField::getErrors
================



AbstractField::getErrors — Returns an array of error messages.




Description
================


public [AbstractField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md)() : array




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








See Also
================

The [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md) class.

Previous method: [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md)<br>Next method: [setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/setValue.md)<br>

