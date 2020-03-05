Light kit admin events
=============
2019-11-07



The Light_Kit_Admin plugin provides the following events:


- Light_Kit_Admin.on_page_rendered_before: this event is triggered from LightKitAdminController->renderPage,
        just before the rendering is actually done. 
        This allows debugger plugins (such as Light_Kit_Admin_DebugTrace for instance) to know which kit page was called.
        The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) with the **page** variable.