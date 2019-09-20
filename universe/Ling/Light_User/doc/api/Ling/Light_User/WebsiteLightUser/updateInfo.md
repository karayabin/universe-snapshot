[Back to the Ling/Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md)<br>
[Back to the Ling\Light_User\WebsiteLightUser class](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)


WebsiteLightUser::updateInfo
================



WebsiteLightUser::updateInfo — Updates the user information.




Description
================


public [WebsiteLightUser::updateInfo](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/updateInfo.md)(array $info) : void




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
See the source code for method [WebsiteLightUser::updateInfo](https://github.com/lingtalfi/Light_User/blob/master/WebsiteLightUser.php#L218-L236)


See Also
================

The [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md) class.

Previous method: [disconnect](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/disconnect.md)<br>Next method: [getId](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser/getId.md)<br>

