[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\FileMimeTypeValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/FileMimeTypeValidator.md)


FileMimeTypeValidator::toArray
================



FileMimeTypeValidator::toArray — Returns the array version of a validator.




Description
================


public [FileMimeTypeValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/FileMimeTypeValidator/toArray.md)() : array




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
See the source code for method [FileMimeTypeValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Validator/FileMimeTypeValidator.php#L96-L101)


See Also
================

The [FileMimeTypeValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/FileMimeTypeValidator.md) class.

Previous method: [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/FileMimeTypeValidator/test.md)<br>

