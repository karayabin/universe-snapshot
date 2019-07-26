[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The WebsiteLightUser class
================
2019-05-10 --> 2019-07-19






Introduction
============

The WebsiteLightUser class.

This is the first website user, and a typical one.

A website user has to login by providing credentials:
- an email
- a password

The following properties are attached to the website user:

- avatar_url: the url of the avatar image (or null if there is no avatar for this user)
- email: the email of the user. This is also considered as an identifier (a unique string identifying a given user)
- pseudo: string, or null if the website user doesn't use a pseudo
- connect_time: timestamp (or false by default) of the moment when the user was first connected.
             This allows us to know exactly how long an user is connected at any time.
- last_refresh_time: timestamp of the moment when the user was last refreshed (or false by default).


Also, the user can be configured:

- session_duration: the number of seconds to wait to turn a valid idle user into an invalid user
             The default is 300 (i.e. 5 minutes)





A website user is a [refreshable user](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#the-concept-of-refreshing-an-user).



Class synopsis
==============


class <span class="pl-k">WebsiteLightUser</span> implements [RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface.md), [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Properties
    - protected string [$email](#property-email) ;
    - protected string|null [$avatar_url](#property-avatar_url) ;
    - protected string|null [$pseudo](#property-pseudo) ;
    - protected int|false [$connect_time](#property-connect_time) ;
    - protected int|false [$last_refresh_time](#property-last_refresh_time) ;
    - protected int [$session_duration](#property-session_duration) ;
    - protected array [$rights](#property-rights) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/__construct.md)() : void
    - public [isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/isValid.md)() : bool
    - public [getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getIdentifier.md)() : string | false
    - public [hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/hasRight.md)(string $right) : bool
    - public [refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/refresh.md)() : void
    - public [connect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/connect.md)() : void
    - public [disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/disconnect.md)() : void
    - public [getEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getEmail.md)() : string
    - public [setEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setEmail.md)(string $email) : void
    - public [getAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getAvatarUrl.md)() : string | null
    - public [setAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setAvatarUrl.md)(string $avatar_url) : void
    - public [getPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getPseudo.md)() : string | null
    - public [setPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setPseudo.md)(string $pseudo) : void
    - public [getConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getConnectTime.md)() : false | int
    - public [setConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setConnectTime.md)(int $connect_time) : void
    - public [getLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getLastRefreshTime.md)() : false | int
    - public [setLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setLastRefreshTime.md)(int $last_refresh_time) : void
    - public [getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getSessionDuration.md)() : int
    - public [setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setSessionDuration.md)(int $session_duration) : void
    - public [getRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getRights.md)() : array
    - public [setRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setRights.md)(array $rights) : void

}




Properties
=============

- <span id="property-email"><b>email</b></span>

    This property holds the email of the user.
    
    

- <span id="property-avatar_url"><b>avatar_url</b></span>

    This property holds the avatar_url of the user, or null if the user doesn't have an avatar.
    
    

- <span id="property-pseudo"><b>pseudo</b></span>

    This property holds the pseudo of the user (or null if the user doesn't have a pseudo).
    
    

- <span id="property-connect_time"><b>connect_time</b></span>

    This property holds the timestamp when the user first connected (or false by default).
    
    

- <span id="property-last_refresh_time"><b>last_refresh_time</b></span>

    This property holds the timestamp when the user was last refreshed.
    See the [refresh concept](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#the-concept-of-refreshing-an-user) for more details.
    
    

- <span id="property-session_duration"><b>session_duration</b></span>

    This property holds the number of seconds to wait before turning an idle valid user into
    an invalid user.
    
    

- <span id="property-rights"><b>rights</b></span>

    This property holds the rights for this user.
    See the [rights concept](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#its-all-about-rights) for more details.
    
    



Methods
==============

- [WebsiteLightUser::__construct](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/__construct.md) &ndash; Builds the WebsiteLightUser instance.
- [WebsiteLightUser::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/isValid.md) &ndash; Returns whether the user is valid.
- [WebsiteLightUser::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getIdentifier.md) &ndash; or false if the user is not valid.
- [WebsiteLightUser::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/hasRight.md) &ndash; Returns whether the user has the given right.
- [WebsiteLightUser::refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/refresh.md) &ndash; Refreshes the user.
- [WebsiteLightUser::connect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/connect.md) &ndash; Connects the user (i.e.
- [WebsiteLightUser::disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/disconnect.md) &ndash; Disconnects the current user.
- [WebsiteLightUser::getEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getEmail.md) &ndash; Returns the email of this instance.
- [WebsiteLightUser::setEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setEmail.md) &ndash; Sets the email.
- [WebsiteLightUser::getAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getAvatarUrl.md) &ndash; Returns the avatar_url of this instance.
- [WebsiteLightUser::setAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setAvatarUrl.md) &ndash; Sets the avatar_url.
- [WebsiteLightUser::getPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getPseudo.md) &ndash; Returns the pseudo of this instance.
- [WebsiteLightUser::setPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setPseudo.md) &ndash; Sets the pseudo.
- [WebsiteLightUser::getConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getConnectTime.md) &ndash; Returns the connect_time of this instance.
- [WebsiteLightUser::setConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setConnectTime.md) &ndash; Sets the connect_time.
- [WebsiteLightUser::getLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getLastRefreshTime.md) &ndash; Returns the last_refresh_time of this instance.
- [WebsiteLightUser::setLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setLastRefreshTime.md) &ndash; Sets the last_refresh_time.
- [WebsiteLightUser::getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getSessionDuration.md) &ndash; Returns the session_duration of this instance.
- [WebsiteLightUser::setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setSessionDuration.md) &ndash; Sets the session_duration.
- [WebsiteLightUser::getRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getRights.md) &ndash; Returns the rights of this instance.
- [WebsiteLightUser::setRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/setRights.md) &ndash; Sets the rights.





Location
=============
Ling\Light_User\WebsiteLightUser<br>
See the source code of [Ling\Light_User\WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/WebsiteLightUser.php)



SeeAlso
==============
Previous class: [RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface.md)<br>
