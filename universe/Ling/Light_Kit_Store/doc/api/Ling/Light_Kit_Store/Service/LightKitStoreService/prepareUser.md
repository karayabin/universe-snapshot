[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Service\LightKitStoreService class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md)


LightKitStoreService::prepareUser
================



LightKitStoreService::prepareUser — This is the callback for the user_manager->addPrepareUserCallback method.




Description
================


public [LightKitStoreService::prepareUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/prepareUser.md)(Ling\Light_User\LightUserInterface $user) : void




This is the callback for the user_manager->addPrepareUserCallback method.
You shouldn't use this method manually.

What this does is it handles the remember_me system like this:

- if the user is not connected, we check whether he has a remember_me token.
     If he does,
         if it's valid, we connect him, and regenerate a new remember_me token that
             we store in the db and in the user cookies.
         if it's not valid, we remove the token
             Note: some systems will blame the user for identity theft, but we don't
     If he doesn't have a remember_me token, this method does nothing.




Parameters
================


- user

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitStoreService::prepareUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Service/LightKitStoreService.php#L186-L205)


See Also
================

The [LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md) class.

Previous method: [generateUserToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/generateUserToken.md)<br>Next method: [registerWebsiteFromDirectory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/registerWebsiteFromDirectory.md)<br>

