[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\AbstractValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)


AbstractValidator::getMessages
================



AbstractValidator::getMessages — Returns an array of the lines of the error messages file for this validator.




Description
================


protected [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getMessages.md)(bool $identifierAsKey = false) : array




Returns an array of the lines of the error messages file for this validator.


The returned array structure depends on the $identifierAsKey argument.

If false, each entry of the array is a line of the messages file.
Note: in the messages file, a line looks like this:


```txt
$identifier: $message
```


If true, each entry of the array is actually a pair of key/value, where the
key is the identifier, and the value is the message.




Parameters
================


- identifierAsKey

    


Return values
================

Returns array.


Exceptions thrown
================

- [ChloroformException](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Exception/ChloroformException.md).&nbsp;







Source Code
===========
See the source code for method [AbstractValidator::getMessages](https://github.com/lingtalfi/Chloroform/blob/master/Validator/AbstractValidator.php#L182-L201)


See Also
================

The [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) class.

Previous method: [getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)<br>

