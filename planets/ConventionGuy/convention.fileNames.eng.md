FileNames
==========================
2015-10-14







This document describes some conventions that tools can refer to for consistency.
We use the [fileName nomenclature](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.fileName.eng.md).



Stamped file
-------------------

This is a file which contains either the date or the date time in it.

stamped with date:

    - stampedFile: <withDate> | <withDatetime>
    - withDate: <fileName> <.> <date> (<.> <ext>)?
    - withDatetime: <fileName> <.> <datetime> (<.> <ext>)?
    - date: 2015-10-14     
    - datetime: 2015-10-14__20-54-41
    
    
The date is also called dateStamp, and the datetime is also called datetimeStamp.    
         
         
Tags
-------------------
         
Tags are all the dot separated components of a file.
          
          
For instance, if the baseName is:  convention.fileNames.eng.md,
then the tags are:

- convention
- fileNames
- eng
- md

In the special case of a hidden file like .htaccess, the component is:

- htaccess
    
         
DashTags
-------------------
         
DashTags are all the dash separated components of a file, but the last component cannot contain a dot (unless
it is also the first component and it starts with a dot -- hidden file).
          
          
For instance, if the baseName of a file is:  notation-babyTree-1.0.0-eng.md, then the tags are:

- notation
- babyTree
- 1.0.0

And the extension if md.

Now if the file's baseName is notation-babyTree-1.0.0-eng.tar.md, we have the same components, but
the extension would be tar.md.


In the special case of a hidden file like .htaccess, the component is:

- .htaccess

          
    
    
   