Light_UserDatabase events
===============
2019-12-19




Light_UserDatabase provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- Light_UserDatabase.on_new_user_before: triggered from the MysqlLightWebsiteUserDatabase->addUser method
    when an user is about to be created in the database.
    The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) instance with
    the following variables:
    - userInfo: array of user info. 