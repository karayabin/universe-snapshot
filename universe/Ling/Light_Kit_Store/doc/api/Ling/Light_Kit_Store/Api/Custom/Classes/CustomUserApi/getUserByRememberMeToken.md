[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi.md)


CustomUserApi::getUserByRememberMeToken
================



CustomUserApi::getUserByRememberMeToken — Returns the user row identified by the given remember_me token.




Description
================


public [CustomUserApi::getUserByRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi/getUserByRememberMeToken.md)(string $rememberMeToken, ?mixed $default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [CustomUserApi::getUserByRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Classes/CustomUserApi.php#L30-L44)


See Also
================

The [CustomUserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi/__construct.md)<br>

