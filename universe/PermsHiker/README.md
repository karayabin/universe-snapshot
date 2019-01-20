PermsHiker
===============
2016-06-16


PermsHiker helps migrating permissions from a server to another.

PermsHiker can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



What's the goal?
-------------------

The goal is to snapshot permissions from server A.

Then, once the files are copied to server B, we use the snapshot to mirror server A'perms to server B.

Permissions include owner, ownership and mode (chown and chmod).




How to use?
--------------

```php
<?php


use PermsHiker\Applier\PermsHikerApplier;
use PermsHiker\Parser\PermsHikerParser;

require_once "bigbang.php"; // start the local universe (https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md)


//------------------------------------------------------------------------------/
// DO NOT EXECUTE THIS SCRIPT AS IS
//------------------------------------------------------------------------------/
/**
 * The demo code below illustrates the whole migration workflow with PermsHiker.
 * In production, you will want to split the code and use only part of it at a time.
 *
 */


$dir = '/path/to/appdir'; // this is the application which permissions we want to port
$file = $dir . '/_permsmap.txt'; // this is where the PermsHiker will create/read from the perms map


//------------------------------------------------------------------------------/
// STEP 1: CREATE THE PERMS MAP
//------------------------------------------------------------------------------/
/**
 * The line below tells PermsHiker to create the perms map and to return
 * it as an array.
 *
 * We use the commonPerms to indicate that the PermsHiker should ignore a file if:
 *
 *  - it is a directory owned by myuser:staff with mode 0755
 *  - or it is a file owned by myuser:staff with mode 0644
 *
 */
a(PermsHikerParser::create()
    ->addCommonPerm('myuser', 'staff', 'd', 0755)
    ->addCommonPerm('myuser', 'staff', 'f', 0644)
    ->toArray($dir));


//------------------------------------------------------------------------------/
// STEP 1b: CREATE THE PERMS MAP
//------------------------------------------------------------------------------/
/**
 * This is a variation of the section above (in prod, you would use either one section
 * or the other, but not both at the same time).
 *
 * The line below tells PermsHiker to create the perms map and to put it into the file $file.
 *
 * We use the commonPerms to indicate that the PermsHiker should ignore a file if:
 *
 *  - it is a directory owned by 501:20 with mode 0755
 *  - or it is a file owned by 501:20 with mode 0644
 *
 */
a(PermsHikerParser::create()
    ->addCommonPerm(501, 20, 'd', 0755)
    ->addCommonPerm(501, 20, 'f', 0644)
    ->toFile($dir, $file));


//------------------------------------------------------------------------------/
// STEP 2: APPLY THE PERMISSIONS ON SERVER B
//------------------------------------------------------------------------------/
/**
 * So now we assume that we are on server B, and our permission map is $file.
 * The target application is $dir.
 *
 * In the example below, I illustrate how to use the owner and ownerGroup adapters.
 * The PermsHiker uses the adapters to convert any owner (and/or ownergroup) found in the
 * permission map into an owner (or ownergroup) of your choice.
 *
 */
a(PermsHikerApplier::create()
    ->setStrictMode(true)
    ->setOwnerAdapter([
        '_www' => 'www-data',
    ])
    ->setOwnerGroupAdapter([
//        '_www' => 'www-data',
        // sometimes, you'll prefer to work with id rather than names, this is just for demonstration purpose
        '70' => 'www-data',
    ])
    ->fromFile($file, $dir));
```




How does it work?
-------------------

