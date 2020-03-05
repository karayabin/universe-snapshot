[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)<br>
[Back to the Ling\Light_CsrfSimple\Chloroform\Validator\LightCsrfSimpleValidator class](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator.md)


LightCsrfSimpleValidator::test
================



LightCsrfSimpleValidator::test — of the validator.




Description
================


public [LightCsrfSimpleValidator::test](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/test.md)($value, string $fieldName, [Ling\Chloroform\Field\FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) $field, ?string &$error = null) : bool




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
See the source code for method [LightCsrfSimpleValidator::test](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Chloroform/Validator/LightCsrfSimpleValidator.php#L44-L68)


See Also
================

The [LightCsrfSimpleValidator](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/__construct.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Validator/LightCsrfSimpleValidator/setContainer.md)<br>

