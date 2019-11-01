Light_UserData, conception notes
=====================
2019-09-27




Often times, user have the ability to create some kind of data.

For instance, an admin user could create a backup of a certain table (via the gui).


The idea behind this plugin is to gather all the data created by a given user to one place,
hoping to make the data easier to manage. 


The data related to a given user is stored in a directory in the filesystem called the user directory.


All directories are stored under a predefined **root directory**.


How a user directory is organized depends on the user of this plugin (i.e. the developer),
we just provide a service that helps storing/accessing the user data.


We use the [Light_User](https://github.com/lingtalfi/Light_User) plugin under the hood,
which has an identifier.


The user directory is based on the Light_User identifier.

You might want to obfuscate the user directory name to avoid malicious users to access an user's content
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





Tags
--------

We can also bind tags to the user files. This gives us a way to better to find the user data.




The private privilege
------------------

A resource (i.e. user data file) can have the **private** privilege.

By default, all the resources (aka data) uploaded by an user are publicly available, because the original
idea behind the file manager was to let a web user manager her files in a web application like wix, or a blog gui, etc...

And so for instance the user would upload an image, and then use that image in a blog post. So the image
needs to be seen by all website visitors. In other words, the image is public.

However, it's not very difficult to think you an user would want a file to be private. For instance, a financial
stylesheet, or some personal email drafts. 

So the idea with the **private** privilege is that when a resource is private, the Light_UserData plugin will check that the user's identifier
matches the identifier of the owner of the resource. If there is no match, an exception is thrown, and in terms of gui, this should translate
to a "forbidden access" error for the website visitor who tries to access the protected resource.


In terms of implementation, I will be using this idea:
a file is private only if there is a file with the same name with the ".private" suffix appended to it next to the private file.

So for instance, if there is a file **my_file.txt**, it's private only if there is a file next to it called **my_file.txt.private**.

And because we need to not parse files ending with **.private**, the ".private" extension is forbidden for regular file names (i.e. it's reserved for
the Light_UserData plugin). 




The obfuscating system
----------------

Because a malicious user could access a public user resource's url, he could read the user identifier from it.
That's a bad thing, we don't want to give that information for free, and so the obfuscating system is about
changing the user identifier, so that a garbage string appears in the url instead of the user identifier.


The obfuscated name is just virtual though, which means it's used in the urls, but not in the file system.

That's because if you changed the obfuscate function with hardcoded obfuscated directory names, it would involve a complex system to:

- detect that the obfuscated function has been changed (file hash comparison?) 
- access the old obfuscated names (database?) and update them to the new ones

And I want to keep this plugin as simple as possible.   
Plus, the malicious attacker will never see those real names anyway (if you don't put your user data under the web root, which is always
the case for me), unless he already has access to your filesystem, in which case you have bigger problems anyway.

So in other words, if you want hardcoded obfuscated directories, use another plugin.


From the service configuration, we can configure an obfuscation parameters that this plugin will use to transform
the user identifier into a more difficult to find name. We use an algorithm based on the php password_hash function,
and a secret string to make it harder for the attackers to reverse-engineer the user identifier from the hash.


Now keep in mind that this plugin needs to be able to resolve a virtual directory name back to an user identifier.
So, I'll use a database to keep track of the correlation between the virtual names and the user identifiers.

When you change the obfuscation function, it's crucial that you update the database references too (otherwise the links
to your user data won't work anymore). I'll provide a **refreshReferences** method for that purpose.

However, database access is slow, and imagine that a web page displays five images of the same user, I don't want to make
5 database calls. So, instead I want to access that name from the session. We can leverage 
the [Light_User](https://github.com/lingtalfi/Light_User) extra data to do that.


In other words, when the **refreshReferences** method is called, it will do two things:

- recreate the correlation between user identifier and directory names in a separate table **luda_directory_map**
- update the lud_user table (from the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin) and add the extra.directory property  

 





Web access and security
-----------------

All resources of the user will be contained in one url namespace, which defaults to **/user-data**.
In other words, all urls starting with **/user-data** will internally call the main controller provided by the Light_UserData,
which delivers the resource (and manage the private tag permission).

Inspired by the [secure file upload discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/secure-file-upload.md), we recommend that the actual filesystem root directory is an **user-data**
directory under the application root, but not inside the web root directory:

```txt
- light_app/
----- www/              The web root directory
----- user-data/        <--- HERE
```



