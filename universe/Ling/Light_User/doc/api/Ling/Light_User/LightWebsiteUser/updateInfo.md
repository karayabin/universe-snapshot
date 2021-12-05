[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)<br>
[Back to the Ling\Light_User\LightWebsiteUser class](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)


LightWebsiteUser::updateInfo
================



LightWebsiteUser::updateInfo — Updates the user information.




Description
================


public [LightWebsiteUser::updateInfo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/updateInfo.md)(array $info) : void




Updates the user information.
This method is just a shortcut method that saves you from calling the setter methods manually
in the case where you have an array of user information you want to update the user with.


Only the following info can be updated:
- email
- pseudo
- avatar_url
- rights
- extra




Parameters
================


- info

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightWebsiteUser::updateInfo](https://github.com/lingtalfi/Light_User/blob/master/LightWebsiteUser.php#L247-L265)


See Also
================

The [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) class.

Previous method: [disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/disconnect.md)<br>Next method: [getId](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser/getId.md)<br>

