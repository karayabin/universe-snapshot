[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::pdelete
================



LightDatabasePdoWrapper::pdelete — Same as delete method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Description
================


public [LightDatabasePdoWrapper::pdelete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pdelete.md)($table, ?$whereConds = null, ?$markers = []) : false | int




Same as delete method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Parameters
================


- table

    

- whereConds

    

- markers

    


Return values
================

Returns false | int.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::pdelete](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L238-L246)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [pupdate](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pupdate.md)<br>Next method: [pfetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetch.md)<br>

