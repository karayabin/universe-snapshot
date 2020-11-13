Realist synopsis
=========
2020-08-20



As a lka developer, I sometimes need to play with realist, unfortunately the Light_Realist documentation is pretty poor
at the moment, so here is a global synopsis, to help me get the global vision.


So a page is displayed, which means a controller is called.
Let's take the example of the Light_Kit_Admin_UserNotifications plugin, on the user main page list.

In that case, the **render** method of the  **LightKitAdminUserNotificationsUserMainPageController** controller is called.

It internally calls a kit widget which basically executes this widget file: **templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LightRealistWidget/templates/default.php**,
with a request declaration found in here: **config/data/Light_Kit_Admin_UserNotifications/Light_Realist/custom/kit_admin_user_notifications_mainpage.byml**.


The widget file will first be looking for a renderer to render the list.

By default, it calls the **getListRendererByRequestId** method of the realist service, which takes the **rendering.list_renderer.identifier** value
from the request declaration. 
By default, this identifier is just the plugin name (i.e. Light_Kit_Admin_UserNotifications).

So then the **getListRendererByRequestId** returns the registered listRenderer instance with that identifier,
which is the **Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer** by default, which is a child of **Bootstrap4AdminTableRenderer**.


Well, then the rows are rendered via ajax.

In fact, the **Bootstrap4AdminTableRenderer** sends the following input via ajax:

- handler: Light_Realist
- action: realist-request
- request_id: Light_Kit_Admin_UserNotifications:custom/kit_admin_user_notifications_mainpage
- csrf_token: ...
- tags: ...




So, because of how our **Light_AjaxHandler** works, this will basically call the realist service's **executeRequestById** method.

The realist service will internally use a *RealistRowsRendererInterface** instance to render the rows and send them back via ajax.

This instance is defined by the **rendering.rows_renderer** setting, usually we use the **rendering.rows_renderer.identifier**,
which again is just the plugin name, and then the realist service will search for a registered **realistRowsRenderers** with that identifier.


By default, this will be **LightKitAdminRealistRowsRenderer**.


The action in rows
----------
2020-08-20

So today my question was: why my custom action doesn't show up in the rendering?

I had defined a custom list action in **rendering.rows_renderer.types._action**, using type=Light_Realist.mixer,
which is handled by the **LightKitAdminRealistRowsRenderer**.

The problem was that I defined it like this:


```yaml
default:
    rendering:
        rows_renderer:
            types:
                _action: 
                    type: Light_Realist.mixer
                    separator: " - "
                    items:

                        -
                            type: Light_Kit_Admin_UserNotifications.list_action
                            text: Delete
                            action_id: realist-mark_as_deleted
                            csrf_token: true
                            include_ric: true
```


So the type that I used (i.e. Light_Kit_Admin_UserNotifications.list_action) isn't defined anywhere, so I need to 
make the **LightKitAdminRealistRowsRenderer** aware of my type somehow.

So I can either override **LightKitAdminRealistRowsRenderer**, but I noticed that this class provides a generic **Light_Kit_Admin.list_action**
action type, which I can use to achieve what I want. 
 
 
So the fix is simply to use the **Light_Kit_Admin.list_action** type instead of the non-existing **Light_Kit_Admin_UserNotifications.list_action** type.