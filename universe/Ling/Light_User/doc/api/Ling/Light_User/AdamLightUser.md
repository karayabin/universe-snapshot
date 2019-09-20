[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The AdamLightUser class
================
2019-05-10 --> 2019-09-18






Introduction
============

The AdamLightUser class.

Adam is the first light user.
He is always valid, he has all the rights, and his identifier is adam.



Class synopsis
==============


class <span class="pl-k">AdamLightUser</span> implements [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Methods
    - public [isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser/isValid.md)() : bool
    - public [getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser/getIdentifier.md)() : string | false
    - public [hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser/hasRight.md)(string $right) : bool

}






Methods
==============

- [AdamLightUser::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser/isValid.md) &ndash; Returns whether the user is valid.
- [AdamLightUser::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser/getIdentifier.md) &ndash; or false if the user is not valid.
- [AdamLightUser::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser/hasRight.md) &ndash; Returns whether the user has the given right.





Location
=============
Ling\Light_User\AdamLightUser<br>
See the source code of [Ling\Light_User\AdamLightUser](https://github.com/lingtalfi/Light_User/blob/master/AdamLightUser.php)



SeeAlso
==============
Next class: [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)<br>
