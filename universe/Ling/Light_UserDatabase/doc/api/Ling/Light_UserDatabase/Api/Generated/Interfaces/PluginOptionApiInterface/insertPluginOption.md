[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\PluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface.md)


PluginOptionApiInterface::insertPluginOption
================



PluginOptionApiInterface::insertPluginOption — Inserts the given pluginOption in the database.




Description
================


abstract public [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given pluginOption in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- pluginOption

    

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
See the source code for method [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PluginOptionApiInterface.php#L34-L34)


See Also
================

The [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface.md) class.

Next method: [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionById.md)<br>

