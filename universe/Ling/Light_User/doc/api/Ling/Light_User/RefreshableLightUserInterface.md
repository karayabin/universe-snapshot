[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The RefreshableLightUserInterface class
================
2019-05-10 --> 2021-06-24






Introduction
============

The RefreshableLightUserInterface interface.
See more info in the [conception page](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md).



Class synopsis
==============


abstract class <span class="pl-k">RefreshableLightUserInterface</span> implements [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Methods
    - abstract public [refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/refresh.md)() : void
    - abstract public [setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/setSessionDuration.md)(int $durationInSeconds) : mixed
    - abstract public [getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/getSessionDuration.md)() : int

- Inherited methods
    - abstract public [LightUserInterface::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/isValid.md)() : bool
    - abstract public [LightUserInterface::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/getIdentifier.md)() : string | false
    - abstract public [LightUserInterface::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/hasRight.md)(string $right) : bool

}






Methods
==============

- [RefreshableLightUserInterface::refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/refresh.md) &ndash; Refreshes the user.
- [RefreshableLightUserInterface::setSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/setSessionDuration.md) &ndash; Sets the duration of this user' session in seconds.
- [RefreshableLightUserInterface::getSessionDuration](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/getSessionDuration.md) &ndash; Returns the duration of this user' session in seconds.
- [LightUserInterface::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/isValid.md) &ndash; Returns whether the user is valid.
- [LightUserInterface::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/getIdentifier.md) &ndash; or false if the user is not valid.
- [LightUserInterface::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/hasRight.md) &ndash; Returns whether the user has the given right.





Location
=============
Ling\Light_User\RefreshableLightUserInterface<br>
See the source code of [Ling\Light_User\RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/RefreshableLightUserInterface.php)



SeeAlso
==============
Previous class: [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)<br>
