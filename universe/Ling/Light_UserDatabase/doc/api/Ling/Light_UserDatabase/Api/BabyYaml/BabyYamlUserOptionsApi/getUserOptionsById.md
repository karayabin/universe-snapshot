[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlUserOptionsApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi.md)


BabyYamlUserOptionsApi::getUserOptionsById
================



BabyYamlUserOptionsApi::getUserOptionsById — Returns the userOptions row identified by the given id.




Description
================


public [BabyYamlUserOptionsApi::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/getUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userOptions row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlUserOptionsApi::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlUserOptionsApi.php#L27-L30)


See Also
================

The [BabyYamlUserOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi.md) class.

Previous method: [insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/insertUserOptions.md)<br>Next method: [updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/updateUserOptionsById.md)<br>

