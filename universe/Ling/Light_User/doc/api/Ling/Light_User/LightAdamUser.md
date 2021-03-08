[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)



The LightAdamUser class
================
2019-05-10 --> 2021-03-05






Introduction
============

The LightAdamUser class.

Adam is the first light user.
He is always valid, he has all the rights, and his identifier is adam.



Class synopsis
==============


class <span class="pl-k">LightAdamUser</span> implements [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md) {

- Methods
    - public [isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser/isValid.md)() : bool
    - public [getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser/getIdentifier.md)() : string | false
    - public [hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser/hasRight.md)(string $right) : bool

}






Methods
==============

- [LightAdamUser::isValid](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser/isValid.md) &ndash; Returns whether the user is valid.
- [LightAdamUser::getIdentifier](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser/getIdentifier.md) &ndash; or false if the user is not valid.
- [LightAdamUser::hasRight](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightAdamUser/hasRight.md) &ndash; Returns whether the user has the given right.





Location
=============
Ling\Light_User\LightAdamUser<br>
See the source code of [Ling\Light_User\LightAdamUser](https://github.com/lingtalfi/Light_User/blob/master/LightAdamUser.php)



SeeAlso
==============
Next class: [LightUserInterface](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightUserInterface.md)<br>
