[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The LightWebsiteUser class
================
2019-05-10 --> 2020-03-26






Introduction
============

The LightWebsiteUser class.

This is the first website user, and a typical one.

A website user has to login by providing credentials:
- an email
- a password

A website user is defined by the following properties:

- id: int=1. An int that identifies the user uniquely amongst other users (usually this number is auto-generated by your application).
- identifier: string. A string that identifies the user uniquely amongst other users.
- email: string|null. The email of the user, or null if it's not used.
         Note: some applications use the same value for the email and the identifier, as an email
         identifies a person uniquely.
- avatar_url: string|null. The url of the avatar image (or null if there is no avatar for this user)
- pseudo: string|null. The pseudo of the user.
- connect_time: timestamp (or false by default) of the moment when the user was first connected.
             This allows us to know exactly how long an user is connected at any time.
- last_refresh_time: timestamp of the moment when the user was last refreshed (or false by default).
- session_duration: int. The number of seconds to wait to turn a valid idle user into an invalid user
             The default is 300 (i.e. 5 minutes)
- rights: array. The rights (aka [permissions](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)) that this user has. See more about rights in the [user rights page](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#its-all-about-rights).
- extra: array. This array contains any other properties that the application wants to attach to the user.





A website user is a [refreshable user](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#the-concept-of-refreshing-an-user).



Class synopsis
==============


class <span class="pl-k">LightWebsiteUser</span> implements [RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface.md), [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Properties
    - protected int [$id](#property-id) ;
    - protected string [$identifier](#property-identifier) ;
    - protected string|null [$email](#property-email) ;
    - protected string|null [$avatar_url](#property-avatar_url) ;
    - protected string|null [$pseudo](#property-pseudo) ;
    - protected int|false [$connect_time](#property-connect_time) ;
    - protected int|false [$last_refresh_time](#property-last_refresh_time) ;
    - protected int [$session_duration](#property-session_duration) ;
    - protected array [$rights](#property-rights) ;
    - protected array [$extra](#property-extra) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/__construct.md)() : void
    - public [isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/isValid.md)() : bool
    - public [getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getIdentifier.md)() : string | false
    - public [hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/hasRight.md)(string $right) : bool
    - public [refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/refresh.md)() : void
    - public [connect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/connect.md)() : void
    - public [disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/disconnect.md)() : void
    - public [updateInfo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/updateInfo.md)(array $info) : void
    - public [getId](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getId.md)() : int
    - public [setId](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setId.md)(int $id) : void
    - public [setIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setIdentifier.md)(string $identifier) : void
    - public [getEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getEmail.md)() : string
    - public [setEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setEmail.md)(string $email) : void
    - public [getAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getAvatarUrl.md)() : string | null
    - public [setAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setAvatarUrl.md)(string $avatar_url) : void
    - public [getPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getPseudo.md)() : string | null
    - public [setPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setPseudo.md)(string $pseudo) : void
    - public [getConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getConnectTime.md)() : false | int
    - public [setConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setConnectTime.md)(int $connect_time) : void
    - public [getLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getLastRefreshTime.md)() : false | int
    - public [setLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setLastRefreshTime.md)(int $last_refresh_time) : void
    - public [getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getSessionDuration.md)() : int
    - public [setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setSessionDuration.md)(int $session_duration) : void
    - public [getRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getRights.md)() : array
    - public [setRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setRights.md)(array $rights) : void
    - public [getExtra](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getExtra.md)() : array
    - public [setExtra](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setExtra.md)(array $extra) : void

}




Properties
=============

- <span id="property-id"><b>id</b></span>

    This property holds the id for this instance.
    
    

- <span id="property-identifier"><b>identifier</b></span>

    This property holds the identifier for this instance.
    
    

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
    
    

- <span id="property-extra"><b>extra</b></span>

    This property holds the extra for this instance.
    
    



Methods
==============

- [LightWebsiteUser::__construct](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/__construct.md) &ndash; Builds the LightWebsiteUser instance.
- [LightWebsiteUser::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/isValid.md) &ndash; Returns whether the user is valid.
- [LightWebsiteUser::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getIdentifier.md) &ndash; or false if the user is not valid.
- [LightWebsiteUser::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/hasRight.md) &ndash; Returns whether the user has the given right.
- [LightWebsiteUser::refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/refresh.md) &ndash; Refreshes the user.
- [LightWebsiteUser::connect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/connect.md) &ndash; Connects the user (i.e.
- [LightWebsiteUser::disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/disconnect.md) &ndash; Disconnects the current user.
- [LightWebsiteUser::updateInfo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/updateInfo.md) &ndash; Updates the user information.
- [LightWebsiteUser::getId](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getId.md) &ndash; Returns the id of this instance.
- [LightWebsiteUser::setId](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setId.md) &ndash; Sets the id.
- [LightWebsiteUser::setIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setIdentifier.md) &ndash; Sets the identifier.
- [LightWebsiteUser::getEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getEmail.md) &ndash; Returns the email of this instance.
- [LightWebsiteUser::setEmail](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setEmail.md) &ndash; Sets the email.
- [LightWebsiteUser::getAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getAvatarUrl.md) &ndash; Returns the avatar_url of this instance.
- [LightWebsiteUser::setAvatarUrl](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setAvatarUrl.md) &ndash; Sets the avatar_url.
- [LightWebsiteUser::getPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getPseudo.md) &ndash; Returns the pseudo of this instance.
- [LightWebsiteUser::setPseudo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setPseudo.md) &ndash; Sets the pseudo.
- [LightWebsiteUser::getConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getConnectTime.md) &ndash; Returns the connect_time of this instance.
- [LightWebsiteUser::setConnectTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setConnectTime.md) &ndash; Sets the connect_time.
- [LightWebsiteUser::getLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getLastRefreshTime.md) &ndash; Returns the last_refresh_time of this instance.
- [LightWebsiteUser::setLastRefreshTime](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setLastRefreshTime.md) &ndash; Sets the last_refresh_time.
- [LightWebsiteUser::getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getSessionDuration.md) &ndash; Returns the session_duration of this instance.
- [LightWebsiteUser::setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setSessionDuration.md) &ndash; Sets the session_duration.
- [LightWebsiteUser::getRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getRights.md) &ndash; Returns the rights of this instance.
- [LightWebsiteUser::setRights](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setRights.md) &ndash; Sets the rights.
- [LightWebsiteUser::getExtra](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getExtra.md) &ndash; Returns the extra of this instance.
- [LightWebsiteUser::setExtra](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/setExtra.md) &ndash; Sets the extra.





Location
=============
Ling\Light_User\LightWebsiteUser<br>
See the source code of [Ling\Light_User\LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/LightWebsiteUser.php)



SeeAlso
==============
Previous class: [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)<br>Next class: [RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface.md)<br>