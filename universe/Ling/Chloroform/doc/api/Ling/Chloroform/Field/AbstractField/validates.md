[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\AbstractField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md)


AbstractField::validates
================



AbstractField::validates — Tests and returns whether every validator attached to this instanced passed.




Description
================


public [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/validates.md)(array $postedData, bool $injectValues = true) : bool




Tests and returns whether every validator attached to this instanced passed.

If not, false is returned and the errors array is fed with error message(s).
Errors should then be retrieved using the getErrors method.


If the injectValues flag is set to true, the value will be injected into the field.




Parameters
================


- postedData

    

- injectValues

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [AbstractField::validates](https://github.com/lingtalfi/Chloroform/blob/master/Field/AbstractField.php#L153-L186)


See Also
================

The [AbstractField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField.md) class.

Previous method: [addValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/addValidator.md)<br>Next method: [getErrors](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/AbstractField/getErrors.md)<br>

