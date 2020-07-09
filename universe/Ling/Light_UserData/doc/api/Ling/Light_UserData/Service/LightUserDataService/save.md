[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::save
================



LightUserDataService::save — Saves the given meta array, and returns an array of information related to the saved file.




Description
================


public [LightUserDataService::save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md)(?array $meta = [], ?array $options = []) : array




Saves the given meta array, and returns an array of information related to the saved file.


If the maximum user storage capacity is reached, the resource is not uploaded and an exception is thrown.



The save method has two modes:

- insert mode
- update mode

The insert mode is triggered when no "resourceId" is provided, or when the provided "resourceId" doesn't match
any entry in the database.

If the resourceId is provided and match an existing entry in the database, then the update mode is executed.


The meta array contains the following properties, all optional, with their default values:

- resourceId: string=null, the resource identifier
- dir: undefined
- directory: undefined (it's an alias of dir, use one or the other, dir has precedence)
- filename: undefined
- is_private: 0|1
- date_creation: (the current datetime)
- date_last_update: (the current datetime)
- tags: []

- file: string=null, the binary data of the file, or alternately you can specify the "file_path" property instead.
- file_path: string=null, the path to the file, or alternately you can specify the "file" property instead.
     Note: this method will potentially move the **file_path** to another location, which means that after
     calling this method, file_exists (file_path) will return false.

- original_file_path: string=null, the path to the original file if any. If passed, this method will store the original file in the
     original directory.


The file property (or file_path) is mandatory in insert mode.


Note: we've added the file_path and original_file_path properties to be able to move files rather than copying them (much faster if
the files are on the same drive), for when committing the virtual file server.
While the file property is still useful to deal with js gui interaction.


Both modes, when successful, will result in an alteration of the database, and possibly the filesystem (if a file was provided).




The available options are:

- keep_original: bool=false. Whether to keep a copy of the given file.
     See the [the original file section in the conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-original-file).
- check_msc: bool=true. Whether to check the maximum storage capacity.
- treat_file: bool=true. Whether to treat the file on the filesystem.
     If false, the file won't be copied to its expected destination, and the original
     file won't be created. This option can be used by virtual file server which take
     care of that part.



The returned array
----------

- resource_identifier: string, the resource identifier
- lud_user_id: string, the id of the user owning the file
- dir: string, the directory associated with the file
- filename: string, the filename associated with the file
- is_private: 0|1, whether the file is private or public
- date_creation: datetime, the datetime when the file was saved for the first time
- date_last_update: datetime, the datetime when the file was last saved
- tags: array, the tag associated with the file




Parameters
================


- meta

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::save](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L475-L751)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md)<br>Next method: [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)<br>

