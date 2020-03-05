[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The RefreshableLightUserInterface class
================
2019-05-10 --> 2020-02-25






Introduction
============

The RefreshableLightUserInterface interface.
See more info in the [conception page](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md).



Class synopsis
==============


abstract class <span class="pl-k">RefreshableLightUserInterface</span> implements [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Methods
    - abstract public [refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/refresh.md)() : void

- Inherited methods
    - abstract public [LightUserInterface::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/isValid.md)() : bool
    - abstract public [LightUserInterface::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/getIdentifier.md)() : string | false
    - abstract public [LightUserInterface::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/hasRight.md)(string $right) : bool

}






Methods
==============

- [RefreshableLightUserInterface::refresh](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/RefreshableLightUserInterface/refresh.md) &ndash; Refreshes the user.
- [LightUserInterface::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/isValid.md) &ndash; Returns whether the user is valid.
- [LightUserInterface::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/getIdentifier.md) &ndash; or false if the user is not valid.
- [LightUserInterface::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface/hasRight.md) &ndash; Returns whether the user has the given right.





Location
=============
Ling\Light_User\RefreshableLightUserInterface<br>
See the source code of [Ling\Light_User\RefreshableLightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/RefreshableLightUserInterface.php)



SeeAlso
==============
Previous class: [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)<br>Next class: [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)<br>
