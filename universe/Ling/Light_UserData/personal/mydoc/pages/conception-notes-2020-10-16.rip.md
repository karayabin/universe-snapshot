Light_UserData, conception notes
=====================
2019-09-27 -> 2020-10-16




Intro
---------
2019-09-27 -> 2020-10-06


**Light_UserData** is a per user file management system for the [light framework](https://github.com/lingtalfi/Light).


Often times, users have the ability to create some kind of data.

For instance, an admin user could create a backup of a certain table (via the gui),
or a web user could upload his avatar file.


The idea behind this plugin is to gather all the data created by a given user in one place,
hoping to make the data more organized and easier to manage. 




The filesystem
--------------
2019-09-27 -> 2020-10-06


We use a virtual file system, because it provides a better user experience with the upload forms (i.e. basically the user can reset
a form, and that would cancel any uploaded files).


Our general filesystem look like this:

```txt 
- (root dir)/
----- users/
----- vm/
```


The **users** directory is where the user's files reside eventually.
Whereas the **vm** directory contain files temporarily managed by the virtual file system.

As the form is filled, the files uploaded by the user are first temporarily stored in the **vm** directory.
When the form is submitted and valid, we transfer the user files from the **vm** directory to the **users** directory.

Under the hood, we use a [connected vfs](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md#the-connected-vfs).


### The users directory
2020-10-06

Each user has its own directory at the root of the **users** directory:

```txt 
- (root dir)/
----- users/
--------- $userId
```

The name of the directory is the user identifier, as given by the [Light_User](https://github.com/lingtalfi/Light_User)'s identifier property.



### The vm directory
2020-10-06 -> 2020-10-16

The **vm** directory is handled by the **connected vfs** that we use, but we will give a basic insight of how it's organized here (for more details,
see the **connected vfs** documentation):


```txt 
- (root dir)/
----- vm/
--------- $contextId
```


In our implementation, it turns out that the contextId variable (which comes from the connected vfs nomenclature) is a combination of the $userId too
and some other variable.

In practise, this little trick help us transfer files from the **vm/$contextId** directory to the **users/$userId** directory.

For more details, see our [file manager handler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) document




### Special files
2020-10-06



We use **special files** for various purposes.

There are two special file types that you need to be aware of:

- related files
- original files


The [basename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) of a special file has a particular format:

- $baseName--$specialSuffix 


For that reason, the double dash (--) is a reserved expression, and therefore our service won't allow the user to have the double dash
expression in their filename when they submit the form.



#### Related files
2020-10-15

 
A related file can be thought as a dependent variation of a source file.
 

Once the user has uploaded a file, on the server side we have the opportunities to create copies of it if we want.
Not only verbatim copies, but also variations.

So for instance, the user uploads an image in an e-commerce app: car.png.

From that we can create 3 related files (for instance):

- car--small.png 
- car--medium.png 
- car--big.png


Or we could be more specific:

- car--80x80.png 
- car--450x450.png 
- car--1200x1200.png 


You get the idea.

That's not all.

 
A related file is also bound to its original in that if we update the original file, we also need to update all the related files along with it.
Similarly, when we delete the original file, it removes all the related files along with it.

So in short, we can see the related files as gravitating around a main file, and any change in the main file affects the related files.


At least that's the idea.

In terms of implementation though, here is what we do:

- when the user deletes a file, we delete the associated related files if any
- for update operation, we rely on the user using our gui to do so, which triggers a **delete** operation followed by an **insert** operation,
    which effectively recreates the source file and the related files.
    Note that you must use our gui to keep the sync between related files and the source file: don't use our api methods directly, unless you know
    exactly what you are doing.




The related file can have any $specialSuffix, except for:

- ORIGINAL (which is reserved for the original special file type)


 
 

#### Original files
2020-10-15

When the user uploads an image, we often want to reduce its size right away, so that it takes less space on the server.

However sometimes it's convenient to keep the original too. Think about the case where the user can crop his/her avatar.
Every time you crop the image, its dimensions are reduced, so in that case it makes sense to crop from the original every time.

An original file has a $specialSuffix of:

- ORIGINAL (it's uppercase)

 
Related: the keepOriginalUrl section of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).




Warnings
----------
2020-01-31


- This plugin depends on the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin.
- This plugin only works with the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md) (i.e. not with any light user).



Current user
-------------
2019-09-27 -> 2020-10-06

The current user is a term that I use in Light_UserData.

It always refers to the **Light_User**.
Generally, it refers to the **Light_User** returned by the [user_manager](https://github.com/lingtalfi/Light_UserManager/) service.

However, I might have added the **setTemporaryUser** and **unsetTemporaryUser** methods for debugging purposes, or even simply to
access the other users' data programmatically.

When a temporary user is set, it becomes the current user (until it's unset again, in which case
the current user falls back to the one returned by the **user_manager** service).








Tags
--------
2019-09-27


We can also bind tags to the user files. This gives us a way to better to find the user data.

Tags can't contain the comma character, because why do we need them?

**Note to myself**: and if they did I would have to change my implementation in the fileuploader.js (server delivers tags as a csv string).




The private privilege
------------------
2019-09-27

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
2019-09-27


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
2020-01-31 -> 2020-10-06

    
- **luda_resource**: a resource is a file owned by an user.
    - id: aik
    - user_id: fk to the **lud_user.id** field brought by the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin (we depend from that plugin).  
        This plugin only works with the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md).
              
    - resource_identifier: uq, str 128 the resource identifier.
        
        While it might be tempting to use the id directly as the resource identifier, I found that using a dedicated resource_identifier
        field gives us more flexibility (i.e. we can change it any time we want if we so desire).
        
    - path: str 256. The relative path, from the user directory to the file.
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
        

 




Our web service
============
2020-02-21 -> 2020-10-12


The **Light_UserData** plugin provides an implementation of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) (**standard set**), 
so that users can upload/interact with their files.


We use a **virtual file server** (vfs) under the hood.


The main idea is that we first execute the operations on the **vfs**, and then only commit to the real server when the form is successfully posted.


So for instance, with the **add** operation, the synopsis is this:

- the js client sends the file to upload, along with some meta information (file path, is it private, tags, ...)
- our ajax handler calls the **vfs**, which executes the add operation on the **vfs** (which in effect stores the file and meta somewhere in its virtual space)   
- if the user completes the form successfully, then the **vfs** will "commit" the **add** operation to the real server

The same scheme applies to all operations.











 





Configuration
-------------
2020-10-06





Our configuration is divided in two parts:

- the service configuration
- the gems configuration



The service configuration contains configuration directives that apply for all gems, whereas the gems configuration
define configuration that applies only to a specific gem.

By gem, I mean the configuration file for a specific form, basically.

We use the [Light_UploadGems](https://github.com/lingtalfi/Light_UploadGems) plugin under the hood, but our service will 
understand the following extra properties:


- useVfs: bool=false. Whether to use the **virtual machine**. See the virtual machine section for more details.
- acceptKeepOriginal: bool=false. Whether to allow keeping an original of the file. See the **original file** section for more details.
    Note that the client must set the keep_original flag to 1, in addition to acceptKeepOriginal being true, to effectively create the original resource on the server. 
- path: string, the path where to put the file. It's a relative path from the user directory.
    It accepts the following tags:
    - filename: will be replaced with the filename (including file extension).
    
    To call a tag, place it within curly braces like {that}.





Accessing the user files from the browser
-----------
2020-10-06


We also provide a web entry point to access the user files.

The access url is: **/user-data** (defined in /app/config/data/Light_UserData/Light_EasyRoute/luda_routes.byml),
and it has the following parameters:

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
     
    




















 