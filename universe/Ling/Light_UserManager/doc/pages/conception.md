User manager
==================
2019-05-10



The user manager is a service which always return your user instance.

The user manager can adapt to any situation.

For instance it can be as simple as returning a predefined user instance, or it can be more complex and return a session
user who logged in by providing credentials via a web form.

Or if the user is not connected at all, it returns a void user instance.