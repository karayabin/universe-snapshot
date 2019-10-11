Light_UserData, conception notes
=====================
2019-09-27




Often times, user have the ability to create some kind of data.

For instance, an admin user could create a backup of a certain table (via the gui).


The idea behind this plugin is to gather all the data created by a given user to one place,
hoping to make the data easier to manage. 


The data related to a given user is stored in a directory in the filesystem called the user directory.


All directories are stored under a predefined root directory.


How a user directory is organized depends on the user of this plugin (i.e. the developer),
we just provide a service that helps storing/accessing the user data.


We use the [Light_User](https://github.com/lingtalfi/Light_User) plugin under the hood,
which has an identifier.


The user directory is based on the Light_User identifier.

In some cases when the root directory is under the web root directory, you might want 
to randomize the user directory name to avoid malicious users to access an user's content
too easily.

I might provide some help to implement such an obfuscating system.  





Current user
-------------

The current user is a term that I use in Light_UserData.

It always refer to the **Light_User**.
Generally, it refers to the **Light_User** returned by the [user_manager](https://github.com/lingtalfi/Light_UserManager/) service.

However I added the **setTemporaryUser** and **unsetTemporaryUser** methods for debugging purposes, or even simply to
access the other users data programmatically.

When a temporary user is set, it becomes the current user (until it's unset again, in which case
the current user falls back to the one returned by the **user_manager** service).


