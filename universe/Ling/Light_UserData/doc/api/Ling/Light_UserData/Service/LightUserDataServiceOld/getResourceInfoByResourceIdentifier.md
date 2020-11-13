[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::getResourceInfoByResourceIdentifier
================



LightUserDataServiceOld::getResourceInfoByResourceIdentifier — Returns an info array matching the file which resourceIdentifier is given.




Description
================


public [LightUserDataServiceOld::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array




Returns an info array matching the file which resourceIdentifier is given.

Throws an exception if the file is private and the user calling the file is not the owner.

The info array contains the following:

- abs_path: string, absolute path to the file
- rel_path: string, relative path to the file (from the user directory)
- is_private: bool, whether the file is private
- original_url: string|null. The url to the original file (which might be saved, or not, depending on the configuration).
     If no original url was saved, then false is returned
- date_creation: string, the mysql datetime when the file was first registered in the system. Not available in the virtual machine (at least for now).
- date_last_update: string, the mysql datetime when the file was last updated in the system. Not available in the virtual machine (at least for now).


Also, if the addExtraInfo option (see below) is set to true, the following extra information is returned:
- tags: array, the tag names bound to the resource



If the virtual machine is not used (i.e. the vm option is not set, see below), then all the row properties from the
 CustomResourceApiInterface->getResourceInfoByResourceIdentifier method are also returned along:

- id
- lud_user_id
- resource_identifier
- dir
- filename
- user_identifier





Personal note: I didnt' include the date_creation and date_last_update info from the virtual machine because I was lazy and I didn't think that was essential:
my vision is to provide those information in the file manager gui, which does not use the vm. We will see how this evolves in the future, and if the vm
does need this info.


The available options are:
- addExtraInfo: bool=false. If true, adds meta information to the returned array (see notes above).
- original: bool=false. If true, the file paths (absolute and relative) reference the original image rather than the processed one.
     Note: the original image is kept only depending on the plugin configuration.
- vm: bool=false. Whether to get the information from the virtual machine.
- onFileNotExistThrowEx: bool=true. If the file does not exist in the file system, by default an exception is thrown.
     To prevent the throwing of the exception, we can set this flag to false. The abs_path property will then be set to false.




Parameters
================


- resourceIdentifier

    The generic resource identifier. See the [related-files.md](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) document for more info.

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [LightUserDataResourceNotFoundException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataResourceNotFoundException.md).&nbsp;
- When the resource is not found
- [LightUserDataException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataException.md).&nbsp;
- When the user is not allowed to access the data
- When the file is missing but the entry exists in the database






Source Code
===========
See the source code for method [LightUserDataServiceOld::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1027-L1106)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceUrlByResourceIdentifier.md)<br>Next method: [getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceUrl.md)<br>

