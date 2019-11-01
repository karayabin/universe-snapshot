User notifications
===============
2019-09-26



Displaying notifications to the user is a very common task.

In Light_Kit_Admin, we have various ways of achieving that:


- toasts (reserved for dynamic uses)
- notification messages (reserved for static uses)
- gui widget notifications


To make things simpler, we've taken the decision (for now) to separate the toasts and the notifications
based on how they are called.

Toasts are reserved for dynamic calls (i.e. called from javascript).
Notifications are reserved for static calls (i.e. called from php).

This might change in the future, but for now we believe it helps keeping things clean and organized.


Toasts
---------

We can use the toast method of the [light kit admin js environment api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/light-kit-admin-js-environment.md) to create a toast.

 



Notification messages
-------------

In kit admin, we display notifications near the top of the screen for now, to catch the user attention as 
soon as possible.


To create a notification message from a **LightKitAdminController**, we can do this:

```php
$this->getKitAdmin()->addNotification(WiseTool::wiseToLightKitAdmin("s", $message));

``` 

Or this kind of things:


```php
$this->getKitAdmin()->addNotification(LightKitAdminNotification::createSuccess()->title("my title")->body("my body"));

```











Gui widget notifications
--------------------

Some gui widgets have their own notification system.
This is the case for the [ChloroformWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md#chloroformwidget) for instance, which is used by the kit admin plugin.


In general, when a gui widget has its own notification system, we try to use it when we believe it might give
the end user a better experience.


### Using the flash messages

If the gui widget notification is displayed statically (i.e. the page is refreshed), as it's the case for 
a form that we post via POST, we can leverage the flash messages to transport the notification from 
a page call to another.


A typical example of this can be found in **UserProfileController** class, which structure is summarized below:

```php
// UserProfileController


$flasher = $this->getFlasher(); // returns a LightFlasher
$form = the form widget

if form posted successfully:

    $flasher->addFlash("user_profile", "Congrats, the user form was successfully updated.");
    return $this->redirectByRoute("lka_route-user_profile");
else 
    if ($flasher->hasFlash("user_profile")) {
        list($message, $type) = $flasher->getFlash("user_profile");
        $form->addNotification(WiseTool::wiseToChloroform($type, $message));
    }

    


```


