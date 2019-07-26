[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\MinMaxItemValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator.md)


MinMaxItemValidator::test
================



MinMaxItemValidator::test — of the validator.




Description
================


public [MinMaxItemValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/test.md)(?$value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, string &$error = null) : bool




Tests and returns whether the given value matches the criterion
of the validator.

The field name is the human name of the field, it will appear in
the resulting error message most of the time.


If the test fails (the method returns false), then
the error message is accessible via the $error variable.
It's a string.



Note: having both the fieldName (which is the error name) and the field is redundant on purpose.
That's because most of the validators will only need the fieldName.
In some rare cases though, the validator would benefit having access to the original field instance.
This is the case for CSRFValidator, which would drain the csrf token from the CSRFField.




Parameters
================


- value

    

- fieldName

    

- field

    

- error

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [MinMaxItemValidator::test](https://github.com/lingtalfi/Chloroform/blob/master/Validator/MinMaxItemValidator.php#L57-L103)


See Also
================

The [MinMaxItemValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator.md) class.

Previous method: [setMax](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/MinMaxItemValidator/setMax.md)<br>

