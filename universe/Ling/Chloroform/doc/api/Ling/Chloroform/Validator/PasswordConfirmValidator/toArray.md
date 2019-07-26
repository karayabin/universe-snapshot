[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\PasswordConfirmValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordConfirmValidator.md)


PasswordConfirmValidator::toArray
================



PasswordConfirmValidator::toArray — Returns the array version of a validator.




Description
================


public [PasswordConfirmValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordConfirmValidator/toArray.md)() : array




Returns the array version of a validator.

The goal is to provide enough information to a renderer, so that a renderer could provide a
javascript based validation that would do the same job as the server side validation.


It is recommended that the array contains at least the following properties if it can:

- name: name of the validator class




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [PasswordConfirmValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Validator/PasswordConfirmValidator.php#L85-L90)


See Also
================

The [PasswordConfirmValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordConfirmValidator.md) class.

Previous method: [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordConfirmValidator/test.md)<br>

