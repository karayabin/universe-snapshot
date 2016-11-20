BabyTree
==========================
2015-11-06


Notation to represent a filesystem tree.



Examples
------------


### Basic example

A basic example would be this.

```
- emptyDir/
- web
----- js
--------- myscript.js
----- css 
--------- style.css
----- index.php
----- inc
--------- header.php
```

Notice that a file looks just like a dir, so to differentiate both when it's ambiguous we can end the directory path 
with the slash.


### Permissions example

In this section we illustrate how permissions would be applied. 

```    
- dir1 ** 0755
----- file.txt 
----- file2.txt ** 0644  
----- file3.txt ** www-data 
----- file4.txt ** www-data:www-data 
----- file5.txt ** 0644 ** www-data:www-data 
- dir2 
----- linkToFile2 -> ../dir1/file2.txt 
----- linkToDir1 -> ../dir1 ** 0700
```    

Notes:

- the default separator is the double asterisk (**) but the user should be able to change it to accommodate weird paths
- the last line tries to set the permission on the link itself, not the target of the link. 
    This may not be possible on all systems, and actually doing so is not a good idea in general.
    Therefore, this is not a feature of babyTree. Implementors are not required to implement appliance of permissions
    on a link. However if they do, the permissions apply on the link and not it's target.





A more formal notation
-------------------


Each line is an entryFormat.


```    
- entryFormat: <indent> (<fileOrDirFormat> | <linkFormat>)
- indent: string composed of n dashes. n=(depth x 4) + 1
- fileOrDirFormat: <path> ( <sep> <perms> (<sep> <ownership>)?  )?   <slash>?
- path: baseName of the entry, relative to a given root directory
- sep: <space> <sepChar> <space>
- sepChar: **   # this is the default
- space: a space character 
- perms: <octalPerm> 
- octalPerm: perms in octal notation (0777 for instance). It has no effect on a link.
- ownership: <owner> <:> <ownerGroup>
- owner: name of the entry's owner 
- ownerGroup: name of the entry's owner group
- slash: </>  # indicates that the entry is a directory
- linkFormat: <linkPath> ( <sep> <perms> (<sep> <ownership>)? )? 
- linkPath: <path> <space> "->" <space> <linkTarget>
- linkTarget: target of the link, as read with php's native readlink function
```    




History Log
------------------
    
- 1.0.0 -- 2015-11-06

    - initial commit
    
    







