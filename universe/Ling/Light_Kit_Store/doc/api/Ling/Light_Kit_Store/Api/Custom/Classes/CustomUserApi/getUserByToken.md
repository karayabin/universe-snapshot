[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi.md)


CustomUserApi::getUserByToken
================



CustomUserApi::getUserByToken — Returns the user row identified by the given token.




Description
================


public [CustomUserApi::getUserByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi/getUserByToken.md)(string $token, string $tokenType, ?mixed $default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [CustomUserApi::getUserByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Classes/CustomUserApi.php#L32-L61)


See Also
================

The [CustomUserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi/__construct.md)<br>Next method: [updatePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi/updatePassword.md)<br>

