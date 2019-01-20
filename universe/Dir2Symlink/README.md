Dir2Symlink
=================
2017-03-31


Converts directories to symlinks, and vice versa.



This planet is part of the [universe framework](https://github.com/karayabin/universe-snapshot).




Install
============
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Dir2Symlink
```

Or you can simply download the repository manually.





Why
======
Have you ever wanted to convert a bunch of directories to symlinks?
If that's the case, then this tool can help you.

I personally use this tools for the following reason:
being a framework author, I create my modules in a shared local directory.
 
Then my modules are spread in different locations on my machine (basically each project can 
re-use my modules).

Since I'm still developing the modules, I prefer to work with symlinks to the shared common module repository,
it allows me to continuously upgrade my modules while working in any project, and without loosing track of 
which version which module is in.

So, I would use the Dir2Symlink object for that.

But then, time to upload my work to a production server.
This time, I prefer to work with regular directories (not symlinks), because I prefer my client to have
its own separated application, so that if I want to do dirty things in the modules for one client, I can do so without
impacting the other applications.

Again, I would use the Dir2Symlink object for that.




Example
===========


Simple example

```php
<?php


use Dir2Symlink\Dir2Symlink;

require_once __DIR__  . "/../boot.php";


$sourceDir = "/myphp/kaminos/app/www/source";
$targetDir = "/myphp/kaminos/app/www/target";
//a(Dir2Symlink::create()->toSymlinks($sourceDir, $targetDir)); // true
a(Dir2Symlink::create()->toDirectories($sourceDir, $targetDir)); // true
```




Same example, using an [Output](https://github.com/lingtalfi/Output/).


```php
<?php



use Dir2Symlink\ProgramOutputAwareDir2Symlink;
use Output\WebProgramOutput;

require_once __DIR__  . "/../boot.php";


$sourceDir = "/myphp/kaminos/app/www/source";
$targetDir = "/myphp/kaminos/app/www/target";


$output = WebProgramOutput::create();
a(ProgramOutputAwareDir2Symlink::create()->setProgramOutput($output)->toSymlinks($sourceDir, $targetDir)); // true
//a(ProgramOutputAwareDir2Symlink::create()->setProgramOutput($output)->toDirectories($sourceDir, $targetDir); // true

```








History Log
------------------
    
- 1.2.0 -- 2017-04-01

    - add equalize method
    
- 1.1.0 -- 2017-03-31

    - fix no error returned when sourceEntry not a directory
    
- 1.0.0 -- 2017-03-31

    - initial commit
    
    
    
    
    