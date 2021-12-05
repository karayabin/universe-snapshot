[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The LightOpenUser class
================
2019-05-10 --> 2021-06-24






Introduction
============

The LightOpenUser class.

This is a website user, he is a [refreshable user](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#the-concept-of-refreshing-an-user).

You can attach any property to it.



Class synopsis
==============


class <span class="pl-k">LightOpenUser</span> implements [RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface.md), [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Properties
    - private int|false [$connect_time](#property-connect_time) ;
    - private int|false [$last_refresh_time](#property-last_refresh_time) ;
    - private int [$session_duration](#property-session_duration) ;
    - private array [$props](#property-props) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/__construct.md)() : void
    - public [refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/refresh.md)() : void
    - public [setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/setSessionDuration.md)(int $durationInSeconds) : mixed
    - public [getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getSessionDuration.md)() : int
    - public [isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/isValid.md)() : bool
    - public [hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/hasRight.md)(string $right) : bool
    - public [getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getIdentifier.md)() : string | false
    - public [connect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/connect.md)() : void
    - public [disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/disconnect.md)() : void
    - public [getProps](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getProps.md)() : array
    - public [setProps](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/setProps.md)(array $props) : void
    - public [addProp](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/addProp.md)(string $key, mixed $value) : [LightOpenUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser.md)
    - public [getProp](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getProp.md)(string $key, ?mixed $default = null) : mixed

}




Properties
=============

- <span id="property-connect_time"><b>connect_time</b></span>

    This property holds the timestamp when the user first connected (or false by default).
    
    

- <span id="property-last_refresh_time"><b>last_refresh_time</b></span>

    This property holds the timestamp when the user was last refreshed.
    See the [refresh concept](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#the-concept-of-refreshing-an-user) for more details.
    
    

- <span id="property-session_duration"><b>session_duration</b></span>

    This property holds the number of seconds to wait before turning an idle valid user into
    an invalid user.
    
    

- <span id="property-props"><b>props</b></span>

    This property holds the props for this instance.
    
    



Methods
==============

- [LightOpenUser::__construct](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/__construct.md) &ndash; Builds the LightWebsiteUser instance.
- [LightOpenUser::refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/refresh.md) &ndash; Refreshes the user.
- [LightOpenUser::setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/setSessionDuration.md) &ndash; Sets the duration of this user' session in seconds.
- [LightOpenUser::getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getSessionDuration.md) &ndash; Returns the duration of this user' session in seconds.
- [LightOpenUser::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/isValid.md) &ndash; Returns whether the user is valid.
- [LightOpenUser::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/hasRight.md) &ndash; Returns whether the user has the given right.
- [LightOpenUser::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getIdentifier.md) &ndash; or false if the user is not valid.
- [LightOpenUser::connect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/connect.md) &ndash; Connects the user (i.e.
- [LightOpenUser::disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/disconnect.md) &ndash; Disconnects the current user.
- [LightOpenUser::getProps](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getProps.md) &ndash; Returns the properties attached to this instance.
- [LightOpenUser::setProps](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/setProps.md) &ndash; Sets the props.
- [LightOpenUser::addProp](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/addProp.md) &ndash; Adds a property to this instance, and returns the instance.
- [LightOpenUser::getProp](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser/getProp.md) &ndash; Returns the value of the given property, or the default value if that property is not found.





Location
=============
Ling\Light_User\LightOpenUser<br>
See the source code of [Ling\Light_User\LightOpenUser](https://github.com/lingtalfi/Light_User/blob/master/LightOpenUser.php)



SeeAlso
==============
Previous class: [LightAdamUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser.md)<br>Next class: [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)<br>
