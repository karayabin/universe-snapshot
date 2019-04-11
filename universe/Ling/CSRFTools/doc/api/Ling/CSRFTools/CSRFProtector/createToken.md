[Back to the Ling/CSRFTools api](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools.md)<br>
[Back to the Ling\CSRFTools\CSRFProtector class](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md)


CSRFProtector::createToken
================



CSRFProtector::createToken — Creates and returns a CSRF token.




Description
================


public [CSRFProtector::createToken](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/createToken.md)(string $identifier = null) : string




Creates and returns a CSRF token.
You should pass an identifier if you plan to create more than one token per page.
Otherwise, if you know for sure that your page will only use one single token, you can leave
this argument to null.




Parameters
================


- identifier

    


Return values
================

Returns string.








See Also
================

The [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) class.

Previous method: [__construct](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/__construct.md)<br>Next method: [isValid](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/isValid.md)<br>

