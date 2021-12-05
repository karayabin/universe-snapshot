[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface.md)


CustomUserApiInterface::getUserByToken
================



CustomUserApiInterface::getUserByToken — Returns the user row identified by the given token.




Description
================


abstract public [CustomUserApiInterface::getUserByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/getUserByToken.md)(string $token, string $tokenType, ?mixed $default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user row identified by the given token.


If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value

Token type can be one of:
- remember_me
- signup
- reset_password
- default




Parameters
================


- token

    

- tokenType

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [CustomUserApiInterface::getUserByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomUserApiInterface.php#L38-L38)


See Also
================

The [CustomUserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface.md) class.

Next method: [updatePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/updatePassword.md)<br>