![permshiker workflow](https://s19.postimg.org/upg6b3xwj/Perms_Hiker_idea.jpg)

The main idea is to use a medium file (the snapshot) that contains the permission information of a given source directory.

This special file is called a [perms map](https://github.com/lingtalfi/PermsHiker#perms-map).

Once the permsmap is created, we then copy the source directory to a target directory.

Last, we "apply" the permsmap to the target directory.

This will apply the permissions (owner, ownergroup and mode for every entry listed in the permsmap) to the target directory.

It is possible to adapt the name of the owner/ownergroup during the transfer, that's because our files might be 
copied to a machine with different accounts.


Important: you need to execute the PermsHike as root, because only root can change
permissions and ownerships.



Perms map
-------------
A **perms map** is a simple text file that contains information about 
the owner, ownergroup, and the mode (chmod) of potentially every file for a given directory.

It has a human friendly format.

Here is what a perms map looks like:

```
./app:www-data:www-data:0755
./app/file1:www-data:www-data:0644
./app/file2:www-data:www-data:0644
./app/dir2:joe:joe:0755
```

Each entry is composed of 4 components separated by the colon (:) symbol:

- the path
- the owner
- the owner group
- the permission

All paths are relative, and hence start with the dot slash (./) prefix.


Note: links (symlinks) are always ignored by the PermsHiker.

Tip: You might be interested in reducing the number of lines of your permsmap file.
If this is the case, check out the [grouping directories](https://github.com/lingtalfi/PermsHiker#grouping-directories) section in this document.



Implementation 
-------------------------

![permshiker implementation](https://s19.postimg.org/6mzcg8h9f/PermsHiker-implementation.jpg)


commonPerms
---------------

To create the perms map, PermsHiker scans every entry (file or dir) of your application recursively.

Most of the file will belong to a user, let's say joe.
 
Now again, our goal is to migrate an application from server A to server B.  
Do we really need to scan joe's files if they have regular permissions (0755 for dirs and 0644 for files)?

Not really, so why not just drop them and make our permsmap lighter.

That's the idea of commonPerms.

By extension, commonPerms is the idea of defining what's regular and what's not.

Then, while the scan operates, only irregular entries are kept in the permsmap file (regular entries are dropped).


 
Applier's adapters
---------------------

Using the Applier (PermsHikerApplier) is pretty straightforward.

We just call its "apply" method.

However, server A's application owner might be called joe, and server B's application owner might be called tom.
 
The Applier needs to know that tom is actually joe.
 
That's the idea of an adapter.
 
It's just a simple map that tells that joe on server A is actually tom on server B. 


    
    
Grouping directories
----------------------


Imagine you have a dir1 directory, owned by joe:joe, and with 0755 mode.
Now imagine that inside dir1, there is only one other directory called subdir1, also owned by joe:joe, and also with 0755 mode.

```
- dir1:joe:joe:0755
----- subdir1:joe:joe:0755
```

In that case, do we really need to apply joe:joe:0755's perms to both directory?

No, we can just recursively apply joe:joe:0755 on the dir1 directory.

That's the idea of grouping directories.

Basically, there is a CommonDirFilter class that we can use, that will read a permsmap file, and will reduce its number
of lines, based on whether a parent directory has only directories with the same perms or not.

This tool can substantially reduce the number of lines of the permsmap.

Warning: however, this doesn't work at the file level. Meaning that if you have an application that contains one (or more) file(s)
with special perms, and those perms are important to you, you cannot use the grouping directories technique.


Here is an example code of the grouping directories technique.

### as a filter

```php
$dir = "/some/dir3";
$file = "_permsmap.txt";


$o = PermsHikerParser::create();
$o->setDirsOnly(true)
    ->addFilter(CommonDirFilter::create())
    ->toFile($dir, $file);
```


### as a standalone tool

```php
$file = "permsmap.txt";
a(CommonDirFilter::create()->filterFile($file));
```


 

Dependencies
------------------

- [lingtalfi/Bat 1.31](https://github.com/lingtalfi/Bat)
- [lingtalfi/DirScanner 1.3.0](https://github.com/lingtalfi/DirScanner)




History Log
------------------
    
- 1.1.0 -- 2016-06-23

    - adding CommonDirFilter
    
- 1.0.0 -- 2016-06-16

    - initial commit
    
    

