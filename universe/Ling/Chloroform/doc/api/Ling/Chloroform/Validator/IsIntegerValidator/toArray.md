[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\IsIntegerValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/IsIntegerValidator.md)


IsIntegerValidator::toArray
================



IsIntegerValidator::toArray — Returns the array version of a validator.




Description
================


public [IsIntegerValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/IsIntegerValidator/toArray.md)() : array




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
See the source code for method [IsIntegerValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Validator/IsIntegerValidator.php#L133-L138)


See Also
================

The [IsIntegerValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/IsIntegerValidator.md) class.

Previous method: [test](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/IsIntegerValidator/test.md)<br>

