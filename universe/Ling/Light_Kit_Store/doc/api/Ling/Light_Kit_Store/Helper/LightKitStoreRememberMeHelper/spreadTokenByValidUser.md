[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Helper\LightKitStoreRememberMeHelper class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper.md)


LightKitStoreRememberMeHelper::spreadTokenByValidUser
================



LightKitStoreRememberMeHelper::spreadTokenByValidUser — Writes the given token to both the database and the user cookies.




Description
================


public static [LightKitStoreRememberMeHelper::spreadTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/spreadTokenByValidUser.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, Ling\Light_User\LightOpenUser $user, string $rememberMeToken) : void




Writes the given token to both the database and the user cookies.




Parameters
================


- container

    

- user

    

- rememberMeToken

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitStoreRememberMeHelper::spreadTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Helper/LightKitStoreRememberMeHelper.php#L64-L90)


See Also
================

The [LightKitStoreRememberMeHelper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper.md) class.

Previous method: [generateRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/generateRememberMeToken.md)<br>Next method: [destroyTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/destroyTokenByValidUser.md)<br>

