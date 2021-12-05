[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Helper\LightKitStoreRememberMeHelper class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper.md)


LightKitStoreRememberMeHelper::destroyTokenByValidUser
================



LightKitStoreRememberMeHelper::destroyTokenByValidUser — Removes the user's token from both the database and the cookies.




Description
================


public static [LightKitStoreRememberMeHelper::destroyTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/destroyTokenByValidUser.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, Ling\Light_User\LightOpenUser $user) : void




Removes the user's token from both the database and the cookies.




Parameters
================


- container

    

- user

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitStoreRememberMeHelper::destroyTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Helper/LightKitStoreRememberMeHelper.php#L101-L125)


See Also
================

The [LightKitStoreRememberMeHelper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper.md) class.

Previous method: [spreadTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/spreadTokenByValidUser.md)<br>Next method: [getUserRowByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/getUserRowByToken.md)<br>

