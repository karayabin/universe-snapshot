[Back to the Ling/CSRFTools api](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools.md)<br>
[Back to the Ling\CSRFTools\CSRFProtector class](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md)


CSRFProtector::isValid
================



CSRFProtector::isValid — Returns whether the given token is valid.




Description
================


public [CSRFProtector::isValid](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/isValid.md)(string $token, string $identifier = null, bool $validatesOnSamePage = false) : bool




Returns whether the given token is valid.

If you created a token using an identifier, you must specify the exact same identifier (as the second argument
of this method) in order for the validation to work properly.

If the isValid method will be called on the same page as the createToken method (called earlier),
then you must set the $validatesOnSamePage argument to true in order for the validation to work properly.

By default, the $validatesOnSamePage argument is false, and validates a token which was created on another page.




Parameters
================


- token

    

- identifier

    

- validatesOnSamePage

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [CSRFProtector::isValid](https://github.com/lingtalfi/CSRFTools/blob/master/CSRFProtector.php#L108-L126)


See Also
================

The [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) class.

Previous method: [createToken](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/createToken.md)<br>Next method: [startSession](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/startSession.md)<br>

