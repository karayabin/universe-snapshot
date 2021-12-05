[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The LightKitStoreRememberMeHelper class
================
2021-04-06 --> 2021-08-02






Introduction
============

The LightKitStoreRememberMeHelper class.



Class synopsis
==============


class <span class="pl-k">LightKitStoreRememberMeHelper</span>  {

- Constants
    - private const [REMEMBER_ME_TOKEN_NAME](#constant-REMEMBER_ME_TOKEN_NAME) = remember_me_token ;

- Methods
    - public static [getRememberMeTokenFromCookies](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/getRememberMeTokenFromCookies.md)() : string | null
    - public static [removeRememberMeTokenFromCookies](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/removeRememberMeTokenFromCookies.md)() : void
    - public static [generateRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/generateRememberMeToken.md)() : string
    - public static [spreadTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/spreadTokenByValidUser.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, Ling\Light_User\LightOpenUser $user, string $rememberMeToken) : void
    - public static [destroyTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/destroyTokenByValidUser.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, Ling\Light_User\LightOpenUser $user) : void
    - public static [getUserRowByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/getUserRowByToken.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $rememberMeToken) : array | null

}






Methods
==============

- [LightKitStoreRememberMeHelper::getRememberMeTokenFromCookies](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/getRememberMeTokenFromCookies.md) &ndash; Returns the remember_me token from the cookies.
- [LightKitStoreRememberMeHelper::removeRememberMeTokenFromCookies](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/removeRememberMeTokenFromCookies.md) &ndash; Removes the given remember me token from the cookies.
- [LightKitStoreRememberMeHelper::generateRememberMeToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/generateRememberMeToken.md) &ndash; Generates a remember_me token.
- [LightKitStoreRememberMeHelper::spreadTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/spreadTokenByValidUser.md) &ndash; Writes the given token to both the database and the user cookies.
- [LightKitStoreRememberMeHelper::destroyTokenByValidUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/destroyTokenByValidUser.md) &ndash; Removes the user's token from both the database and the cookies.
- [LightKitStoreRememberMeHelper::getUserRowByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreRememberMeHelper/getUserRowByToken.md) &ndash; Returns the user row corresponding to the given token, or null if there is no match.





Location
=============
Ling\Light_Kit_Store\Helper\LightKitStoreRememberMeHelper<br>
See the source code of [Ling\Light_Kit_Store\Helper\LightKitStoreRememberMeHelper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Helper/LightKitStoreRememberMeHelper.php)



SeeAlso
==============
Previous class: [LightKitStorePriceHelper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStorePriceHelper.md)<br>Next class: [LightKitStoreThemeHelper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Helper/LightKitStoreThemeHelper.md)<br>
