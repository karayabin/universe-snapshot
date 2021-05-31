[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Light_PlanetInstaller\LightUserDatabaseBasePlanetInstaller class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.md)


LightUserDatabaseBasePlanetInstaller::getTableScope
================



LightUserDatabaseBasePlanetInstaller::getTableScope — Returns the table scope to use with the Light_DbSynchronizer tool.




Description
================


protected [LightUserDatabaseBasePlanetInstaller::getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/getTableScope.md)() : array | null




Returns the table scope to use with the Light_DbSynchronizer tool.
The table scope is basically all the tables you use.
If you aren't sure what you are doing, don't override this method, our default
guessing (when this method returns null) is generally correct.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================

This method has no parameters.


Return values
================

Returns array | null.








Source Code
===========
See the source code for method [LightUserDatabaseBasePlanetInstaller::getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.php#L171-L174)


See Also
================

The [LightUserDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.md) class.

Previous method: [undoInit3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/undoInit3.md)<br>Next method: [synchronizeDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/synchronizeDatabase.md)<br>

