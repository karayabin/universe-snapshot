Light kit admin events
=============
2019-11-07 -> 2020-11-30



The Light_Kit_Admin plugin provides the following events:


- Light_Kit_Admin.on_page_rendered_before: this event is triggered from LightKitAdminController->renderPage,
    just before the rendering is actually done. 
    This allows debugger plugins (such as Light_Kit_Admin_DebugTrace for instance) to know which kit page was called.
    The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) with the **page** variable.
        
- Light_Kit_Admin.on_user_successful_connexion: this event is triggered from LoginFormController->render,
    when the user connects successfully.
    The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) with the **user** variable,
    containing the connected user instance (which is a **LightWebsiteUser**, see our [user page](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/user.md) for more info.)
