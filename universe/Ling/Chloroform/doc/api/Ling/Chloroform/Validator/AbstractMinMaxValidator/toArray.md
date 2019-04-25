[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\AbstractMinMaxValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator.md)


AbstractMinMaxValidator::toArray
================



AbstractMinMaxValidator::toArray — Returns the array version of a validator.




Description
================


public [AbstractMinMaxValidator::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/toArray.md)() : array




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








See Also
================

The [AbstractMinMaxValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator/__construct.md)<br>

