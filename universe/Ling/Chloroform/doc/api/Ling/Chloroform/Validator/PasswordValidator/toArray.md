[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\PasswordValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md)


PasswordValidator::toArray
================



PasswordValidator::toArray — Returns the array version of a validator.




Description
================


public [PasswordValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/toArray.md)() : array




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
See the source code for method [PasswordValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Validator/PasswordValidator.php#L194-L203)


See Also
================

The [PasswordValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator.md) class.

Previous method: [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/test.md)<br>Next method: [count](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/PasswordValidator/count.md)<br>

