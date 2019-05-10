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

By convention, alight plugin making use of "rights" will prefix all its rights with an identifier based on the plugin name.

For instance, a plugin name Light_4XBlog would have its rights starting with the **4x_blog** prefix (or 4xblog, or 4x-blog, you get the idea).

By convention, the right string uses special symbols:

- the dot (.)
- the asterisk (*)

More about that in the next section.


### Rights and namespaces

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

