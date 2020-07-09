Light_UserData, conception notes
=====================
2019-09-27 -> 2020-05-22




Intro
---------
2019-09-27


Often times, users have the ability to create some kind of data.

For instance, an admin user could create a backup of a certain table (via the gui),
or a web user could upload his avatar file.


The idea behind this plugin is to gather all the data created by a given user in one place,
hoping to make the data more organized and easier to manage. 




The filesystem
--------------
2019-09-27 -> 2020-05-18


We store the data related to a given user in the filesystem, in a directory called the **user directory**.

We store all **user directories** in a **root directory**, which has the following substructure:

```txt 
- (root dir)/
----- users/
----- vm/
```
    
    
We use a [flat filesystem](https://github.com/lingtalfi/TheBar/blob/master/discussions/flat-filesystem.md) to reduce the general complexity of our plugin.


The **users** sub-directory contains the files uploaded by the user.
    
The **vm** sub-directory contains all the files managed by the virtual file system that our plugin uses to provide the user with the ability
    to cancel some file uploads (amongst other things). See the [virtual-machine.md](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/virtual-machine.md) document for more info.


Both directories share the same file organization:

```txt 
- (users or vm directory)/
----- $userId/
--------- files/
------------- $baseResourceId
------------- ?$baseResourceId-/
----------------- $relatedFileIndex
--------- original/
------------- $baseResourceId
--------- ?operations.byml   (only in the vm directory)
```


The **userId** is the identifier of the user (it's unique).

We use the [Light_User](https://github.com/lingtalfi/Light_User) plugin under the hood,
which has an identifier.


The **files** directory contains the files uploaded by the user.

Since we use a flat file system, the file names are the file identifiers (**baseResourceId**) (they don't have a file extension).
We store the related files in a directory which name is the **baseResourceId** with a dash in the end.

See more info in the [related-files.md](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) document. 


The **original** sub-directory contains some files that the user might want to re-use later.
    This was created for the case when the user cropped an image for instance and wants to access back to the non-cropped image to make a new crop.
    It could potentially serve other use cases as well.
    Only the regular files can have an original variant; the related files can't.     


We provide a service to store/access the user data.
See our service's source code for more info.

 




Warnings
----------
2020-01-31


- This plugin depends on the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin.
- This plugin only works with the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) (i.e. not with any light user).



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
2019-12-16 - 2020-05-28



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



Implementation note about related files:
When an user uploads a file, depending on the server configuration, this file can have an original file and some related files associated with it.
When this is the case, to avoid some cpu work we don't check the size of those extra files.
This means that the actual size used by an user can potentially be a little more than the limit number.

Note however that on the very next upload, the limit computation takes into account all the files of the user (including the related files and original files).
This means that the user can only cheat the limit once.







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
        This plugin only works with the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md).
              
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


See the keepOriginalUrl section of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).


The virtual machine
----------
2020-04-20


See the [virtual machine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/virtual-machine.md) notes.



Our web service
--------------
2020-02-21 -> 2020-05-22


The **Light_UserData** plugin provides a web interface to upload/interact with user files.


We use the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md)
with the **standard set** of parameters.


    

In addition to that, we use the [Light_UploadGems](https://github.com/lingtalfi/Light_UploadGems) plugin under the hood.
Plugin authors can provide their own configuration via the gem config section.

In particular, our service will understand the following properties:


- useVfs: bool=false. Whether to use the **virtual machine**. See the virtual machine section for more details.
- acceptKeepOriginal: bool=false. Whether to allow keeping an original of the file. See the **original file** section for more details.
    Note that the client must set the keep_original flag to 1, in addition to acceptKeepOriginal being true, to effectively create the original resource on the server. 
- path: string, the path where to put the file. It's a relative path from the user directory.
    It accepts the following tags:
    - filename: will be replaced with the filename (including file extension).
    
    To call a tag, place it within curly braces like {that}.







We also provide an interface to access the user files.

We follow the recommendations of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md), along with some extra properties.


The access url is: **/user-data** (defined in /app/config/data/Light_UserData/Light_EasyRoute/luda_routes.byml),
and it accepts the following parameters:

- id: mandatory, string. The resource identifier of the file to access.
- m: optional, string (0|1) = 0. Whether to add meta to the returned http response.
    If true, the meta will be added via the [panda headers protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/panda-headers-protocol.md).
    The meta are:
        - is_private: 0|1. Whether the file is private.
        - date_creation: datetime. The time (mysql datetime format) when the file was added. Not available with the virtual machine.
        - date_last_update: datetime. The last time when the file was updated. Not available with the virtual machine.
        - original_url: string|null. The original url associated with the file, or null if there is no original url
            bound to that particular file.
                        
            See the "original files" concept in this document for more details.
        - tags: string. The comma separated list of the tags bound to the file.
        - name: string. The file name.
        - directory: string. The relative path of the directory containing the file.
         
        
- o: optional, string (0|1) = 0.
    Whether to return the file targeted by the url (by default), or the original file associated with it (if any). 
    See the "original file concept" in this document for more details.
- c: optional, string. The uploadGem configuration id. This is required when you are in the process of adding or
    updating a file. The configuration tells our service where the file should go, what validation rules to apply, etc...
- v: optional, string (0|1). 
    When the js client wants to access a file by its url, this flag defines whether the file comes from the virtual server or the real server.
    By default, the real server serves the file.
    If the url is handled by the virtual server, then the flag must be set to 1.
    
    That's because our service basically uses a single url that will work for both the virtual environment and the 
    production environment (for practical reasons, so that we don't do the work twice).
    However, for this to work, the client must specify whether he wants to retrieve the file from the virtual server or the real server.
     
    




















 