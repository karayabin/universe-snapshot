[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::save
================



LightUserDataService::save — In both cases, the database is updated accordingly.




Description
================


public [LightUserDataService::save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md)(string $path, string $data, ?array $options = []) : string




The save method has two modes:

- insert mode
- update mode

In both cases, the database is updated accordingly.


### insert mode

The goal is to add a new file to the hard drive.
The destination of that file is given by the path argument.
If the destination file doesn't exist already, it will be created.
Otherwise if the destination file already exists on the hard drive, this method will throw an exception by default, forcing
the user to remove a file before using it.
If you want to replace the already existing file, use the overwrite option and set it to true.


### update mode

The goal is to update an already existing file.
The new destination of that file is given by the path argument.
The old/existing file to replace is identified by the **url** passed via the options array.
Passing the url option will trigger this method to use the update mode, otherwise the insert mode
is assumed by default.
If the destination already exists on the hard drive AND IS THE SAME as the old/existing file, then the file will be updated normally.
However if the destination already exists on the hard drive AND IS NOT THE SAME as the old/existing file, then by default
this method will throw an exception, forcing the user to remove a file before using it.
If you want this method to replace the already existing file without warning, use the overwrite option and set it to true.



If the maximum user storage capacity is reached, the resource is not uploaded and an exception is thrown.

The available options are:
- tags: an array of tags to bind to the given resource
- is_private: bool=false
- overwrite: bool=false. Whether to overwrite an existing file. If false (by default), will throw an exception instead of replacing the file.
     The only case were overwriting a file is ok even when overwrite=false is when in update mode if the new and old file have the same name.
     See my update notes above for more details.
- keepOriginal: bool=false. Whether to keep a copy of the given file (the copy is kept in the __original__ directory of the user).
     See the [the original file section in the conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-original-file).




Parameters
================


- path

    The relative path, from the user dir, to the resource.

- data

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::save](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L384-L512)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md)<br>Next method: [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)<br>

