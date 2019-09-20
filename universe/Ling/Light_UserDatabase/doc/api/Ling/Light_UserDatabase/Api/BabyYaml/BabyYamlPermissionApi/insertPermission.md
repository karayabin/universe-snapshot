[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi.md)


BabyYamlPermissionApi::insertPermission
================



BabyYamlPermissionApi::insertPermission — Inserts the given permission in the database.




Description
================


public [BabyYamlPermissionApi::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/insertPermission.md)(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed




Inserts the given permission in the database.
By default, it returns the result of the PDO::lastInsertId method.

If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the method will return false
- if false, the error will not be caught

If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.




Parameters
================


- permission

    

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
See the source code for method [BabyYamlPermissionApi::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlPermissionApi.php#L52-L55)


See Also
================

The [BabyYamlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi.md) class.

Previous method: [updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/updatePermissionById.md)<br>Next method: [deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/deletePermissionById.md)<br>

