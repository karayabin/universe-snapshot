Error handling (my thoughts before implementation)
==============
2019-07-23 -> 2019-07-25



An important question in any application is: how do we react when an error occurs.
Light_Kit_Admin is no different and needs a solution.



Note: by error, I mean exceptions.
In other words, those errors which break the gui if we don't do anything about it.
 



First of all, let's make a list of the different types of errors we might encounter.
Those are closely related to the types of requests an user is able to make.

An user can either:

- access a page, i.e. access an url as the main url (which will display in the address bar of the browser)
- call an ajax url 


Those are the only two ways an user can interact with a web application.
And so therefore we can imagine what happens when an exception is thrown in those cases:

- if an exception is thrown while we were expecting a page to be displayed, we can either:
    - redirect to a dedicated error page, with the error message in the center of it 
    - display a notification in a dedicated zone 
    - display a toast in a dedicated zone 
    - display a gui widget in a dedicated zone 
    - store the error in a database (might be useful in some cases when you want to dig more into an issue)
- if an exception is thrown from an ajax call, we could do the same actions, although the redirection might not be the best tool in this case


It's important to understand that different types of exceptions might trigger a different reaction from the application.
For instance, if the user is denied access to a page, she could be redirected to an "Insufficient rights page",
but if the user tries to update a database using a curl request, she could have a toast explaining her that this request is forbidden.

     
     
So what do we need?
---------------

As we can see from the list above, we need to be able to display a notification, or a toast.

As Light_Kit_Admin is plugged into a kit environment, the normal way of displaying things is through widgets.
And so the most natural idea that comes into mind to convert an exception to a widget, is to add a widget to the
kit configuration page.

My idea is to do something like this:

```php 
if ( user has right )
    // ok
else
    // call the toast 
    container->get(kit_admin)->addNotification(error message, toast)
``` 

The addNotification method allows us will add a notification (toast in this case) to the gui. 



### 2019-07-25 UPDATE
Actually, here is a concrete example of a controller doing this (I've implemented it now).

```php
class DashboardController extends AdminController
{


    /**
     * Renders the dashboard page and returns the result.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderDashboard()
    {

        $this->getKitAdmin()->addNotification(LightKitAdminNotification::createError()->body("An error occurred, blabla")->title("Oops"));
        return $this->renderAdminPage('Light_Kit_Admin/zeroadmin/zeroadmin_home');
    }
}
```





What will we do?
----------

So in the LightKitAdmin the main idea is the following:

- ajax transmitted errors give birth to a toast notification.
- other errors spawn an alert notification.

There should be two zones named "notifications" and "toasts" in every layouts provided by light kit admin,
and so we would basically add some widgets to those zones when we want to display a notification to the user.


