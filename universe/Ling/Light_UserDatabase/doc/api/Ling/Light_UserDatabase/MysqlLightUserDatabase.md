[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlLightUserDatabase class
================
2019-07-19 --> 2019-08-06






Introduction
============

The MysqlLightUserDatabase interface.

In this implementation, we use a table named "user" by default, with the following columns:

- id: a mysql identifier
- user_id: the user identifier (could be an email...)
- password: the password of the user
- rights: the rights of the user (it's a php serialized array)
- avatar_url: the url of the avatar
- pseudo: a pseudo for the user
- extra: any other fields that you might like (it's a php serialized array)


The table is created if it doesn't exist, using the [initializer service](https://github.com/lingtalfi/Light_Initializer/).

Also, a root user is created along with the table, so that the maintainer can connect directly to the gui
without having to create the user manually (the serialized arrays make it annoying to create user manually
even with tools like phpMyAdmin).

Tip: to create the root user manually, use the following for serialized keys:
- rights: a:1:{i:0;s:1:"*";}
- extra: a:0:{}



Class synopsis
==============


class <span class="pl-k">MysqlLightUserDatabase</span> implements [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md), [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) {

- Properties
    - protected string|null [$database](#property-database) ;
    - protected string [$table](#property-table) ;
    - protected [Ling\Light_Database\LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected string [$root_username](#property-root_username) ;
    - protected string [$root_password](#property-root_password) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/__construct.md)() : void
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setPdoWrapper.md)([Ling\Light_Database\LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) $pdoWrapper) : void
    - public [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfo.md)(string $identifier, string $password) : array | false
    - public [getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false
    - public [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/addUser.md)(string $identifier, string $password, array $userInfo) : void
    - public [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void
    - public [deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/deleteUser.md)(string $identifier) : void
    - public [initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/initialize.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : mixed
    - public [setDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setDatabase.md)(?string $database) : void
    - public [setTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setTable.md)(string $table) : void
    - protected [dQuoteTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/dQuoteTable.md)(string $table) : string
    - protected [unserialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/unserialize.md)(array &$array) : void
    - protected [serialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/serialize.md)(array &$array) : void

}




Properties
=============

- <span id="property-database"><b>database</b></span>

    This property holds the database for this instance.
    If null, this class will try to use the default database.
    
    

- <span id="property-table"><b>table</b></span>

    This property holds the name table containing all the users.
    
    

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    The pdoWrapper is provided by the [Light_Database plugin](https://github.com/lingtalfi/Light_Database)
    
    

- <span id="property-root_username"><b>root_username</b></span>

    This property holds the root_username for this instance.
    
    

- <span id="property-root_password"><b>root_password</b></span>

    This property holds the root_password for this instance.
    
    



Methods
==============

- [MysqlLightUserDatabase::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/__construct.md) &ndash; Builds the MysqlLightUserDatabase instance.
- [MysqlLightUserDatabase::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlLightUserDatabase::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfo.md) &ndash; credentials don't match any user.
- [MysqlLightUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfoByIdentifier.md) &ndash; doesn't match an user.
- [MysqlLightUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/addUser.md) &ndash; Adds the user info to the database.
- [MysqlLightUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [MysqlLightUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/deleteUser.md) &ndash; Deletes the user identified by the given identifier.
- [MysqlLightUserDatabase::initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/initialize.md) &ndash; Initializes a service with the given Light instance and HttpRequestInterface instance.
- [MysqlLightUserDatabase::setDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setDatabase.md) &ndash; Sets the database.
- [MysqlLightUserDatabase::setTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setTable.md) &ndash; Sets the table.
- [MysqlLightUserDatabase::dQuoteTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/dQuoteTable.md) &ndash; Returns the double quote protected full version of the given table.
- [MysqlLightUserDatabase::unserialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/unserialize.md) &ndash; Unserializes the relevant keys from the given array (i.e.
- [MysqlLightUserDatabase::serialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/serialize.md) &ndash; Serializes the relevant keys from the given array (i.e.





Location
=============
Ling\Light_UserDatabase\MysqlLightUserDatabase<br>
See the source code of [Ling\Light_UserDatabase\MysqlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightUserDatabase.php)



SeeAlso
==============
Previous class: [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)<br>
