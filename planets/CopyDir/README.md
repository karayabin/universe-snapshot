CopyDirUtil
===============
2015-10-20



Utility to copy a dir recursively.




Features
---------------

- followSymlink option: you can decide to follow symlinks to files, symlinks to dir, both or none
- preFilter: you can filter out entries, like .git or any other pattern
- postFilter: allow you to chmod your entries for instance
- customizable: many aspects of the utility's behaviour are configurable via callbacks.
                    You can hook any situation with callbacks, for instance, you can 
                    decide what happens if you try to copy a dir, but the target already exists and is a symlink.
                    





The general philosophy
--------------------------

This utility collects the errors as it encounters them in an internal errors array.

The strict mode property controls what to do with the errors at the end:

- if true: an exception is thrown if at least one error has been collected 
- if false (default): the utility is silent, and you can investigate further the errors manually with the getErrors method 




Examples
------------


### Simple copy
```php
$src = "/path/to/my/dir";
$target = "/path/to/my/dir.copy";
CopyDirUtil::create()->copyDir($src, $target);
```


### Copy and follow the symlinks

The default utility copies symlinks as symlinks.
To tell CopyDir to actually follow symlinks we can use the setFollowDirLinks and/or 
setFollowFileLinks method.



```php
$src = "/path/to/my/dir";
$target = "/path/to/my/dir.copy";
CopyDirUtil::create()
    ->setFollowDirLinks(true)
    ->setFollowFileLinks(true)
    ->copyDir($src, $target);
```



### Copy and replace file if it already exists

The default utility triggers an error whenever the target already exists,
except for a directory, in which case the mapping is ok.

If we want the utility to replace the target file contents by the source file contents (when 
this situation occurs), we have two main options:

- add a callback manually:

```php
CopyDirUtil::create()
    ->setOnFileConflict(function ($src, $target, &$errMsg) {
        if (is_file($target)) {
            // confirm that we want to copy the src to the target
            copy($src, $target);

            // do not add an error message: we've just handled the case
            $errMsg = null;
        }
    })
    ->copyDir($src, $target);
```

- use the AuthorCopyDirUtil class

```php
AuthorCopyDirUtil::create()->copyDir($src, $target);
```





### Copying and preserve perms

The CopyDirUtil itself is very raw.
If we want to emulate the preserve chmod option that we 
have in the bash command (cp -R -p), we have to use the 
AuthorCopyDirUtil:

```php
$o = AuthorCopyDirUtil::create();
$o->setPreservePerms(true);
if (false === $o->copyDir($src, $target)) {
    a($o->getErrors());
}
```



AuthorCopyDirUtil
--------------------

The CopyDirUtil is very basic and therefore extensible.
However generally, users prefer simplicity. 
The AuthorCopyDirUtil class is the user-friendly version of the CopyDirUtil.
It has the following features out of the box:

- on file conflict: if the target is an existing file, its content gets replaced with the content of the src file
- ignore conflict errors (by default)
- handle mapping of permissions




SimpleCopyDirUtil
--------------------

The SimpleCopyDirUtil provides a replaceMode.

If the replace mode is on, files are overwritten in case of conflict. This is the default.

If the replace mode is off, files are NOT overwritten in case of conflict.



WithFilterCopyDirUtil
-----------------------
2017-04-18

This CopyDirUtil gives you a simpler (easier to understand for the developer) api to filter the directory to copy.
 
 
```php

// filter hidden files
WithFilterCopyDirUtil::create()
    ->setFilter(function ($baseName) {
        if (0 === strpos($baseName, ".")) {
            return false;
        }
        return true;
    })
    ->copyDir($srcDir, $dstDir);
```



Personal Chat 
----------

I like bash a lot, and I almost convinced myself not to code
the CopyDir utility.
Bash is straight forward, and has a lot of options.

Eventually, I changed my mind because of the following reasons:

- bash wouldn't work on Windows, so it's more portable to have the method directly coded in php
- we should be able to copy a dir in php without having to resort to another scripting language






History Log
------------------

- 1.3.0 -- 2017-04-18

    WithFilterCopyDirUtil now extends SimpleCopyDirUtil 
    
- 1.2.0 -- 2017-04-18

    add WithFilterCopyDirUtil
    
- 1.1.0 -- 2017-03-21

    add SimpleCopyDirUtil
    
- 1.0.0 -- 2015-10-20

    initial commit
    