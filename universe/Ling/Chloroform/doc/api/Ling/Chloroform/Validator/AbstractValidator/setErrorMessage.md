[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\AbstractValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)


AbstractValidator::setErrorMessage
================



AbstractValidator::setErrorMessage — Overrides a default error message, and returns this instance (for chaining).




Description
================


public [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)(string $errorMessage, ?string $messageIdentifier = null) : [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)




Overrides a default error message, and returns this instance (for chaining).

The errorMessage can use the same tags as the replaced default error message (i.e. {fieldName}, {min}, ...).

If the message identifier is not specified, it will defaults to main.




Parameters
================


- errorMessage

    

- messageIdentifier

    


Return values
================

Returns [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md).








Source Code
===========
See the source code for method [AbstractValidator::setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/Validator/AbstractValidator.php#L80-L87)


See Also
================

The [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) class.

Previous method: [toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/toArray.md)<br>Next method: [getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)<br>

