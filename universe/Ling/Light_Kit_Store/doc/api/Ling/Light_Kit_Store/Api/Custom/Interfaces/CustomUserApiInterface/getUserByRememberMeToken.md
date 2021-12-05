[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface.md)


CustomUserApiInterface::getUserByRememberMeToken
================



CustomUserApiInterface::getUserByRememberMeToken — Returns the user row identified by the given remember_me token.




Description
================


abstract public [CustomUserApiInterface::getUserByRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/getUserByRememberMeToken.md)(string $rememberMeToken, ?mixed $default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user row identified by the given remember_me token.


If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- rememberMeToken

    

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
See the source code for method [CustomUserApiInterface::getUserByRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomUserApiInterface.php#L30-L30)


See Also
================

The [CustomUserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface.md) class.



