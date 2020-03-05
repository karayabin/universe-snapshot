Light_UserData, conception notes
=====================
2019-09-27 -> 2020-02-21




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




Warnings
----------
2020-01-31


- This plugin depends on the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin.
- This plugin only works with the [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md) (i.e. not with any light user).



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

Tags can't contain the comma character, because why do we need them?

**Note to myself**: and if they did I would have to change my implementation in the fileuploader.js (server delivers tags as a csv string).




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




Maximum storage capacity
-------------------
2019-12-16



Because we cannot trust an user, we implement a maximum storage capacity (aka msc), so the user can store a certain amount of files, 
but not more than that.


Because different users might have different msc, we create maximum storage capacity classes using the following convention:

- Light_UserData_MSC_1
- Light_UserData_MSC_1a
- Light_UserData_MSC_1b
- ...
- Light_UserData_MSC_2
- Light_UserData_MSC_3
- ...

So in general:
- Light_UserData_MSC_XXX

Where XXX represents the msc class identifier.

The main idea is that the msc class identifier always starts with a number which represents the level of the class.

A class with a higher level can always store more than a class with lesser level.

So for instance a class **Light_UserData_MSC_2** will always store more than any **Light_UserData_MSC_1** class.

All the variations letters (**Light_UserData_MSC_1a**, **Light_UserData_MSC_1b**, ...) can be created by the developer
to ensure that the aforementioned rule is always respected.





Our plugin creates the following plugin option by default:

- Light_UserData_MSC_10 with value 20M


And it binds them to both the existing users and the newly created ones (assuming the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin is used).


For security reasons, an user without an msc class bound to him/her will be denied any storage (i.e. equivalent to msc=0).





The resource identifier system
---------------
2020-01-31


Until now the system has been working well, however I'm not satisfied with the complexity brought by the
obfuscating system, which I found unnecessary.


There is still a need to not expose any sensitive information via the url (such as the user name owning the file),
but instead of having a url with two parameters (file and id, where id identifies the user), 
I realized that we can only have one parameter id, thus having only one table (database wise) for handling the resources instead of two.

It also removes the hooks that this plugin previously had with the Light_UserDatabase, occurring during the database installation.


By doing so, I believe I don't need to give more explanations other than pointing the reader to the "tables & information" section below.




Tables & information
---------------
2020-01-31 -> 2020-02-11

    
- **luda_resource**: a resource is a file owned by an user.
    - id: aik
    - user_id: fk to the **lud_user.id** field brought by the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin (we depend from that plugin).  
        This plugin only works with the [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md).
              
    - resource_identifier: uq, str 128 the resource identifier.
        
        While it might be tempting to use the id directly as the resource identifier, I found that using a dedicated resource_identifier
        field gives us more flexibility (i.e. we can change it any time we want if we so desire).
        
    - dir: str 128. The relative path, from the user directory to the directory (direct parent) containing the file.
    - filename: str 64. The filename, including the file extension if any.
    - is_private: char 1 (0|1). Whether the file should only be displayed to the owner user, or to all users.
    - date_creation: datetime. The date time when the resource was inserted in the database.
    - date_last_update: datetime. The date time when the resource was last updated in the database. When the resource is created,
        the date_last_update value is the same as the date_creation value.
    
            
- **luda_tag**: a tag for the resource.
    - id: aik
    - name: uq, str 64   
    
- **luda_resource_has_tag**: a simple linkage table.
    - resource_id: fk
    - tag_id: fk
        

 
 
The original file
-------------
2020-02-18

Generally, when the user uploads a file, we resize it to fit our application better.

However, sometimes it's useful to keep the original file.

In particular in regard to cropping. For instance imagine a user uploads an avatar and crops it using a gui interface (such as the file editor
provided with the [fileuploader](https://github.com/lingtalfi/JFileUploader) script).

So she uploads the cropped file, but then imagine she changed her mind and wants to crop another part of the image.

If we didn't keep the original image, we would only be able to provide the cropped version to the user, and she basically wouldn't be able to 
crop from the original image again (unless she uploads it again).

So, to help a gui provide such a functionality where the user can access the original image again, we provide the url to the original image in the headers
of the image being requested.



The web service
--------------
2020-02-21

The **Light_UserData** plugin provides a web interface to upload/interact with user files.

First of all, the [fileEditor extension of the ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md#the-fileeditor-protocol-addition) support is implemented.


In addition to that, we provide an interface to access the user files.
Its default url is: **/user-data** (defined in /app/config/data/Light_UserData/Light_EasyRoute/luda_routes.byml),
and it accepts the following parameters:

- id: mandatory, string. The resource identifier of the file to access.
- meta: optional, bool=false. Whether to add meta to the returned http response.
    If true, those meta are the following:
        - fe_is_private: 0|1. Whether the file is private.
        - fe_date_creation: datetime. The time when the file was added.
        - fe_date_last_update: datetime. The last time when the file was updated.
        - fe_protocol: fileEditor. Just a string that js gui can use if they want.
        - fe_original_url: string. The original url associated with the file, or an empty string if there is no original url
            bound to that particular file.
            
            See the "original files" concept in this document for more details.
        - fe_tags: string. The comma separated list of the tags bound to the file.
- original: optional, string (0|1) = 0.
    Whether to return the default file (aka processed file), or the original file. 
    See the "original file concept" in this document for more details.














 