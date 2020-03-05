[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlPluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi.md)


MysqlPluginOptionApi::getPluginOptionByName
================



MysqlPluginOptionApi::getPluginOptionByName — Returns the pluginOption row identified by the given name.




Description
================


public [MysqlPluginOptionApi::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the pluginOption row identified by the given name.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- name

    

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
See the source code for method [MysqlPluginOptionApi::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPluginOptionApi.php#L93-L107)


See Also
================

The [MysqlPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi.md) class.

Previous method: [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionById.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getAllIds.md)<br>

