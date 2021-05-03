Light_UserData, conception notes
=====================
2019-09-27 -> 2021-03-09




Intro
---------
2019-09-27 -> 2020-11-05


**Light_UserData** is a per user file management system for the [light framework](https://github.com/lingtalfi/Light).


Often times, users have the ability to create some kind of data.

For instance, an admin user could create a backup of a certain table (via the gui),
or a web user could upload his avatar file.


The idea behind this plugin is to gather all the data created by a given user in one place,
hoping to make the application data more organized and easier to manage. 




The filesystem
--------------
2019-09-27 -> 2020-11-09



We potentially have two **file systems**:

- the real file system (rfs)
- the virtual file system (vfs)


However, we only use the **real file system** for now (we used a vfs before, but it added too much complexity, so we opted for the rfs option).



Our general filesystem looks like this:

```txt 
- (root dir)/
----- users/
----- vm/
```


The **users** directory is the **real file system**, it's where the user's files will reside eventually.
Whereas the **vm** directory contain files temporarily managed by the **virtual file system**.

The idea behind a virtual file system is that it provides a better user experience with the upload forms (i.e. basically the user can reset
a form, and that would cancel any uploaded files).





### The users directory
2020-10-06

Each user has its own directory at the root of the **users** directory:

```txt 
- (root dir)/
----- users/
--------- $userIdentifier
```

The name of the directory is the user identifier, as given by the [Light_User](https://github.com/lingtalfi/Light_User)'s identifier property.



### The vm directory
2020-10-06 -> 2020-11-05


As the form is filled, the files uploaded by the user are first temporarily stored in the **vm** directory.
When the form is submitted and valid, we transfer the user files from the **vm** directory to the **users** directory.

Under the hood, we use a [connected vfs](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md#the-connected-vfs).

The **vm** directory is handled by the **connected vfs** that we use, but we will give a basic insight of how it's organized here (for more details,
see the **connected vfs** documentation):


```txt 
- (root dir)/
----- vm/
--------- $contextId
```


In our implementation, it turns out that the contextId variable (which comes from the connected vfs nomenclature) is a combination of the $userIdentifier too
and some other variable.

In practise, this little trick help us transfer files from the **vm/$contextId** directory to the **users/$userIdentifier** directory.

For more details, see our [file manager handler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) document




### Related files 
2020-10-19 -> 2020-10-22

The concept of related files is now replaced by the concept of [variation](#resource-and-file-variations).


### Resource and file variations
2020-10-22 -> 2020-11-09


In our database, we organize the user files in **resource** and **file variations**.

A **resource** is the abstract concept of a file, it has an identifier, but it has no path. 
The **resource** can have one or more file(s) attached to it, and we call those the **file variations** of the **resource**.


The basic idea is that some resources are best represented by one file, while some other resources are indeed composed of multiple files.

Here are some examples of resource that are best represented by one file:

- **attestation resource** -> attestation.pdf
- **avatar resource** -> avatar.png


Now here is an example of a resource that requires multiple file variations:

- **car resource**:
    - car-thumbnail.png 
    - car-medium.png
    - car-large.png     


So, we store the concrete file paths in a separate table (**luda_resource_file**).
A concrete file also has a nickname, so that the developer can access them more easily.

When we access a file (by its url), we pass the [resource identifier](#the-resource-identifier) and (optionally) the **nickname**, so in our fictive example, the urls would be like:

- https://mysite.com/user-data?id=f1601960278.1304.483&n=default
- https://mysite.com/user-data?id=f1601960278.1304.483&n=thumbnail
- https://mysite.com/user-data?id=f1601960278.1304.483&n=medium
- https://mysite.com/user-data?id=f1601960278.1304.483&n=large


If the nickname is not specified, it will default to the "default" nickname.


Generally, we would use the "default" nickname for the file bound to a resource that is best represented by one file, and use specific nicknames for the files bound to 
resources that require multiple files.

So using our above examples again, the general idea would be to have nicknames that look like this:

- attestation.pdf: default
- avatar.png: default
- car-thumbnail.png: thumb
- car-medium.png: medium
- car-large.png: large



### The source file
2020-10-22

A **resource** can have multiple files attached to it.
When the user wants to edit a resource via the gui, we need to provide information about the main file that best represents that resource, so that the gui can display
that information to the user (such as the file name and directory).

This main file is called the **source file**. 

If the **resource** has only one file attached to it, then this file is the **source file**.
If the **resource** has multiple files attached to it, then one of them needs to be the **source file**.

This choice is defined by the developer who configures the upload form.
See the [Upload file configuration of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more information.



 

#### Original file
2020-10-19 

Alias for the [original image](#original-image) concept.


#### Original image
2020-10-19 -> 2020-10-22

The idea of an **original image** is that the user can execute a crop on an image everytime he's editing the image, and the source image for the crop doesn't change.

Technically, the **original image** is the file when first uploaded by the user (i.e. when the **add** operation of the file manager protocol is used).

When the user executes an **update** operation, the **original image** is used as a source, but is never updated (until the user uploads a new image again).


We store original files in the same directory as the [source file](#the-source-file), and with the same file name, except that we append the **--ORIGINAL** suffix to the basename.


So for instance, if the source file's relative path is:

- images/avatar.png

The original image's relative path will be:

- images/avatar--ORIGINAL.png


For this reason, we prevent users to upload files which [basename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) ends with **--ORIGINAL**, as it would conflict with our concept of original image.

Similarly, the original image has a reserved nickname of "original", and therefore the nickname "original" shouldn't be used for any other copies.
See the [Upload file configuration of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more information about the nickname.


If you are using the [JFileUploader](https://github.com/lingtalfi/jFileUploader) planet as a js client (which we recommend), then it's better to set the
**immediateUpload** option to true to work with **original images**.
With **immediateUpload=true**, the **original image** will be saved as soon as the user uploads the image, and he can then edit the crop based on that saved already image.
With **immediateUpload=false**, the **original image** will be saved only when the image is sent to the server, and the user might send the cropped version, which is not optimal for an original image. 

 
 
Related: the [keepOriginalUrl section of the file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md#keeporiginalurl).







Tags
--------
2019-09-27 -> 2020-11-05


A [resource](#resource-and-file-variations) can have tags attached to it.
Tags give us an additional way to find the data stored by an user.





The private privilege
------------------
2019-09-27 -> 2020-11-05

A [resource](#resource-and-file-variations) can have the **private** privilege.

When it's the case, only the owner user can access it.

By default, all the resources (aka data) uploaded by a user are publicly available.









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
2019-12-16 - 2020-11-09



Because we cannot trust the user, we've implemented a **maximum storage capacity** (aka **msc**), so the user can store a certain amount of files, 
but not more than that.


We use the [plugin options system of the light user database plugin](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/conception-notes.md#plugin-options-and-user-groups),
with **plugin category name** of: 

- MSC


Our plugin creates the **Light_UserData.MSC** category, with the following option:

- default: 20M


It binds them to both the existing users and the newly created ones (assuming the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin is used).


For security reasons, a user without a **msc** bound to him/her will be denied any storage (i.e. equivalent to msc=0).



Implementation note:

In our implementation, the **msc** limit is a "loose" number rather than a strict limitation.
This means that if **msc** is 20M for a given user, it's possible that the actual files for this user go a little beyond that number. 

That's because our strategy is the following: when the user wants to add a file, we first check the current total size of his/her items.
If the current size is already more than the **msc**, we refute the operation, otherwise we accept it.

So for instance if the user is currently using 19M and uploads 2M, we will accept the operation (because 19 < 20), but the result on the filesystem will
be a total size of 21M.  
 
That's ok with us.
The incentive behind this implementation is that it's the fastest/simplest.
If we wanted to be precise and implement a strict filesize limitation, we probably would have to create a temporary filesystem (because of the possible
file variations/transformations that can potentially occur on a file, due to fileUploadGem conf), check the size on those files, and then import them back 
in the real file system if the size is ok.

This would add complexity to our plugin, so we chose to implement this loose limitation strategy instead.

For the update operation, we don't even check the file size, based on the same idea of loose checking.
When the file is updated, if the user provides a file, we actually remove the old files first, then add the new ones, 
and so the weight stays approximately the same.








The resource identifier 
---------------
2020-01-31 -> 2020-11-05


The **resource identifier** is a string that uniquely identifies a resource.
Every resource has one (and one only) **resource identifier**.
 
 
Implementation wise, the **resource identifier** is a combination of the user id and the [canonical name](#the-canonical-name) of the resource.

- resourceIdentifier: $userId-$canonical 



Tables & information
---------------
2020-01-31 -> 2020-11-05

    
- **luda_resource**: this table contains information about the resources owned by the users (a resource is just a file).
    The file paths are stored in the **luda_resource_file** table though.

    - id: aik
    - lud_user_id: fk|uq1
    - canonical: uq1, str 64. The name of the file, as chosen by the developer.
    - is_private: char 1 (0|1). Whether the file should only be displayed to the owner user, or to all users.
    - date_creation: datetime. The date time when the resource was inserted in the database.
    - date_last_update: datetime. The date time when the resource was last updated in the database. When the resource is created,
        the date_last_update value is the same as the date_creation value.
    
- **luda_resource_file**: contains basic access information about all possible variations of the resource.
    - id: aik
    - luda_resource_id: fk
    - path: str 256, the relative path (relative to the user directory) to this specific (resource file) variation
    - nickname: str 64, the nickname for this variation
    - is_source: str 1, 0|1, whether this file is [the source file](#the-source-file)
            
- **luda_tag**: a tag for the resource.
    - id: aik
    - name: uq, str 64   
    
- **luda_resource_has_tag**: a simple linkage table.
    - resource_id: fk
    - tag_id: fk
        

 




Our web service
============
2020-02-21 -> 2020-11-05


The **Light_UserData** plugin provides an implementation of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) (**standard set**), 
so that users can upload/interact with their files.


We don't use a **virtual file server** (vfs), so interactions with the file manager gui directly affects the database and the real file system.

See my older conception notes where we used the vfs system, if you want to reimplement the vfs.

 







Accessing the user files from the browser
-----------
2020-10-06 -> 2021-03-09


We also provide a web entry point to access the user files.



The access url is: **/user-data** (defined in /app/config/data/Ling.Light_UserData/Ling.Light_EasyRoute/luda_routes.byml),
and it has the following parameters:

- id: mandatory, string. The [resource identifier](#the-resource-identifier) of the file to access.

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
         
        
- o: optional, string (0|1). Whether to fetch for the original image.
- n: optional, string. The nickname of the file to fetch.
- c: optional, string. The uploadGem configuration id. This is required if you are using a vfs and when you are in the process of adding or
    updating a file (the vfs needs the configurationId to locate the file).
- v: optional, string (0|1).
    This trigger the "virtual mode" of our service.
    Our service has two modes:
    - the normal mode: where it gets the file from the real server
    - the virtual mode: where it uses the virtual server to handle the request 
    
    Generally, if you are a js client and make [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) requests, you should pass this flag.
    Otherwise, don't use this flag.
    
    




The canonical name
-----------
2020-11-03 -> 2020-11-05


Sometimes, the developer needs to put the user images in the app.

That's where the canonical name comes handy.


The canonical name is basically the name of the resource, from the developer's perspective.

Implementation wise, for a given user, each [resource](#resource-and-file-variations) has a unique canonical name, which defaults to a random value that we generate.


History note:

The reason why this was required was due to the implementation of the "file manager protocol", which implements
some update operations as a "delete/insert" combo.
While it's practical to do so, it also means that the row in the database disappear, and so we cannot reference the resource
by its id anymore. 
The canonical name ensures that we can reference a resource, even after it's deleted/recreated. 








The resource info array
-----------------
2020-10-16 -> 2020-11-06


The **resource info array** is an array containing data about a given resource.
It's used internally at different locations in our service.

Its structure is based on the luda_resource table, but has more information bound to it:



- **id**: string, the value from the table 
- **lud_user_id**: string, the value from the table
- **canonical**: string, the value from the table
- **is_private**: bool, the value from the table as a boolean
- **date_creation**: datetime, the value from the table 
- **date_last_update**: datetime, the value from the table

- **user_identifier**: string, the user identifier (from the lud_user table)
- **original_url**: string|null, the url of the original file if any, or null otherwise


- **directory**: string, the relative directory path (relative to the user directory) of the [source file](#the-source-file)
- **filename**: string, the [filename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) of the source file
- **abs_path**: string, the absolute path to the source file

- **files**: array of the files attached to this resource. Each entry is an array with the following structure:
    - **id**: string, the id of the attached file
    - **path**: string, the relative path to the file
    - **nickname**: string, the nickname of the file
    - **is_source**: bool, whether this file is [the source file](#the-source-file)



Additionally, the resource info array can also contain the following:

- **tags**: array of tags
























 