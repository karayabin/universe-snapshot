Light_ExceptionHandler conception notes
=======================
2019-11-11 -> 2020-06-01

The main idea with this plugin is to log all the exceptions caught by your application into a log/exception.txt file (or
any file that you want).

On a more abstract level, the main idea is to centralize those exceptions so that it's generally easier to do handle
them.

The implementation I foresee is the following:

- an event listener will listen to all exceptions being dispatched
- when such an event is detected, this plugin (Light_ExceptionHandler) will dispatch a log message on the exception
  channel (using the [Light_Logger](https://github.com/lingtalfi/Light_Logger)).
- this plugin also provides a logger listener to write the exception to a **log/exception.txt** file (or any file you
  like)
- other plugins can use our service to add their own callables, so that they can do extra actions upon an exception
  reception (such as sending emails for instance)

Note that this system relies on the fact that all plugins throwing exceptions dispatch the exception. If they don't,
the **Light_ExceptionHandler** has no way to be aware of them.
The [Core/Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) instance will catch
all exceptions on the main "thread", and the [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler)
service, which is generally used to create ajax services, is catching the exceptions in an ajax-service "thread".

In other words, those two objects alone cover a lot of the exceptions being thrown. Yet in order to catch ALL the
exceptions, we need to monitor new plugins which provide ajax services which doesn't use the Light_AjaxHandler system,
and add them manually. But I take the responsibility for doing that, at least for the plugins I will create.   

