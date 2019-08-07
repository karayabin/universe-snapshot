[Back to the Ling/CSRFTools api](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools.md)<br>
[Back to the Ling\CSRFTools\CSRFProtector class](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md)


CSRFProtector::createToken
================



CSRFProtector::createToken — Creates the token named $tokenName, stores its value in the "new" slot, and returns the token value.




Description
================


public [CSRFProtector::createToken](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/createToken.md)(string $tokenName) : string




Creates the token named $tokenName, stores its value in the "new" slot, and returns the token value.
If the token named $tokenName already exists, there is a rotation: the newly created token is stored in the "new" slot,
while the old "new" value (found in the "new" slot before it was replaced) is moved to the "old" slot.

For more details, please refer to this class description.




Parameters
================


- tokenName

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [CSRFProtector::createToken](https://github.com/lingtalfi/CSRFTools/blob/master/CSRFProtector.php#L199-L209)


See Also
================

The [CSRFProtector](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) class.

Previous method: [__construct](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/__construct.md)<br>Next method: [isValid](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector/isValid.md)<br>

