[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Validator\AbstractValidator class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md)


AbstractValidator::getErrorMessage
================



AbstractValidator::getErrorMessage — Returns the error message for the called object (this).




Description
================


protected [AbstractValidator::getErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/getErrorMessage.md)(string $msgId, array $variables) : string




Returns the error message for the called object (this).


The error messages are stored in txt files in the messages directory, next to this class file.
They are stored by a 3-letter lang code, defined by the [ValidatorConfig object](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/ValidatorConfig.md).
A message file is named after the class it provides messages for.

A message file can contain more than one error messages (because some validators can
produce more than one error message), and so the message file give identifiers to each message.

If there is only one message, the identifier is generally "main" (by convention).

Each line of the message file is formatted using the following format:

```txt
$identifier: $message
```

Where $identifier is the identifier, and $message is the error message corresponding to that identifier.


The error messages can also be overridden by the user with the setErrorMessage method.




Parameters
================


- msgId

    

- variables

    


Return values
================

Returns string.


Exceptions thrown
================

- [ChloroformException](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Exception/ChloroformException.md).&nbsp;







See Also
================

The [AbstractValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator.md) class.

Previous method: [setErrorMessage](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractValidator/setErrorMessage.md)<br>

