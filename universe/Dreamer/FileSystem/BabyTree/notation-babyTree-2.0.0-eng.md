BabyTree
==========================
2015-12-26


Notation to represent a filesystem tree.



Examples
------------


### Basic example

A basic example would be this.

```
- emptyDir:
- web:
----- js:
--------- myscript.js
----- css:
--------- style.css
----- index.php
----- inc:
--------- header.php
```

Notice that directory names end with a colon (:).



### Permissions and links example

In this section we illustrate how permissions and links would be applied.

```    
- dir1 ** [0755]
----- file.txt 
----- file2.txt ** [0644]
----- file3.txt ** {www-data}
----- file4.txt ** {www-data:www-data}
----- file5.txt ** [0644] ** {www-data:www-data}
- dir2 
----- linkToFile2 -> ../dir1/file2.txt 
----- linkToDir1 -> ../dir1 ** [0700]
```    

Notes:

- the default separator is the double asterisk (\*\*) but the user should be able to change
        it to accommodate paths that have the double asterisk (\*\*) in their names.

- the last line tries to set the permission on the target of the link, not the link itself.





A more formal notation
-------------------


Each line is an babyTreeLine and can be described as following:


```    
- babyTreeLine: <indent> <line>
- indent: x consecutive dashes, where x = (level * 4) + 1
- line: <rPath> ( "->" <linkTarget> )? (<**> <fileInfo>)?
- rPath: relative path to the resource (relative to the given root dir).
                It is assumed that this relative path always points to an existing resource.
- linkTarget: if the resource is a link, the link target.
                we recognize two types of link paths:

                    - a relative path, starting with a parent dot dot directory or the current dot directory
                    - an absolute path

                There is also a third part which starts with the rootDirAlias, and resolve
                in one of the two other forms (the rootDir alias being replaced with the root dir).


- fileInfo: <nonExistingLinkTargetMessage> | <permsInfo>
- nonExistingLinkTargetMessage: [_target_not_found_]
        This message is only seen if the resource is a link pointing to a non
        existing resource (aka broken link).
- permsInfo: <permsOrOwner> (<**> <permsOrOwner>)?
- permsOrOwner: <perms> | <owner>
- perms: <[> <permOctal> <]>
- permOctal: the permission information in octal (0755, 0644, ...)
- owner: <{> <ownerName> <=> <ownerGroup> <}>
```    




History Log
------------------
    
- 2.0.0 -- 2015-12-26

    - reforged the notation

- 1.0.0 -- 2015-11-06

    - initial commit
    
    







