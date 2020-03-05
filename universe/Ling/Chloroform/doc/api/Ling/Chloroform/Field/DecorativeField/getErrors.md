[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\DecorativeField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField.md)


DecorativeField::getErrors
================



DecorativeField::getErrors — Returns an array of error messages.




Description
================


public [DecorativeField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getErrors.md)() : array




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
See the source code for method [DecorativeField::getErrors](https://github.com/lingtalfi/Chloroform/blob/master/Field/DecorativeField.php#L115-L118)


See Also
================

The [DecorativeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField.md) class.

Previous method: [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/validates.md)<br>Next method: [setValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/setValue.md)<br>

