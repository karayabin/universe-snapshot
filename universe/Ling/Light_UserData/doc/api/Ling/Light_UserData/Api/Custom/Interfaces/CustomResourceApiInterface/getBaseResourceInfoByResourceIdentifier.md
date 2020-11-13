[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md)


CustomResourceApiInterface::getBaseResourceInfoByResourceIdentifier
================



CustomResourceApiInterface::getBaseResourceInfoByResourceIdentifier —     - is_source: bool, whether this file is the source file.




Description
================


abstract public [CustomResourceApiInterface::getBaseResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getBaseResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array | false




Returns an array containing the row from the luda_resource table, augmented with the following extra properties:

- user_identifier: string, the user identifier (from the lud_user table)
- files: array, of fileItems representing the file variations, each of which being an array:
    - id: string, the id of the attached file
    - path: string, the relative path of the file (relative to the user directory)
    - nickname: string, the nickname of the file
    - is_source: bool, whether this file is the source file. See the [source file concept in the Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-source-file) for more details.
- tags: array of tags (only returned if the tags option is set to true)

If the row is not found, this method returns false.


Available options are:

- tags: bool=false, whether to append the tags property to the returned array




Parameters
================


- resourceIdentifier

    

- options

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [CustomResourceApiInterface::getBaseResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomResourceApiInterface.php#L48-L48)


See Also
================

The [CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md) class.

Previous method: [hasResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/hasResourceByResourceIdentifier.md)<br>Next method: [getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getSourceFilePathInfoByResourceIdentifier.md)<br>

