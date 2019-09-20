The Light User
===========
2019-05-10


A user is a person with well defined rights.


It's basically an implementation which answers the question: "is this client allowed to do this?".




Valid or invalid?
----------------
A user can be either valid or invalid.

An invalid user can do nothing: she has no rights at all.

A valid user has rights attached to her, which define what she can do/not do.

By default, all users are invalid (on a philosophical point of view).

Usually, an user becomes valid by providing credentials.

The validity of a user lasts a few minutes, hours or days (or even can last forever), depending on the configuration, and eventually ends (usually), at which point the user becomes invalid again.

It's possible to end the validity of an user programmatically too, for instance when an user logs out of a website by clicking on a logout button.
 

It's all about rights
----------------

The user's rights are essentially simple strings attached to the user.

For instance, "activate_coffee_machine", or "edit_post".

By convention, a light plugin making use of "rights" will prefix all its rights with an identifier based on the plugin name.

We recommend using the plugin name followed by a dot, followed by the "right" name.


UPDATE: 2019-09-11.
In fact, the user "rights" are now called "permissions".

The aforementioned principles apply, but there are some little nuances.

For more information, see the [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md).



### Rights and namespaces

UPDATE: 2019-09-11: This section is now deprecated/frozen as now we use permissions, which describe a "right" in such a specific manner
that there might be no need for namespaces anymore.

 
By convention, a plugin author organizes her rights in namespaces, and a dot indicates that the left part (of the dot) contains
the right part.

For instance, the right **4x_blog.admin.sports.edit_post** indicates that there is an **edit_post** right contained in the **sports** namespace
of the **admin** namespace of the **4x_blog** namespace.

Basically, a namespace being just a container for rights.



It's possible to assign a whole namespace of rights at once to the user, by using the asterisk notation.

For instance, a super user of the fictional Light_4XBlog system can simply use the "4x_blog.*" right,
which means she has all the rights contained in the **4x_blog** namespace.





The identifier
-----------

A valid user also has an identifier, which is also a simple string.

Each user has a unique identifier, such as there is no conflict between the users identifiers.


The user identifier is used to create directories on the filesystem owned by the user, or to create entries
in a database related to the user.

Basically, the identifier is like the signature of the user.



The concept of refreshing an user
----------
2019-07-11

Often with users stored in the session, there is an expire time which is refreshed as long as the user
visits a page.
 
A refreshable user is an user which expiration time can be refreshed by calling the refresh method (with no arguments).
Usually, the refresh method will be called near the top of the application logic, so that the refreshable
user gets refreshed on every page.

Note that we can call the refresh method on both a valid user and an invalid user.
The refresh method will only refresh a valid user, and do nothing if it's called on an invalid (i.e. not connected) user.
