Related files
=============
2020-05-14 -> 2020-05-18




Related files vs simple copy
--------
2020-05-14



The **Light_UploadGems** plugin brought us the idea of file copies. 

So for instance when the user uploads an image for his e-commerce, we can store the image in various formats, such as:
- small
- medium
- large

That way we can choose an optimized version of the image depending on where we want to display it (in a thumbnail, 
or in a list item, or in a light box full screen, ...).



In our plugin, we use the copy function of the Light_UploadGem plugin to create what we call related files.

A related file is different from a simple copy.

In fact, a simple copy can be used for anything, it just creates a standalone copy of the original file.

A related file is more specific to our plugin, it basically means that when we update the original file, we also update all the related files along with it.
Similarly, when we delete the original file, it removes all the related files along with it.

So in short, we can see our uploads as a main file (the original file), with potential related files gravitating around it,
and any change in the main file affects the related files.


So to conclude this introduction, our plugin uses the copy functionality of the **Light_UploadGems** plugin to implement
the related files' system.

This also means that we loose the original intent of a genuine copy from the **Light_UploadGems** plugin.
So if we need a genuine copy, our plugin will use some other ways to do it, such as hooks.




The related file format
----------
2020-05-14


Now that we've established that we will use **related files** and not **copies**, let's talk about the implementation of the related files system.

It's worth remembering that our plugin uses a [flat filesystem](https://github.com/lingtalfi/TheBar/blob/master/discussions/flat-filesystem.md); 
it also features a virtual server, which brings more complexity to the table (but we really want the user to be able to reset a form with uploaded images, so we pay the price).

So in this section I will expose my thoughts about the synopsis I hope to implement (nothing is done yet) between the js client (the file uploader gui),
the vfs (virtual file system) and the real server.


The main idea is to introduce the concept of identifier formats.

Each file handled by our plugin has an identifier (as per the flat filesystem specs).

However, this identifier has no particular format so far.

Well now the idea is to have two formats: one format for the main file, and one format for the related files.

The formats are the following:

- main file format: f1589462957.5939.668
- related file format: f1589462957.5939.668-1


So basically, the main file format contains any character except for the dash.
The presence of the dash indicates that we are referencing a related file.

A generic representation of the related file format would be:

- related file format: `<mainFileFormat> <dash> <relatedFileId>`, with:
    - mainFileFormat: the main file format
    - dash: the dash character (-)
    - relatedFileId: an integer (for now) representing the index of the copy (Light_UploadGems copy), starting from 0.
    
    
    
Now that we've introduced the concept of formats, let's see how it will fit the big picture.



### Synopsis A: the user adds a new file

The user paul adds a new file.

The vfs writes an **add** operation that looks like this:

```yaml 
- 
    type: add
    id: f1589462957.5939.668
    path: f1589462957.5939.668
    meta: 
        filename: lka_admin.png
        directory: images
        tags: []
        is_private: false
        has_original: false
```

The file structure of the **vfs** looks like this:

```text 
- paul/
----- files/
--------- f1589462957.5939.668
```


Later when we commit to the real server, this will push an entry in the database with:

```text 
- resource_identifier: f1589462957.5939.668
- dir: images
- filename: lka_admin.png
```

With a file structure like this:

```text 
- some_dir_owned_by_paul/
----- f1589462957.5939.668
```

Now let's add the related files into the game, and let's imagine the same scenario where the user starts over and uploads the same file,
but this time we will have one related file (keep it simple) with the following relative path definition:

- {user_dir}/thumbnails/thumb-80x80    



The vfs writes an **add** operation that now looks like this:

```yaml 
- 
    type: add
    id: f1589462957.5939.668
    path: f1589462957.5939.668
    meta: 
        filename: lka_admin.png
        directory: images
        tags: []
        is_private: false
        has_original: false
        related:
            -
                filename: thumb-80x80
                directory: thumbnails
```



Let's pause for a second and understand what happened.

We now have a **related** entry which contains all our related files.
It is a numerically indexed array, and each index will be part of the related file format described earlier.
This means that the identifier of the related file is implicit: in this case our related file has the following identifier:

- f1589462957.5939.668-0

With 0 the index of the related file entry in the **related** array.


Also, notice that we didn't specify any meta apart from the filename and the directory.

The metas are implicitly shared by the main file down to all related files.



The file structure of the **vfs** looks like this:

```text 
- paul/
----- files/
--------- f1589462957.5939.668
--------- f1589462957.5939.668-/
------------- 0
```

Again let's take a moment to understand what's going on.

When a file has related files, we create a folder which name is the identifier of the main file, with the dash suffix.

Then inside of this folder, each related file's name is its index. Here since we have only one file, its index is 0.


This design choice makes it easier for our plugin to delete all related files at once, and to visually debug while navigating the filesystem.


Later when we commit to the real server, this will push two entries in the database:

```text 

- (main file)
    - resource_identifier: f1589462957.5939.668
    - dir: images
    - filename: lka_admin.png

- (related file with index 0)
    - resource_identifier: f1589462957.5939.668-0
    - dir: thumbnails
    - filename: thumb-80x80
```

With a file structure like this:

```text 
- some_dir_owned_by_paul/
----- f1589462957.5939.668
----- f1589462957.5939.668-/
--------- 0
```


So, the related file has now its own row in the database, which means it can be accessed separately (via a browser for instance).

In terms of file structure, we kept the same dir format than the vfs, to make things look more consistent.


 
So there you have it, the main idea of the related files.





Nomenclature
------------
2020-05-18


Here we provide formal definitions for the following terms: **generic resource id**, **base resource id**, **related file index**, ...



- genericResourceId: ```<regularFileResourceId> | <relatedFileResourceId>```
- regularFileResourceId: ```<baseResourceId>```
- baseResourceId: this is the resource id for a regular file format described earlier in this document (i.e. f1589462957.5939.668)
- relatedFileResourceId: ```<baseResourceId> ( "-" <relatedFileIndex> )?``` 
- relatedFileIndex: int representing the index of the related file 


        






















