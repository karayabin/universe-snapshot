[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Chloroform\Validator\ValidUserDataUrlValidator class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator.md)


ValidUserDataUrlValidator::test
================



ValidUserDataUrlValidator::test — of the validator.




Description
================


public [ValidUserDataUrlValidator::test](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/test.md)($value, string $fieldName, Ling\Chloroform\Field\FieldInterface $field, ?string &$error = null) : bool




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
See the source code for method [ValidUserDataUrlValidator::test](https://github.com/lingtalfi/Light_UserData/blob/master/Chloroform/Validator/ValidUserDataUrlValidator.php#L54-L98)


See Also
================

The [ValidUserDataUrlValidator](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/__construct.md)<br>Next method: [setCurrentUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator/setCurrentUser.md)<br>

