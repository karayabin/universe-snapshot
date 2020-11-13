Light_UserData FileManager handler
=========
2020-10-15 -> 2020-11-05







Our implementation
-------------------
2020-10-15 -> 2020-10-30


Nomenclature:

- rs: real server
- vfs: virtual file system



We have actually 2 implementations:

- a real file server (the default)
- a virtual file server (it's not complete, the commit method is missing)


Both types of server share the same [upload file configuration](#upload-file-configuration).

Apart from that, the rest of this document is mostly about the **virtual file server**.




The virtual server
=======
2020-10-30



### File system structure
2020-10-15 -> 2020-10-16


```txt 
- (root dir)/
----- vm/
--------- $contextId (=$userIdentifier-$configId)
------------- commit_list.byml
------------- files/
----------------- $relPath
----------------- ...
--------- ...

```


With:
 
- userId: the user identifier
- configId: an identifier to target the specific form on the page 



### commit_list.byml
2020-10-20 -> 2020-10-26

This file contains the instructions to pass to the real server in case of a **commit operation** (i.e. successful form post).

Its content looks like this:

```yaml
to_add:
    $resourceId: 
        tags: []
            - $tagName
        is_private: bool
        files: []
            -  
                path: $relativePathOfRelated
                nickname: $nickname
                is_source: $isSourceFile
to_update:
    $resourceId: same structure as an entry in to_add, except that if a file was not provided by the user, the paths (file.$index.path) don't point to an existing file.  
to_remove:
    - $resourceId

        
    ...
```
    


We have two different cases with files.

- either the file already exists on the real server. In which case it shows up in the gui/form by default. In this section, we call this a "default file".
- or the file is added by the user via the gui, and doesn't exist yet on the real server. In this section, we call this a "new file".
    
Action on a "default file" are written in the **to_update** and/or **to_remove** sections.
Actions on a "new file" are written in the **to_add** section.



    
The default file / new file concept
-------------
2020-10-26 -> 2020-10-27


This is more of an implementation detail, but I thought it could be useful.

The concept of **default file / new file** helps manage the inherent complexity of this plugin.

Basically, a **default file** is a file that exists on the real server, while a **new file** is a file that is only
created on the virtual server.


When the form is displayed to the user for the first time, it is fed with default values, including, for instance,
the image of the user avatar (if it's a user profile form for instance).

This image, displayed by default, and stored on the real server, is what we call the **default file**.

A form might have multiple more than one **default file**.

On the other hand, the **new file** is the file created by the user while using the form gui.

So for instance when the user drops a file into the dropzone, this creates a new file, which doesn't exist yet on the real server, but is handled
by the virtual server.


I found it helpful, while developing this plugin, to ask first which type of file we are processing.
As a consequence, most methods of my implementation are tainted with this concept's nomenclature.


Also, for testing, it helps to differentiate between those two types of file.

Each file type has its own set of actions:

```txt
- defaultFile:
    - update meta only      (in the to_update section)
    - update meta + file    (in the to_update section)
    - remove                (in the to_remove section)
    
- newFile: 
    - remove                (from the to_add section)
    - add                   (in the to_add section)
    - update meta only      (in the to_add section)    
    - update meta + file    (in the to_add section)    
```



Another thing to keep in mind if you are developing this plugin is that **default files** have their [original images](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#original-image) stored on the real server.
We don't bring the original image back on the virtual server, as it would cost an unnecessary operation.
















Upload file configuration
========
2020-10-19 -> 2020-11-05


To upload the files, we rely on a separate config file, identified by a unique identifier.

This helps us have a safe configuration that a malicious user cannot tamper with.

Beside, we can store a lot more information in a config file than in an identifier or url parameter.


Under the hood we use the [Light_UploadGems](https://github.com/lingtalfi/Light_UploadGems) planet, which does a decent job at handling file uploads.
However, we don't use their **copies** property. Instead, we use our own system, in the custom config section of the uploadGem config file, under the **files** property.


Here are the properties available for the **config** section (of the uploadedGems config file):

- canonicalName: string|null, the [canonical name](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-canonica-name) of the resource.
    If null, it will default to the resourceIdentifier.
- acceptKeepOriginal: bool=true, whether to allow keeping an original of the image. 
    The client must set the **keep_original** flag to 1, in addition to acceptKeepOriginal being true, to effectively create the original resource on the server.
    See more details in the [keepOriginalUrl section of the file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md#keeporiginalurl). 
    Or more details about our implementation of [the original image concept](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#original-file). 


- files: array of fileItems, each of which being an array with the following structure:
    - path: the relative path (relative to the user directory) where to put the file. 
        Double dot escalation chars are reduced to an empty string to prevent malicious tricks.
        The following {tags} are available:
            - directory: the directory of the source file
            - basename: the [basename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) of the source file
            - filename: the [filename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) of the source file
            - extension: the file extension of the source file
    - nickname: the nickname for this file. At least one of the fileItem must have the nickname of "default".    
    - ?imageTransformer: same as [the imageTransformer property of the Light_UploadGems planet](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/pages/conception-notes.md#copies)
    - ?is_source: bool=false. Specifies that this file is [the source file](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-source-file).
        If the **files** array contains more than one item, then at least one of the file item must have the **is_source** property set to true.















