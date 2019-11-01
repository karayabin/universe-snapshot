[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\FieldInterface class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)


FieldInterface::validates
================



FieldInterface::validates — Tests and returns whether every validator attached to this instanced passed.




Description
================


abstract public [FieldInterface::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/validates.md)($value) : bool




Tests and returns whether every validator attached to this instanced passed.

If not, false is returned and the errors array is fed with error message(s).
Errors should then be retrieved using the getErrors method.




Parameters
================


- value

    The value to validate.


Return values
================

Returns bool.








Source Code
===========
See the source code for method [FieldInterface::validates](https://github.com/lingtalfi/Chloroform/blob/master/Field/FieldInterface.php#L57-L57)


See Also
================

The [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) class.

Previous method: [setDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/setDataTransformer.md)<br>Next method: [getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getErrors.md)<br>

