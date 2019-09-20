[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi.md)


BabyYamlPermissionGroupApi::insertPermissionGroup
================



BabyYamlPermissionGroupApi::insertPermissionGroup — Inserts the given permissionGroup in the database.




Description
================


public [BabyYamlPermissionGroupApi::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/insertPermissionGroup.md)(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed




Inserts the given permissionGroup in the database.
By default, it returns the result of the PDO::lastInsertId method.

If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the method will return false
- if false, the error will not be caught

If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.




Parameters
================


- permissionGroup

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlPermissionGroupApi::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlPermissionGroupApi.php#L52-L55)


See Also
================

The [BabyYamlPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi.md) class.

Previous method: [updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/updatePermissionGroupById.md)<br>Next method: [deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/deletePermissionGroupById.md)<br>

